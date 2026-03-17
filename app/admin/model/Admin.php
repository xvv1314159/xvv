<?php
namespace app\admin\model;

use think\Model;

class Admin extends Model
{
    protected $name = 'admin_users';

    public function getRoleIdsAttr($v, $data)
    {
        return AdminRole::where(['admin_id' => $data['id']])->column('role_id');
    }
}
