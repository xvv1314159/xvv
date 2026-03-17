<?php
// 应用公共文件

/**
 * 上传文件
 * 支持：UploadedFile 对象、URL 地址字符串
 * @param \think\file\UploadedFile|string $file 文件流或远程URL
 * @param string $dir 上传子目录，默认使用当前应用名/年月日
 * @return string 文件访问路径
 */
function upload(mixed $file, string $dir = ''): string
{
    // 允许的扩展名白名单
    static $allowedExts = [
        // 图片
        'jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp', 'svg', 'ico',
        // 视频
        'mp4', 'mov', 'avi', 'wmv', 'flv', 'mkv', 'webm', 'm4v',
        // 音频
        'mp3', 'wav', 'ogg', 'aac', 'flac', 'm4a',
        // 文档
        'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'csv', 'md',
        // 压缩包
        'zip', 'rar', '7z', 'tar', 'gz',
    ];

    if (empty($dir)) {
        $app = app()->http->getName();
        $dir = $app . '/' . date('Ymd');
    }

    $savePath = public_path() . 'uploads/' . $dir;
    if (!is_dir($savePath)) {
        mkdir($savePath, 0755, true);
    }

    // 远程 URL：下载后保存
    if (is_string($file)) {
        if (!filter_var($file, FILTER_VALIDATE_URL)) {
            throw new \Exception('无效的文件URL');
        }
        $ext = strtolower(pathinfo(parse_url($file, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg');
        if (!in_array($ext, $allowedExts)) {
            throw new \Exception('不允许的文件类型：' . $ext);
        }
        $content = file_get_contents($file);
        if ($content === false) {
            throw new \Exception('远程文件下载失败');
        }
        $filename = md5(uniqid()) . '.' . $ext;
        file_put_contents($savePath . '/' . $filename, $content);
        return '/uploads/' . $dir . '/' . $filename;
    }

    // UploadedFile 对象
    if (!($file instanceof \think\file\UploadedFile)) {
        throw new \Exception('不支持的文件类型');
    }

    $ext = strtolower($file->getOriginalExtension());
    if (!in_array($ext, $allowedExts)) {
        throw new \Exception('不允许的文件类型：' . $ext);
    }

    $info = $file->move($savePath);
    if (!$info) {
        throw new \Exception('文件上传失败');
    }

    return '/uploads/' . $dir . '/' . $info->getFilename();
}

/**
 * 获取配置项值
 * @param string $key 支持两种格式：'group_key.config_key' 或分开传两个参数
 * @param mixed $configKeyOrDefault 第二个参数为config_key或默认值
 * @param mixed $default 默认值
 * @return mixed
 */
function get_config(string $key, mixed $configKeyOrDefault = null, mixed $default = null): mixed
{
    static $cache = [];

    // 支持点号分隔：get_config('site.site_name')
    if (str_contains($key, '.') && $configKeyOrDefault === null) {
        [$groupKey, $configKey] = explode('.', $key, 2);
    } elseif (is_string($configKeyOrDefault)) {
        // get_config('site', 'site_name', $default)
        $groupKey  = $key;
        $configKey = $configKeyOrDefault;
    } else {
        // 参数不合法
        return $default ?? $configKeyOrDefault;
    }

    $cacheKey = $groupKey . '.' . $configKey;
    if (isset($cache[$cacheKey])) {
        return $cache[$cacheKey];
    }

    $value = \app\common\model\Config::getConfigValue($groupKey, $configKey, $default);
    $cache[$cacheKey] = $value;
    return $value;
}
