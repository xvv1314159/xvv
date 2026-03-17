<?php
namespace app\admin\model;

use think\Model;

class AdminOpLog extends Model
{
    protected $name = 'admin_op_log';

    /**
     * 记录操作日志
     */
    public static function record(string $username, int $adminId, string $path, string $method, string $params = '', int $status = 1, string $result = '', int $duration = 0): void
    {
        try {
            $request = app('request');
            static::create([
                'admin_id'    => $adminId,
                'username'    => $username,
                'path'        => $path,
                'method'      => $method,
                'params'      => $params,
                'ip'          => $request->ip(),
                'status'      => $status,
                'result'      => $result,
                'duration'    => $duration,
                'create_time' => time(),
            ]);
        } catch (\Throwable) {
            // 日志记录失败不影响主流程
        }
    }
}
