<?php

namespace app\admin\controller;

use app\admin\model\Admin as AdminModel;
use app\admin\model\AdminLoginLog;
use think\facade\View;

class Index extends Base
{
    protected $noNeedLogin = ['login'];

    public function index()
    {
        $systemData = $this->getSystemMonitorData();
        $statsData  = $this->getStatsData();
        $loginLogs  = $this->getRecentLoginLogs();
        return view('', ['systemData' => $systemData, 'statsData' => $statsData, 'loginLogs' => $loginLogs]);
    }

    public function login()
    {
        if ($this->request->isPost()) {
            try {
                validate([
                    'username|用户名' => 'require',
                    'password|密码'   => 'require',
                    'captcha|验证码'  => 'require|captcha',
                ])->check($this->post);
                $admin = AdminModel::where(['username' => $this->post['username']])->find();
                if (!$admin) throw new \Exception('管理员不存在或密码错误');
                if (!password_verify($this->post['password'], $admin['password'])) throw new \Exception('管理员不存在或密码错误');
                if ($admin['status'] != 1) throw new \Exception('该管理员已禁用');
                AdminLoginLog::record($this->post['username'], $admin['id'], 1, '登录成功');
                session('admin', $admin->toArray());
            } catch (\Exception $e) {
                $username = $this->request->post('username', '');
                AdminLoginLog::record($username, 0, 0, $e->getMessage());
                return $this->error($e->getMessage() ?: '登录失败');
            }
            return $this->success('登录成功', 'index/index');
        }
        session('admin', null);
        return View::fetch();
    }

    public function logout()
    {
        session('admin', null);
        return redirect('/admin/login');
    }

    public function upload()
    {
        if (!$this->request->isPost()) return $this->error('非法请求');
        $file = $this->request->file('file');
        if (!$file) return $this->error('请选择文件');
        try {
            $url = upload($file);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
        return json(['code' => 1, 'msg' => '上传成功', 'data' => ['url' => $url]]);
    }

    protected function getStatsData(): array
    {
        $stats = [];
        $stats['admin_count']      = AdminModel::count();
        $stats['plugin_count']     = \think\facade\Db::table('plugins')->count();
        $stats['plugin_installed'] = \think\facade\Db::table('plugins')->where('installed', 1)->count();
        $uploadDir = public_path() . 'uploads';
        $stats['file_count'] = 0;
        if (is_dir($uploadDir)) {
            $it = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($uploadDir, \RecursiveDirectoryIterator::SKIP_DOTS));
            foreach ($it as $f) {
                if ($f->isFile()) $stats['file_count']++;
            }
        }
        $stats['member_count'] = 0;
        try {
            $stats['member_count'] = \think\facade\Db::table('user_members')->count();
        } catch (\Exception $e) {
        }
        $todayStart = strtotime(date('Y-m-d'));
        $stats['login_today'] = \think\facade\Db::table('admin_login_log')
            ->where('create_time', '>=', $todayStart)->where('status', 1)->count();
        return $stats;
    }

    protected function getRecentLoginLogs(): array
    {
        return \think\facade\Db::table('admin_login_log')
            ->order('create_time', 'desc')->limit(10)->select()->toArray();
    }

    protected function getSystemMonitorData(): array
    {
        $data = [];
        // 内存
        $memory = ['php_used' => memory_get_usage(true)];
        $memory['php_used_format'] = $this->formatBytes($memory['php_used']);
        $memory['php_limit']       = ini_get('memory_limit');
        if (PHP_OS_FAMILY === 'Linux' && file_exists('/proc/meminfo')) {
            $meminfo = file_get_contents('/proc/meminfo');
            preg_match('/MemTotal:\s+(\d+)/', $meminfo, $total);
            preg_match('/MemAvailable:\s+(\d+)/', $meminfo, $available);
            if (isset($total[1], $available[1])) {
                $memory['system_total']         = $total[1] * 1024;
                $memory['system_available']     = $available[1] * 1024;
                $memory['system_used']          = $memory['system_total'] - $memory['system_available'];
                $memory['system_usage_percent'] = round($memory['system_used'] / $memory['system_total'] * 100, 2);
                $memory['system_total_format']  = $this->formatBytes($memory['system_total']);
                $memory['system_used_format']   = $this->formatBytes($memory['system_used']);
            }
        }
        $data['memory'] = $memory;
        // CPU
        $cpu = [];
        if (PHP_OS_FAMILY === 'Linux') {
            $loadavg = sys_getloadavg();
            $cpu = ['load_1min' => round($loadavg[0], 2), 'load_5min' => round($loadavg[1], 2), 'load_15min' => round($loadavg[2], 2)];
        }
        $data['cpu'] = $cpu;
        // 磁盘
        $total = disk_total_space('/');
        $free  = disk_free_space('/');
        $used  = $total - $free;
        $data['disk'] = [
            'total'         => $total,
            'free'          => $free,
            'used'          => $used,
            'usage_percent' => round($used / $total * 100, 2),
            'total_format'  => $this->formatBytes($total),
            'used_format'   => $this->formatBytes($used),
            'free_format'   => $this->formatBytes($free),
        ];
        // PHP
        $data['php'] = ['version' => PHP_VERSION, 'sapi' => PHP_SAPI];
        // 数据库
        $db = [];
        try {
            $version       = \think\facade\Db::query('SELECT VERSION() as version');
            $db['version'] = $version[0]['version'] ?? 'Unknown';
            $dbName        = env('database.database', 'www_xvv_cc');
            $tables        = \think\facade\Db::query("SELECT COUNT(*) as count FROM information_schema.TABLES WHERE table_schema = '{$dbName}'");
            $db['tables_count'] = $tables[0]['count'] ?? 0;
            $size          = \think\facade\Db::query("SELECT SUM(data_length + index_length) as size FROM information_schema.TABLES WHERE table_schema = '{$dbName}'");
            $db['size']         = $size[0]['size'] ?? 0;
            $db['size_format']  = $this->formatBytes($db['size']);
        } catch (\Exception $e) {
            $db = ['error' => true, 'tables_count' => 0, 'size_format' => 'N/A', 'version' => 'N/A'];
        }
        $data['database'] = $db;
        return $data;
    }

    protected function formatBytes(int|float $bytes, int $precision = 2): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $i = 0;
        while ($bytes > 1024 && $i < count($units) - 1) {
            $bytes /= 1024;
            $i++;
        }
        return round($bytes, $precision) . ' ' . $units[$i];
    }
}
