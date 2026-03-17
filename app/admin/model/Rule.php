<?php
namespace app\admin\model;

use think\Model;

class Rule extends Model
{
    protected $name = 'admin_rules';

    /**
     * 递归生成菜单 HTML
     */
    public static function recursion(array $list, int $pid = 0, string $currentPath = ''): string
    {
        $html = '';
        foreach ($list as $v) {
            if ($v['pid'] != $pid || $v['is_menu'] == 0) continue;

            // href 格式：Controller/action（系统菜单）或 app/xxx/admin/Controller/action（插件菜单）
            $href = $v['href'] ?? '';
            if (empty($href)) {
                $realHref = 'javascript:void(0)';
            } elseif (substr_count($href, '/') >= 2) {
                // 插件路径，直接拼接根路径
                $realHref = '/' . ltrim($href, '/');
            } else {
                $realHref = (string)url($href);
            }

            $matched     = $currentPath && strcasecmp($currentPath, $v['href']) === 0;
            $v['active'] = $matched ? 'active' : '';

            $sonHtml    = self::recursion($list, $v['id'], $currentPath);
            $colorStyle = !empty($v['color']) ? ' style="color:' . htmlspecialchars($v['color']) . '"' : '';

            if ($sonHtml === '') {
                $html .= '<li class="nav-item ' . $v['active'] . '"><a href="' . $realHref . '"' . $colorStyle . '><i class="' . $v['icon'] . '"></i> <span>' . $v['title'] . '</span></a></li>';
            } else {
                $isOpen  = str_contains($sonHtml, 'active') ? 'active open' : '';
                $icon    = $v['icon'] ?: 'mdi mdi-menu';
                $html   .= '<li class="nav-item nav-item-has-subnav ' . $isOpen . '"><a href="javascript:void(0)"' . $colorStyle . '><i class="' . $icon . '"></i> <span>' . $v['title'] . '</span></a><ul class="nav nav-subnav">' . $sonHtml . '</ul></li>';
            }
        }
        return $html;
    }
}
