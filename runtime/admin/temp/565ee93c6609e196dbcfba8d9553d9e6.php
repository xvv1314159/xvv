<?php /*a:2:{s:57:"/www/wwwroot/www.xvv.cc/app/admin/view/upgrade/index.html";i:1773769974;s:48:"/www/wwwroot/www.xvv.cc/app/admin/view/base.html";i:1773769974;}*/ ?>
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
.upgrade-card { background:#fff; border-radius:12px; box-shadow:0 2px 12px rgba(0,0,0,.07); border:1px solid #c8d0e0; }
.version-badge { font-size:13px; padding:4px 12px; border-radius:20px; font-weight:600; }
.badge-current  { background:#e8f4fd; color:#1a73e8; }
.badge-latest   { background:#e6f9f0; color:#22863a; }
.badge-outdated { background:#fff3cd; color:#856404; }
.changelog-box  { background:#f8f9fa; border:1px solid #e2e8f0; border-radius:8px; padding:16px; font-size:13px; line-height:1.8; white-space:pre-wrap; max-height:280px; overflow-y:auto; }
.log-box { background:#1a1a2e; color:#a8ff78; border-radius:8px; padding:16px; font-size:12px; font-family:monospace; max-height:320px; overflow-y:auto; white-space:pre-wrap; }
.step-item { display:flex; align-items:center; gap:10px; padding:10px 0; border-bottom:1px solid #f0f0f0; }
.step-item:last-child { border-bottom:none; }
.step-num { width:28px; height:28px; border-radius:50%; background:#667eea; color:#fff; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:700; flex-shrink:0; }
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
        <h5 class="mb-0"><i class="mdi mdi-rocket-launch me-1"></i> 系统框架升级</h5>
        <span class="version-badge badge-current">当前版本 v<?php echo htmlentities((string) $current_version); ?></span>
      </div>
      <div class="card-body">
        <div id="app">

          <!-- 检查版本区域 -->
          <div class="upgrade-card p-4 mb-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <div>
                <h6 class="mb-1 fw-bold">版本检查</h6>
                <div class="text-muted" style="font-size:13px">从远端服务器获取最新版本信息</div>
              </div>
              <button class="btn btn-primary" @click="checkVersion" :disabled="checking">
                <i class="mdi" :class="checking ? 'mdi-loading mdi-spin' : 'mdi-cloud-search'"></i>
                {{ checking ? '检查中...' : '检查更新' }}
              </button>
            </div>

            <!-- 结果展示 -->
            <div v-if="checkResult" class="mt-3">
              <div v-if="!checkResult.upgradable" class="alert alert-success mb-0">
                <i class="mdi mdi-check-circle me-1"></i>
                已是最新版本 <strong>v{{ checkResult.current }}</strong>，无需升级
              </div>
              <div v-else>
                <div class="alert alert-warning mb-3">
                  <i class="mdi mdi-arrow-up-circle me-1"></i>
                  发现新版本 <strong class="text-success">v{{ checkResult.latest }}</strong>，当前 v{{ checkResult.current }}
                  <span v-if="checkResult.released_at" class="ms-2 text-muted" style="font-size:12px">发布于 {{ checkResult.released_at }}</span>
                </div>
                <div v-if="checkResult.changelog" class="mb-3">
                  <div class="fw-bold mb-2" style="font-size:13px">更新日志：</div>
                  <div class="changelog-box">{{ checkResult.changelog }}</div>
                </div>
                <div class="upgrade-card p-3 mb-3" style="background:#fffbf0;border-color:#f6c90e">
                  <div class="fw-bold mb-2" style="font-size:13px"><i class="mdi mdi-alert-outline me-1 text-warning"></i>升级前请注意：</div>
                  <ul class="mb-0" style="font-size:13px;padding-left:20px">
                    <li>升级会自动备份 <code>app/</code> 目录到 <code>runtime/backup/</code></li>
                    <li>不会覆盖 <code>config/app.php</code>（保留你的配置）</li>
                    <li>插件目录 <code>plugin/</code> 不受影响</li>
                    <li>建议先备份数据库</li>
                  </ul>
                </div>
                <button class="btn btn-success" @click="doUpgrade" :disabled="upgrading">
                  <i class="mdi" :class="upgrading ? 'mdi-loading mdi-spin' : 'mdi-rocket-launch'"></i>
                  {{ upgrading ? '升级中...' : '立即升级到 v' + checkResult.latest }}
                </button>
              </div>
            </div>
          </div>

          <!-- 升级日志 -->
          <div v-if="upgradeLogs.length" class="upgrade-card p-4 mb-4">
            <h6 class="fw-bold mb-3"><i class="mdi mdi-console me-1"></i>升级日志</h6>
            <div class="log-box" ref="logBox">{{ upgradeLogs.join('\n') }}</div>
            <div v-if="upgradeSuccess" class="alert alert-success mt-3 mb-0">
              <i class="mdi mdi-check-circle me-1"></i>
              <strong>升级成功！</strong> 建议清除缓存后刷新页面。
              <a href="<?php echo url("Dev/cache"); ?>" class="btn btn-sm btn-outline-success ms-2">清除缓存</a>
            </div>
          </div>

          <!-- 升级步骤说明 -->
          <div class="upgrade-card p-4">
            <h6 class="fw-bold mb-3"><i class="mdi mdi-information-outline me-1"></i>升级流程说明</h6>
            <div class="step-item">
              <div class="step-num">1</div>
              <div><div class="fw-bold" style="font-size:13px">下载补丁包</div><div class="text-muted" style="font-size:12px">从远端下载新版本 zip 到 runtime/ 目录</div></div>
            </div>
            <div class="step-item">
              <div class="step-num">2</div>
              <div><div class="fw-bold" style="font-size:13px">备份当前文件</div><div class="text-muted" style="font-size:12px">将 app/ 目录备份到 runtime/backup/</div></div>
            </div>
            <div class="step-item">
              <div class="step-num">3</div>
              <div><div class="fw-bold" style="font-size:13px">解压覆盖</div><div class="text-muted" style="font-size:12px">解压补丁包，覆盖对应文件（config/app.php 不覆盖）</div></div>
            </div>
            <div class="step-item">
              <div class="step-num">4</div>
              <div><div class="fw-bold" style="font-size:13px">数据库迁移</div><div class="text-muted" style="font-size:12px">若存在 upgrade.sql 则自动执行</div></div>
            </div>
            <div class="step-item">
              <div class="step-num">5</div>
              <div><div class="fw-bold" style="font-size:13px">更新版本号</div><div class="text-muted" style="font-size:12px">自动更新 config/app.php 中的 framework_version</div></div>
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
  
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="mdi mdi-rocket-launch me-1"></i> 系统框架升级</h5>
        <span class="version-badge badge-current">当前版本 v<?php echo htmlentities((string) $current_version); ?></span>
      </div>
      <div class="card-body">
        <div id="app">

          <!-- 检查版本区域 -->
          <div class="upgrade-card p-4 mb-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <div>
                <h6 class="mb-1 fw-bold">版本检查</h6>
                <div class="text-muted" style="font-size:13px">从远端服务器获取最新版本信息</div>
              </div>
              <button class="btn btn-primary" @click="checkVersion" :disabled="checking">
                <i class="mdi" :class="checking ? 'mdi-loading mdi-spin' : 'mdi-cloud-search'"></i>
                {{ checking ? '检查中...' : '检查更新' }}
              </button>
            </div>

            <!-- 结果展示 -->
            <div v-if="checkResult" class="mt-3">
              <div v-if="!checkResult.upgradable" class="alert alert-success mb-0">
                <i class="mdi mdi-check-circle me-1"></i>
                已是最新版本 <strong>v{{ checkResult.current }}</strong>，无需升级
              </div>
              <div v-else>
                <div class="alert alert-warning mb-3">
                  <i class="mdi mdi-arrow-up-circle me-1"></i>
                  发现新版本 <strong class="text-success">v{{ checkResult.latest }}</strong>，当前 v{{ checkResult.current }}
                  <span v-if="checkResult.released_at" class="ms-2 text-muted" style="font-size:12px">发布于 {{ checkResult.released_at }}</span>
                </div>
                <div v-if="checkResult.changelog" class="mb-3">
                  <div class="fw-bold mb-2" style="font-size:13px">更新日志：</div>
                  <div class="changelog-box">{{ checkResult.changelog }}</div>
                </div>
                <div class="upgrade-card p-3 mb-3" style="background:#fffbf0;border-color:#f6c90e">
                  <div class="fw-bold mb-2" style="font-size:13px"><i class="mdi mdi-alert-outline me-1 text-warning"></i>升级前请注意：</div>
                  <ul class="mb-0" style="font-size:13px;padding-left:20px">
                    <li>升级会自动备份 <code>app/</code> 目录到 <code>runtime/backup/</code></li>
                    <li>不会覆盖 <code>config/app.php</code>（保留你的配置）</li>
                    <li>插件目录 <code>plugin/</code> 不受影响</li>
                    <li>建议先备份数据库</li>
                  </ul>
                </div>
                <button class="btn btn-success" @click="doUpgrade" :disabled="upgrading">
                  <i class="mdi" :class="upgrading ? 'mdi-loading mdi-spin' : 'mdi-rocket-launch'"></i>
                  {{ upgrading ? '升级中...' : '立即升级到 v' + checkResult.latest }}
                </button>
              </div>
            </div>
          </div>

          <!-- 升级日志 -->
          <div v-if="upgradeLogs.length" class="upgrade-card p-4 mb-4">
            <h6 class="fw-bold mb-3"><i class="mdi mdi-console me-1"></i>升级日志</h6>
            <div class="log-box" ref="logBox">{{ upgradeLogs.join('\n') }}</div>
            <div v-if="upgradeSuccess" class="alert alert-success mt-3 mb-0">
              <i class="mdi mdi-check-circle me-1"></i>
              <strong>升级成功！</strong> 建议清除缓存后刷新页面。
              <a href="<?php echo url("Dev/cache"); ?>" class="btn btn-sm btn-outline-success ms-2">清除缓存</a>
            </div>
          </div>

          <!-- 升级步骤说明 -->
          <div class="upgrade-card p-4">
            <h6 class="fw-bold mb-3"><i class="mdi mdi-information-outline me-1"></i>升级流程说明</h6>
            <div class="step-item">
              <div class="step-num">1</div>
              <div><div class="fw-bold" style="font-size:13px">下载补丁包</div><div class="text-muted" style="font-size:12px">从远端下载新版本 zip 到 runtime/ 目录</div></div>
            </div>
            <div class="step-item">
              <div class="step-num">2</div>
              <div><div class="fw-bold" style="font-size:13px">备份当前文件</div><div class="text-muted" style="font-size:12px">将 app/ 目录备份到 runtime/backup/</div></div>
            </div>
            <div class="step-item">
              <div class="step-num">3</div>
              <div><div class="fw-bold" style="font-size:13px">解压覆盖</div><div class="text-muted" style="font-size:12px">解压补丁包，覆盖对应文件（config/app.php 不覆盖）</div></div>
            </div>
            <div class="step-item">
              <div class="step-num">4</div>
              <div><div class="fw-bold" style="font-size:13px">数据库迁移</div><div class="text-muted" style="font-size:12px">若存在 upgrade.sql 则自动执行</div></div>
            </div>
            <div class="step-item">
              <div class="step-num">5</div>
              <div><div class="fw-bold" style="font-size:13px">更新版本号</div><div class="text-muted" style="font-size:12px">自动更新 config/app.php 中的 framework_version</div></div>
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
const _app = createVueApp({
    data() {
        return {
            checking:       false,
            upgrading:      false,
            checkResult:    null,
            upgradeLogs:    [],
            upgradeSuccess: false,
        };
    },
    methods: {
        checkVersion() {
            this.checking     = true;
            this.checkResult  = null;
            this.post(<?php echo url("Upgrade/index"); ?>, { action: 'check' }, res => {
                this.checking = false;
                if (res.code === 0) {
                    this.checkResult = res.data;
                } else {
                    this.alert({ code: 0, msg: res.msg || '检查失败' });
                }
            });
        },
        doUpgrade() {
            if (!this.checkResult) return;
            this.confirm('确定要升级吗？升级过程不可中断，建议先备份数据库。', () => {
                this.upgrading      = true;
                this.upgradeSuccess = false;
                this.upgradeLogs    = ['开始升级...'];
                this.post(<?php echo url("Upgrade/index"); ?>, {
                    action:       'do_upgrade',
                    download_url: this.checkResult.download_url,
                    new_version:  this.checkResult.latest,
                }, res => {
                    this.upgrading = false;
                    if (res.code === 1) {
                        this.upgradeLogs    = res.data.log || [];
                        this.upgradeLogs.push('✅ 升级完成！');
                        this.upgradeSuccess = true;
                        this.checkResult    = null;
                    } else {
                        this.upgradeLogs.push('❌ 升级失败：' + (res.msg || '未知错误'));
                    }
                    this.$nextTick(() => {
                        const box = this.$refs.logBox;
                        if (box) box.scrollTop = box.scrollHeight;
                    });
                });
            });
        },
    }
});
_app.mount('#app');
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
