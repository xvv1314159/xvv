<?php
namespace app\admin\controller;

use app\admin\model\AdminRole;
use app\admin\model\Role as RoleModel;
use think\facade\View;

class Admin extends Base
{
    public function index()
    {
        $admins = $this->model->paginate(20);
        return View::fetch('', ['admins' => $admins]);
    }

    public function add()
    {
        if ($this->isPost()) {
            $this->model::startTrans();
            try {
                validate([
                    'role_ids|角色'     => 'require',
                    'username|用户名'   => 'require|unique:admin_users',
                    'password|登录密码' => 'require|length:5,25',
                ])->useZh()->check($this->post);
                $this->post['password'] = password_hash($this->post['password'], PASSWORD_DEFAULT);
                $admin = $this->model::create($this->post);
                $roles = [];
                foreach ($this->post['role_ids'] as $v) {
                    $roles[] = ['role_id' => $v, 'admin_id' => $admin['id']];
                }
                AdminRole::saveAll($roles);
                $this->model::commit();
            } catch (\Exception $e) {
                $this->model::rollback();
                return $this->error($e->getMessage() ?: '添加失败');
            }
            return $this->success('添加成功', (string)url('Admin/index'));
        }
        $roles = RoleModel::where([['rules', '<>', '*'], ['status', '=', 1]])->order('id desc')->select();
        return View::fetch('', ['roles' => $roles]);
    }

    public function edit()
    {
        $id    = $this->request->param('id/d');
        $admin = $this->model::find($id);
        if (!$admin) return $this->error('管理员不存在');
        $admin->hidden(['password']);
        $admin->append(['role_ids']);
        if ($this->isPost()) {
            $this->model::startTrans();
            try {
                validate([
                    'role_ids|角色'   => 'require',
                    'username|用户名' => 'require',
                    'nickname|昵称'   => 'require',
                ])->useZh()->check($this->post);
                if (!empty($this->post['password'])) {
                    $this->post['password'] = password_hash($this->post['password'], PASSWORD_DEFAULT);
                } else {
                    unset($this->post['password']);
                }
                $admin->save($this->post);
                AdminRole::where(['admin_id' => $admin['id']])->delete();
                $roles = [];
                foreach ($this->post['role_ids'] as $v) {
                    $roles[] = ['role_id' => $v, 'admin_id' => $admin['id']];
                }
                AdminRole::saveAll($roles);
                $this->model::commit();
            } catch (\Exception $e) {
                $this->model::rollback();
                return $this->error($e->getMessage() ?: '修改失败');
            }
            return $this->success('修改成功', (string)url('Admin/index'));
        }
        $roles = RoleModel::where('status', 1)->order('id desc')->select();
        return View::fetch('', ['roles' => $roles, 'admin' => $admin]);
    }

    public function del()
    {
        if (!$this->isPost()) return $this->error('非法请求');
        $this->model::startTrans();
        try {
            $admin = $this->model::find($this->request->post('id/d'));
            if (!$admin) throw new \Exception('管理员不存在');
            $roleIds = AdminRole::where(['admin_id' => $admin['id']])->column('role_id');
            foreach (RoleModel::whereIn('id', $roleIds)->select() as $role) {
                if ($role['rules'] === '*') throw new \Exception('该管理员有超管权限，不能删除');
            }
            $admin->delete();
            AdminRole::where(['admin_id' => $admin['id']])->delete();
            $this->model::commit();
        } catch (\Exception $e) {
            $this->model::rollback();
            return $this->error($e->getMessage() ?: '删除失败');
        }
        return $this->success('删除成功');
    }

    public function profile()
    {
        $admin = session('admin');
        if ($this->isPost()) {
            try {
                validate(['nickname|昵称' => 'require', 'email|邮箱' => 'email'])->useZh()->check($this->post);
                $adminModel = $this->model::find($admin['id']);
                $adminModel->nickname = $this->post['nickname'];
                $adminModel->email    = $this->post['email'] ?? '';
                $file = $this->request->file('avatar');
                if ($file && $file->isValid()) {
                    $adminModel->avatar = upload($file);
                }
                $adminModel->save();
                session('admin', $adminModel->toArray());
            } catch (\Exception $e) {
                return $this->error($e->getMessage() ?: '修改失败');
            }
            return $this->success('修改成功');
        }
        return View::fetch('', ['admin' => $admin]);
    }

    public function password()
    {
        if ($this->isPost()) {
            try {
                validate([
                    'old_password|原密码'       => 'require',
                    'new_password|新密码'       => 'require|length:5,25',
                    'confirm_password|确认密码' => 'require|confirm:new_password',
                ])->useZh()->check($this->post);
                $admin = $this->model::find(session('admin.id'));
                if (!password_verify($this->post['old_password'], $admin['password'])) throw new \Exception('原密码错误');
                $admin->password = password_hash($this->post['new_password'], PASSWORD_DEFAULT);
                $admin->save();
                session('admin', null);
            } catch (\Exception $e) {
                return $this->error($e->getMessage() ?: '修改失败');
            }
            return $this->success('密码修改成功，请重新登录', (string)url('Index/login'));
        }
        return View::fetch();
    }

    public function upload_avatar()
    {
        if (!$this->isPost()) return $this->error('非法请求');
        $file = $this->request->file('avatar');
        if (!$file) return $this->error('请选择图片');
        try {
            $url        = upload($file);
            $adminModel = $this->model::find(session('admin.id'));
            $adminModel->avatar = $url;
            $adminModel->save();
            $data           = session('admin');
            $data['avatar'] = $url;
            session('admin', $data);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
        return json(['code' => 1, 'msg' => '头像上传成功', 'data' => ['url' => $url]]);
    }
}
