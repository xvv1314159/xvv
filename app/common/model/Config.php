<?php
namespace app\common\model;

use think\Model;

class Config extends Model
{
    protected $name = 'configs';
    protected $json = ['config_options'];

    public static function getConfigsByGroup(string $plugin = ''): array
    {
        $configs = self::where('plugin', $plugin)
            ->order('sort', 'asc')
            ->select()
            ->toArray();

        $result = [];
        foreach ($configs as $config) {
            $groupKey = $config['group_key'];
            if (!isset($result[$groupKey])) {
                $result[$groupKey] = ['title' => $config['group_title'], 'config' => []];
            }
            $value = $config['config_value'];
            if (in_array($config['config_type'], ['images', 'videos'])) {
                $value = json_decode($value, true) ?: [];
            } elseif ($config['config_type'] === 'checkbox') {
                $value = (is_string($value) && !empty($value)) ? explode(',', $value) : [];
            }
            $params = [];
            if (!empty($config['config_options'])) {
                $params = is_string($config['config_options'])
                    ? (json_decode($config['config_options'], true) ?: [])
                    : (array)$config['config_options'];
            }
            $result[$groupKey]['config'][$config['config_key']] = [
                'title'  => $config['config_title'],
                'type'   => $config['config_type'],
                'value'  => $value,
                'desc'   => $config['config_desc'],
                'params' => $params,
            ];
        }
        return $result;
    }

    public static function saveConfigs(string $groupKey, array $configData): bool
    {
        foreach ($configData as $configKey => $item) {
            $value  = $item['value'] ?? '';
            $config = self::where(['group_key' => $groupKey, 'config_key' => $configKey])->find();
            if (!$config) continue;
            if (is_array($value)) {
                $value = $config['config_type'] === 'checkbox'
                    ? implode(',', $value)
                    : json_encode($value, JSON_UNESCAPED_UNICODE);
            }
            $config->config_value = $value;
            $config->save();
        }
        return true;
    }

    public static function getConfigValue(string $groupKey, string $configKey, mixed $default = null): mixed
    {
        $config = self::where(['group_key' => $groupKey, 'config_key' => $configKey])->find();
        if (!$config) return $default;
        $value = $config['config_value'];
        if (in_array($config['config_type'], ['images', 'videos'])) {
            return json_decode($value, true) ?: [];
        }
        return $value;
    }
}
