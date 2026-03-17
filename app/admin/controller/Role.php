<?php
namespace app\admin\controller;

use app\admin\model\Rule as RuleModel;
use app\admin\model\Plugin as PluginModel;
use think\facade\View;

class Role extends Base
{
    public function index()
    {
        $roles = $this->model->paginate(20);
        return View::fetch('', ['roles' => $roles]);
    }

    public function add()
    {
        if ($this->isPost()) {
            try {
                validate([
                    'name|用户组名称' => 'require|unique:admin_roles',
                    'rules|权限'      => 'require',
                ])->useZh()->check($this->post);
                $this->post['rules'] = implode(',', $this->post['rules']);
                $this->model::create($this->post);
            } catch (\Exception $e) {
                return $this->error($e->getMessage() ?: '添加失败');
            }
            return $this->success('添加成功', (string)url('Role/index'));
        }
        $systemRules = $this->getTreeRules([]);
        $pluginRules = $this->getPluginRules([]);
        return View::fetch('', ['systemRules' => $systemRules, 'pluginRules' => $pluginRules]);
    }

    public function edit()
    {
        $id   = $this->request->param('id/d');
        $role = $this->model::find($id);
        if (!$role) return $this->error('角色不存在');
        if ($this->isPost()) {
            try {
                validate([
                    'name|角色名称' => 'require',
                    'rules|权限'    => 'require',
                ])->useZh()->check($this->post);
                $this->post['rules'] = implode(',', $this->post['rules']);
                $role->save($this->post);
            } catch (\Exception $e) {
                return $this->error($e->getMessage() ?: '修改失败');
            }
            return $this->success('修改成功', (string)url('Role/index'));
        }
        $checkedRules = $role['rules'] === '*' ? [] : explode(',', $role['rules'] ?? '');
        $systemRules  = $this->getTreeRules($checkedRules);
        $pluginRules  = $this->getPluginRules($checkedRules);
        return View::fetch('', ['systemRules' => $systemRules, 'pluginRules' => $pluginRules, 'role' => $role]);
    }

    public function del()
    {
        if (!$this->isPost()) return $this->error('非法请求');
        try {
            $role = $this->model::find($this->request->post('id/d'));
            if (!$role) throw new \Exception('角色不存在');
            $role->delete();
        } catch (\Exception $e) {
            return $this->error($e->getMessage() ?: '删除失败');
        }
        return $this->success('删除成功');
    }

    protected function getTreeRules(array $checkedRules): array
    {
        return RuleModel::field('id,pid parent,title text')
            ->where('status', 1)
            ->where('plugin', '')
            ->order('sort asc,id asc')
            ->select()
            ->map(function ($v) use ($checkedRules) {
                $v['parent'] = $v['parent'] ?: '#';
                $v['state']  = ['selected' => in_array($v['id'], $checkedRules)];
                return $v;
            })->toArray();
    }

    protected function getPluginRules(array $checkedRules): array
    {
        $activePlugins = PluginModel::where('status', 1)->where('installed', 1)->column('identifier');
        if (empty($activePlugins)) return [];
        $rules   = RuleModel::where('status', 1)
            ->where('plugin', '<>', '')
            ->whereIn('plugin', $activePlugins)->order('plugin asc,sort asc,id asc')->select();
        $grouped = [];
        foreach ($rules as $rule) {
            $plugin = $rule['plugin'] ?? 'other';
            if (!isset($grouped[$plugin])) {
                $info = PluginModel::where('identifier', $plugin)->find();
                $grouped[$plugin] = [
                    'name'  => $info['name'] ?? $plugin,
                    'icon'  => $info['icon'] ?? 'mdi mdi-puzzle',
                    'rules' => [],
                ];
            }
            $ruleArr          = $rule->toArray();
            $ruleArr['state'] = ['selected' => in_array($rule['id'], $checkedRules)];
            $grouped[$plugin]['rules'][] = $ruleArr;
        }
        return $grouped;
    }
}
