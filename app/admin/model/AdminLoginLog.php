<?php
namespace app\admin\model;

use think\Model;

class AdminLoginLog extends Model
{
    protected $name = 'admin_login_log';

    /**
     * 记录登录日志
     *
     * @param string $username 用户名
     * @param int    $adminId  管理员ID，失败时为0
     * @param int    $status   1成功 0失败
     * @param string $remark   备注信息
     */
    public static function record(string $username, int $adminId, int $status, string $remark = ''): void
    {
        try {
            $request = app('request');
            static::create([
                'admin_id'    => $adminId,
                'username'    => $username,
                'ip'          => $request->ip(),
                'ua'          => substr($request->server('HTTP_USER_AGENT', ''), 0, 500),
                'status'      => $status,
                'remark'      => $remark,
                'create_time' => time(),
            ]);
        } catch (\Throwable) {
            // 日志记录失败不影响主流程
        }
    }
}
