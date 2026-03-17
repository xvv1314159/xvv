<?php /*a:2:{s:56:"/www/wwwroot/www.xvv.cc/app/admin/view/dev/database.html";i:1773769974;s:48:"/www/wwwroot/www.xvv.cc/app/admin/view/base.html";i:1773769974;}*/ ?>
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
        

<div class="row" id="app">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <h5 class="mb-0"><i class="mdi mdi-database"></i> 数据库管理</h5>
      </div>
      <div class="card-body">
        <!-- 标签页 -->
        <ul class="nav nav-tabs mb-3" role="tablist">
          <li class="nav-item">
            <a class="nav-link" :class="{active: activeTab === 'tables'}" @click="activeTab = 'tables'" href="javascript:void(0)">
              <i class="mdi mdi-table"></i> 数据表
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" :class="{active: activeTab === 'structure'}" @click="activeTab = 'structure'" href="javascript:void(0)">
              <i class="mdi mdi-table-cog"></i> 表结构
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" :class="{active: activeTab === 'data'}" @click="activeTab = 'data'" href="javascript:void(0)">
              <i class="mdi mdi-table-eye"></i> 表数据
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" :class="{active: activeTab === 'sql'}" @click="activeTab = 'sql'" href="javascript:void(0)">
              <i class="mdi mdi-code-tags"></i> SQL 查询
            </a>
          </li>
        </ul>
        
        <!-- 数据表列表 -->
        <div v-show="activeTab === 'tables'">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>表名</th>
                  <th>引擎</th>
                  <th>行数</th>
                  <th>大小</th>
                  <th>注释</th>
                  <th width="200">操作</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="table in tables" :key="table.name">
                  <td><code>{{ table.name }}</code></td>
                  <td>{{ table.engine }}</td>
                  <td>{{ table.rows }}</td>
                  <td>{{ table.size_format }}</td>
                  <td>{{ table.comment || '-' }}</td>
                  <td>
                    <a href="javascript:void(0)" @click="viewStructure(table.name)">结构</a>
                    <span class="text-muted mx-1">|</span>
                    <a href="javascript:void(0)" @click="viewData(table.name)">数据</a>
                    <span class="text-muted mx-1">|</span>
                    <a href="javascript:void(0)" @click="optimizeTable(table.name)">优化</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        
        <!-- 表结构 -->
        <div v-show="activeTab === 'structure'">
          <div v-if="selectedTable">
            <h6>表名: <code>{{ selectedTable }}</code></h6>
            
            <!-- 字段信息 -->
            <h6 class="mt-3">字段信息</h6>
            <div class="table-responsive">
              <table class="table table-sm table-bordered">
                <thead>
                  <tr>
                    <th>字段名</th>
                    <th>类型</th>
                    <th>允许空</th>
                    <th>键</th>
                    <th>默认值</th>
                    <th>额外</th>
                    <th>注释</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="col in structure.columns" :key="col.Field">
                    <td><code>{{ col.Field }}</code></td>
                    <td>{{ col.Type }}</td>
                    <td>{{ col.Null }}</td>
                    <td>{{ col.Key }}</td>
                    <td>{{ col.Default || '-' }}</td>
                    <td>{{ col.Extra || '-' }}</td>
                    <td>{{ col.Comment || '-' }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            
            <!-- 索引信息 -->
            <h6 class="mt-3">索引信息</h6>
            <div class="table-responsive">
              <table class="table table-sm table-bordered">
                <thead>
                  <tr>
                    <th>索引名</th>
                    <th>字段</th>
                    <th>唯一</th>
                    <th>类型</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(idx, index) in structure.indexes" :key="index">
                    <td><code>{{ idx.Key_name }}</code></td>
                    <td>{{ idx.Column_name }}</td>
                    <td>{{ idx.Non_unique == 0 ? '是' : '否' }}</td>
                    <td>{{ idx.Index_type }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            
            <!-- 建表语句 -->
            <h6 class="mt-3">建表语句</h6>
            <pre class="bg-light p-3" style="max-height: 300px; overflow-y: auto;"><code>{{ structure.create_sql }}</code></pre>
          </div>
          <div v-else class="text-center text-muted py-5">
            请先在"数据表"标签中选择一个表
          </div>
        </div>
        
        <!-- 表数据 -->
        <div v-show="activeTab === 'data'">
          <div v-if="selectedTable">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h6 class="mb-0">表名: <code>{{ selectedTable }}</code> (共 {{ tableData.total }} 条记录)</h6>
              <div>
                <button class="btn btn-sm btn-secondary" @click="loadTableData(1)">
                  <i class="mdi mdi-refresh"></i> 刷新
                </button>
              </div>
            </div>
            
            <div class="table-responsive">
              <table class="table table-sm table-bordered table-hover">
                <thead>
                  <tr>
                    <th v-for="(value, key) in tableData.data[0]" :key="key">{{ key }}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(row, index) in tableData.data" :key="index">
                    <td v-for="(value, key) in row" :key="key">
                      <span v-if="value === null" class="text-muted">NULL</span>
                      <span v-else>{{ value }}</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            
            <!-- 分页 -->
            <nav v-if="tableData.total > tableData.limit">
              <ul class="pagination">
                <li class="page-item" :class="{disabled: tableData.page === 1}">
                  <a class="page-link" @click="loadTableData(tableData.page - 1)" href="javascript:void(0)">上一页</a>
                </li>
                <li class="page-item active">
                  <span class="page-link">{{ tableData.page }} / {{ Math.ceil(tableData.total / tableData.limit) }}</span>
                </li>
                <li class="page-item" :class="{disabled: tableData.page >= Math.ceil(tableData.total / tableData.limit)}">
                  <a class="page-link" @click="loadTableData(tableData.page + 1)" href="javascript:void(0)">下一页</a>
                </li>
              </ul>
            </nav>
          </div>
          <div v-else class="text-center text-muted py-5">
            请先在"数据表"标签中选择一个表
          </div>
        </div>
        
        <!-- SQL 查询 -->
        <div v-show="activeTab === 'sql'">
          <div class="alert alert-warning" role="alert">
            <i class="mdi mdi-alert"></i> <strong>安全提示：</strong>只允许执行 SELECT 查询语句
          </div>
          
          <div class="mb-3">
            <label class="form-label">SQL 语句</label>
            <textarea class="form-control" v-model="sqlQuery" rows="5" placeholder="输入 SELECT 查询语句..."></textarea>
          </div>
          
          <button class="btn btn-primary" @click="executeSql">
            <i class="mdi mdi-play"></i> 执行查询
          </button>
          
          <!-- 查询结果 -->
          <div v-if="sqlResult.data" class="mt-4">
            <h6>查询结果 ({{ sqlResult.rows }} 行)</h6>
            <div class="table-responsive">
              <table class="table table-sm table-bordered">
                <thead>
                  <tr>
                    <th v-for="(value, key) in sqlResult.data[0]" :key="key">{{ key }}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(row, index) in sqlResult.data" :key="index">
                    <td v-for="(value, key) in row" :key="key">
                      <span v-if="value === null" class="text-muted">NULL</span>
                      <span v-else>{{ value }}</span>
                    </td>
                  </tr>
                </tbody>
              </table>
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
  

<div class="row" id="app">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <h5 class="mb-0"><i class="mdi mdi-database"></i> 数据库管理</h5>
      </div>
      <div class="card-body">
        <!-- 标签页 -->
        <ul class="nav nav-tabs mb-3" role="tablist">
          <li class="nav-item">
            <a class="nav-link" :class="{active: activeTab === 'tables'}" @click="activeTab = 'tables'" href="javascript:void(0)">
              <i class="mdi mdi-table"></i> 数据表
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" :class="{active: activeTab === 'structure'}" @click="activeTab = 'structure'" href="javascript:void(0)">
              <i class="mdi mdi-table-cog"></i> 表结构
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" :class="{active: activeTab === 'data'}" @click="activeTab = 'data'" href="javascript:void(0)">
              <i class="mdi mdi-table-eye"></i> 表数据
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" :class="{active: activeTab === 'sql'}" @click="activeTab = 'sql'" href="javascript:void(0)">
              <i class="mdi mdi-code-tags"></i> SQL 查询
            </a>
          </li>
        </ul>
        
        <!-- 数据表列表 -->
        <div v-show="activeTab === 'tables'">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>表名</th>
                  <th>引擎</th>
                  <th>行数</th>
                  <th>大小</th>
                  <th>注释</th>
                  <th width="200">操作</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="table in tables" :key="table.name">
                  <td><code>{{ table.name }}</code></td>
                  <td>{{ table.engine }}</td>
                  <td>{{ table.rows }}</td>
                  <td>{{ table.size_format }}</td>
                  <td>{{ table.comment || '-' }}</td>
                  <td>
                    <a href="javascript:void(0)" @click="viewStructure(table.name)">结构</a>
                    <span class="text-muted mx-1">|</span>
                    <a href="javascript:void(0)" @click="viewData(table.name)">数据</a>
                    <span class="text-muted mx-1">|</span>
                    <a href="javascript:void(0)" @click="optimizeTable(table.name)">优化</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        
        <!-- 表结构 -->
        <div v-show="activeTab === 'structure'">
          <div v-if="selectedTable">
            <h6>表名: <code>{{ selectedTable }}</code></h6>
            
            <!-- 字段信息 -->
            <h6 class="mt-3">字段信息</h6>
            <div class="table-responsive">
              <table class="table table-sm table-bordered">
                <thead>
                  <tr>
                    <th>字段名</th>
                    <th>类型</th>
                    <th>允许空</th>
                    <th>键</th>
                    <th>默认值</th>
                    <th>额外</th>
                    <th>注释</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="col in structure.columns" :key="col.Field">
                    <td><code>{{ col.Field }}</code></td>
                    <td>{{ col.Type }}</td>
                    <td>{{ col.Null }}</td>
                    <td>{{ col.Key }}</td>
                    <td>{{ col.Default || '-' }}</td>
                    <td>{{ col.Extra || '-' }}</td>
                    <td>{{ col.Comment || '-' }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            
            <!-- 索引信息 -->
            <h6 class="mt-3">索引信息</h6>
            <div class="table-responsive">
              <table class="table table-sm table-bordered">
                <thead>
                  <tr>
                    <th>索引名</th>
                    <th>字段</th>
                    <th>唯一</th>
                    <th>类型</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(idx, index) in structure.indexes" :key="index">
                    <td><code>{{ idx.Key_name }}</code></td>
                    <td>{{ idx.Column_name }}</td>
                    <td>{{ idx.Non_unique == 0 ? '是' : '否' }}</td>
                    <td>{{ idx.Index_type }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            
            <!-- 建表语句 -->
            <h6 class="mt-3">建表语句</h6>
            <pre class="bg-light p-3" style="max-height: 300px; overflow-y: auto;"><code>{{ structure.create_sql }}</code></pre>
          </div>
          <div v-else class="text-center text-muted py-5">
            请先在"数据表"标签中选择一个表
          </div>
        </div>
        
        <!-- 表数据 -->
        <div v-show="activeTab === 'data'">
          <div v-if="selectedTable">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h6 class="mb-0">表名: <code>{{ selectedTable }}</code> (共 {{ tableData.total }} 条记录)</h6>
              <div>
                <button class="btn btn-sm btn-secondary" @click="loadTableData(1)">
                  <i class="mdi mdi-refresh"></i> 刷新
                </button>
              </div>
            </div>
            
            <div class="table-responsive">
              <table class="table table-sm table-bordered table-hover">
                <thead>
                  <tr>
                    <th v-for="(value, key) in tableData.data[0]" :key="key">{{ key }}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(row, index) in tableData.data" :key="index">
                    <td v-for="(value, key) in row" :key="key">
                      <span v-if="value === null" class="text-muted">NULL</span>
                      <span v-else>{{ value }}</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            
            <!-- 分页 -->
            <nav v-if="tableData.total > tableData.limit">
              <ul class="pagination">
                <li class="page-item" :class="{disabled: tableData.page === 1}">
                  <a class="page-link" @click="loadTableData(tableData.page - 1)" href="javascript:void(0)">上一页</a>
                </li>
                <li class="page-item active">
                  <span class="page-link">{{ tableData.page }} / {{ Math.ceil(tableData.total / tableData.limit) }}</span>
                </li>
                <li class="page-item" :class="{disabled: tableData.page >= Math.ceil(tableData.total / tableData.limit)}">
                  <a class="page-link" @click="loadTableData(tableData.page + 1)" href="javascript:void(0)">下一页</a>
                </li>
              </ul>
            </nav>
          </div>
          <div v-else class="text-center text-muted py-5">
            请先在"数据表"标签中选择一个表
          </div>
        </div>
        
        <!-- SQL 查询 -->
        <div v-show="activeTab === 'sql'">
          <div class="alert alert-warning" role="alert">
            <i class="mdi mdi-alert"></i> <strong>安全提示：</strong>只允许执行 SELECT 查询语句
          </div>
          
          <div class="mb-3">
            <label class="form-label">SQL 语句</label>
            <textarea class="form-control" v-model="sqlQuery" rows="5" placeholder="输入 SELECT 查询语句..."></textarea>
          </div>
          
          <button class="btn btn-primary" @click="executeSql">
            <i class="mdi mdi-play"></i> 执行查询
          </button>
          
          <!-- 查询结果 -->
          <div v-if="sqlResult.data" class="mt-4">
            <h6>查询结果 ({{ sqlResult.rows }} 行)</h6>
            <div class="table-responsive">
              <table class="table table-sm table-bordered">
                <thead>
                  <tr>
                    <th v-for="(value, key) in sqlResult.data[0]" :key="key">{{ key }}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(row, index) in sqlResult.data" :key="index">
                    <td v-for="(value, key) in row" :key="key">
                      <span v-if="value === null" class="text-muted">NULL</span>
                      <span v-else>{{ value }}</span>
                    </td>
                  </tr>
                </tbody>
              </table>
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
createVueApp({
  data() {
    return {
      activeTab: 'tables',
      tables: [],
      selectedTable: '',
      structure: {
        columns: [],
        indexes: [],
        create_sql: ''
      },
      tableData: {
        total: 0,
        page: 1,
        limit: 20,
        data: []
      },
      sqlQuery: '',
      sqlResult: {
        rows: 0,
        data: null
      }
    };
  },
  mounted() {
    this.loadTables();
  },
  methods: {
    async loadTables() {
      try {
        const res = await this.postAsync('database', { action: 'tables' });
        if (res.code === 0) {
          this.tables = res.data;
        }
      } catch (e) {
        console.error('加载表列表失败:', e);
      }
    },
    
    async viewStructure(table) {
      this.selectedTable = table;
      this.activeTab = 'structure';
      
      const loading = layer.load();
      
      try {
        const res = await this.postAsync('database', {
          action: 'structure',
          table: table
        });
        
        layer.close(loading);
        
        if (res.code === 0) {
          this.structure = res.data;
        } else {
          layer.msg(res.msg || '加载失败', { icon: 2 });
        }
      } catch (e) {
        layer.close(loading);
        layer.msg('加载失败: ' + e.message, { icon: 2 });
      }
    },
    
    async viewData(table) {
      this.selectedTable = table;
      this.activeTab = 'data';
      this.loadTableData(1);
    },
    
    async loadTableData(page) {
      if (!this.selectedTable) return;
      
      const loading = layer.load();
      
      try {
        const res = await this.postAsync('database', {
          action: 'data',
          table: this.selectedTable,
          page: page,
          limit: 20
        });
        
        layer.close(loading);
        
        if (res.code === 0) {
          this.tableData = res.data;
        } else {
          layer.msg(res.msg || '加载失败', { icon: 2 });
        }
      } catch (e) {
        layer.close(loading);
        layer.msg('加载失败: ' + e.message, { icon: 2 });
      }
    },
    
    async optimizeTable(table) {
      this.confirm('确定要优化表 ' + table + ' 吗？', async () => {
        const loading = layer.load();
        
        try {
          const res = await this.postAsync('database', {
            action: 'optimize',
            table: table
          });
          
          layer.close(loading);
          
          if (res.code === 1) {
            layer.msg(res.msg, { icon: 1 });
            this.loadTables();
          } else {
            layer.msg(res.msg || '优化失败', { icon: 2 });
          }
        } catch (e) {
          layer.close(loading);
          layer.msg('优化失败: ' + e.message, { icon: 2 });
        }
      });
    },
    
    async executeSql() {
      if (!this.sqlQuery.trim()) {
        layer.msg('请输入 SQL 语句', { icon: 0 });
        return;
      }
      
      const loading = layer.load();
      
      try {
        const res = await this.postAsync('database', {
          action: 'execute',
          sql: this.sqlQuery
        });
        
        layer.close(loading);
        
        if (res.code === 0) {
          this.sqlResult = res.data;
          layer.msg('查询成功', { icon: 1 });
        } else {
          layer.msg(res.msg || '查询失败', { icon: 2 });
        }
      } catch (e) {
        layer.close(loading);
        layer.msg('查询失败: ' + e.message, { icon: 2 });
      }
    },
    
    postAsync(url, data) {
      return new Promise((resolve, reject) => {
        this.post(url, data, (res) => {
          resolve(res);
        });
      });
    }
  }
}).mount('#app');
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
