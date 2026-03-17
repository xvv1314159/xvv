<?php
namespace app\admin\controller;

use app\admin\model\AdminLoginLog;
use app\admin\model\AdminOpLog;
use think\facade\View;
use think\facade\Db;

class Log extends Base
{
    public function login_log()
    {
        $keyword = $this->request->param('keyword', '');
        $status  = $this->request->param('status', '');

        $query = AdminLoginLog::order('create_time desc');
        if ($keyword !== '') {
            $query->where('username', 'like', '%' . $keyword . '%');
        }
        if ($status !== '') {
            $query->where('status', (int)$status);
        }
        $logs = $query->paginate(20)->appends(['keyword' => $keyword, 'status' => $status]);

        return View::fetch('', ['logs' => $logs, 'keyword' => $keyword, 'status' => $status]);
    }

    public function op_log()
    {
        $keyword = $this->request->param('keyword', '');
        $status  = $this->request->param('status', '');

        $query = AdminOpLog::order('create_time desc');
        if ($keyword !== '') {
            $query->where(function ($q) use ($keyword) {
                $q->where('username', 'like', '%' . $keyword . '%')
                  ->whereOr('path', 'like', '%' . $keyword . '%');
            });
        }
        if ($status !== '') {
            $query->where('status', (int)$status);
        }
        $logs = $query->paginate(20)->appends(['keyword' => $keyword, 'status' => $status]);

        return View::fetch('', ['logs' => $logs, 'keyword' => $keyword, 'status' => $status]);
    }

    public function clear_login_log()
    {
        if (!$this->isPost()) return $this->error('非法请求');
        try {
            AdminLoginLog::where('id', '>', 0)->delete();
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
        return $this->success('清空成功');
    }

    public function clear_op_log()
    {
        if (!$this->isPost()) return $this->error('非法请求');
        try {
            AdminOpLog::where('id', '>', 0)->delete();
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
        return $this->success('清空成功');
    }
}
