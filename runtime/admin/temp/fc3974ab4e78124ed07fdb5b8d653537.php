<?php /*a:2:{s:58:"/www/wwwroot/www.xvv.cc/app/admin/view/dev/form_build.html";i:1773769974;s:48:"/www/wwwroot/www.xvv.cc/app/admin/view/base.html";i:1773769974;}*/ ?>
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

<link rel="stylesheet" href="/static/js/prism/prism-tomorrow.min.css">
<link href="/static/wangeditor/style.css" rel="stylesheet"/>
<style>
.component-btn {
    cursor: pointer;
    user-select: none;
    transition: all 0.2s;
}
.component-btn:hover {
    background-color: #0d6efd !important;
    color: white !important;
    transform: translateX(5px);
}
.form-builder-container {
    height: calc(100vh - 120px);
    overflow: hidden;
}
.left-panel {
    height: 100%;
    overflow-y: auto;
}
.center-panel {
    height: 100%;
    display: flex;
    flex-direction: column;
}
.center-panel .card {
    height: 100%;
    display: flex;
    flex-direction: column;
}
.center-panel .card-body {
    flex: 1;
    overflow-y: auto;
}
.right-panel {
    height: 100%;
    display: flex;
    flex-direction: column;
}
.right-panel .card {
    display: flex;
    flex-direction: column;
}
.right-panel .card-body {
    flex: 1;
    overflow-y: auto;
    padding: 0;
}
.form-preview {
    min-height: 100%;
    border: 2px dashed #dee2e6;
    border-radius: 0.25rem;
    padding: 1rem;
}
.form-item {
    position: relative;
    padding: 0.75rem;
    margin-bottom: 0.5rem;
    border: 1px solid #dee2e6;
    border-radius: 0.25rem;
    cursor: move;
    transition: all 0.3s;
}
.form-item:hover {
    border-color: #0d6efd;
    background-color: #f8f9fa;
}
.form-item.active {
    border-color: #0d6efd;
    background-color: #e7f1ff;
}
.form-item-actions {
    position: absolute;
    top: 0.5rem;
    right: 0.5rem;
    display: none;
}
.form-item:hover .form-item-actions,
.form-item.active .form-item-actions {
    display: block;
}
.drag-over {
    background-color: #e7f1ff;
    border-color: #0d6efd;
}
.code-area {
    font-family: 'Courier New', monospace;
    font-size: 13px;
    line-height: 1.5;
    background-color: #2d2d2d;
    color: #ccc;
    border: 1px solid #dee2e6;
    border-radius: 0.25rem;
    padding: 1rem;
    overflow: auto;
    white-space: pre;
    tab-size: 4;
    min-height: 100%;
    height: 100%;
    margin: 0;
}
.code-area::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}
.code-area::-webkit-scrollbar-track {
    background: #1e1e1e;
}
.code-area::-webkit-scrollbar-thumb {
    background: #555;
    border-radius: 4px;
}
.code-area::-webkit-scrollbar-thumb:hover {
    background: #777;
}
.config-card .card-body,
.code-card .card-body {
    height: 100%;
    display: flex;
    flex-direction: column;
}
.wrapper {
    border: 1px solid #ccc;
    z-index: 100;
}
.toolbar {
    border-bottom: 1px solid #ccc; 
}
.editor {
    height: 300px; 
}
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
        
<div id="formBuilder">
    <div class="row form-builder-container">
        <!-- 左侧组件列表 -->
        <div class="col-md-2 left-panel">
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">
                    <i class="mdi mdi-widgets"></i> 基础组件
                </div>
                <div class="card-body p-2">
                    <button type="button" 
                            v-for="comp in basicComponents" 
                            :key="comp.type"
                            class="mb-2 btn btn-sm btn-outline-dark w-100 component-btn"
                            @click="addComponent(comp)">
                        <i :class="comp.icon"></i> {{ comp.label }}
                    </button>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-success text-white">
                    <i class="mdi mdi-star"></i> 高级组件
                </div>
                <div class="card-body p-2">
                    <button type="button" 
                            v-for="comp in advancedComponents" 
                            :key="comp.type"
                            class="mb-2 btn btn-sm btn-outline-dark w-100 component-btn"
                            @click="addComponent(comp)">
                        <i :class="comp.icon"></i> {{ comp.label }}
                    </button>
                </div>
            </div>
        </div>

        <!-- 中间预览区域 -->
        <div class="col-md-5 center-panel">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="mdi mdi-eye"></i> 表单预览</span>
                    <div>
                        <button class="btn btn-sm btn-outline-danger" @click="clearForm">
                            <i class="mdi mdi-delete"></i> 清空
                        </button>
                        <button class="btn btn-sm btn-outline-primary" @click="previewForm">
                            <i class="mdi mdi-play"></i> 预览
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-preview">
                        <div v-if="formItems.length === 0" class="text-center text-muted py-5">
                            <i class="mdi mdi-cursor-pointer" style="font-size: 48px;"></i>
                            <p class="mt-3">点击左侧组件添加到表单</p>
                        </div>
                        <div v-for="(item, index) in formItems" 
                             :key="index"
                             class="form-item"
                             :class="{active: activeIndex === index}"
                             draggable="true"
                             @dragstart="dragStartItem($event, index)"
                             @dragover.prevent="dragOverItem($event, index)"
                             @drop.stop="dropItem($event, index)"
                             @click="selectItem(index)">
                            <div class="form-item-actions">
                                <button class="btn btn-sm btn-outline-primary me-1" @click.stop="copyItem(index)">
                                    <i class="mdi mdi-content-copy"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" @click.stop="deleteItem(index)">
                                    <i class="mdi mdi-delete"></i>
                                </button>
                            </div>
                            <component :is="'form-' + item.type" :config="item"></component>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 右侧配置和代码 -->
        <div class="col-md-5 right-panel">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="mdi mdi-code-tags"></i> 完整页面代码</span>
                </div>
                <div class="card-body p-0 position-relative">
                    <button class="btn btn-sm btn-primary position-absolute top-0 end-0 m-2" 
                            @click="copyFullCode" 
                            style="z-index: 10;"
                            title="复制代码">
                        <i class="mdi mdi-content-copy"></i> 复制
                    </button>
                    <pre class="code-area border-0 m-0"><code class="language-html" v-text="fullCode"></code></pre>
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
  
<div id="formBuilder">
    <div class="row form-builder-container">
        <!-- 左侧组件列表 -->
        <div class="col-md-2 left-panel">
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">
                    <i class="mdi mdi-widgets"></i> 基础组件
                </div>
                <div class="card-body p-2">
                    <button type="button" 
                            v-for="comp in basicComponents" 
                            :key="comp.type"
                            class="mb-2 btn btn-sm btn-outline-dark w-100 component-btn"
                            @click="addComponent(comp)">
                        <i :class="comp.icon"></i> {{ comp.label }}
                    </button>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-success text-white">
                    <i class="mdi mdi-star"></i> 高级组件
                </div>
                <div class="card-body p-2">
                    <button type="button" 
                            v-for="comp in advancedComponents" 
                            :key="comp.type"
                            class="mb-2 btn btn-sm btn-outline-dark w-100 component-btn"
                            @click="addComponent(comp)">
                        <i :class="comp.icon"></i> {{ comp.label }}
                    </button>
                </div>
            </div>
        </div>

        <!-- 中间预览区域 -->
        <div class="col-md-5 center-panel">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="mdi mdi-eye"></i> 表单预览</span>
                    <div>
                        <button class="btn btn-sm btn-outline-danger" @click="clearForm">
                            <i class="mdi mdi-delete"></i> 清空
                        </button>
                        <button class="btn btn-sm btn-outline-primary" @click="previewForm">
                            <i class="mdi mdi-play"></i> 预览
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-preview">
                        <div v-if="formItems.length === 0" class="text-center text-muted py-5">
                            <i class="mdi mdi-cursor-pointer" style="font-size: 48px;"></i>
                            <p class="mt-3">点击左侧组件添加到表单</p>
                        </div>
                        <div v-for="(item, index) in formItems" 
                             :key="index"
                             class="form-item"
                             :class="{active: activeIndex === index}"
                             draggable="true"
                             @dragstart="dragStartItem($event, index)"
                             @dragover.prevent="dragOverItem($event, index)"
                             @drop.stop="dropItem($event, index)"
                             @click="selectItem(index)">
                            <div class="form-item-actions">
                                <button class="btn btn-sm btn-outline-primary me-1" @click.stop="copyItem(index)">
                                    <i class="mdi mdi-content-copy"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" @click.stop="deleteItem(index)">
                                    <i class="mdi mdi-delete"></i>
                                </button>
                            </div>
                            <component :is="'form-' + item.type" :config="item"></component>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 右侧配置和代码 -->
        <div class="col-md-5 right-panel">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="mdi mdi-code-tags"></i> 完整页面代码</span>
                </div>
                <div class="card-body p-0 position-relative">
                    <button class="btn btn-sm btn-primary position-absolute top-0 end-0 m-2" 
                            @click="copyFullCode" 
                            style="z-index: 10;"
                            title="复制代码">
                        <i class="mdi mdi-content-copy"></i> 复制
                    </button>
                    <pre class="code-area border-0 m-0"><code class="language-html" v-text="fullCode"></code></pre>
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
// 禁用 storage 访问警告
try {
    localStorage.setItem('test', 'test');
    localStorage.removeItem('test');
} catch (e) {
    // Storage 被阻止，静默处理
}

// 定义表单组件对象
const formComponents = {
    'form-input': {
        props: ['config'],
        template: `
            <div class="mb-3">
                <label class="form-label">{{ config.label }} <span v-if="config.required" class="text-danger">*</span></label>
                <input type="text" class="form-control" :placeholder="config.placeholder" :required="config.required">
            </div>
        `
    },
    'form-password': {
        props: ['config'],
    template: `
        <div class="mb-3">
            <label class="form-label">{{ config.label }} <span v-if="config.required" class="text-danger">*</span></label>
            <input type="password" class="form-control" :placeholder="config.placeholder" :required="config.required">
        </div>
    `
    },

    'form-textarea': {
    props: ['config'],
    template: `
        <div class="mb-3">
            <label class="form-label">{{ config.label }} <span v-if="config.required" class="text-danger">*</span></label>
            <textarea class="form-control" rows="3" :placeholder="config.placeholder" :required="config.required"></textarea>
        </div>
    `
    },

    'form-select': {
    props: ['config'],
    template: `
        <div class="mb-3">
            <label class="form-label">{{ config.label }} <span v-if="config.required" class="text-danger">*</span></label>
            <select class="form-select" :required="config.required">
                <option value="">请选择</option>
                <option v-for="opt in config.options" :key="opt.value" :value="opt.value">{{ opt.label }}</option>
            </select>
        </div>
    `
    },

    'form-radio': {
    props: ['config'],
    template: `
        <div class="mb-3">
            <label class="form-label d-block">{{ config.label }} <span v-if="config.required" class="text-danger">*</span></label>
            <div class="form-check form-check-inline" v-for="opt in config.options" :key="opt.value">
                <input class="form-check-input" type="radio" :name="config.name" :value="opt.value" :id="config.name + '_' + opt.value" :required="config.required">
                <label class="form-check-label" :for="config.name + '_' + opt.value">{{ opt.label }}</label>
            </div>
        </div>
    `
    },

    'form-checkbox': {
    props: ['config'],
    template: `
        <div class="mb-3">
            <label class="form-label d-block">{{ config.label }} <span v-if="config.required" class="text-danger">*</span></label>
            <div class="form-check" v-for="opt in config.options" :key="opt.value">
                <input class="form-check-input" type="checkbox" :value="opt.value" :id="config.name + '_' + opt.value">
                <label class="form-check-label" :for="config.name + '_' + opt.value">{{ opt.label }}</label>
            </div>
        </div>
    `
    },

    'form-switch': {
    props: ['config'],
    template: `
        <div class="mb-3">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch">
                <label class="form-check-label">{{ config.label }}</label>
            </div>
        </div>
    `
    },

    'form-number': {
    props: ['config'],
    template: `
        <div class="mb-3">
            <label class="form-label">{{ config.label }} <span v-if="config.required" class="text-danger">*</span></label>
            <input type="number" class="form-control" :placeholder="config.placeholder" :required="config.required">
        </div>
    `
    },

    'form-date': {
    props: ['config'],
    template: `
        <div class="mb-3">
            <label class="form-label">{{ config.label }} <span v-if="config.required" class="text-danger">*</span></label>
            <input type="date" class="form-control" :required="config.required">
        </div>
    `
    },

    'form-image': {
    props: ['config'],
    data() {
        return {
            preview: null
        }
    },
    methods: {
        handleFileChange(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.preview = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        },
        removeImage() {
            this.preview = null;
            this.$refs.fileInput.value = '';
        }
    },
    template: `
        <div class="mb-3">
            <label class="form-label">{{ config.label }} <span v-if="config.required" class="text-danger">*</span></label>
            <input type="file" 
                   ref="fileInput"
                   class="form-control" 
                   accept="image/*" 
                   :required="config.required"
                   @change="handleFileChange"
                   v-show="!preview">
            <div v-if="preview" class="mt-2 position-relative d-inline-block">
                <img :src="preview" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                <button type="button" 
                        class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1"
                        @click="removeImage">
                    <i class="mdi mdi-close"></i>
                </button>
            </div>
            <small class="text-muted d-block mt-1">支持 jpg, png, gif 等图片格式</small>
        </div>
    `
    },

    'form-images': {
    props: ['config'],
    data() {
        return {
            previews: [],
            draggedIndex: null
        }
    },
    methods: {
        handleFileChange(e) {
            const files = Array.from(e.target.files);
            files.forEach(file => {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.previews.push({
                        url: e.target.result,
                        name: file.name
                    });
                };
                reader.readAsDataURL(file);
            });
        },
        removeImage(index) {
            this.previews.splice(index, 1);
            if (this.previews.length === 0) {
                this.$refs.fileInput.value = '';
            }
        },
        dragStart(index) {
            this.draggedIndex = index;
        },
        dragOver(e, index) {
            e.preventDefault();
            if (this.draggedIndex !== null && this.draggedIndex !== index) {
                const item = this.previews.splice(this.draggedIndex, 1)[0];
                this.previews.splice(index, 0, item);
                this.draggedIndex = index;
            }
        },
        dragEnd() {
            this.draggedIndex = null;
        }
    },
    template: `
        <div class="mb-3">
            <label class="form-label">{{ config.label }} <span v-if="config.required" class="text-danger">*</span></label>
            <input type="file" 
                   ref="fileInput"
                   class="form-control" 
                   accept="image/*" 
                   multiple 
                   :required="config.required"
                   @change="handleFileChange">
            <div v-if="previews.length > 0" class="mt-2 d-flex flex-wrap gap-2">
                <div v-for="(preview, index) in previews" 
                     :key="index" 
                     class="position-relative d-inline-block"
                     draggable="true"
                     @dragstart="dragStart(index)"
                     @dragover="dragOver($event, index)"
                     @dragend="dragEnd"
                     style="cursor: move;">
                    <img :src="preview.url" class="img-thumbnail" style="width: 120px; height: 120px; object-fit: cover;">
                    <button type="button" 
                            class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1"
                            @click="removeImage(index)"
                            style="cursor: pointer;">
                        <i class="mdi mdi-close"></i>
                    </button>
                    <div class="position-absolute bottom-0 start-0 m-1 badge bg-dark">{{ index + 1 }}</div>
                </div>
            </div>
            <small class="text-muted d-block mt-1">可选择多张图片，拖拽可排序</small>
        </div>
    `
    },

    'form-file': {
    props: ['config'],
    template: `
        <div class="mb-3">
            <label class="form-label">{{ config.label }} <span v-if="config.required" class="text-danger">*</span></label>
            <input type="file" class="form-control" :required="config.required">
        </div>
    `
    },

    'form-files': {
    props: ['config'],
    template: `
        <div class="mb-3">
            <label class="form-label">{{ config.label }} <span v-if="config.required" class="text-danger">*</span></label>
            <input type="file" class="form-control" multiple :required="config.required">
            <small class="text-muted">可选择多个文件</small>
        </div>
    `
    },

    'form-video': {
    props: ['config'],
    data() {
        return {
            preview: null
        }
    },
    methods: {
        handleFileChange(e) {
            const file = e.target.files[0];
            if (file) {
                const url = URL.createObjectURL(file);
                this.preview = url;
            }
        },
        removeVideo() {
            if (this.preview) {
                URL.revokeObjectURL(this.preview);
            }
            this.preview = null;
            this.$refs.fileInput.value = '';
        }
    },
    template: `
        <div class="mb-3">
            <label class="form-label">{{ config.label }} <span v-if="config.required" class="text-danger">*</span></label>
            <input type="file" 
                   ref="fileInput"
                   class="form-control" 
                   accept="video/*" 
                   :required="config.required"
                   @change="handleFileChange"
                   v-show="!preview">
            <div v-if="preview" class="mt-2 position-relative d-inline-block">
                <video :src="preview" 
                       controls 
                       class="border rounded" 
                       style="max-width: 400px; max-height: 300px;">
                </video>
                <button type="button" 
                        class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1"
                        @click="removeVideo">
                    <i class="mdi mdi-close"></i>
                </button>
            </div>
            <small class="text-muted d-block mt-1">支持 mp4, avi, mov 等视频格式</small>
        </div>
    `
    },

    'form-videos': {
    props: ['config'],
    data() {
        return {
            previews: [],
            draggedIndex: null
        }
    },
    methods: {
        handleFileChange(e) {
            const files = Array.from(e.target.files);
            files.forEach(file => {
                const url = URL.createObjectURL(file);
                this.previews.push({
                    url: url,
                    name: file.name
                });
            });
        },
        removeVideo(index) {
            URL.revokeObjectURL(this.previews[index].url);
            this.previews.splice(index, 1);
            if (this.previews.length === 0) {
                this.$refs.fileInput.value = '';
            }
        },
        dragStart(index) {
            this.draggedIndex = index;
        },
        dragOver(e, index) {
            e.preventDefault();
            if (this.draggedIndex !== null && this.draggedIndex !== index) {
                const item = this.previews.splice(this.draggedIndex, 1)[0];
                this.previews.splice(index, 0, item);
                this.draggedIndex = index;
            }
        },
        dragEnd() {
            this.draggedIndex = null;
        }
    },
    template: `
        <div class="mb-3">
            <label class="form-label">{{ config.label }} <span v-if="config.required" class="text-danger">*</span></label>
            <input type="file" 
                   ref="fileInput"
                   class="form-control" 
                   accept="video/*" 
                   multiple 
                   :required="config.required"
                   @change="handleFileChange">
            <div v-if="previews.length > 0" class="mt-2 d-flex flex-wrap gap-2">
                <div v-for="(preview, index) in previews" 
                     :key="index" 
                     class="position-relative d-inline-block"
                     draggable="true"
                     @dragstart="dragStart(index)"
                     @dragover="dragOver($event, index)"
                     @dragend="dragEnd"
                     style="cursor: move;">
                    <video :src="preview.url" 
                           controls 
                           class="border rounded" 
                           style="width: 200px; height: 150px;">
                    </video>
                    <button type="button" 
                            class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1"
                            @click="removeVideo(index)"
                            style="cursor: pointer;">
                        <i class="mdi mdi-close"></i>
                    </button>
                    <div class="position-absolute bottom-0 start-0 m-1 badge bg-dark">{{ index + 1 }}</div>
                    <small class="d-block text-center text-muted mt-1">{{ preview.name }}</small>
                </div>
            </div>
            <small class="text-muted d-block mt-1">可选择多个视频，拖拽可排序</small>
        </div>
    `
    },

// Editor 富文本编辑器组件
    'form-editor': {
    props: ['config'],
    data() {
        return {
            editor: null,
            editorId: 'editor_' + Math.random().toString(36).substr(2, 9)
        }
    },
    mounted() {
        this.$nextTick(() => {
            this.initEditor();
        });
    },
    beforeDestroy() {
        if (this.editor) {
            this.editor.destroy();
        }
    },
    methods: {
        initEditor() {
            if (typeof window.wangEditor === 'undefined') {
                console.error('wangEditor 未加载');
                return;
            }
            const { createEditor, createToolbar } = window.wangEditor;
            
            this.editor = createEditor({
                selector: '.editor-' + this.editorId,
                html: '<p>这是富文本编辑器预览</p>',
                config: {
                    placeholder: this.config.placeholder || '请输入内容',
                    readOnly: true
                },
                mode: 'default'
            });
            
            createToolbar({
                editor: this.editor,
                selector: '.toolbar-' + this.editorId,
                mode: 'default'
            });
        }
    },
    template: `
        <div class="mb-3">
            <label class="form-label">{{ config.label }} <span v-if="config.required" class="text-danger">*</span></label>
            <div class="wrapper">
                <div :class="'toolbar toolbar-' + editorId"></div>
                <div :class="'editor editor-' + editorId" style="height: 500px;"></div>
            </div>
            <small class="text-muted d-block mt-1">富文本编辑器，支持图片、视频上传</small>
        </div>
    `
    }
};

const app = createVueApp({
    data: {
        basicComponents: [
            { type: 'input', label: '输入框', icon: 'mdi mdi-form-textbox' },
            { type: 'password', label: '密码框', icon: 'mdi mdi-lock' },
            { type: 'textarea', label: '文本域', icon: 'mdi mdi-text' },
            { type: 'number', label: '数字框', icon: 'mdi mdi-numeric' },
            { type: 'select', label: '下拉框', icon: 'mdi mdi-form-dropdown' },
            { type: 'radio', label: '单选框', icon: 'mdi mdi-radiobox-marked' },
            { type: 'checkbox', label: '复选框', icon: 'mdi mdi-checkbox-marked' },
            { type: 'switch', label: '开关', icon: 'mdi mdi-toggle-switch' }
        ],
        advancedComponents: [
            { type: 'date', label: '日期选择', icon: 'mdi mdi-calendar' },
            { type: 'image', label: '单图上传', icon: 'mdi mdi-image' },
            { type: 'images', label: '多图上传', icon: 'mdi mdi-image-multiple' },
            { type: 'file', label: '单文件上传', icon: 'mdi mdi-file' },
            { type: 'files', label: '多文件上传', icon: 'mdi mdi-file-multiple' },
            { type: 'video', label: '单视频上传', icon: 'mdi mdi-video' },
            { type: 'videos', label: '多视频上传', icon: 'mdi mdi-video-box' },
            { type: 'editor', label: '富文本编辑器', icon: 'mdi mdi-text-box' }
        ],
        formItems: [],
        activeIndex: -1,
        draggedIndex: -1
    },
    computed: {
        activeItem() {
            return this.activeIndex >= 0 ? this.formItems[this.activeIndex] : null;
        },
        htmlCode() {
            if (this.formItems.length === 0) return '';
            
            const indent = '  '; // 2个空格缩进
            
            // 检查是否有上传组件
            const hasUpload = this.formItems.some(item => 
                ['image', 'images', 'video', 'videos'].includes(item.type)
            );
            
            // 检查是否有编辑器组件
            const hasEditor = this.formItems.some(item => item.type === 'editor');
            
            let html = '';
            
            // 如果有编辑器，添加必要的 CSS 和 JS
            if (hasEditor) {
                html += '<!-- wangEditor 富文本编辑器 -->\n';
                html += '<link href="/static/wangeditor/style.css" rel="stylesheet"/>\n';
                html += '<script src="/static/wangeditor/index.js"><\/script>\n\n';
                html += '<style>\n';
                html += '.wrapper { border: 1px solid #ccc; z-index: 100; }\n';
                html += '.toolbar { border-bottom: 1px solid #ccc; }\n';
                html += '<\/style>\n\n';
            }
            
            // 如果有上传组件，添加必要的 CSS
            if (hasUpload) {
                html += '<!-- 必要的 CSS 样式 -->\n<style>\n';
                html += '[draggable="true"]:hover { opacity: 0.8; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }\n';
                html += '[draggable="true"]:active { opacity: 0.5; }\n';
                html += '.position-absolute.btn { z-index: 10; }\n';
                html += '<\/style>\n\n';
            }
            
            html += '<form @submit.prevent="submit">\n';
            this.formItems.forEach(item => {
                html += this.generateItemHtml(item);
            });
            html += `${indent}<button type="submit" class="btn btn-primary">提交</button>\n</form>`;
            return html;
        },
        vueCode() {
            if (this.formItems.length === 0) return '';
            
            // 生成 data 对象
            let formData = {};
            
            this.formItems.forEach(item => {
                if (item.type === 'image' || item.type === 'video') {
                    formData[item.name] = "''";  // 预览 URL
                } else if (item.type === 'images' || item.type === 'videos') {
                    formData[item.name] = '[]';  // 预览 URL 数组
                } else if (item.type === 'checkbox') {
                    formData[item.name] = '[]';  // 复选框是数组
                } else {
                    formData[item.name] = "''";
                }
            });
            
            // 生成 methods
            let methodsCode = '';
            
            // 检查是否有图片上传
            const hasImage = this.formItems.some(item => item.type === 'image');
            const hasImages = this.formItems.some(item => item.type === 'images');
            const hasVideo = this.formItems.some(item => item.type === 'video');
            const hasVideos = this.formItems.some(item => item.type === 'videos');
            const hasEditor = this.formItems.some(item => item.type === 'editor');
            const editorItems = this.formItems.filter(item => item.type === 'editor');
            
            if (hasImage) {
                methodsCode += '        // 单图上传处理\n';
                methodsCode += '        handleImageChange(e, fieldName) {\n';
                methodsCode += '            const file = e.target.files[0];\n';
                methodsCode += '            if (file) {\n';
                methodsCode += '                this.form[fieldName] = file;\n';
                methodsCode += '            }\n';
                methodsCode += '        },\n';
                methodsCode += '        removeImage(fieldName) {\n';
                methodsCode += '            this.form[fieldName] = \'\';\n';
                methodsCode += '            this.$refs[fieldName].value = \'\';\n';
                methodsCode += '        },\n';
                methodsCode += '        getImagePreview(fieldName) {\n';
                methodsCode += '            return this.form[fieldName] && typeof this.form[fieldName] === \'object\' ? URL.createObjectURL(this.form[fieldName]) : this.form[fieldName];\n';
                methodsCode += '        },\n';
            }
            
            if (hasImages) {
                methodsCode += '        // 多图上传处理\n';
                methodsCode += '        handleImagesChange(e, fieldName) {\n';
                methodsCode += '            const files = Array.from(e.target.files);\n';
                methodsCode += '            files.forEach(file => {\n';
                methodsCode += '                this.form[fieldName].push(file);\n';
                methodsCode += '            });\n';
                methodsCode += '        },\n';
                methodsCode += '        removeImageItem(fieldName, index) {\n';
                methodsCode += '            this.form[fieldName].splice(index, 1);\n';
                methodsCode += '            if (this.form[fieldName].length === 0) {\n';
                methodsCode += '                this.$refs[fieldName].value = \'\';\n';
                methodsCode += '            }\n';
                methodsCode += '        },\n';
                methodsCode += '        getImageItemPreview(file) {\n';
                methodsCode += '            return typeof file === \'object\' ? URL.createObjectURL(file) : file;\n';
                methodsCode += '        },\n';
                methodsCode += '        dragStartImage(fieldName, index) {\n';
                methodsCode += '            this.draggedIndex = index;\n';
                methodsCode += '        },\n';
                methodsCode += '        dragOverImage(e, fieldName, index) {\n';
                methodsCode += '            e.preventDefault();\n';
                methodsCode += '            if (this.draggedIndex !== null && this.draggedIndex !== index) {\n';
                methodsCode += '                const file = this.form[fieldName].splice(this.draggedIndex, 1)[0];\n';
                methodsCode += '                this.form[fieldName].splice(index, 0, file);\n';
                methodsCode += '                this.draggedIndex = index;\n';
                methodsCode += '            }\n';
                methodsCode += '        },\n';
                methodsCode += '        dragEndImage(fieldName) {\n';
                methodsCode += '            this.draggedIndex = null;\n';
                methodsCode += '        },\n';
            }
            
            if (hasVideo) {
                methodsCode += '        // 单视频上传处理\n';
                methodsCode += '        handleVideoChange(e, fieldName) {\n';
                methodsCode += '            const file = e.target.files[0];\n';
                methodsCode += '            if (file) {\n';
                methodsCode += '                this.form[fieldName] = file;\n';
                methodsCode += '            }\n';
                methodsCode += '        },\n';
                methodsCode += '        removeVideo(fieldName) {\n';
                methodsCode += '            this.form[fieldName] = \'\';\n';
                methodsCode += '            this.$refs[fieldName].value = \'\';\n';
                methodsCode += '        },\n';
                methodsCode += '        getVideoPreview(fieldName) {\n';
                methodsCode += '            return this.form[fieldName] && typeof this.form[fieldName] === \'object\' ? URL.createObjectURL(this.form[fieldName]) : this.form[fieldName];\n';
                methodsCode += '        },\n';
            }
            
            if (hasVideos) {
                methodsCode += '        // 多视频上传处理\n';
                methodsCode += '        handleVideosChange(e, fieldName) {\n';
                methodsCode += '            const files = Array.from(e.target.files);\n';
                methodsCode += '            files.forEach(file => {\n';
                methodsCode += '                this.form[fieldName].push(file);\n';
                methodsCode += '            });\n';
                methodsCode += '        },\n';
                methodsCode += '        removeVideoItem(fieldName, index) {\n';
                methodsCode += '            this.form[fieldName].splice(index, 1);\n';
                methodsCode += '            if (this.form[fieldName].length === 0) {\n';
                methodsCode += '                this.$refs[fieldName].value = \'\';\n';
                methodsCode += '            }\n';
                methodsCode += '        },\n';
                methodsCode += '        getVideoItemPreview(file) {\n';
                methodsCode += '            return typeof file === \'object\' ? URL.createObjectURL(file) : file;\n';
                methodsCode += '        },\n';
                methodsCode += '        dragStartVideo(fieldName, index) {\n';
                methodsCode += '            this.draggedIndex = index;\n';
                methodsCode += '        },\n';
                methodsCode += '        dragOverVideo(e, fieldName, index) {\n';
                methodsCode += '            e.preventDefault();\n';
                methodsCode += '            if (this.draggedIndex !== null && this.draggedIndex !== index) {\n';
                methodsCode += '                const file = this.form[fieldName].splice(this.draggedIndex, 1)[0];\n';
                methodsCode += '                this.form[fieldName].splice(index, 0, file);\n';
                methodsCode += '                this.draggedIndex = index;\n';
                methodsCode += '            }\n';
                methodsCode += '        },\n';
                methodsCode += '        dragEndVideo(fieldName) {\n';
                methodsCode += '            this.draggedIndex = null;\n';
                methodsCode += '        },\n';
            }
            
            // 提交方法
            if (hasImage || hasImages || hasVideo || hasVideos) {
                methodsCode += '        // 表单提交\n';
                methodsCode += '        submit() {\n';
                methodsCode += '            const formData = new FormData();\n';
                methodsCode += '            for (let key in this.form) {\n';
                methodsCode += '                const value = this.form[key];\n';
                methodsCode += '                if (value instanceof File) {\n';
                methodsCode += '                    formData.append(key, value);\n';
                methodsCode += '                } else if (Array.isArray(value) && value.length > 0) {\n';
                methodsCode += '                    value.forEach((item, index) => {\n';
                methodsCode += '                        if (item instanceof File) {\n';
                methodsCode += '                            formData.append(key + \'[\' + index + \']\', item);\n';
                methodsCode += '                        }\n';
                methodsCode += '                    });\n';
                methodsCode += '                } else if (value !== \'\' && value !== null && !Array.isArray(value)) {\n';
                methodsCode += '                    formData.append(key, value);\n';
                methodsCode += '                }\n';
                methodsCode += '            }\n';
                methodsCode += '            console.log(\'表单数据:\', this.form);\n';
                methodsCode += '            console.log(\'FormData:\', formData);\n';
                methodsCode += '            // 提交示例：axios.post(\'/api/submit\', formData)\n';
                methodsCode += '        }';
            } else {
                methodsCode += '        // 表单提交\n';
                methodsCode += '        submit() {\n';
                methodsCode += '            const formData = {};\n';
                methodsCode += '            for (let key in this.form) {\n';
                methodsCode += '                const value = this.form[key];\n';
                methodsCode += '                if (value !== \'\' && value !== null) {\n';
                methodsCode += '                    formData[key] = value;\n';
                methodsCode += '                }\n';
                methodsCode += '            }\n';
                methodsCode += '            console.log(\'表单数据:\', formData);\n';
                methodsCode += '            // 提交示例：axios.post(\'/api/submit\', formData)\n';
                methodsCode += '        }';
            }
            
            // 生成 data 字符串
            let formDataStr = JSON.stringify(formData, null, 12)
                .replace(/\n/g, '\n            ')
                .replace(/": "/g, '": ')
                .replace(/",/g, ',')
                .replace(/"/g, '');
            
            let extraDataStr = '';
            if (hasImages || hasVideos) {
                extraDataStr = ',\n        draggedIndex: null';
            }
            
            let code = 'const { createApp } = Vue;\n\n';
            code += 'createVueApp({\n';
            code += '    data() {\n';
            code += '        return {\n';
            code += '            form: ' + formDataStr;
            code += extraDataStr + '\n';
            code += '        };\n';
            code += '    },\n';
            
            // 如果有 editor，添加 mounted 钩子
            if (hasEditor) {
                code += '    mounted() {\n';
                code += '        const { createEditor, createToolbar } = window.wangEditor;\n';
                editorItems.forEach(item => {
                    code += `        // 初始化编辑器: ${item.label}\n`;
                    code += `        const editor_${item.name} = createEditor({\n`;
                    code += `            selector: '.editor-${item.name}',\n`;
                    code += `            html: this.form.${item.name},\n`;
                    code += `            config: {\n`;
                    code += `                placeholder: '${item.placeholder || '请输入内容'}',\n`;
                    code += `                MENU_CONF: {\n`;
                    code += `                    uploadImage: {\n`;
                    code += `                        server: {:url("config/upload_image")},\n`;
                    code += `                        fieldName: 'image'\n`;
                    code += `                    },\n`;
                    code += `                    uploadVideo: {\n`;
                    code += `                        server: {:url("config/upload_image")},\n`;
                    code += `                        fieldName: 'video'\n`;
                    code += `                    }\n`;
                    code += `                },\n`;
                    code += `                onChange: (editor) => {\n`;
                    code += `                    this.form.${item.name} = editor.getHtml();\n`;
                    code += `                }\n`;
                    code += `            },\n`;
                    code += `            mode: 'default'\n`;
                    code += `        });\n`;
                    code += `        createToolbar({\n`;
                    code += `            editor: editor_${item.name},\n`;
                    code += `            selector: '.toolbar-${item.name}',\n`;
                    code += `            mode: 'default'\n`;
                    code += `        });\n`;
                });
                code += '    },\n';
            }
            
            code += '    methods: {\n';
            code += methodsCode + '\n';
            code += '    }\n';
            code += '}).mount(\'#app\');';
            
            return code;
        },
        jsonCode() {
            return JSON.stringify(this.formItems, null, 2);
        },
        fullCode() {
            if (this.formItems.length === 0) return '';
            
            // 检查是否有特殊组件
            const hasUpload = this.formItems.some(item => 
                ['image', 'images', 'video', 'videos'].includes(item.type)
            );
            const hasEditor = this.formItems.some(item => item.type === 'editor');
            
            let code = '{' + 'extend name="base"' + '}\n';
            
            // {block name="head"}
            code += '{' + 'block name="head"' + '}\n';
            if (hasEditor) {
                code += '<link href="/static/wangeditor/style.css" rel="stylesheet"/>\n';
            }
            if (hasUpload || hasEditor) {
                code += '<style>\n';
                if (hasEditor) {
                    code += '.wrapper { border: 1px solid #ccc; z-index: 100; }\n';
                    code += '.toolbar { border-bottom: 1px solid #ccc; }\n';
                }
                if (hasUpload) {
                    code += '[draggable="true"]:hover { opacity: 0.8; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }\n';
                    code += '[draggable="true"]:active { opacity: 0.5; }\n';
                    code += '.position-absolute.btn { z-index: 10; }\n';
                }
                code += '<\/style>\n';
            }
            code += '{' + '/block' + '}\n\n';
            
            // {block name="main"}
            code += '{' + 'block name="main"' + '}\n';
            code += '<div class="card">\n';
            code += '  <div class="card-body">\n';
            // 为 htmlCode 的每一行添加 4 个空格缩进
            code += this.htmlCode.split('\n').map(line => line ? '    ' + line : '').join('\n') + '\n';
            code += '  </div>\n';
            code += '</div>\n';
            code += '{' + '/block' + '}\n\n';
            
            // {block name="script"}
            code += '{' + 'block name="script"' + '}\n';
            if (hasEditor) {
                code += '<script src="/static/wangeditor/index.js"><\/script>\n';
            }
            code += '<script>\n';
            code += this.vueCode + '\n';
            code += '<\/script>\n';
            code += '{' + '/block' + '}';
            
            return code;
        }
    },
    methods: {
        dragStartItem(e, index) {
            this.draggedIndex = index;
            e.dataTransfer.effectAllowed = 'move';
        },
        dragOverItem(e, index) {
            e.preventDefault();
            if (this.draggedIndex >= 0 && this.draggedIndex !== index) {
                e.currentTarget.classList.add('drag-over');
            }
        },
        dropItem(e, targetIndex) {
            e.preventDefault();
            e.currentTarget.classList.remove('drag-over');
            
            if (this.draggedIndex >= 0 && this.draggedIndex !== targetIndex) {
                const item = this.formItems.splice(this.draggedIndex, 1)[0];
                const newIndex = this.draggedIndex < targetIndex ? targetIndex : targetIndex;
                this.formItems.splice(newIndex, 0, item);
                this.activeIndex = newIndex;
                this.draggedIndex = -1;
            }
        },
        addComponent(comp) {
            const newItem = {
                type: comp.type,
                name: 'field_' + Date.now(),
                label: comp.label,
                placeholder: '请输入' + comp.label,
                required: false,
                options: comp.type === 'select' || comp.type === 'radio' || comp.type === 'checkbox' 
                    ? [{ value: '1', label: '选项1' }, { value: '2', label: '选项2' }] 
                    : [],
                optionsText: '1:选项1\n2:选项2'
            };
            this.formItems.push(newItem);
            this.activeIndex = this.formItems.length - 1;
        },
        selectItem(index) {
            this.activeIndex = index;
        },
        deleteItem(index) {
            this.formItems.splice(index, 1);
            if (this.activeIndex === index) {
                this.activeIndex = -1;
            } else if (this.activeIndex > index) {
                this.activeIndex--;
            }
        },
        copyItem(index) {
            const item = JSON.parse(JSON.stringify(this.formItems[index]));
            item.name = 'field_' + Date.now();
            this.formItems.splice(index + 1, 0, item);
            this.activeIndex = index + 1;
        },
        clearForm() {
            this.confirm('确定要清空表单吗？', () => {
                this.formItems = [];
                this.activeIndex = -1;
            });
        },
        generateItemHtml(item) {
            const indent = '  '; // 2个空格缩进
            let html = '';
            
            // 单选框和复选框需要特殊处理，不需要外层包装
            if (item.type === 'radio' || item.type === 'checkbox') {
                html += `${indent}<div class="mb-3">\n`;
                html += `${indent}  <label class="form-label d-block">${item.label}${item.required ? ' <span class="text-danger">*</span>' : ''}</label>\n`;
            } else {
                html += `${indent}<div class="mb-3">\n`;
                html += `${indent}  <label class="form-label">${item.label}${item.required ? ' <span class="text-danger">*</span>' : ''}</label>\n`;
            }
            
            switch (item.type) {
                case 'input':
                    html += `${indent}  <input type="text" class="form-control" v-model="form.${item.name}" placeholder="${item.placeholder}"${item.required ? ' required' : ''}>\n`;
                    break;
                case 'password':
                    html += `${indent}  <input type="password" class="form-control" v-model="form.${item.name}" placeholder="${item.placeholder}"${item.required ? ' required' : ''}>\n`;
                    break;
                case 'textarea':
                    html += `${indent}  <textarea class="form-control" v-model="form.${item.name}" rows="3" placeholder="${item.placeholder}"${item.required ? ' required' : ''}></textarea>\n`;
                    break;
                case 'number':
                    html += `${indent}  <input type="number" class="form-control" v-model="form.${item.name}" placeholder="${item.placeholder}"${item.required ? ' required' : ''}>\n`;
                    break;
                case 'select':
                    html += `${indent}  <select class="form-select" v-model="form.${item.name}"${item.required ? ' required' : ''}>\n`;
                    html += `${indent}    <option value="">请选择</option>\n`;
                    item.options.forEach(opt => {
                        html += `${indent}    <option value="${opt.value}">${opt.label}</option>\n`;
                    });
                    html += `${indent}  </select>\n`;
                    break;
                case 'radio':
                    item.options.forEach(opt => {
                        html += `${indent}  <div class="form-check form-check-inline">\n`;
                        html += `${indent}    <input class="form-check-input" type="radio" v-model="form.${item.name}" value="${opt.value}" id="${item.name}_${opt.value}"${item.required ? ' required' : ''}>\n`;
                        html += `${indent}    <label class="form-check-label" for="${item.name}_${opt.value}">${opt.label}</label>\n`;
                        html += `${indent}  </div>\n`;
                    });
                    break;
                case 'checkbox':
                    item.options.forEach((opt, idx) => {
                        html += `${indent}  <div class="form-check">\n`;
                        html += `${indent}    <input class="form-check-input" type="checkbox" v-model="form.${item.name}" value="${opt.value}" id="${item.name}_${idx}">\n`;
                        html += `${indent}    <label class="form-check-label" for="${item.name}_${idx}">${opt.label}</label>\n`;
                        html += `${indent}  </div>\n`;
                    });
                    break;
                case 'switch':
                    html += `${indent}  <div class="form-check form-switch">\n`;
                    html += `${indent}    <input class="form-check-input" type="checkbox" v-model="form.${item.name}">\n`;
                    html += `${indent}  </div>\n`;
                    break;
                case 'date':
                    html += `${indent}  <input type="date" class="form-control" v-model="form.${item.name}"${item.required ? ' required' : ''}>\n`;
                    break;
                case 'image':
                    html += `${indent}  <input type="file" ref="${item.name}" class="form-control" accept="image/*" @change="handleImageChange($event, '${item.name}')" v-show="!form.${item.name}"${item.required ? ' required' : ''}>\n`;
                    html += `${indent}  <div v-if="form.${item.name}" class="mt-2 position-relative d-inline-block">\n`;
                    html += `${indent}    <img :src="getImagePreview('${item.name}')" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">\n`;
                    html += `${indent}    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1" @click="removeImage('${item.name}')">\n`;
                    html += `${indent}      <i class="mdi mdi-close"></i>\n`;
                    html += `${indent}    </button>\n`;
                    html += `${indent}  </div>\n`;
                    html += `${indent}  <small class="text-muted d-block mt-1">支持 jpg, png, gif 等图片格式</small>\n`;
                    break;
                case 'images':
                    html += `${indent}  <input type="file" ref="${item.name}" class="form-control" accept="image/*" multiple @change="handleImagesChange($event, '${item.name}')"${item.required ? ' required' : ''}>\n`;
                    html += `${indent}  <div v-if="form.${item.name}.length > 0" class="mt-2 d-flex flex-wrap gap-2">\n`;
                    html += `${indent}    <div v-for="(file, index) in form.${item.name}" :key="index" class="position-relative d-inline-block" draggable="true" @dragstart="dragStartImage('${item.name}', index)" @dragover="dragOverImage($event, '${item.name}', index)" @dragend="dragEndImage('${item.name}')" style="cursor: move;">\n`;
                    html += `${indent}      <img :src="getImageItemPreview(file)" class="img-thumbnail" style="width: 120px; height: 120px; object-fit: cover;">\n`;
                    html += `${indent}      <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1" @click="removeImageItem('${item.name}', index)" style="cursor: pointer;">\n`;
                    html += `${indent}        <i class="mdi mdi-close"></i>\n`;
                    html += `${indent}      </button>\n`;
                    html += `${indent}      <div class="position-absolute bottom-0 start-0 m-1 badge bg-dark">{{ index + 1 }}</div>\n`;
                    html += `${indent}    </div>\n`;
                    html += `${indent}  </div>\n`;
                    html += `${indent}  <small class="text-muted d-block mt-1">可选择多张图片，拖拽可排序</small>\n`;
                    break;
                case 'file':
                    html += `${indent}  <input type="file" class="form-control"${item.required ? ' required' : ''}>\n`;
                    break;
                case 'files':
                    html += `${indent}  <input type="file" class="form-control" multiple${item.required ? ' required' : ''}>\n`;
                    html += `${indent}  <small class="text-muted">可选择多个文件</small>\n`;
                    break;
                case 'video':
                    html += `${indent}  <input type="file" ref="${item.name}" class="form-control" accept="video/*" @change="handleVideoChange($event, '${item.name}')" v-show="!form.${item.name}"${item.required ? ' required' : ''}>\n`;
                    html += `${indent}  <div v-if="form.${item.name}" class="mt-2 position-relative d-inline-block">\n`;
                    html += `${indent}    <video :src="getVideoPreview('${item.name}')" controls class="border rounded" style="max-width: 400px; max-height: 300px;"></video>\n`;
                    html += `${indent}    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1" @click="removeVideo('${item.name}')">\n`;
                    html += `${indent}      <i class="mdi mdi-close"></i>\n`;
                    html += `${indent}    </button>\n`;
                    html += `${indent}  </div>\n`;
                    html += `${indent}  <small class="text-muted d-block mt-1">支持 mp4, avi, mov 等视频格式</small>\n`;
                    break;
                case 'videos':
                    html += `${indent}  <input type="file" ref="${item.name}" class="form-control" accept="video/*" multiple @change="handleVideosChange($event, '${item.name}')"${item.required ? ' required' : ''}>\n`;
                    html += `${indent}  <div v-if="form.${item.name}.length > 0" class="mt-2 d-flex flex-wrap gap-2">\n`;
                    html += `${indent}    <div v-for="(file, index) in form.${item.name}" :key="index" class="position-relative d-inline-block" draggable="true" @dragstart="dragStartVideo('${item.name}', index)" @dragover="dragOverVideo($event, '${item.name}', index)" @dragend="dragEndVideo('${item.name}')" style="cursor: move;">\n`;
                    html += `${indent}      <video :src="getVideoItemPreview(file)" controls class="border rounded" style="width: 200px; height: 150px;"></video>\n`;
                    html += `${indent}      <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1" @click="removeVideoItem('${item.name}', index)" style="cursor: pointer;">\n`;
                    html += `${indent}        <i class="mdi mdi-close"></i>\n`;
                    html += `${indent}      </button>\n`;
                    html += `${indent}      <div class="position-absolute bottom-0 start-0 m-1 badge bg-dark">{{ index + 1 }}</div>\n`;
                    html += `${indent}      <small class="d-block text-center text-muted mt-1" v-if="file.name">{{ file.name }}</small>\n`;
                    html += `${indent}    </div>\n`;
                    html += `${indent}  </div>\n`;
                    html += `${indent}  <small class="text-muted d-block mt-1">可选择多个视频，拖拽可排序</small>\n`;
                    break;
                case 'editor':
                    html += `${indent}  <div class="wrapper">\n`;
                    html += `${indent}    <div class="toolbar toolbar-${item.name}"></div>\n`;
                    html += `${indent}    <div class="editor editor-${item.name}" style="height: 500px;"></div>\n`;
                    html += `${indent}  </div>\n`;
                    html += `${indent}  <small class="text-muted d-block mt-1">富文本编辑器，支持图片、视频上传</small>\n`;
                    break;
            }
            html += `${indent}</div>\n`;
            return html;
        },
        copyCode(type) {
            const text = type === 'full' ? this.fullCode : (type === 'html' ? this.htmlCode : this.vueCode);
            if (!text) return;
            
            // 使用更可靠的复制方法
            const textarea = document.createElement('textarea');
            textarea.value = text;
            textarea.style.position = 'fixed';
            textarea.style.opacity = '0';
            document.body.appendChild(textarea);
            textarea.select();
            
            try {
                document.execCommand('copy');
                this.alert('代码已复制到剪贴板');
            } catch (err) {
                console.error('复制失败:', err);
                this.alert('复制失败，请手动复制');
            } finally {
                document.body.removeChild(textarea);
            }
        },
        copyFullCode() {
            const text = this.fullCode;
            if (!text) {
                this.alert('没有可复制的代码');
                return;
            }
            
            const textarea = document.createElement('textarea');
            textarea.value = text;
            textarea.style.position = 'fixed';
            textarea.style.opacity = '0';
            document.body.appendChild(textarea);
            textarea.select();
            
            try {
                document.execCommand('copy');
                this.alert('代码已复制到剪贴板');
            } catch (err) {
                console.error('复制失败:', err);
                this.alert('复制失败，请手动复制');
            } finally {
                document.body.removeChild(textarea);
            }
        },
        alert(message) {
            ModernAlert.toast(message);
        },
        previewForm() {
            const html = this.htmlCode;
            const vueJs = this.vueCode;
            const win = window.open('', '_blank');
            const cssStyles = '[draggable="true"]:hover { opacity: 0.8; box-shadow: 0 4px 8px rgba(0,0,0,0.1); } [draggable="true"]:active { opacity: 0.5; } .position-absolute.btn { z-index: 10; }';
            
            const fullHtml = '<!DOCTYPE html>' +
                '<html>' +
                '<head>' +
                '<meta charset="utf-8">' +
                '<meta name="viewport" content="width=device-width, initial-scale=1">' +
                '<title>表单预览</title>' +
                '<link href="/static/css/bootstrap.min.css" rel="stylesheet">' +
                '<link rel="stylesheet" href="/static/css/materialdesignicons.min.css">' +
                '<style>' + cssStyles + '</style>' +
                '</head>' +
                '<body>' +
                '<div class="container mt-5">' +
                '<div class="card">' +
                '<div class="card-header">' +
                '<h5 class="mb-0">表单预览</h5>' +
                '</div>' +
                '<div class="card-body" id="app">' +
                html +
                '</div>' +
                '</div>' +
                '</div>' +
                '<script src="/static/js/vue.js"><\/script>' +
                '<script>' +
                vueJs +
                '<\/script>' +
                '</body>' +
                '</html>';
            
            win.document.write(fullHtml);
            win.document.close();
        }
    },
    mounted() {
        // 监听代码变化，自动高亮
        this.$watch('fullCode', () => {
            this.$nextTick(() => {
                Prism.highlightAll();
            });
        });
    }
});

// 注册所有表单组件
Object.keys(formComponents).forEach(name => {
    app.component(name, formComponents[name]);
});

// 挂载应用
app.mount('#formBuilder');
</script>

<script src="/static/wangeditor/index.js"></script>
<script src="/static/js/prism/prism.min.js"></script>
<script src="/static/js/prism/prism-markup.min.js"></script>
<script src="/static/js/prism/prism-javascript.min.js"></script>

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
