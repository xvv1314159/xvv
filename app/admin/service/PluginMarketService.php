<?php
namespace app\admin\service;

class PluginMarketService
{
    public function fetchMarket(): array
    {
        $urls = [
            config('app.market_url'),
            config('app.market_url_github'),
        ];
        foreach ($urls as $url) {
            if (empty($url)) continue;
            $result = curl_request($url);
            if ($result['code'] === 200 && !empty($result['data'])) {
                return is_array($result['data']) ? $result['data'] : [];
            }
        }
        throw new \Exception('获取插件市场列表失败，请检查网络');
    }

    public function install(string $identifier, string $downloadUrl, string $downloadUrlGithub): void
    {
        $pluginDir = base_path() . 'plugin/' . $identifier;
        if (is_dir($pluginDir)) throw new \Exception('插件目录已存在，请先删除旧版本');

        // 优先使用国内源
        $url = $this->chooseFastUrl($downloadUrl, $downloadUrlGithub);
        if (empty($url)) throw new \Exception('下载地址为空');

        $tmpFile = sys_get_temp_dir() . '/' . uniqid('plugin_') . '.zip';
        $result  = $this->downloadFile($url, $tmpFile);
        if (!$result) throw new \Exception('下载失败，请检查网络或手动上传');

        $zip = new \ZipArchive();
        if ($zip->open($tmpFile) !== true) {
            @unlink($tmpFile);
            throw new \Exception('ZIP 文件损坏');
        }
        $zip->extractTo(base_path() . 'plugin/');
        $zip->close();
        @unlink($tmpFile);
    }

    protected function chooseFastUrl(string $gitee, string $github): string
    {
        // 简单策略：优先 Gitee（国内更快）
        if (!empty($gitee)) return $gitee;
        return $github;
    }

    protected function downloadFile(string $url, string $savePath): bool
    {
        $ch = curl_init($url);
        $fp = fopen($savePath, 'wb');
        curl_setopt_array($ch, [
            CURLOPT_FILE           => $fp,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT        => 120,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
        ]);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err  = curl_error($ch);
        curl_close($ch);
        fclose($fp);
        if ($err || $code !== 200) {
            @unlink($savePath);
            return false;
        }
        return true;
    }
}
