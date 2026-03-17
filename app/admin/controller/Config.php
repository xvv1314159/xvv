<?php
namespace app\admin\controller;

use app\common\model\Config as ConfigModel;
use app\admin\model\ConfigGroup as ConfigGroupModel;
use think\facade\View;

class Config extends Base
{
    public function index()
    {
        $pluginId = $this->request->param('plugin', '');
        if ($pluginId !== '' && ($err = $this->checkSuperAdmin())) return $err;
        $configs = ConfigModel::getConfigsByGroup($pluginId);
        if (empty($configs)) {
            return View::fetch('config/index', ['configs' => [], 'key' => '', 'plugin' => $pluginId, 'emptyMessage' => '系统配置暂未配置任何配置项']);
        }
        $key = $this->request->param('key', array_key_first($configs));
        if ($this->isPost()) {
            try {
                foreach ($this->post as $k => $v) {
                    foreach ($v['config'] ?? [] as $kk => $vv) {
                        if (empty($vv['type'])) { unset($this->post[$k]['config'][$kk]); continue; }
                        $type = $vv['type'];
                        if (in_array($type, ['image', 'video'])) {
                            $file = $this->request->file($k)['config'][$kk]['value'] ?? null;
                            if ($file) $this->post[$k]['config'][$kk]['value'] = upload($file);
                        } elseif (in_array($type, ['images', 'videos'])) {
                            $files = $this->request->file($k)['config'][$kk]['value'] ?? null;
                            if ($files && is_array($files)) {
                                $vals = array_filter(array_map(fn($f) => $f ? upload($f) : null, $files));
                                if (!empty($vals)) $this->post[$k]['config'][$kk]['value'] = array_values($vals);
                            }
                        }
                    }
                }
                foreach ($this->post as $groupKey => $groupData) {
                    ConfigModel::saveConfigs($groupKey, $groupData['config'] ?? []);
                }
            } catch (\Exception $e) {
                return $this->error($e->getMessage() ?: '保存失败');
            }
            $params = [];
            if ($key) $params[] = 'key=' . $key;
            if ($pluginId) $params[] = 'plugin=' . $pluginId;
            $redirectUrl = (string)url('Config/index') . ($params ? '?' . implode('&', $params) : '');
            return $this->success('保存成功', $redirectUrl);
        }
        return View::fetch('config/index', ['configs' => $configs, 'key' => $key, 'plugin' => $pluginId]);
    }

    public function group_index()
    {
        $list = ConfigGroupModel::order('sort asc,id desc')->paginate(20);
        return View::fetch('', ['list' => $list]);
    }

    public function group_add()
    {
        if ($this->isPost()) {
            try {
                validate(['group_key|分组标识' => 'require', 'group_title|分组标题' => 'require'])->check($this->post);
                if (ConfigGroupModel::where('group_key', $this->post['group_key'])->find()) throw new \Exception('分组标识已存在');
                ConfigGroupModel::create($this->post);
            } catch (\Exception $e) {
                return $this->error($e->getMessage() ?: '添加失败');
            }
            return $this->success('添加成功', (string)url('Config/group_index'));
        }
        return View::fetch();
    }

    public function group_edit()
    {
        $id    = $this->request->param('id/d');
        $group = ConfigGroupModel::find($id);
        if (!$group) return $this->error('分组不存在');
        if ($this->isPost()) {
            try {
                validate(['group_key|分组标识' => 'require', 'group_title|分组标题' => 'require'])->check($this->post);
                if (ConfigGroupModel::where('group_key', $this->post['group_key'])->where('id', '<>', $id)->find()) throw new \Exception('分组标识已存在');
                $group->save($this->post);
            } catch (\Exception $e) {
                return $this->error($e->getMessage() ?: '编辑失败');
            }
            return $this->success('编辑成功', (string)url('Config/group_index'));
        }
        return View::fetch('', ['group' => $group]);
    }

    public function group_delete()
    {
        if (!$this->isPost()) return $this->error('非法请求');
        $id = $this->request->post('id/d');
        try {
            $group = ConfigGroupModel::find($id);
            if (!$group) throw new \Exception('分组不存在');
            if (ConfigModel::where('group_key', $group['group_key'])->count() > 0) throw new \Exception('该分组下还有配置项，无法删除');
            $group->delete();
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
        return $this->success('删除成功');
    }

    public function config_manage()
    {
        $groupKey = $this->request->param('group', '');
        $pluginId = $this->request->param('plugin', '');
        if ($pluginId !== '' && ($err = $this->checkSuperAdmin())) return $err;
        if (empty($groupKey)) return $this->error('请先选择配置分组');
        $group = ConfigGroupModel::where('group_key', $groupKey)->find();
        if (!$group) return $this->error('配置分组不存在');
        $where = [['group_key', '=', $groupKey]];
        if ($pluginId !== '') $where[] = ['plugin', '=', $pluginId];
        $list = ConfigModel::where($where)->order('sort asc,id desc')->paginate(20);
        return View::fetch('', ['groupKey' => $groupKey, 'pluginId' => $pluginId, 'group' => $group, 'list' => $list]);
    }

    public function config_add()
    {
        $groupKey = $this->request->param('group', '');
        $pluginId = $this->request->param('plugin', '');
        if ($pluginId !== '' && ($err = $this->checkSuperAdmin())) return $err;
        if (empty($groupKey)) return $this->error('请先选择配置分组');
        $group = ConfigGroupModel::where('group_key', $groupKey)->find();
        if (!$group) return $this->error('配置分组不存在');
        if ($this->isPost()) {
            try {
                validate(['config_key|配置项标识' => 'require', 'config_title|配置项标题' => 'require'])->check($this->post);
                if (ConfigModel::where('config_key', $this->post['config_key'])->find()) throw new \Exception('配置项标识已存在');
                $this->post['group_key']   = $groupKey;
                $this->post['group_title'] = $group['group_title'];
                $this->post['plugin']      = $pluginId;
                ConfigModel::create($this->post);
            } catch (\Exception $e) {
                return $this->error($e->getMessage() ?: '添加失败');
            }
            return $this->success('添加成功', (string)url('Config/config_manage') . '?group=' . $groupKey . ($pluginId ? '&plugin=' . $pluginId : ''));
        }
        return View::fetch('', ['group' => $group, 'pluginId' => $pluginId]);
    }

    public function config_edit()
    {
        $id     = $this->request->param('id/d');
        $config = ConfigModel::find($id);
        if (!$config) return $this->error('配置项不存在');
        $groupKey = $config['group_key'];
        $pluginId = $config['plugin'] ?? '';
        if ($this->isPost()) {
            try {
                validate(['config_key|配置项标识' => 'require', 'config_title|配置项标题' => 'require'])->check($this->post);
                if (ConfigModel::where('config_key', $this->post['config_key'])->where('id', '<>', $id)->find()) throw new \Exception('配置项标识已存在');
                $this->post['group_key'] = $groupKey;
                $this->post['plugin']    = $pluginId;
                $config->save($this->post);
            } catch (\Exception $e) {
                return $this->error($e->getMessage() ?: '编辑失败');
            }
            return $this->success('编辑成功', (string)url('Config/config_manage') . '?group=' . $groupKey . ($pluginId ? '&plugin=' . $pluginId : ''));
        }
        $group = ConfigGroupModel::where('group_key', $groupKey)->find();
        if (!empty($config['config_options']) && is_array($config['config_options'])) {
            $config['config_options'] = json_encode($config['config_options'], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }
        return View::fetch('', ['config' => $config, 'group' => $group, 'pluginId' => $pluginId]);
    }

    public function config_delete()
    {
        if (!$this->isPost()) return $this->error('非法请求');
        try {
            $config = ConfigModel::find($this->request->post('id/d'));
            if (!$config) return $this->error('配置项不存在');
            $config->delete();
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
        return $this->success('删除成功');
    }

    public function upload_image()
    {
        if (!$this->isPost()) return json(['errno' => 1, 'message' => '非法请求']);
        try {
            $file = $this->request->file('image');
            $url  = upload($file);
        } catch (\Exception $e) {
            return json(['errno' => 1, 'message' => $e->getMessage() ?: '上传失败']);
        }
        return json(['errno' => 0, 'data' => ['url' => $url]]);
    }
}
