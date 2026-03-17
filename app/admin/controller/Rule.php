<?php
namespace app\admin\controller;

use think\facade\View;

class Rule extends Base
{
    public function index()
    {
        $pluginId = $this->request->param('plugin', '');
        if ($pluginId !== '') {
            if ($err = $this->checkSuperAdmin()) return $err;
            $rules = $this->model->where('plugin', $pluginId)->order('sort asc,id desc')->select();
        } else {
            $rules = $this->model->where('plugin', '')->order('sort asc,id desc')->select();
        }
        $menus = $this->recursion_title($rules);
        return View::fetch('', ['menus' => $menus, 'pluginId' => $pluginId]);
    }

    public function add()
    {
        $pluginId = $this->request->param('plugin', '');
        $iframe   = $this->request->param('iframe', 0);
        if ($pluginId !== '' && ($err = $this->checkSuperAdmin())) return $err;
        if ($this->isPost()) {
            try {
                validate(['title' => 'require', 'pid' => 'require', 'sort' => 'require'])->check($this->post);
                $this->post['plugin'] = $pluginId;
                $this->model::create($this->post);
            } catch (\Exception $e) {
                return $this->error($e->getMessage() ?: '添加失败');
            }
            $params = [];
            if ($pluginId) $params[] = 'plugin=' . $pluginId;
            if ($iframe)   $params[] = 'iframe=1';
            $back = (string)url('Rule/index') . ($params ? '?' . implode('&', $params) : '');
            return $this->success('添加成功', $back);
        }
        $pid    = $this->request->param('pid', 0);
        $query  = $pluginId !== '' ? $this->model->where('plugin', $pluginId) : $this->model->where('plugin', '');
        $rules  = $query->order('sort asc,id desc')->select();
        $menus  = $this->recursion_title($rules);
        $parentRule = $pid > 0 ? $this->model->find($pid) : null;
        return View::fetch('', ['menus' => $menus, 'pid' => $pid, 'parentRule' => $parentRule, 'pluginId' => $pluginId]);
    }

    public function edit()
    {
        $id   = $this->request->param('id/d');
        $rule = $this->model->find($id);
        if (!$rule) return $this->error('菜单不存在');
        $pluginId = $rule['plugin'] ?? '';
        $iframe   = $this->request->param('iframe', 0);
        if ($pluginId !== '' && ($err = $this->checkSuperAdmin())) return $err;
        if ($this->isPost()) {
            try {
                validate(['title' => 'require', 'pid' => 'require', 'sort' => 'require'])->check($this->post);
                $this->post['plugin'] = $pluginId;
                $rule->save($this->post);
            } catch (\Exception $e) {
                return $this->error($e->getMessage() ?: '修改失败');
            }
            $params = [];
            if ($pluginId) $params[] = 'plugin=' . $pluginId;
            if ($iframe)   $params[] = 'iframe=1';
            $back = (string)url('Rule/index') . ($params ? '?' . implode('&', $params) : '');
            return $this->success('修改成功', $back);
        }
        $query  = $pluginId !== '' ? $this->model->where('plugin', $pluginId) : $this->model->where('plugin', '');
        $rules  = $query->order('sort asc,id desc')->select();
        $menus  = $this->recursion_title($rules);
        $parentRule = $rule['pid'] > 0 ? $this->model->find($rule['pid']) : null;
        return View::fetch('', ['rule' => $rule, 'menus' => $menus, 'parentRule' => $parentRule, 'pluginId' => $pluginId]);
    }

    public function del()
    {
        if (!$this->isPost()) return $this->error('非法请求');
        try {
            $rule = $this->model::find($this->request->post('id/d'));
            if (!$rule) throw new \Exception('菜单不存在');
            if ($this->model::where(['pid' => $rule['id']])->find()) throw new \Exception('该菜单存在子节点');
            $rule->delete();
        } catch (\Exception $e) {
            return $this->error($e->getMessage() ?: '删除失败');
        }
        return $this->success('删除成功');
    }

    protected function recursion_title($list, int $pid = 0, int $level = 0): array
    {
        $arr = [];
        foreach ($list as $v) {
            if ($v['pid'] == $pid) {
                $v['title'] = str_repeat('|——', $level) . $v['title'];
                $arr[]      = $v;
                $arr        = array_merge($arr, $this->recursion_title($list, $v['id'], $level + 1));
            }
        }
        return $arr;
    }
}
