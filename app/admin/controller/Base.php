<?php
namespace app\admin\controller;

use app\admin\model\AdminRole;
use app\admin\model\Role;
use app\admin\model\Rule;
use think\facade\View;
use think\App;

class Base extends \app\BaseController
{
    public function initialize()
    {
        parent::initialize();

        // 注入视图变量
        View::assign('iframe', !empty($this->request->param('iframe')) ? 1 : 0);
        View::assign('isPlugin', false);

        // 生成菜单并注入
        $this->buildMenu();
    }

    /**
     * 根据当前管理员权限生成菜单并注入视图
     */
    protected function buildMenu(): void
    {
        $admin = session('admin');
        if (empty($admin)) return;

        $currentPath = '/' . $this->request->pathinfo();
        // 去掉 URL 中的应用前缀（兼容直接访问、app_map 映射、域名绑定）
        $appName    = $this->app->http->getName();
        $domainBind = $this->app->config->get('app.domain_bind', []);
        $isDomainBound = in_array($appName, $domainBind) || array_search($appName, $domainBind) !== false;
        if (!$isDomainBound) {
            // 非域名绑定时，pathinfo 第一段是应用前缀（原名或映射名），需去掉
            $appMap    = $this->app->config->get('app.app_map', []);
            $mapKey    = array_search($appName, $appMap);
            $urlPrefix = $mapKey !== false ? $mapKey : $appName;
            $prefixLower = strtolower($urlPrefix);
            if (str_starts_with(strtolower($currentPath), '/' . $prefixLower . '/')) {
                $currentPath = substr($currentPath, strlen($urlPrefix) + 1);
            }
        }
        // 统一格式：去掉开头斜杠，去掉URL后缀，控制器首字母大写，方法名小写
        // 例：Index/index.html → Index/index
        $currentPath = ltrim($currentPath, '/');
        if (str_contains($currentPath, '/')) {
            [$ctrl, $action] = explode('/', $currentPath, 2);
            $action      = preg_replace('/\.\w+$/', '', $action);
            $currentPath = ucfirst(strtolower($ctrl)) . '/' . strtolower($action);
        } else {
            $currentPath = ucfirst(strtolower(preg_replace('/\.\w+$/', '', $currentPath)));
        }

        // 超级管理员拥有全部菜单
        $isSuperAdmin = $this->isSuperAdmin();

        if ($isSuperAdmin) {
            $rules = Rule::where('status', 1)
                ->where('plugin', '')
                ->order('sort asc, id asc')
                ->select()
                ->toArray();
        } else {
            // 获取角色拥有的规则ID
            $roleIds = AdminRole::where('admin_id', $admin['id'])->column('role_id');
            if (empty($roleIds)) {
                View::assign('menuHtml', '');
                return;
            }
            $allowedRuleIds = [];
            $roles = Role::whereIn('id', $roleIds)->where('status', 1)->select();
            foreach ($roles as $role) {
                if ($role['rules'] === '*') {
                    $isSuperAdmin = true;
                    break;
                }
                $ids = array_filter(explode(',', $role['rules'] ?? ''));
                $allowedRuleIds = array_unique(array_merge($allowedRuleIds, $ids));
            }
            if ($isSuperAdmin) {
                $rules = Rule::where('status', 1)
                    ->where('plugin', '')
                    ->order('sort asc, id asc')
                    ->select()
                    ->toArray();
            } else {
                $rules = Rule::where('status', 1)
                    ->where('plugin', '')
                    ->whereIn('id', $allowedRuleIds)
                    ->order('sort asc, id asc')
                    ->select()
                    ->toArray();
            }
        }

        $menuHtml = Rule::recursion($rules, 0, $currentPath);
        
        View::assign('menuHtml', $menuHtml);
        View::assign('admin', $admin);
    }

    /**
     * 判断当前管理员是否是超级管理员
     */
    protected function isSuperAdmin(): bool
    {
        $admin = session('admin');
        if (empty($admin)) return false;
        $roleIds = AdminRole::where('admin_id', $admin['id'])->column('role_id');
        if (empty($roleIds)) return false;
        return Role::whereIn('id', $roleIds)->where('rules', '*')->where('status', 1)->find() !== null;
    }

    /**
     * 检查是否超级管理员，不是则返回错误响应
     */
    protected function checkSuperAdmin(): mixed
    {
        if (!$this->isSuperAdmin()) {
            return $this->error('无权限，需要超级管理员');
        }
        return null;
    }

    /**
     * 是否POST请求
     */
    protected function isPost(): bool
    {
        return $this->request->isPost();
    }


}
