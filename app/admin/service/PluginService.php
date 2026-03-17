<?php
namespace app\admin\service;

use app\admin\model\Plugin as PluginModel;
use app\admin\model\Rule;
use think\facade\Db;

class PluginService
{
    /**
     * 扫描 plugin 目录，自动注册未登记的插件
     */
    public function scan(): void
    {
        $pluginDir = base_path() . 'plugin';
        if (!is_dir($pluginDir)) return;
        foreach (scandir($pluginDir) as $identifier) {
            if ($identifier === '.' || $identifier === '..') continue;
            $appFile = $pluginDir . '/' . $identifier . '/config/app.php';
            if (!file_exists($appFile)) continue;
            $cfg = include $appFile;
            if (!is_array($cfg)) continue;
            if (!PluginModel::where('identifier', $identifier)->find()) {
                PluginModel::create([
                    'identifier'  => $identifier,
                    'name'        => $cfg['name']        ?? $identifier,
                    'version'     => $cfg['version']     ?? '1.0.0',
                    'author'      => $cfg['author']      ?? '',
                    'description' => $cfg['desc']        ?? '',
                    'icon'        => $cfg['icon']        ?? 'mdi mdi-puzzle',
                    'status'      => 0,
                    'installed'   => 0,
                ]);
            }
        }
    }

    /**
     * 安装插件：执行 SQL + 注册菜单
     */
    public function install(string $identifier): void
    {
        $plugin = $this->getPlugin($identifier);
        if ($plugin['installed'] == 1) throw new \Exception('插件已安装');

        $pluginDir = base_path() . "plugin/{$identifier}";

        // 执行安装 SQL
        $sqlFile = $pluginDir . '/install.sql';
        if (file_exists($sqlFile)) {
            $sql = file_get_contents($sqlFile);
            $this->executeSql($sql);
        }

        // 注册菜单
        $menuFile = $pluginDir . '/config/menu.php';
        if (file_exists($menuFile)) {
            $menus = include $menuFile;
            if (is_array($menus)) {
                $this->registerMenus($menus, $identifier);
            }
        }

        // 读取最新版本
        $appFile = $pluginDir . '/config/app.php';
        $version = '1.0.0';
        if (file_exists($appFile)) {
            $cfg     = include $appFile;
            $version = is_array($cfg) ? ($cfg['version'] ?? '1.0.0') : '1.0.0';
        }

        $plugin->installed = 1;
        $plugin->status    = 1;
        $plugin->version   = $version;
        $plugin->save();
    }

    /**
     * 卸载插件：删除菜单（保留数据和文件）
     */
    public function uninstall(string $identifier): void
    {
        $plugin = $this->getPlugin($identifier);
        if ($plugin['installed'] == 0) throw new \Exception('插件未安装');

        // 删除该插件的菜单规则
        Rule::where('plugin', $identifier)->delete();

        $plugin->installed = 0;
        $plugin->status    = 0;
        $plugin->save();
    }

    /**
     * 启用插件
     */
    public function enable(string $identifier): void
    {
        $plugin = $this->getPlugin($identifier);
        if ($plugin['installed'] == 0) throw new \Exception('请先安装插件');
        $plugin->status = 1;
        $plugin->save();
    }

    /**
     * 停用插件
     */
    public function disable(string $identifier): void
    {
        $plugin = $this->getPlugin($identifier);
        $plugin->status = 0;
        $plugin->save();
    }

    /**
     * 升级插件
     */
    public function upgrade(string $identifier): void
    {
        $plugin    = $this->getPlugin($identifier);
        $pluginDir = base_path() . "plugin/{$identifier}";
        $sqlFile   = $pluginDir . '/upgrade.sql';
        if (file_exists($sqlFile)) {
            $sql = file_get_contents($sqlFile);
            $this->executeSql($sql);
        }
        $appFile = $pluginDir . '/config/app.php';
        if (file_exists($appFile)) {
            $cfg = include $appFile;
            if (is_array($cfg) && !empty($cfg['version'])) {
                $plugin->version = $cfg['version'];
                $plugin->save();
            }
        }
    }

    /**
     * 上传插件 ZIP 包
     */
    public function upload(mixed $file): string
    {
        if (!$file || !$file->isValid()) throw new \Exception('无效的文件');
        if (strtolower($file->getOriginalExtension()) !== 'zip') throw new \Exception('请上传 ZIP 格式插件包');

        $tmpPath   = sys_get_temp_dir() . '/' . uniqid('plugin_') . '.zip';
        $file->move($tmpPath);

        $zip = new \ZipArchive();
        if ($zip->open($tmpPath) !== true) throw new \Exception('ZIP 文件损坏');

        // 获取根目录名（即插件标识）
        $rootDir    = '';
        $firstEntry = $zip->getNameIndex(0);
        if ($firstEntry) {
            $parts   = explode('/', $firstEntry);
            $rootDir = $parts[0];
        }
        if (empty($rootDir)) throw new \Exception('无法识别插件目录');

        $targetDir = base_path() . 'plugin/' . $rootDir;
        $zip->extractTo(base_path() . 'plugin/');
        $zip->close();
        @unlink($tmpPath);

        return $rootDir;
    }

    protected function getPlugin(string $identifier): PluginModel
    {
        $plugin = PluginModel::where('identifier', $identifier)->find();
        if (!$plugin) throw new \Exception('插件不存在: ' . $identifier);
        return $plugin;
    }

    protected function registerMenus(array $menus, string $identifier, int $pid = 0): void
    {
        foreach ($menus as $menu) {
            $id = Rule::insertGetId([
                'title'       => $menu['title']   ?? '',
                'icon'        => $menu['icon']    ?? '',
                'color'       => $menu['color']   ?? '',
                'pid'         => $pid,
                'href'        => $menu['href']    ?? '',
                'sort'        => $menu['sort']    ?? 0,
                'is_menu'     => $menu['is_menu'] ?? 1,
                'status'      => 1,
                'type'        => 'plugin',
                'plugin'      => $identifier,
                'create_time' => time(),
                'update_time' => time(),
            ]);
            if (!empty($menu['children'])) {
                $this->registerMenus($menu['children'], $identifier, $id);
            }
        }
    }

    protected function executeSql(string $sql): void
    {
        $statements = array_filter(
            array_map('trim', explode(';', $sql)),
            fn($s) => !empty($s) && !str_starts_with($s, '--')
        );
        foreach ($statements as $stmt) {
            try {
                Db::execute($stmt);
            } catch (\Exception $e) {
                // 忽略 table already exists 等非致命错误
                if (!str_contains($e->getMessage(), 'already exists')) {
                    throw $e;
                }
            }
        }
    }
}
