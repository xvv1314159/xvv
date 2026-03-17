<?php /*a:2:{s:56:"/www/wwwroot/www.xvv.cc/app/admin/view/plugin/index.html";i:1773770078;s:48:"/www/wwwroot/www.xvv.cc/app/admin/view/base.html";i:1773769974;}*/ ?>
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

<style>
.plugin-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
    gap: 20px;
}
.plugin-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,.07);
    border: 1px solid #c8d0e0;
    overflow: visible;
    transition: box-shadow .2s, transform .2s;
    display: flex;
    flex-direction: column;
}
.plugin-card:hover { box-shadow: 0 6px 24px rgba(0,0,0,.13); transform: translateY(-2px); }
.plugin-card-header {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 18px 20px 14px;
    border-bottom: 1px solid #c8d0e0;
}
.plugin-icon {
    width: 48px; height: 48px; border-radius: 10px;
    background: linear-gradient(135deg,#667eea,#764ba2);
    display: flex; align-items: center; justify-content: center;
    font-size: 22px; color: #fff; flex-shrink: 0;
}
.plugin-meta { flex: 1; min-width: 0; }
.plugin-name { font-size: 15px; font-weight: 700; color: #2d3748; margin: 0 0 3px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.plugin-version { font-size: 12px; color: #a0aec0; }
.plugin-badge { padding: 3px 10px; border-radius: 20px; font-size: 11px; font-weight: 600; white-space: nowrap; }
.badge-active   { background: #e6f9f0; color: #22863a; }
.badge-disabled { background: #fff3cd; color: #856404; }
.badge-uninstalled { background: #f0f0f0; color: #666; }
.plugin-card-body { padding: 14px 20px; flex: 1; }
.plugin-desc { font-size: 13px; color: #718096; line-height: 1.6; margin: 0 0 10px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
.plugin-info { display: flex; gap: 14px; font-size: 12px; color: #a0aec0; }
.plugin-card-footer { padding: 12px 20px; background: #fafafa; border-top: 1px solid #c8d0e0; display: flex; gap: 6px; flex-wrap: wrap; justify-content: space-between; align-items: center; }
.upload-zone { border: 2px dashed #d0d5dd; border-radius: 10px; padding: 32px; text-align: center; cursor: pointer; transition: border-color .2s, background .2s; }
.upload-zone:hover, .upload-zone.drag-over { border-color: #667eea; background: #f5f3ff; }
.upload-zone i { font-size: 36px; color: #a0aec0; }
#pluginModal .modal-body { padding: 0; overflow: hidden; }
#pluginModal iframe { width: 100%; height: 100%; border: none; display: block; }
</style>

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
        
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="mdi mdi-puzzle me-1"></i> 插件管理</h5>
        <!-- <a href="<?php echo url("Plugin/market"); ?>" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-store"></i> 插件市场</a> -->
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadModal">
          <i class="mdi mdi-upload"></i> 上传插件
        </button>
      </div>
      <div class="card-body">
        <?php if(empty($plugins)): ?>
        <div class="text-center text-muted py-5">
          <i class="mdi mdi-puzzle-outline" style="font-size:48px;opacity:.3"></i>
          <p class="mt-2">暂未发现任何插件，请先上传插件包</p>
        </div>
        <?php else: ?>
        <div class="plugin-grid">
          <?php foreach($plugins as $p): ?>
          <div class="plugin-card">
            <div class="plugin-card-header">
              <div class="plugin-icon"><i class="<?php echo htmlentities((string) $p['icon']); ?>"></i></div>
              <div class="plugin-meta">
                <div class="plugin-name"><?php echo htmlentities((string) $p['name']); ?></div>
                <div class="plugin-version">v<?php echo htmlentities((string) $p['version']); if($p['upgradable']): ?> <span class="badge bg-warning text-dark ms-1">可升级 v<?php echo htmlentities((string) $p['file_version']); ?></span><?php endif; ?> &nbsp;·&nbsp; <?php echo htmlentities((string) $p['author']); ?></div>
              </div>
              <?php if($p['installed'] == 1 && $p['status'] == 1): ?>
              <span class="plugin-badge badge-active">已启用</span>
              <?php elseif($p['installed'] == 1 && $p['status'] == 0): ?>
              <span class="plugin-badge badge-disabled">已停用</span>
              <?php else: ?>
              <span class="plugin-badge badge-uninstalled">未安装</span>
              <?php endif; ?>
            </div>
            <div class="plugin-card-body">
              <p class="plugin-desc"><?php echo htmlentities((string) (isset($p['description']) && ($p['description'] !== '')?$p['description']:'暂无描述')); ?></p>
              <div class="plugin-info">
                <span><i class="mdi mdi-identifier"></i> <?php echo htmlentities((string) $p['identifier']); ?></span>
                <span><i class="mdi mdi-clock-outline"></i> <?php echo htmlentities((string) $p['create_time']); ?></span>
              </div>
            </div>
            <div class="plugin-card-footer">
              <?php if($p['installed'] == 1 && $p['status'] == 1): ?>
                <button class="btn btn-sm btn-primary" onclick="openPluginAdmin('<?php echo htmlentities((string) $p['identifier']); ?>','<?php echo htmlentities((string) $p['name']); ?>','<?php echo htmlentities((string) $p['admin_entry']); ?>')"><i class="mdi mdi-open-in-new"></i> 进入管理</button>
                <?php if($isSuperAdmin): ?>
                <button class="btn btn-sm btn-outline-secondary" onclick="openPluginSetting('<?php echo htmlentities((string) $p['identifier']); ?>','<?php echo htmlentities((string) $p['name']); ?>')"><i class="mdi mdi-cog"></i> 设置</button>
                <?php endif; if($isSuperAdmin): ?>
                <div class="dropdown d-inline-block">
                  <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown"><i class="mdi mdi-dots-horizontal"></i> 更多</button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><button class="dropdown-item" onclick="openMenuManage('<?php echo htmlentities((string) $p['identifier']); ?>','<?php echo htmlentities((string) $p['name']); ?>')"><i class="mdi mdi-menu me-1"></i> 菜单管理</button></li>
                    <li><button class="dropdown-item" onclick="openConfigManage('<?php echo htmlentities((string) $p['identifier']); ?>','<?php echo htmlentities((string) $p['name']); ?>')"><i class="mdi mdi-tune me-1"></i> 配置项管理</button></li>
                    <li><hr class="dropdown-divider"></li>
                    <?php if($p['is_default'] == 0): ?><li><button class="dropdown-item text-success" onclick="pluginAction('setDefault','<?php echo htmlentities((string) $p['id']); ?>')"><i class="mdi mdi-star me-1"></i> 设为默认</button></li><?php else: ?><li><button class="dropdown-item text-warning" onclick="pluginAction('cancelDefault','<?php echo htmlentities((string) $p['id']); ?>')"><i class="mdi mdi-star-off me-1"></i> 取消默认</button></li><?php endif; ?>
                    <li><hr class="dropdown-divider"></li>
                    <li><button class="dropdown-item text-warning" onclick="pluginAction('disable','<?php echo htmlentities((string) $p['identifier']); ?>')"><i class="mdi mdi-pause me-1"></i> 停用</button></li>
                    <?php if($p['upgradable']): ?><li><hr class="dropdown-divider"></li>
                    <li><button class="dropdown-item text-success" onclick="pluginAction('upgrade','<?php echo htmlentities((string) $p['identifier']); ?>')"><i class="mdi mdi-arrow-up-circle me-1"></i> 升级到 v<?php echo htmlentities((string) $p['file_version']); ?></button></li><?php endif; ?>
                  </ul>
                </div>
                <?php endif; elseif($p['installed'] == 1 && $p['status'] == 0): ?>
                <button class="btn btn-sm btn-success" onclick="pluginAction('enable','<?php echo htmlentities((string) $p['identifier']); ?>')"><i class="mdi mdi-play"></i> 启用</button>
                <?php if($isSuperAdmin): ?>
                <button class="btn btn-sm btn-outline-secondary" onclick="openPluginSetting('<?php echo htmlentities((string) $p['identifier']); ?>','<?php echo htmlentities((string) $p['name']); ?>')"><i class="mdi mdi-cog"></i> 设置</button>
                <?php endif; if($isSuperAdmin): ?>
                <div class="dropdown d-inline-block">
                  <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown"><i class="mdi mdi-dots-horizontal"></i> 更多</button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><button class="dropdown-item" onclick="openMenuManage('<?php echo htmlentities((string) $p['identifier']); ?>','<?php echo htmlentities((string) $p['name']); ?>')"><i class="mdi mdi-menu me-1"></i> 菜单管理</button></li>
                    <li><button class="dropdown-item" onclick="openConfigManage('<?php echo htmlentities((string) $p['identifier']); ?>','<?php echo htmlentities((string) $p['name']); ?>')"><i class="mdi mdi-tune me-1"></i> 配置项管理</button></li>
                    <li><hr class="dropdown-divider"></li>
                    <?php if($p['is_default'] == 0): ?><li><button class="dropdown-item text-success" onclick="pluginAction('setDefault','<?php echo htmlentities((string) $p['id']); ?>')"><i class="mdi mdi-star me-1"></i> 设为默认</button></li><?php else: ?><li><button class="dropdown-item text-warning" onclick="pluginAction('cancelDefault','<?php echo htmlentities((string) $p['id']); ?>')"><i class="mdi mdi-star-off me-1"></i> 取消默认</button></li><?php endif; ?>
                    <li><hr class="dropdown-divider"></li>
                    <li><button class="dropdown-item text-danger" onclick="pluginAction('uninstall','<?php echo htmlentities((string) $p['identifier']); ?>')"><i class="mdi mdi-package-down me-1"></i> 卸载</button></li>
                  </ul>
                </div>
                <?php endif; else: ?>
                <button class="btn btn-sm btn-success" onclick="pluginAction('install','<?php echo htmlentities((string) $p['identifier']); ?>')"><i class="mdi mdi-package-down"></i> 安装</button>
              <?php endif; ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<!-- 进入管理 全屏模态框 -->
<div class="modal fade" id="pluginAdminModal" tabindex="-1">
  <div class="modal-dialog" style="width:96vw;max-width:96vw;height:94vh;margin:3vh auto">
    <div class="modal-content" style="height:100%">
      <div class="modal-header py-2">
        <h6 class="modal-title mb-0" id="pluginAdminModalTitle"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-0" style="height:calc(100% - 48px);overflow:hidden">
        <iframe id="pluginAdminIframe" src="" style="width:100%;height:100%;border:none;"></iframe>
      </div>
    </div>
  </div>
</div>

<!-- 上传插件 Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="mdi mdi-upload"></i> 上传插件包</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="upload-zone" id="uploadZone" onclick="document.getElementById('pluginZipInput').click()">
          <i class="mdi mdi-package-variant"></i>
          <p class="mt-2 mb-1" style="color:#4a5568;font-weight:600">点击选择或拖拽插件 ZIP 包</p>
          <p style="color:#a0aec0;font-size:13px">仅支持 .zip 格式，包内必须包含 config/app.php</p>
          <div id="uploadFileName" style="margin-top:8px;color:#667eea;font-size:13px"></div>
        </div>
        <input type="file" id="pluginZipInput" accept=".zip" style="display:none" onchange="onZipSelected(this)">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" id="uploadBtn" onclick="doUpload()" disabled>
          <i class="mdi mdi-upload"></i> 上传安装
        </button>
      </div>
    </div>
  </div>
</div>

<!-- 配置项管理 / 设置 大模态框 -->
<div class="modal fade" id="pluginModal" tabindex="-1">
  <div class="modal-dialog modal-xl" style="height:90vh;margin-top:5vh;margin-bottom:5vh">
    <div class="modal-content" style="height:100%">
      <div class="modal-header py-2">
        <h6 class="modal-title mb-0" id="pluginModalTitle"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-0" style="height:calc(100% - 48px);overflow:hidden">
        <iframe id="pluginModalIframe" src="" style="width:100%;height:100%;border:none;"></iframe>
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
  
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="mdi mdi-puzzle me-1"></i> 插件管理</h5>
        <!-- <a href="<?php echo url("Plugin/market"); ?>" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-store"></i> 插件市场</a> -->
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadModal">
          <i class="mdi mdi-upload"></i> 上传插件
        </button>
      </div>
      <div class="card-body">
        <?php if(empty($plugins)): ?>
        <div class="text-center text-muted py-5">
          <i class="mdi mdi-puzzle-outline" style="font-size:48px;opacity:.3"></i>
          <p class="mt-2">暂未发现任何插件，请先上传插件包</p>
        </div>
        <?php else: ?>
        <div class="plugin-grid">
          <?php foreach($plugins as $p): ?>
          <div class="plugin-card">
            <div class="plugin-card-header">
              <div class="plugin-icon"><i class="<?php echo htmlentities((string) $p['icon']); ?>"></i></div>
              <div class="plugin-meta">
                <div class="plugin-name"><?php echo htmlentities((string) $p['name']); ?></div>
                <div class="plugin-version">v<?php echo htmlentities((string) $p['version']); if($p['upgradable']): ?> <span class="badge bg-warning text-dark ms-1">可升级 v<?php echo htmlentities((string) $p['file_version']); ?></span><?php endif; ?> &nbsp;·&nbsp; <?php echo htmlentities((string) $p['author']); ?></div>
              </div>
              <?php if($p['installed'] == 1 && $p['status'] == 1): ?>
              <span class="plugin-badge badge-active">已启用</span>
              <?php elseif($p['installed'] == 1 && $p['status'] == 0): ?>
              <span class="plugin-badge badge-disabled">已停用</span>
              <?php else: ?>
              <span class="plugin-badge badge-uninstalled">未安装</span>
              <?php endif; ?>
            </div>
            <div class="plugin-card-body">
              <p class="plugin-desc"><?php echo htmlentities((string) (isset($p['description']) && ($p['description'] !== '')?$p['description']:'暂无描述')); ?></p>
              <div class="plugin-info">
                <span><i class="mdi mdi-identifier"></i> <?php echo htmlentities((string) $p['identifier']); ?></span>
                <span><i class="mdi mdi-clock-outline"></i> <?php echo htmlentities((string) $p['create_time']); ?></span>
              </div>
            </div>
            <div class="plugin-card-footer">
              <?php if($p['installed'] == 1 && $p['status'] == 1): ?>
                <button class="btn btn-sm btn-primary" onclick="openPluginAdmin('<?php echo htmlentities((string) $p['identifier']); ?>','<?php echo htmlentities((string) $p['name']); ?>','<?php echo htmlentities((string) $p['admin_entry']); ?>')"><i class="mdi mdi-open-in-new"></i> 进入管理</button>
                <?php if($isSuperAdmin): ?>
                <button class="btn btn-sm btn-outline-secondary" onclick="openPluginSetting('<?php echo htmlentities((string) $p['identifier']); ?>','<?php echo htmlentities((string) $p['name']); ?>')"><i class="mdi mdi-cog"></i> 设置</button>
                <?php endif; if($isSuperAdmin): ?>
                <div class="dropdown d-inline-block">
                  <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown"><i class="mdi mdi-dots-horizontal"></i> 更多</button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><button class="dropdown-item" onclick="openMenuManage('<?php echo htmlentities((string) $p['identifier']); ?>','<?php echo htmlentities((string) $p['name']); ?>')"><i class="mdi mdi-menu me-1"></i> 菜单管理</button></li>
                    <li><button class="dropdown-item" onclick="openConfigManage('<?php echo htmlentities((string) $p['identifier']); ?>','<?php echo htmlentities((string) $p['name']); ?>')"><i class="mdi mdi-tune me-1"></i> 配置项管理</button></li>
                    <li><hr class="dropdown-divider"></li>
                    <?php if($p['is_default'] == 0): ?><li><button class="dropdown-item text-success" onclick="pluginAction('setDefault','<?php echo htmlentities((string) $p['id']); ?>')"><i class="mdi mdi-star me-1"></i> 设为默认</button></li><?php else: ?><li><button class="dropdown-item text-warning" onclick="pluginAction('cancelDefault','<?php echo htmlentities((string) $p['id']); ?>')"><i class="mdi mdi-star-off me-1"></i> 取消默认</button></li><?php endif; ?>
                    <li><hr class="dropdown-divider"></li>
                    <li><button class="dropdown-item text-warning" onclick="pluginAction('disable','<?php echo htmlentities((string) $p['identifier']); ?>')"><i class="mdi mdi-pause me-1"></i> 停用</button></li>
                    <?php if($p['upgradable']): ?><li><hr class="dropdown-divider"></li>
                    <li><button class="dropdown-item text-success" onclick="pluginAction('upgrade','<?php echo htmlentities((string) $p['identifier']); ?>')"><i class="mdi mdi-arrow-up-circle me-1"></i> 升级到 v<?php echo htmlentities((string) $p['file_version']); ?></button></li><?php endif; ?>
                  </ul>
                </div>
                <?php endif; elseif($p['installed'] == 1 && $p['status'] == 0): ?>
                <button class="btn btn-sm btn-success" onclick="pluginAction('enable','<?php echo htmlentities((string) $p['identifier']); ?>')"><i class="mdi mdi-play"></i> 启用</button>
                <?php if($isSuperAdmin): ?>
                <button class="btn btn-sm btn-outline-secondary" onclick="openPluginSetting('<?php echo htmlentities((string) $p['identifier']); ?>','<?php echo htmlentities((string) $p['name']); ?>')"><i class="mdi mdi-cog"></i> 设置</button>
                <?php endif; if($isSuperAdmin): ?>
                <div class="dropdown d-inline-block">
                  <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown"><i class="mdi mdi-dots-horizontal"></i> 更多</button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><button class="dropdown-item" onclick="openMenuManage('<?php echo htmlentities((string) $p['identifier']); ?>','<?php echo htmlentities((string) $p['name']); ?>')"><i class="mdi mdi-menu me-1"></i> 菜单管理</button></li>
                    <li><button class="dropdown-item" onclick="openConfigManage('<?php echo htmlentities((string) $p['identifier']); ?>','<?php echo htmlentities((string) $p['name']); ?>')"><i class="mdi mdi-tune me-1"></i> 配置项管理</button></li>
                    <li><hr class="dropdown-divider"></li>
                    <?php if($p['is_default'] == 0): ?><li><button class="dropdown-item text-success" onclick="pluginAction('setDefault','<?php echo htmlentities((string) $p['id']); ?>')"><i class="mdi mdi-star me-1"></i> 设为默认</button></li><?php else: ?><li><button class="dropdown-item text-warning" onclick="pluginAction('cancelDefault','<?php echo htmlentities((string) $p['id']); ?>')"><i class="mdi mdi-star-off me-1"></i> 取消默认</button></li><?php endif; ?>
                    <li><hr class="dropdown-divider"></li>
                    <li><button class="dropdown-item text-danger" onclick="pluginAction('uninstall','<?php echo htmlentities((string) $p['identifier']); ?>')"><i class="mdi mdi-package-down me-1"></i> 卸载</button></li>
                  </ul>
                </div>
                <?php endif; else: ?>
                <button class="btn btn-sm btn-success" onclick="pluginAction('install','<?php echo htmlentities((string) $p['identifier']); ?>')"><i class="mdi mdi-package-down"></i> 安装</button>
              <?php endif; ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<!-- 进入管理 全屏模态框 -->
<div class="modal fade" id="pluginAdminModal" tabindex="-1">
  <div class="modal-dialog" style="width:96vw;max-width:96vw;height:94vh;margin:3vh auto">
    <div class="modal-content" style="height:100%">
      <div class="modal-header py-2">
        <h6 class="modal-title mb-0" id="pluginAdminModalTitle"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-0" style="height:calc(100% - 48px);overflow:hidden">
        <iframe id="pluginAdminIframe" src="" style="width:100%;height:100%;border:none;"></iframe>
      </div>
    </div>
  </div>
</div>

<!-- 上传插件 Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="mdi mdi-upload"></i> 上传插件包</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="upload-zone" id="uploadZone" onclick="document.getElementById('pluginZipInput').click()">
          <i class="mdi mdi-package-variant"></i>
          <p class="mt-2 mb-1" style="color:#4a5568;font-weight:600">点击选择或拖拽插件 ZIP 包</p>
          <p style="color:#a0aec0;font-size:13px">仅支持 .zip 格式，包内必须包含 config/app.php</p>
          <div id="uploadFileName" style="margin-top:8px;color:#667eea;font-size:13px"></div>
        </div>
        <input type="file" id="pluginZipInput" accept=".zip" style="display:none" onchange="onZipSelected(this)">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" id="uploadBtn" onclick="doUpload()" disabled>
          <i class="mdi mdi-upload"></i> 上传安装
        </button>
      </div>
    </div>
  </div>
</div>

<!-- 配置项管理 / 设置 大模态框 -->
<div class="modal fade" id="pluginModal" tabindex="-1">
  <div class="modal-dialog modal-xl" style="height:90vh;margin-top:5vh;margin-bottom:5vh">
    <div class="modal-content" style="height:100%">
      <div class="modal-header py-2">
        <h6 class="modal-title mb-0" id="pluginModalTitle"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-0" style="height:calc(100% - 48px);overflow:hidden">
        <iframe id="pluginModalIframe" src="" style="width:100%;height:100%;border:none;"></iframe>
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
const _app = createVueApp({
    data() {
        return { uploadFile: null };
    },
    mounted() {
        document.getElementById('pluginModal').addEventListener('hidden.bs.modal', () => {
            document.getElementById('pluginModalIframe').src = '';
        });
        document.getElementById('pluginAdminModal').addEventListener('hidden.bs.modal', () => {
            document.getElementById('pluginAdminIframe').src = '';
        });
        const zone = document.getElementById('uploadZone');
        zone.addEventListener('dragover', e => { e.preventDefault(); zone.classList.add('drag-over'); });
        zone.addEventListener('dragleave', () => zone.classList.remove('drag-over'));
        zone.addEventListener('drop', e => {
            e.preventDefault(); zone.classList.remove('drag-over');
            const file = e.dataTransfer.files[0];
            if (file) this.setUploadFile(file);
        });
    },
    methods: {
        openPluginAdmin(identifier, name, entry) {
          console.log(entry);
            document.getElementById('pluginAdminModalTitle').textContent = name + ' · 管理后台';
            // entry 优先，否则降级到 /plugin/{id}/admin/index
            const url = entry || ('/app/' + identifier + '/admin/index');
            document.getElementById('pluginAdminIframe').src = url;
            new bootstrap.Modal(document.getElementById('pluginAdminModal')).show();
        },
        openMenuManage(identifier, name) {
            document.getElementById('pluginModalTitle').textContent = name + ' · 菜单管理';
            document.getElementById('pluginModalIframe').src = '<?php echo url("Rule/index"); ?>?plugin=' + identifier + '&iframe=1';
            new bootstrap.Modal(document.getElementById('pluginModal')).show();
        },
        openConfigManage(identifier, name) {
            document.getElementById('pluginModalTitle').textContent = name + ' · 配置项管理';
            document.getElementById('pluginModalIframe').src = '<?php echo url("Config/group_index"); ?>?plugin=' + identifier + '&iframe=1';
            new bootstrap.Modal(document.getElementById('pluginModal')).show();
        },
        openPluginSetting(identifier, name) {
            document.getElementById('pluginModalTitle').textContent = name + ' · 插件设置';
            document.getElementById('pluginModalIframe').src = '<?php echo url("Config/index"); ?>?plugin=' + identifier + '&iframe=1';
            new bootstrap.Modal(document.getElementById('pluginModal')).show();
        },
        pluginAction(action, identifier) {
            const msgs = {
                install:       '确定要安装该插件吗？',
                uninstall:     '确定要卸载吗？数据将保留，可重新安装恢复。',
                enable:        '确定要启用该插件吗？',
                disable:       '确定要停用该插件吗？后台菜单将立即隐藏。',
                upgrade:       '确定要升级该插件吗？升级前建议备份数据库。',
                setDefault:    '确定要设为默认插件吗？前台首页将直接调用该插件。',
                cancelDefault: '确定要取消默认设置吗？',
            };
            this.confirm(msgs[action], () => {
                const url = (action === 'setDefault')
                    ? '<?php echo url("Plugin/set_default"); ?>'
                    : (action === 'cancelDefault')
                    ? '<?php echo url("Plugin/cancel_default"); ?>'
                    : ('<?php echo url("Plugin/index"); ?>').replace('index', action);
                const data = (action === 'setDefault' || action === 'cancelDefault')
                    ? { id: identifier }
                    : { identifier };
                this.post(url, data, res => {
                    this.alert(res, () => { if (res.code == 1) location.reload(); });
                });
            });
        },
        onZipSelected(input) {
            const file = input.files[0];
            if (file) this.setUploadFile(file);
        },
        setUploadFile(file) {
            this.uploadFile = file;
            document.getElementById('uploadFileName').textContent = '已选择：' + file.name;
            document.getElementById('uploadBtn').disabled = false;
        },
        doUpload() {
            if (!this.uploadFile) return;
            const btn = document.getElementById('uploadBtn');
            btn.disabled = true;
            btn.innerHTML = '<i class="mdi mdi-loading mdi-spin"></i> 上传中...';
            const fd = new FormData();
            fd.append('plugin_zip', this.uploadFile);
            this.ajax(<?php echo url("plugin/upload"); ?>, fd, res => {
                bootstrap.Modal.getInstance(document.getElementById('uploadModal')).hide();
                this.alert(res, () => { if (res.code == 1) location.reload(); });
                btn.disabled = false;
                btn.innerHTML = '<i class="mdi mdi-upload"></i> 上传安装';
            });
        }
    }
});
// 挂载并暴露方法供模板 onclick 调用
const _vm = _app.mount('#app');
window.openPluginAdmin = (id, name, entry) => _vm.openPluginAdmin(id, name, entry);
window.openMenuManage = (id, name) => _vm.openMenuManage(id, name);
window.openConfigManage = (id, name) => _vm.openConfigManage(id, name);
window.openPluginSetting = (id, name) => _vm.openPluginSetting(id, name);
window.pluginAction = (action, id) => _vm.pluginAction(action, id);
window.onZipSelected = (input) => _vm.onZipSelected(input);
window.doUpload = () => _vm.doUpload();
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
