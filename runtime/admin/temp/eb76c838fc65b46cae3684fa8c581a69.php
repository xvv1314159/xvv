<?php /*a:2:{s:55:"/www/wwwroot/www.xvv.cc/app/admin/view/index/index.html";i:1773769974;s:48:"/www/wwwroot/www.xvv.cc/app/admin/view/base.html";i:1773769974;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="keywords" content="LightYear,LightYearAdmin,光年,后台模板,后台管理系统,光年HTML模板">
<meta name="description" content="Light Year Admin V5是一个基于Bootstrap v5.1.3的后台管理系统的HTML模板。">
<meta name="author" content="yinq">
<title>首页 - <?php echo get_config('basic.title'); ?>后台管理系统</title>
<!--<title>首页 - <?php echo config('plugin.admin.config.basic.config.title.value'); ?>后台管理系统</title>-->
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<link rel="stylesheet" type="text/css" href="/static/css/materialdesignicons.min.css">
<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/static/css/animate.min.css">

<link rel="stylesheet" type="text/css" href="/static/css/style.min.css">
<link rel="stylesheet" type="text/css" href="/static/css/custom.css">
<link rel="stylesheet" href="/static/sweetalert2/sweetalert2.css">
<link rel="stylesheet" href="<?php echo get_config('basic.css'); ?>">
<style>
    ul.pagination {
    display: flex;
    flex-wrap: wrap;
    padding: 0;
    margin: 20px 0;
    list-style: none;
    justify-content: center;
    align-items: center;
    gap: 4px;
}

ul.pagination li {
    margin: 0;
}

ul.pagination li a,
ul.pagination li span {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 36px;
    height: 36px;
    padding: 0 8px;
    font-size: 14px;
    line-height: 1;
    color: #4a5568;
    background-color: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.2s ease;
}

ul.pagination li a:hover {
    color: #2b6cb0;
    background-color: #ebf8ff;
    border-color: #bee3f8;
}

ul.pagination li.active span {
    color: #fff;
    background-color: #4299e1;
    border-color: #4299e1;
    font-weight: 600;
}

ul.pagination li.disabled span {
    color: #a0aec0;
    background-color: #f7fafc;
    border-color: #edf2f7;
    cursor: not-allowed;
}

ul.pagination li.disabled span.dots {
    background-color: transparent;
    border-color: transparent;
    padding: 0;
    min-width: auto;
}

/* 上一页/下一页箭头样式 */
ul.pagination li:first-child a,
ul.pagination li:first-child span,
ul.pagination li:last-child a,
ul.pagination li:last-child span {
    padding: 0 12px;
}

/* 响应式调整 */
@media (max-width: 640px) {
    ul.pagination li.hidden-on-mobile {
        display: none;
    }
    
    ul.pagination li a,
    ul.pagination li span {
        min-width: 32px;
        height: 32px;
        font-size: 13px;
    }
}
</style>
</head>

<body<?php if($iframe): ?> class="iframe-mode"<?php endif; ?>>
<?php if(!$iframe): ?>
<div class="lyear-layout-web">
  <div class="lyear-layout-container">
    <!--左侧导航-->
    <aside class="lyear-layout-sidebar">

      <!-- logo -->
      <?php if(!$isPlugin): ?>
      <div id="logo" class="sidebar-header">
        <a href="/admin" style="display: flex; align-items: center; justify-content: center; padding: 20px 0; text-decoration: none;">
          <svg width="140" height="40" viewBox="0 0 140 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <!-- 渐变定义 -->
            <defs>
              <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" style="stop-color:#667eea;stop-opacity:1" />
                <stop offset="100%" style="stop-color:#764ba2;stop-opacity:1" />
              </linearGradient>
              <linearGradient id="textGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" style="stop-color:#667eea;stop-opacity:1" />
                <stop offset="100%" style="stop-color:#764ba2;stop-opacity:1" />
              </linearGradient>
            </defs>
            
            <!-- 图标部分 - 抽象的六边形网格 -->
            <g transform="translate(5, 5)">
              <!-- 中心六边形 -->
              <path d="M15 8 L20 11 L20 17 L15 20 L10 17 L10 11 Z" fill="url(#logoGradient)" opacity="0.9"/>
              <!-- 左上六边形 -->
              <path d="M10 3 L15 6 L15 8 L10 11 L5 8 L5 6 Z" fill="url(#logoGradient)" opacity="0.7"/>
              <!-- 右上六边形 -->
              <path d="M20 3 L25 6 L25 8 L20 11 L15 8 L15 6 Z" fill="url(#logoGradient)" opacity="0.7"/>
              <!-- 左下六边形 -->
              <path d="M10 17 L15 20 L15 22 L10 25 L5 22 L5 20 Z" fill="url(#logoGradient)" opacity="0.7"/>
              <!-- 右下六边形 -->
              <path d="M20 17 L25 20 L25 22 L20 25 L15 22 L15 20 Z" fill="url(#logoGradient)" opacity="0.7"/>
              
              <!-- 连接线 -->
              <line x1="15" y1="8" x2="15" y2="6" stroke="url(#logoGradient)" stroke-width="1.5" opacity="0.6"/>
              <line x1="15" y1="20" x2="15" y2="22" stroke="url(#logoGradient)" stroke-width="1.5" opacity="0.6"/>
              <line x1="10" y1="11" x2="5" y2="8" stroke="url(#logoGradient)" stroke-width="1.5" opacity="0.6"/>
              <line x1="20" y1="11" x2="25" y2="8" stroke="url(#logoGradient)" stroke-width="1.5" opacity="0.6"/>
              <line x1="10" y1="17" x2="5" y2="20" stroke="url(#logoGradient)" stroke-width="1.5" opacity="0.6"/>
              <line x1="20" y1="17" x2="25" y2="20" stroke="url(#logoGradient)" stroke-width="1.5" opacity="0.6"/>
            </g>
            
            <!-- 文字部分 -->
            <text x="45" y="25" font-family="'Segoe UI', 'Arial', sans-serif" font-size="18" font-weight="700" fill="url(#textGradient)">
              Admin
            </text>
            <text x="100" y="25" font-family="'Segoe UI', 'Arial', sans-serif" font-size="18" font-weight="300" fill="#94a3b8">
              Pro
            </text>
          </svg>
        </a>
      </div>
      <?php endif; ?>
      <div class="lyear-layout-sidebar-info lyear-scroll">

        <nav class="sidebar-main">

          <ul class="nav-drawer">
              <?php echo $menuHtml; ?>
          </ul>
        </nav>
      </div>

    </aside>
    <!--End 左侧导航-->

    
    <?php if(!$isPlugin): ?>
    <!--头部信息-->
    <header class="lyear-layout-header">

      <nav class="navbar">

        <div class="navbar-left">
          <div class="lyear-aside-toggler">
            <span class="lyear-toggler-bar"></span>
            <span class="lyear-toggler-bar"></span>
            <span class="lyear-toggler-bar"></span>
          </div>
        </div>

        <ul class="navbar-right d-flex align-items-center">
          <!--顶部消息部分-->
          <li class="dropdown dropdown-notice">
            <span data-bs-toggle="dropdown" class="position-relative icon-item">
              <i class="mdi mdi-bell-outline fs-5"></i>
              <span class="position-absolute translate-middle badge bg-danger">7</span>
            </span>
            <div class="dropdown-menu dropdown-menu-end">
              <div class="lyear-notifications">

                <div class="lyear-notifications-title d-flex justify-content-between" data-stopPropagation="true">
                  <span>你有 10 条未读消息</span>
                  <a href="#!">查看全部</a>
                </div>
                <div class="lyear-notifications-info lyear-scroll">
                  <a href="#!" class="dropdown-item"
                    title="树莓派销量猛增，疫情期间居家工作学习、医疗领域都需要它">树莓派销量猛增，疫情期间居家工作学习、医疗领域都需要它</a>
                  <a href="#!" class="dropdown-item"
                    title="GNOME 用户体验团队将为 GNOME Shell 提供更多改进">GNOME 用户体验团队将为 GNOME Shell
                    提供更多改进</a>
                  <a href="#!" class="dropdown-item"
                    title="Linux On iPhone 即将面世，支持 iOS 的双启动">Linux On iPhone 即将面世，支持 iOS
                    的双启动</a>
                  <a href="#!" class="dropdown-item" title="GitHub 私有仓库完全免费面向团队提供">GitHub
                    私有仓库完全免费面向团队提供</a>
                  <a href="#!" class="dropdown-item"
                    title="Wasmtime 为 WebAssembly 增加 Go 语言绑定">Wasmtime 为 WebAssembly 增加 Go
                    语言绑定</a>
                  <a href="#!" class="dropdown-item"
                    title="红帽借"订阅"成开源一哥，首创者 Cormier 升任总裁">红帽借"订阅"成开源一哥，首创者 Cormier 升任总裁</a>
                  <a href="#!" class="dropdown-item" title="Zend 宣布推出两项 PHP 新产品">Zend 宣布推出两项
                    PHP 新产品</a>
                </div>

              </div>
            </div>
          </li>
          <!--End 顶部消息部分-->
          <!--切换主题配色-->
		  <li class="dropdown dropdown-skin">
		    <span data-bs-toggle="dropdown" class="icon-item">
              <i class="mdi mdi-palette fs-5"></i>
            </span>
			<ul class="dropdown-menu dropdown-menu-end" data-stopPropagation="true">
              <li class="lyear-skin-title"><p>主题</p></li>
              <li class="lyear-skin-li clearfix">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="site_theme" id="site_theme_1" value="default" checked="checked">
                  <label class="form-check-label" for="site_theme_1"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="site_theme" id="site_theme_2" value="translucent-green">
                  <label class="form-check-label" for="site_theme_2"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="site_theme" id="site_theme_3" value="translucent-blue">
                  <label class="form-check-label" for="site_theme_3"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="site_theme" id="site_theme_4" value="translucent-yellow">
                  <label class="form-check-label" for="site_theme_4"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="site_theme" id="site_theme_5" value="translucent-red">
                  <label class="form-check-label" for="site_theme_5"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="site_theme" id="site_theme_6" value="translucent-pink">
                  <label class="form-check-label" for="site_theme_6"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="site_theme" id="site_theme_7" value="translucent-cyan">
                  <label class="form-check-label" for="site_theme_7"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="site_theme" id="site_theme_8" value="dark">
                  <label class="form-check-label" for="site_theme_8"></label>
                </div>
              </li>
			  <li class="lyear-skin-title"><p>LOGO</p></li>
			  <li class="lyear-skin-li clearfix">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="logo_bg" id="logo_bg_1" value="default" checked="checked">
                  <label class="form-check-label" for="logo_bg_1"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="logo_bg" id="logo_bg_2" value="color_2">
                  <label class="form-check-label" for="logo_bg_2"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="logo_bg" id="logo_bg_3" value="color_3">
                  <label class="form-check-label" for="logo_bg_3"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="logo_bg" id="logo_bg_4" value="color_4">
                  <label class="form-check-label" for="logo_bg_4"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="logo_bg" id="logo_bg_5" value="color_5">
                  <label class="form-check-label" for="logo_bg_5"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="logo_bg" id="logo_bg_6" value="color_6">
                  <label class="form-check-label" for="logo_bg_6"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="logo_bg" id="logo_bg_7" value="color_7">
                  <label class="form-check-label" for="logo_bg_7"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="logo_bg" id="logo_bg_8" value="color_8">
                  <label class="form-check-label" for="logo_bg_8"></label>
                </div>
			  </li>
			  <li class="lyear-skin-title"><p>头部</p></li>
			  <li class="lyear-skin-li clearfix">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="header_bg" id="header_bg_1" value="default" checked="checked">
                  <label class="form-check-label" for="header_bg_1"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="header_bg" id="header_bg_2" value="color_2">
                  <label class="form-check-label" for="header_bg_2"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="header_bg" id="header_bg_3" value="color_3">
                  <label class="form-check-label" for="header_bg_3"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="header_bg" id="header_bg_4" value="color_4">
                  <label class="form-check-label" for="header_bg_4"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="header_bg" id="header_bg_5" value="color_5">
                  <label class="form-check-label" for="header_bg_5"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="header_bg" id="header_bg_6" value="color_6">
                  <label class="form-check-label" for="header_bg_6"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="header_bg" id="header_bg_7" value="color_7">
                  <label class="form-check-label" for="header_bg_7"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="header_bg" id="header_bg_8" value="color_8">
                  <label class="form-check-label" for="header_bg_8"></label>
                </div>
			  </li>
			  <li class="lyear-skin-title"><p>侧边栏</p></li>
			  <li class="lyear-skin-li clearfix">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="sidebar_bg" id="sidebar_bg_1" value="default" checked="checked">
                  <label class="form-check-label" for="sidebar_bg_1"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="sidebar_bg" id="sidebar_bg_2" value="color_2">
                  <label class="form-check-label" for="sidebar_bg_2"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="sidebar_bg" id="sidebar_bg_3" value="color_3">
                  <label class="form-check-label" for="sidebar_bg_3"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="sidebar_bg" id="sidebar_bg_4" value="color_4">
                  <label class="form-check-label" for="sidebar_bg_4"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="sidebar_bg" id="sidebar_bg_5" value="color_5">
                  <label class="form-check-label" for="sidebar_bg_5"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="sidebar_bg" id="sidebar_bg_6" value="color_6">
                  <label class="form-check-label" for="sidebar_bg_6"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="sidebar_bg" id="sidebar_bg_7" value="color_7">
                  <label class="form-check-label" for="sidebar_bg_7"></label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="sidebar_bg" id="sidebar_bg_8" value="color_8">
                  <label class="form-check-label" for="sidebar_bg_8"></label>
                </div>
			  </li>
		    </ul>
		  </li>
          <!--End 切换主题配色-->
          <!--个人头像内容-->
          <li class="dropdown">
            <a href="javascript:void(0)" data-bs-toggle="dropdown" class="dropdown-toggle">
              <img class="avatar-md rounded-circle" src="<?php echo session('admin.avatar') ?: '/static/images/users/avatar.jpg'; ?>" alt="<?php echo session('admin.nickname'); ?>" />
              <span style="margin-left: 10px;"><?php echo session('admin.nickname'); ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="<?php echo url("admin/profile"); ?>">
                  <i class="mdi mdi-account"></i>
                  <span>个人信息</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="<?php echo url("admin/password"); ?>">
                  <i class="mdi mdi-lock-outline"></i>
                  <span>修改密码</span>
                </a>
              </li>

              <li class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item" href="<?php echo url("index/login"); ?>">
                  <i class="mdi mdi-logout-variant"></i>
                  <span>退出登录</span>
                </a>
              </li>
            </ul>
          </li>
          <!--End 个人头像内容-->
        </ul>

      </nav>

    </header>
    <!--End 头部信息-->
    <?php endif; ?>

    <!--页面主要内容-->
    <main class="lyear-layout-content" <?php if($isPlugin): ?>style="padding-top:0;"<?php endif; ?>>

      <div class="container-fluid" id="app">
        

<!-- 业务统计卡片 -->
<div class="row mb-3">
  <div class="col-md-3 col-sm-6 mb-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="width:54px;height:54px;flex-shrink:0">
          <i class="mdi mdi-account-tie text-primary fs-3"></i>
        </div>
        <div>
          <div class="text-muted" style="font-size:13px">管理员</div>
          <div class="fw-bold fs-4"><?php echo htmlentities((string) $statsData['admin_count']); ?></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 mb-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center" style="width:54px;height:54px;flex-shrink:0">
          <i class="mdi mdi-puzzle text-success fs-3"></i>
        </div>
        <div>
          <div class="text-muted" style="font-size:13px">已安装插件</div>
          <div class="fw-bold fs-4"><?php echo htmlentities((string) $statsData['plugin_installed']); ?> <small class="text-muted fs-6">/ <?php echo htmlentities((string) $statsData['plugin_count']); ?></small></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 mb-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="rounded-circle bg-info bg-opacity-10 d-flex align-items-center justify-content-center" style="width:54px;height:54px;flex-shrink:0">
          <i class="mdi mdi-folder-multiple text-info fs-3"></i>
        </div>
        <div>
          <div class="text-muted" style="font-size:13px">上传文件</div>
          <div class="fw-bold fs-4"><?php echo htmlentities((string) $statsData['file_count']); ?></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 mb-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="rounded-circle bg-warning bg-opacity-10 d-flex align-items-center justify-content-center" style="width:54px;height:54px;flex-shrink:0">
          <i class="mdi mdi-account-group text-warning fs-3"></i>
        </div>
        <div>
          <div class="text-muted" style="font-size:13px">注册用户</div>
          <div class="fw-bold fs-4"><?php echo htmlentities((string) $statsData['member_count']); ?></div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- 最近登录日志 -->
<div class="row mb-3">
  <div class="col-12">
    <div class="card shadow-sm">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="mdi mdi-history me-1"></i>最近登录记录</h5>
        <a href="<?php echo url("Log/login_log"); ?>" class="btn btn-sm btn-outline-secondary">查看全部</a>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-sm table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th>用户名</th>
                <th>IP</th>
                <th>状态</th>
                <th>备注</th>
                <th>时间</th>
              </tr>
            </thead>
            <tbody>
              <?php if(is_array($loginLogs) || $loginLogs instanceof \think\Collection || $loginLogs instanceof \think\Paginator): $i = 0; $__LIST__ = $loginLogs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?>
              <tr>
                <td><i class="mdi mdi-account me-1 text-muted"></i><?php echo htmlentities((string) $log['username']); ?></td>
                <td><span class="text-muted"><?php echo htmlentities((string) $log['ip']); ?></span></td>
                <td><?php if($log['status'] == 1): ?><span class="badge bg-success">成功</span><?php else: ?><span class="badge bg-danger">失败</span><?php endif; ?></td>
                <td><small class="text-muted"><?php echo htmlentities((string) $log['remark']); ?></small></td>
                <td><small class="text-muted"><?php echo date('m-d H:i:s',$log['create_time']); ?></small></td>
              </tr>
              <?php endforeach; endif; else: echo "" ;endif; if(empty($loginLogs)): ?>
              <tr><td colspan="5" class="text-center text-muted py-3">暂无记录</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row mb-3" id="system-monitor">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="mdi mdi-monitor-dashboard"></i> 系统监控</h5>
        <small class="text-muted">更新时间: <span id="update-time">{{ updateTime }}</span></small>
      </div>
      <div class="card-body">
        <div class="row">
          <!-- 内存使用 -->
          <div class="col-md-3 mb-3">
            <div class="d-flex align-items-center">
              <div class="avatar-md rounded-circle bg-primary bg-opacity-10 me-3 d-flex align-items-center justify-content-center">
                <i class="mdi mdi-memory text-primary fs-4"></i>
              </div>
              <div>
                <h6 class="mb-1">内存使用</h6>
                <p class="mb-0 text-muted">{{ systemData.memory.system_used_format }} / {{ systemData.memory.system_total_format }}</p>
                <small class="text-muted">{{ systemData.memory.system_usage_percent }}%</small>
              </div>
            </div>
          </div>
          
          <!-- 磁盘使用 -->
          <div class="col-md-3 mb-3">
            <div class="d-flex align-items-center">
              <div class="avatar-md rounded-circle bg-success bg-opacity-10 me-3 d-flex align-items-center justify-content-center">
                <i class="mdi mdi-harddisk text-success fs-4"></i>
              </div>
              <div>
                <h6 class="mb-1">磁盘使用</h6>
                <p class="mb-0 text-muted">{{ systemData.disk.used_format }} / {{ systemData.disk.total_format }}</p>
                <small class="text-muted">{{ systemData.disk.usage_percent }}%</small>
              </div>
            </div>
          </div>
          
          <!-- CPU 负载 -->
          <div class="col-md-3 mb-3">
            <div class="d-flex align-items-center">
              <div class="avatar-md rounded-circle bg-info bg-opacity-10 me-3 d-flex align-items-center justify-content-center">
                <i class="mdi mdi-chip text-info fs-4"></i>
              </div>
              <div>
                <h6 class="mb-1">CPU 负载</h6>
                <p class="mb-0 text-muted">1分钟: {{ systemData.cpu.load_1min }}</p>
                <small class="text-muted">5分钟: {{ systemData.cpu.load_5min }}</small>
              </div>
            </div>
          </div>
          
          <!-- 数据库信息 -->
          <div class="col-md-3 mb-3">
            <div class="d-flex align-items-center">
              <div class="avatar-md rounded-circle bg-warning bg-opacity-10 me-3 d-flex align-items-center justify-content-center">
                <i class="mdi mdi-database text-warning fs-4"></i>
              </div>
              <div>
                <h6 class="mb-1">数据库</h6>
                <p class="mb-0 text-muted">{{ systemData.database.tables_count }} 张表 / {{ systemData.database.size_format }}</p>
                <small class="text-muted">MySQL {{ systemData.database.version }}</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- 系统信息卡片 -->
<div class="row mb-3">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <h5 class="mb-0"><i class="mdi mdi-information"></i> 系统信息</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <!-- PHP 信息 -->
          <div class="col-md-6 mb-3">
            <h6 class="border-bottom pb-2"><i class="mdi mdi-language-php"></i> PHP 信息</h6>
            <table class="table table-sm table-borderless">
              <tr>
                <td width="40%" class="text-muted">PHP 版本</td>
                <td><strong><?php echo PHP_VERSION; ?></strong></td>
              </tr>
              <tr>
                <td class="text-muted">运行方式</td>
                <td><?php echo php_sapi_name(); ?></td>
              </tr>
              <tr>
                <td class="text-muted">最大执行时间</td>
                <td><?php echo ini_get('max_execution_time'); ?> 秒</td>
              </tr>
              <tr>
                <td class="text-muted">内存限制</td>
                <td><?php echo ini_get('memory_limit'); ?></td>
              </tr>
              <tr>
                <td class="text-muted">上传限制</td>
                <td><?php echo ini_get('upload_max_filesize'); ?></td>
              </tr>
              <tr>
                <td class="text-muted">POST 限制</td>
                <td><?php echo ini_get('post_max_size'); ?></td>
              </tr>
            </table>
          </div>
          
          <!-- 服务器信息 -->
          <div class="col-md-6 mb-3">
            <h6 class="border-bottom pb-2"><i class="mdi mdi-server"></i> 服务器信息</h6>
            <table class="table table-sm table-borderless">
              <tr>
                <td width="40%" class="text-muted">操作系统</td>
                <td><?php 
                // 尝试获取 Linux 发行版信息
                if (file_exists('/etc/os-release')) {
                  $os_info = parse_ini_file('/etc/os-release');
                  echo isset($os_info['PRETTY_NAME']) ? $os_info['PRETTY_NAME'] : php_uname('s') . ' ' . php_uname('r');
                } else {
                  echo php_uname('s') . ' ' . php_uname('r');
                }
                 ?></td>
              </tr>
              <tr>
                <td class="text-muted">服务器软件</td>
                <td><?php echo isset($_SERVER['SERVER_SOFTWARE']) ? $_SERVER['SERVER_SOFTWARE'] : 'Webman/Workerman'; ?></td>
              </tr>
              <tr>
                <td class="text-muted">服务器IP</td>
                <td><?php 
                // 尝试多种方式获取 IP
                if (isset($_SERVER['SERVER_ADDR']) && $_SERVER['SERVER_ADDR']) {
                  echo $_SERVER['SERVER_ADDR'];
                } elseif (isset($_SERVER['LOCAL_ADDR']) && $_SERVER['LOCAL_ADDR']) {
                  echo $_SERVER['LOCAL_ADDR'];
                } else {
                  // 通过命令获取
                  $ip = shell_exec("hostname -I | awk '{print $1}'");
                  if ($ip) {
                    echo trim($ip);
                  } else {
                    $ip = gethostbyname(gethostname());
                    echo $ip != gethostname() ? $ip : '127.0.0.1';
                  }
                }
                 ?></td>
              </tr>
              <tr>
                <td class="text-muted">监听端口</td>
                <td><?php 
                // 从 process.php 配置文件获取端口
                $config_file = base_path() . '/config/process.php';
                if (file_exists($config_file)) {
                  $config = include $config_file;
                  if (isset($config['webman']['listen'])) {
                    $port = parse_url($config['webman']['listen'], PHP_URL_PORT);
                    echo $port ? $port : '8787';
                  } else {
                    echo '8787';
                  }
                } else {
                  echo isset($_SERVER['SERVER_PORT']) ? $_SERVER['SERVER_PORT'] : '8787';
                }
                 ?></td>
              </tr>
              <tr>
                <td class="text-muted">项目根目录</td>
                <td><small><?php echo base_path(); ?></small></td>
              </tr>
              <tr>
                <td class="text-muted">当前时间</td>
                <td><?php echo date('Y-m-d H:i:s'); ?></td>
              </tr>
            </table>
          </div>
          
          <!-- 框架信息 -->
          <div class="col-md-6 mb-3">
            <h6 class="border-bottom pb-2"><i class="mdi mdi-application"></i> 框架信息</h6>
            <table class="table table-sm table-borderless">
              <tr>
                <td width="40%" class="text-muted">Webman 版本</td>
                <td><strong><?php echo defined('WEBMAN_VERSION') ? WEBMAN_VERSION : (class_exists('Webman\App') ? '已安装' : '未知'); ?></strong></td>
              </tr>
              <tr>
                <td class="text-muted">ThinkORM 版本</td>
                <td><?php echo class_exists('think\facade\Db') ? '已安装' : '未安装'; ?></td>
              </tr>
              <tr>
                <td class="text-muted">项目路径</td>
                <td><small><?php echo base_path(); ?></small></td>
              </tr>
              <tr>
                <td class="text-muted">运行时路径</td>
                <td><small><?php echo runtime_path(); ?></small></td>
              </tr>
            </table>
          </div>
          
          <!-- PHP 扩展 -->
          <div class="col-md-6 mb-3">
            <h6 class="border-bottom pb-2"><i class="mdi mdi-puzzle"></i> PHP 扩展</h6>
            <div style="max-height: 200px; overflow-y: auto;">
              <div class="d-flex flex-wrap gap-1">
                <?php 
                $extensions = get_loaded_extensions();
                foreach ($extensions as $ext) {
                  echo '<span class="badge bg-secondary">' . $ext . '</span> ';
                }
                 ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


      </div>

    </main>
    <!--End 页面主要内容-->
  </div>
</div>
<?php else: ?>
<div class="container-fluid p-3" id="app">
  

<!-- 业务统计卡片 -->
<div class="row mb-3">
  <div class="col-md-3 col-sm-6 mb-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="width:54px;height:54px;flex-shrink:0">
          <i class="mdi mdi-account-tie text-primary fs-3"></i>
        </div>
        <div>
          <div class="text-muted" style="font-size:13px">管理员</div>
          <div class="fw-bold fs-4"><?php echo htmlentities((string) $statsData['admin_count']); ?></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 mb-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center" style="width:54px;height:54px;flex-shrink:0">
          <i class="mdi mdi-puzzle text-success fs-3"></i>
        </div>
        <div>
          <div class="text-muted" style="font-size:13px">已安装插件</div>
          <div class="fw-bold fs-4"><?php echo htmlentities((string) $statsData['plugin_installed']); ?> <small class="text-muted fs-6">/ <?php echo htmlentities((string) $statsData['plugin_count']); ?></small></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 mb-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="rounded-circle bg-info bg-opacity-10 d-flex align-items-center justify-content-center" style="width:54px;height:54px;flex-shrink:0">
          <i class="mdi mdi-folder-multiple text-info fs-3"></i>
        </div>
        <div>
          <div class="text-muted" style="font-size:13px">上传文件</div>
          <div class="fw-bold fs-4"><?php echo htmlentities((string) $statsData['file_count']); ?></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 mb-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="rounded-circle bg-warning bg-opacity-10 d-flex align-items-center justify-content-center" style="width:54px;height:54px;flex-shrink:0">
          <i class="mdi mdi-account-group text-warning fs-3"></i>
        </div>
        <div>
          <div class="text-muted" style="font-size:13px">注册用户</div>
          <div class="fw-bold fs-4"><?php echo htmlentities((string) $statsData['member_count']); ?></div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- 最近登录日志 -->
<div class="row mb-3">
  <div class="col-12">
    <div class="card shadow-sm">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="mdi mdi-history me-1"></i>最近登录记录</h5>
        <a href="<?php echo url("Log/login_log"); ?>" class="btn btn-sm btn-outline-secondary">查看全部</a>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-sm table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th>用户名</th>
                <th>IP</th>
                <th>状态</th>
                <th>备注</th>
                <th>时间</th>
              </tr>
            </thead>
            <tbody>
              <?php if(is_array($loginLogs) || $loginLogs instanceof \think\Collection || $loginLogs instanceof \think\Paginator): $i = 0; $__LIST__ = $loginLogs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?>
              <tr>
                <td><i class="mdi mdi-account me-1 text-muted"></i><?php echo htmlentities((string) $log['username']); ?></td>
                <td><span class="text-muted"><?php echo htmlentities((string) $log['ip']); ?></span></td>
                <td><?php if($log['status'] == 1): ?><span class="badge bg-success">成功</span><?php else: ?><span class="badge bg-danger">失败</span><?php endif; ?></td>
                <td><small class="text-muted"><?php echo htmlentities((string) $log['remark']); ?></small></td>
                <td><small class="text-muted"><?php echo date('m-d H:i:s',$log['create_time']); ?></small></td>
              </tr>
              <?php endforeach; endif; else: echo "" ;endif; if(empty($loginLogs)): ?>
              <tr><td colspan="5" class="text-center text-muted py-3">暂无记录</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row mb-3" id="system-monitor">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="mdi mdi-monitor-dashboard"></i> 系统监控</h5>
        <small class="text-muted">更新时间: <span id="update-time">{{ updateTime }}</span></small>
      </div>
      <div class="card-body">
        <div class="row">
          <!-- 内存使用 -->
          <div class="col-md-3 mb-3">
            <div class="d-flex align-items-center">
              <div class="avatar-md rounded-circle bg-primary bg-opacity-10 me-3 d-flex align-items-center justify-content-center">
                <i class="mdi mdi-memory text-primary fs-4"></i>
              </div>
              <div>
                <h6 class="mb-1">内存使用</h6>
                <p class="mb-0 text-muted">{{ systemData.memory.system_used_format }} / {{ systemData.memory.system_total_format }}</p>
                <small class="text-muted">{{ systemData.memory.system_usage_percent }}%</small>
              </div>
            </div>
          </div>
          
          <!-- 磁盘使用 -->
          <div class="col-md-3 mb-3">
            <div class="d-flex align-items-center">
              <div class="avatar-md rounded-circle bg-success bg-opacity-10 me-3 d-flex align-items-center justify-content-center">
                <i class="mdi mdi-harddisk text-success fs-4"></i>
              </div>
              <div>
                <h6 class="mb-1">磁盘使用</h6>
                <p class="mb-0 text-muted">{{ systemData.disk.used_format }} / {{ systemData.disk.total_format }}</p>
                <small class="text-muted">{{ systemData.disk.usage_percent }}%</small>
              </div>
            </div>
          </div>
          
          <!-- CPU 负载 -->
          <div class="col-md-3 mb-3">
            <div class="d-flex align-items-center">
              <div class="avatar-md rounded-circle bg-info bg-opacity-10 me-3 d-flex align-items-center justify-content-center">
                <i class="mdi mdi-chip text-info fs-4"></i>
              </div>
              <div>
                <h6 class="mb-1">CPU 负载</h6>
                <p class="mb-0 text-muted">1分钟: {{ systemData.cpu.load_1min }}</p>
                <small class="text-muted">5分钟: {{ systemData.cpu.load_5min }}</small>
              </div>
            </div>
          </div>
          
          <!-- 数据库信息 -->
          <div class="col-md-3 mb-3">
            <div class="d-flex align-items-center">
              <div class="avatar-md rounded-circle bg-warning bg-opacity-10 me-3 d-flex align-items-center justify-content-center">
                <i class="mdi mdi-database text-warning fs-4"></i>
              </div>
              <div>
                <h6 class="mb-1">数据库</h6>
                <p class="mb-0 text-muted">{{ systemData.database.tables_count }} 张表 / {{ systemData.database.size_format }}</p>
                <small class="text-muted">MySQL {{ systemData.database.version }}</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- 系统信息卡片 -->
<div class="row mb-3">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <h5 class="mb-0"><i class="mdi mdi-information"></i> 系统信息</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <!-- PHP 信息 -->
          <div class="col-md-6 mb-3">
            <h6 class="border-bottom pb-2"><i class="mdi mdi-language-php"></i> PHP 信息</h6>
            <table class="table table-sm table-borderless">
              <tr>
                <td width="40%" class="text-muted">PHP 版本</td>
                <td><strong><?php echo PHP_VERSION; ?></strong></td>
              </tr>
              <tr>
                <td class="text-muted">运行方式</td>
                <td><?php echo php_sapi_name(); ?></td>
              </tr>
              <tr>
                <td class="text-muted">最大执行时间</td>
                <td><?php echo ini_get('max_execution_time'); ?> 秒</td>
              </tr>
              <tr>
                <td class="text-muted">内存限制</td>
                <td><?php echo ini_get('memory_limit'); ?></td>
              </tr>
              <tr>
                <td class="text-muted">上传限制</td>
                <td><?php echo ini_get('upload_max_filesize'); ?></td>
              </tr>
              <tr>
                <td class="text-muted">POST 限制</td>
                <td><?php echo ini_get('post_max_size'); ?></td>
              </tr>
            </table>
          </div>
          
          <!-- 服务器信息 -->
          <div class="col-md-6 mb-3">
            <h6 class="border-bottom pb-2"><i class="mdi mdi-server"></i> 服务器信息</h6>
            <table class="table table-sm table-borderless">
              <tr>
                <td width="40%" class="text-muted">操作系统</td>
                <td><?php 
                // 尝试获取 Linux 发行版信息
                if (file_exists('/etc/os-release')) {
                  $os_info = parse_ini_file('/etc/os-release');
                  echo isset($os_info['PRETTY_NAME']) ? $os_info['PRETTY_NAME'] : php_uname('s') . ' ' . php_uname('r');
                } else {
                  echo php_uname('s') . ' ' . php_uname('r');
                }
                 ?></td>
              </tr>
              <tr>
                <td class="text-muted">服务器软件</td>
                <td><?php echo isset($_SERVER['SERVER_SOFTWARE']) ? $_SERVER['SERVER_SOFTWARE'] : 'Webman/Workerman'; ?></td>
              </tr>
              <tr>
                <td class="text-muted">服务器IP</td>
                <td><?php 
                // 尝试多种方式获取 IP
                if (isset($_SERVER['SERVER_ADDR']) && $_SERVER['SERVER_ADDR']) {
                  echo $_SERVER['SERVER_ADDR'];
                } elseif (isset($_SERVER['LOCAL_ADDR']) && $_SERVER['LOCAL_ADDR']) {
                  echo $_SERVER['LOCAL_ADDR'];
                } else {
                  // 通过命令获取
                  $ip = shell_exec("hostname -I | awk '{print $1}'");
                  if ($ip) {
                    echo trim($ip);
                  } else {
                    $ip = gethostbyname(gethostname());
                    echo $ip != gethostname() ? $ip : '127.0.0.1';
                  }
                }
                 ?></td>
              </tr>
              <tr>
                <td class="text-muted">监听端口</td>
                <td><?php 
                // 从 process.php 配置文件获取端口
                $config_file = base_path() . '/config/process.php';
                if (file_exists($config_file)) {
                  $config = include $config_file;
                  if (isset($config['webman']['listen'])) {
                    $port = parse_url($config['webman']['listen'], PHP_URL_PORT);
                    echo $port ? $port : '8787';
                  } else {
                    echo '8787';
                  }
                } else {
                  echo isset($_SERVER['SERVER_PORT']) ? $_SERVER['SERVER_PORT'] : '8787';
                }
                 ?></td>
              </tr>
              <tr>
                <td class="text-muted">项目根目录</td>
                <td><small><?php echo base_path(); ?></small></td>
              </tr>
              <tr>
                <td class="text-muted">当前时间</td>
                <td><?php echo date('Y-m-d H:i:s'); ?></td>
              </tr>
            </table>
          </div>
          
          <!-- 框架信息 -->
          <div class="col-md-6 mb-3">
            <h6 class="border-bottom pb-2"><i class="mdi mdi-application"></i> 框架信息</h6>
            <table class="table table-sm table-borderless">
              <tr>
                <td width="40%" class="text-muted">Webman 版本</td>
                <td><strong><?php echo defined('WEBMAN_VERSION') ? WEBMAN_VERSION : (class_exists('Webman\App') ? '已安装' : '未知'); ?></strong></td>
              </tr>
              <tr>
                <td class="text-muted">ThinkORM 版本</td>
                <td><?php echo class_exists('think\facade\Db') ? '已安装' : '未安装'; ?></td>
              </tr>
              <tr>
                <td class="text-muted">项目路径</td>
                <td><small><?php echo base_path(); ?></small></td>
              </tr>
              <tr>
                <td class="text-muted">运行时路径</td>
                <td><small><?php echo runtime_path(); ?></small></td>
              </tr>
            </table>
          </div>
          
          <!-- PHP 扩展 -->
          <div class="col-md-6 mb-3">
            <h6 class="border-bottom pb-2"><i class="mdi mdi-puzzle"></i> PHP 扩展</h6>
            <div style="max-height: 200px; overflow-y: auto;">
              <div class="d-flex flex-wrap gap-1">
                <?php 
                $extensions = get_loaded_extensions();
                foreach ($extensions as $ext) {
                  echo '<span class="badge bg-secondary">' . $ext . '</span> ';
                }
                 ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</div>
<?php endif; ?>

<script type="text/javascript" src="/static/js/jquery.min.js"></script>
<script type="text/javascript" src="/static/js/popper.min.js"></script>
<script type="text/javascript" src="/static/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/static/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="/static/js/jquery.cookie.min.js"></script>
<script type="text/javascript" src="/static/layer/layer.js"></script>
<script src="/static/js/vue3.global.js"></script>
<script src="/static/sweetalert2/sweetalert2.js"></script>
<script src="/static/js/common.js"></script>
<script type="text/javascript" src="/static/js/main.min.js"></script>

<script>
// 系统监控自动刷新
createVueApp({
  data() {
    return {
      systemData: <?php echo json_encode($systemData); ?>,
      updateTime: '<?php echo date("H:i:s"); ?>',
      timer: null
    };
  },
  mounted() {
    this.startAutoRefresh();
  },
  beforeUnmount() {
    this.stopAutoRefresh();
  },
  methods: {
    async loadSystemData() {
      try {
        const res = await fetch(<?php echo url("index/get_system_data"); ?>).then(r => r.json());
        
        if (res.code === 0) {
          this.systemData = res.data;
          this.updateTime = new Date().toLocaleTimeString('zh-CN', { hour12: false });
        }
      } catch (e) {
        console.error('获取系统数据失败:', e);
      }
    },
    
    startAutoRefresh() {
      // 每5秒刷新一次
      this.timer = setInterval(() => {
        this.loadSystemData();
      }, 5000);
    },
    
    stopAutoRefresh() {
      if (this.timer) {
        clearInterval(this.timer);
        this.timer = null;
      }
    }
  }
}).mount('#system-monitor');
</script>


<script>
  function del(where,url='del'){
      Swal.fire({
          title: 'warning',
          type: 'error',
          html: '确定要删除吗??',
          showCancelButton: true,
          allowOutsideClick: false,
          confirmButtonText: 'OK',
          cancelButtonText: 'cancel'
      }).then(function (isConfirm) {
          if (isConfirm.value === true) {
              let ll = layer.load();
              console.log(typeof where)
              if(typeof where == 'number'){
                  where = {id:where}
              }
              $.post(url,where,res=>{
                  layer.close(ll)
                  Swal.fire({
                      title: res.code == 1 ? 'success' : 'error',
                      type: res.code == 1 ? 'success' : 'error',
                      html: res.msg,
                      allowOutsideClick: false,
                      customClass: {
                        confirmButton: 'btn' + (res.code == 1 ? ' btn-primary' : ' btn-danger')
                      }
                  }).then(function (isConfirm) {
                      if (isConfirm.value === true) {
                          res.code==1 && location.reload();
                          // location.reload();
                          // if (res.url !== undefined && res.url) {
                          //     // if (res.data._blank == 1) {
                          //     //     top.location.href = res.url;
                          //     // } else {
                          //         // window.location.href = res.url
                          //     // }
                          // }
                      }
                  });
              })
          }
      });
  }
  
</script>
</body>
</html>
