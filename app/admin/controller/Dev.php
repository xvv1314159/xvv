<?php
namespace app\admin\controller;

use think\facade\View;

class Dev extends Base
{
    public function cache()
    {
        if ($err = $this->checkSuperAdmin()) return $err;
        if ($this->isPost()) {
            try {
                $action = $this->request->post('action', '');
                if ($action === 'clear') {
                    \think\facade\Cache::clear();
                    // 清除模板缓存
                    $runtimePath = runtime_path();
                    $this->clearDir($runtimePath . 'temp');
                    $this->clearDir($runtimePath . 'cache');
                    return $this->success('缓存清除成功');
                }
            } catch (\Exception $e) {
                return $this->error($e->getMessage());
            }
        }
        return View::fetch();
    }

    public function logs()
    {
        if ($this->isPost()) {
            $action = $this->request->post('action', '');
            $logDir = runtime_path() . 'log';
            if ($action === 'list') {
                $files = [];
                if (is_dir($logDir)) {
                    $items = scandir($logDir);
                    foreach ($items as $item) {
                        if ($item !== '.' && $item !== '..' && is_file($logDir . '/' . $item)) {
                            $files[] = ['name' => $item, 'size' => filesize($logDir . '/' . $item), 'mtime' => filemtime($logDir . '/' . $item)];
                        }
                    }
                }
                return json(['code' => 0, 'data' => $files]);
            }
            if ($action === 'read') {
                $file  = $this->request->post('file', '');
                $lines = (int)$this->request->post('lines', 100);
                $path  = $logDir . '/' . basename($file);
                if (!file_exists($path)) return json(['code' => 0, 'data' => '文件不存在']);
                $content = $this->tailFile($path, $lines);
                return json(['code' => 0, 'data' => $content]);
            }
        }
        return View::fetch();
    }

    public function database()
    {
        if ($err = $this->checkSuperAdmin()) return $err;
        if ($this->isPost()) {
            $action = $this->request->post('action', '');
            $dbName = env('DB_NAME', env('database.database', ''));
            $db     = \think\facade\Db::class;

            try {
                if ($action === 'tables') {
                    $rows = \think\facade\Db::query("SHOW TABLE STATUS FROM `{$dbName}`");
                    $tables = array_map(function ($r) {
                        $size = ($r['Data_length'] ?? 0) + ($r['Index_length'] ?? 0);
                        return [
                            'name'        => $r['Name'],
                            'engine'      => $r['Engine'] ?? '',
                            'rows'        => $r['Rows'] ?? 0,
                            'size_format' => $this->formatSize($size),
                            'comment'     => $r['Comment'] ?? '',
                        ];
                    }, $rows);
                    return json(['code' => 0, 'data' => $tables]);
                }

                if ($action === 'structure') {
                    $table   = preg_replace('/[^a-zA-Z0-9_]/', '', $this->request->post('table', ''));
                    $columns = \think\facade\Db::query("SHOW FULL COLUMNS FROM `{$table}`");
                    $indexes = \think\facade\Db::query("SHOW INDEX FROM `{$table}`");
                    $create  = \think\facade\Db::query("SHOW CREATE TABLE `{$table}`");
                    return json(['code' => 0, 'data' => [
                        'columns'    => $columns,
                        'indexes'    => $indexes,
                        'create_sql' => $create[0]['Create Table'] ?? '',
                    ]]);
                }

                if ($action === 'data') {
                    $table = preg_replace('/[^a-zA-Z0-9_]/', '', $this->request->post('table', ''));
                    $page  = max(1, (int)$this->request->post('page', 1));
                    $limit = 20;
                    $total = \think\facade\Db::table($table)->count();
                    $data  = \think\facade\Db::table($table)->page($page, $limit)->select()->toArray();
                    return json(['code' => 0, 'data' => [
                        'total' => $total,
                        'page'  => $page,
                        'limit' => $limit,
                        'data'  => $data,
                    ]]);
                }

                if ($action === 'optimize') {
                    $table = preg_replace('/[^a-zA-Z0-9_]/', '', $this->request->post('table', ''));
                    \think\facade\Db::query("OPTIMIZE TABLE `{$table}`");
                    return json(['code' => 1, 'msg' => '优化成功']);
                }

                if ($action === 'execute') {
                    $sql = trim($this->request->post('sql', ''));
                    if (!preg_match('/^\s*SELECT\b/i', $sql)) {
                        return json(['code' => 1, 'msg' => '只允许执行 SELECT 语句']);
                    }
                    $data = \think\facade\Db::query($sql);
                    return json(['code' => 0, 'data' => ['rows' => count($data), 'data' => $data]]);
                }

            } catch (\Exception $e) {
                return json(['code' => 1, 'msg' => $e->getMessage()]);
            }
        }
        return View::fetch();
    }

    protected function formatSize(int $bytes): string
    {
        if ($bytes < 1024) return $bytes . ' B';
        if ($bytes < 1048576) return round($bytes / 1024, 2) . ' KB';
        if ($bytes < 1073741824) return round($bytes / 1048576, 2) . ' MB';
        return round($bytes / 1073741824, 2) . ' GB';
    }

    public function form_build()
    {
        return View::fetch();
    }

    protected function clearDir(string $dir): void
    {
        if (!is_dir($dir)) return;
        $items = scandir($dir);
        foreach ($items as $item) {
            if ($item === '.' || $item === '..') continue;
            $path = $dir . '/' . $item;
            is_dir($path) ? $this->clearDir($path) : unlink($path);
        }
    }

    protected function tailFile(string $file, int $lines = 100): string
    {
        $f    = fopen($file, 'rb');
        $buf  = '';
        $cnt  = 0;
        fseek($f, 0, SEEK_END);
        $pos  = ftell($f);
        while ($pos > 0 && $cnt < $lines) {
            $step = min(4096, $pos);
            $pos -= $step;
            fseek($f, $pos);
            $chunk = fread($f, $step);
            $buf   = $chunk . $buf;
            $cnt  += substr_count($chunk, "\n");
        }
        fclose($f);
        $arr = explode("\n", $buf);
        return implode("\n", array_slice($arr, -$lines));
    }
}
