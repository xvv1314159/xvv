<?php

declare(strict_types=1);

namespace app\admin\middleware;

use app\admin\model\AdminRole;
use app\admin\model\Role;
use app\admin\model\Rule;
use think\App;
use think\Request;
use think\Response;

/**
 * 后台登录验证 + 节点权限检查中间件
 */
class Auth
{
    use \think\Jump;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public function handle(Request $request, \Closure $next): Response
    {
        // 优先从已解析路由获取，否则从 pathinfo 手动解析
        $controllerName = $request->controller();
        $action         = strtolower($request->action());

        if (empty($controllerName)) {
            $pathinfo  = trim($request->pathinfo(), '/');
            $segments  = explode('/', $pathinfo);
            $shortName = isset($segments[0]) && $segments[0] !== '' ? strtolower($segments[0]) : 'index';
            $action    = isset($segments[1]) && $segments[1] !== '' ? strtolower($segments[1]) : 'index';
        } else {
            $parts     = explode('.', $controllerName);
            $shortName = strtolower(end($parts));
        }

        // 无法解析控制器，直接放行
        if (empty($shortName)) {
            return $next($request);
        }

        // 读取控制器白名单属性（不实例化）
        $appName    = $this->app->http->getName();
        // 判断当前域名是否绑定了该应用，绑定则无前缀
        $domainBind   = $this->app->config->get('app.domain_bind', []);
        $isDomainBound = in_array($appName, $domainBind) || array_search($appName, $domainBind) !== false;
        if ($isDomainBound) {
            $urlPrefix = '';
        } else {
            $appMap    = $this->app->config->get('app.app_map', []);
            $mapKey    = array_search($appName, $appMap);
            $urlPrefix = $mapKey !== false ? $mapKey : $appName;
        }

        $props = $this->getControllerProps('app\\' . $appName . '\\controller\\' . ucfirst($shortName));

        // 控制器类不存在（如验证码等框架内置路由），直接放行
        if ($props === null) {
            return $next($request);
        }

        $noNeedLogin = array_map('strtolower', $props['noNeedLogin'] ?? []);
        $noNeedAuth  = array_map('strtolower', $props['noNeedAuth']  ?? []);

        // 白名单：无需登录，直接放行
        if (in_array($action, $noNeedLogin, true)) {
            return $next($request);
        }

        // 检查登录
        $admin = session('admin');
        if (empty($admin)) {
            $this->error('请先登录', ($urlPrefix ? '/' . $urlPrefix : '') . '/index/login');
        }

        // 白名单：已登录无需鉴权
        if (in_array($action, $noNeedAuth, true)) {
            return $next($request);
        }

        // 获取角色规则 ID
        $roleIds = AdminRole::where('admin_id', $admin['id'])->column('role_id');
        $ruleIds = $this->getRuleIds($roleIds);

        // 超级管理员（rules = '*'）直接放行
        if (in_array('*', $ruleIds, true)) {
            return $next($request);
        }

        // 构建当前节点路径
        $ctrl = ucfirst($shortName);
        $path = ($urlPrefix ? '/' . $urlPrefix : '') . '/' . $ctrl . '/' . $action;

        // 节点不存在，返回错误
        $rule = Rule::where('href', $path)->where('status', 1)->find();
        if (!$rule) {
            $this->error('页面不存在 ' . $path);
        }

        // 验证权限
        if (empty($ruleIds) || !in_array((string)$rule['id'], $ruleIds, true)) {
            $this->error('无访问权限');
        }

        return $next($request);
    }

    /**
     * 通过反射读取控制器默认属性（不实例化）
     * 返回 null 表示类不存在
     */
    protected function getControllerProps(string $className): ?array
    {
        if (!class_exists($className)) {
            return null;
        }
        try {
            return (new \ReflectionClass($className))->getDefaultProperties();
        } catch (\Throwable) {
            return null;
        }
    }

    /**
     * 从角色列表获取所有规则 ID
     */
    protected function getRuleIds(array $roleIds): array
    {
        if (empty($roleIds)) {
            return [];
        }
        $ruleIds = [];
        foreach (Role::whereIn('id', $roleIds)->where('status', 1)->column('rules') as $str) {
            if (!empty($str)) {
                foreach (explode(',', $str) as $id) {
                    $ruleIds[] = trim($id);
                }
            }
        }
        return array_unique($ruleIds);
    }
}
