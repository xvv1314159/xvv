<?php
namespace app\admin\controller;

use app\admin\model\Plugin as PluginModel;
use app\admin\service\PluginService;
use app\admin\service\PluginMarketService;
use think\facade\View;

class Plugin extends Base
{
    protected $noNeedAuth = ['index'];
    protected PluginService $service;

    public function __construct(\think\App $app)
    {
        parent::__construct($app);
        $this->service = new PluginService();
    }

    public function index()
    {
        $this->service->scan();
        $plugins = PluginModel::order('id asc')->select()->toArray();
        $findFirstHref = function (array $menus) use (&$findFirstHref): string {
            foreach ($menus as $m) {
                if (!empty($m['href'])) return $m['href'];
                $found = $findFirstHref($m['children'] ?? []);
                if ($found) return $found;
            }
            return '';
        };
        foreach ($plugins as &$p) {
            $appFile  = base_path() . "plugin/{$p['identifier']}/config/app.php";
            $menuFile = base_path() . "plugin/{$p['identifier']}/config/menu.php";
            $entry = '';
            if (file_exists($appFile)) {
                $cfg   = include $appFile;
                $entry = is_array($cfg) ? ($cfg['admin_entry'] ?? '') : '';
            }
            if (!$entry && file_exists($menuFile)) {
                $menu  = include $menuFile;
                $entry = is_array($menu) ? $findFirstHref($menu) : '';
            }
            $p['admin_entry'] = $entry;
            $fileVersion = '';
            if (file_exists($appFile)) {
                $cfg = include $appFile;
                $fileVersion = is_array($cfg) ? ($cfg['version'] ?? '') : '';
            }
            $p['upgradable']   = $p['installed'] == 1 && $fileVersion && version_compare($fileVersion, $p['version'], '>');
            $p['file_version'] = $fileVersion;
        }
        unset($p);
        return View::fetch('', ['plugins' => $plugins]);
    }

    public function install()
    {
        if (!$this->isPost()) return $this->error('非法请求');
        try {
            $this->service->install($this->request->post('identifier', ''));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
        return $this->success('安装成功');
    }

    public function uninstall()
    {
        if (!$this->isPost()) return $this->error('非法请求');
        try {
            $this->service->uninstall($this->request->post('identifier', ''));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
        return $this->success('卸载成功');
    }

    public function enable()
    {
        if (!$this->isPost()) return $this->error('非法请求');
        try {
            $this->service->enable($this->request->post('identifier', ''));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
        return $this->success('启用成功');
    }

    public function disable()
    {
        if (!$this->isPost()) return $this->error('非法请求');
        try {
            $this->service->disable($this->request->post('identifier', ''));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
        return $this->success('停用成功');
    }

    public function upgrade()
    {
        if (!$this->isPost()) return $this->error('非法请求');
        try {
            $this->service->upgrade($this->request->post('identifier', ''));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
        return $this->success('升级成功');
    }

    public function upload()
    {
        if (!$this->isPost()) return $this->error('非法请求');
        $file = $this->request->file('plugin_zip');
        if (!$file) return $this->error('请选择要上传的插件包');
        try {
            $identifier = $this->service->upload($file);
            $this->service->scan();
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
        return json(['code' => 1, 'msg' => '上传成功', 'data' => ['identifier' => $identifier]]);
    }

    public function market()
    {
        return View::fetch();
    }

    public function market_install()
    {
        if (!$this->isPost()) return $this->error('非法请求');
        if ($err = $this->checkSuperAdmin()) return $err;
        $identifier        = $this->request->post('identifier', '');
        $downloadUrl       = $this->request->post('download_url', '');
        $downloadUrlGithub = $this->request->post('download_url_github', '');
        if (!$identifier) return $this->error('参数错误');
        try {
            (new PluginMarketService())->install($identifier, $downloadUrl, $downloadUrlGithub);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
        return $this->success('下载成功，请在插件列表安装');
    }

    public function market_list()
    {
        if (!$this->isPost()) return $this->error('非法请求');
        try {
            $list = (new PluginMarketService())->fetchMarket();
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
        return json(['code' => 0, 'data' => $list]);
    }

    public function set_default()
    {
        if (!$this->isPost()) return $this->error('非法请求');
        $id = (int)$this->request->post('id', 0);
        if (!$id) return $this->error('参数错误');
        PluginModel::where('is_default', 1)->update(['is_default' => 0]);
        PluginModel::where('id', $id)->update(['is_default' => 1]);
        return $this->success('已设为默认插件');
    }

    public function cancel_default()
    {
        if (!$this->isPost()) return $this->error('非法请求');
        $id = (int)$this->request->post('id', 0);
        if (!$id) return $this->error('参数错误');
        PluginModel::where('id', $id)->update(['is_default' => 0]);
        return $this->success('已取消默认设置');
    }
}
