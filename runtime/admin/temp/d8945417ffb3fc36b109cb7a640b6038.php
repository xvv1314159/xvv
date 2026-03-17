<?php /*a:2:{s:56:"/www/wwwroot/www.xvv.cc/app/admin/view/config/index.html";i:1773769974;s:48:"/www/wwwroot/www.xvv.cc/app/admin/view/base.html";i:1773769974;}*/ ?>
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

<link href="/static/wangeditor/style.css" rel="stylesheet"/>

<style>
    .wrapper {
        border: 1px solid #ccc;
        z-index: 100; /* 按需定义 */
    }
    .toolbar {
        border-bottom: 1px solid #ccc; 
    }
    .editor {
        height: 500px; 
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
        
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">系统配置</h5>
    </div>
    <div class="card-body">
        <?php if(empty($configs)): ?>
        <div class="alert alert-info">
            <i class="mdi mdi-information"></i> <?php echo htmlentities((string) (isset($emptyMessage) && ($emptyMessage !== '')?$emptyMessage:'暂无配置项')); ?>
        </div>
        <?php else: ?>
        <ul class="nav nav-tabs nav-tabs-line">
            <?php foreach($configs as $k=>$v): ?>
            <li class="nav-item">
                <a href="?key=<?php echo htmlentities((string) $k); if($plugin): ?>&plugin=<?php echo htmlentities((string) $plugin); ?><?php endif; if($iframe): ?>&iframe=<?php echo htmlentities((string) $iframe); ?><?php endif; ?>" class="nav-link <?php if($key==$k): ?>active<?php endif; ?>"><?php echo htmlentities((string) $v['title']); ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
        
        <div class="tab-content mt-2" id="myTabContent">
			<div class="tab-pane fade active show">
			    <form @submit.prevent="submit">
                    <div class="form-group" v-if="form[currentKey].config" v-for="(v,k) in form[currentKey].config" :key="k" v-if="v.type">
                        <label v-text="v.title"></label>
                        <input v-if="v.type=='text'" type="text" class="form-control" v-model="v.value">
                        <input v-if="v.type=='password'" type="password" class="form-control" v-model="v.value">
                        <input v-if="v.type=='number'" type="number" class="form-control" v-model="v.value">
                        <textarea v-if="v.type=='textarea'" class="form-control" rows="8" v-model="v.value"></textarea>
                        <div v-if="v.type=='image'">
                            <input type="file" class="form-control" accept="image/*" @change="imageChange($event,k)" :ref="'image_'+k">
                            <div v-if="getImagePreview(k)" class="mt-2 position-relative d-inline-block">
                                <img :src="getImagePreview(k)" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1" @click="removeImage(k)">
                                    <i class="mdi mdi-close"></i>
                                </button>
                            </div>
                            <small class="text-muted d-block mt-1">支持 jpg, png, gif 等图片格式</small>
                        </div>
                        <div v-if="v.type=='video'">
                            <input type="file" class="form-control" accept="video/*" @change="videoChange($event,k)" :ref="'video_'+k">
                            <div v-if="getVideoPreview(k)" class="mt-2 position-relative d-inline-block">
                                <video :src="getVideoPreview(k)" controls class="border rounded" style="max-width: 400px; max-height: 300px;"></video>
                                <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1" @click="removeVideo(k)">
                                    <i class="mdi mdi-close"></i>
                                </button>
                            </div>
                            <small class="text-muted d-block mt-1">支持 mp4, avi, mov 等视频格式</small>
                        </div>
                        <div v-if="v.type=='images'">
                            <input type="file" class="form-control" accept="image/*" multiple @change="imagesChange($event,k)" :ref="'images_'+k">
                            <div v-if="getImagesPreview(k).length > 0" class="mt-2 d-flex flex-wrap gap-2">
                                <div v-for="(preview, index) in getImagesPreview(k)" :key="index" class="position-relative d-inline-block" draggable="true" @dragstart="dragStartImage(k, index)" @dragover="dragOverImage($event, k, index)" @dragend="dragEndImage(k)" style="cursor: move;">
                                    <img :src="preview" class="img-thumbnail" style="width: 120px; height: 120px; object-fit: cover;">
                                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1" @click="removeImageItem(k, index)">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                    <div class="position-absolute bottom-0 start-0 m-1 badge bg-dark">{{ index + 1 }}</div>
                                </div>
                            </div>
                            <small class="text-muted d-block mt-1">可选择多张图片，拖拽可排序</small>
                        </div>
                        <div v-if="v.type=='videos'">
                            <input type="file" class="form-control" accept="video/*" multiple @change="videosChange($event,k)" :ref="'videos_'+k">
                            <div v-if="getVideosPreview(k).length > 0" class="mt-2 d-flex flex-wrap gap-2">
                                <div v-for="(preview, index) in getVideosPreview(k)" :key="index" class="position-relative d-inline-block" draggable="true" @dragstart="dragStartVideo(k, index)" @dragover="dragOverVideo($event, k, index)" @dragend="dragEndVideo(k)" style="cursor: move;">
                                    <video :src="preview" controls class="border rounded" style="width: 200px; height: 150px;"></video>
                                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1" @click="removeVideoItem(k, index)">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                    <div class="position-absolute bottom-0 start-0 m-1 badge bg-dark">{{ index + 1 }}</div>
                                </div>
                            </div>
                            <small class="text-muted d-block mt-1">可选择多个视频，拖拽可排序</small>
                        </div>
                        <div v-if="v.type=='radio'" class="input-group">
                            <div class="form-check form-check-inline" v-for="(v1,k1) in v.params">
                                <input class="form-check-input" type="radio" :id="'radio'+k+k1" v-model="v.value" :value="v1.key"/>
                                <label class="form-check-label" :for="'radio'+k+k1">{{v1.name}}</label>
                            </div>
                        </div>
                        <div v-if="v.type=='checkbox'" class="input-group">
                            <div class="form-check form-check-inline" v-for="(v1,k1) in v.params">
                                <input class="form-check-input" type="checkbox" :id="'checkbox'+k+k1" v-model="v.value" :value="v1.key"/>
                                <label class="form-check-label" :for="'checkbox'+k+k1">{{v1.name}}</label>
                            </div>
                        </div>
                        <select v-if="v.type=='select'" class="form-control" v-model="v.value">
                            <option value="">请选择</option>
                            <option v-for="v1 of v.params" :value="v1.key">{{v1.name}}</option>
                        </select>
                        <template v-if="v.type=='editor'">
                            <div class="wrapper">
                                <div :class="'toolbar key'+k"><!-- 工具栏 --></div>
                                <div :class="'editor key'+k"><!-- 编辑器 --></div>
                            </div>
                        </template>
                        
                        <small class="help-block">调用方式：<code>get_config('<?php echo htmlentities((string) $key); ?>.{{k}}')</code></small>
                        
                        
                        
                        <br />
                        <small v-if="v.desc" class="help-block">备注：{{v.desc}}</small>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary m-r-5">确 定</button>
                    </div>
                </form>
			</div>
		</div>
        <?php endif; ?>
    </div>
</div>

      </div>

    </main>
    <!--End 页面主要内容-->
  </div>
</div>
<?php else: ?>
<div class="container-fluid p-3" id="app">
  
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">系统配置</h5>
    </div>
    <div class="card-body">
        <?php if(empty($configs)): ?>
        <div class="alert alert-info">
            <i class="mdi mdi-information"></i> <?php echo htmlentities((string) (isset($emptyMessage) && ($emptyMessage !== '')?$emptyMessage:'暂无配置项')); ?>
        </div>
        <?php else: ?>
        <ul class="nav nav-tabs nav-tabs-line">
            <?php foreach($configs as $k=>$v): ?>
            <li class="nav-item">
                <a href="?key=<?php echo htmlentities((string) $k); if($plugin): ?>&plugin=<?php echo htmlentities((string) $plugin); ?><?php endif; if($iframe): ?>&iframe=<?php echo htmlentities((string) $iframe); ?><?php endif; ?>" class="nav-link <?php if($key==$k): ?>active<?php endif; ?>"><?php echo htmlentities((string) $v['title']); ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
        
        <div class="tab-content mt-2" id="myTabContent">
			<div class="tab-pane fade active show">
			    <form @submit.prevent="submit">
                    <div class="form-group" v-if="form[currentKey].config" v-for="(v,k) in form[currentKey].config" :key="k" v-if="v.type">
                        <label v-text="v.title"></label>
                        <input v-if="v.type=='text'" type="text" class="form-control" v-model="v.value">
                        <input v-if="v.type=='password'" type="password" class="form-control" v-model="v.value">
                        <input v-if="v.type=='number'" type="number" class="form-control" v-model="v.value">
                        <textarea v-if="v.type=='textarea'" class="form-control" rows="8" v-model="v.value"></textarea>
                        <div v-if="v.type=='image'">
                            <input type="file" class="form-control" accept="image/*" @change="imageChange($event,k)" :ref="'image_'+k">
                            <div v-if="getImagePreview(k)" class="mt-2 position-relative d-inline-block">
                                <img :src="getImagePreview(k)" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1" @click="removeImage(k)">
                                    <i class="mdi mdi-close"></i>
                                </button>
                            </div>
                            <small class="text-muted d-block mt-1">支持 jpg, png, gif 等图片格式</small>
                        </div>
                        <div v-if="v.type=='video'">
                            <input type="file" class="form-control" accept="video/*" @change="videoChange($event,k)" :ref="'video_'+k">
                            <div v-if="getVideoPreview(k)" class="mt-2 position-relative d-inline-block">
                                <video :src="getVideoPreview(k)" controls class="border rounded" style="max-width: 400px; max-height: 300px;"></video>
                                <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1" @click="removeVideo(k)">
                                    <i class="mdi mdi-close"></i>
                                </button>
                            </div>
                            <small class="text-muted d-block mt-1">支持 mp4, avi, mov 等视频格式</small>
                        </div>
                        <div v-if="v.type=='images'">
                            <input type="file" class="form-control" accept="image/*" multiple @change="imagesChange($event,k)" :ref="'images_'+k">
                            <div v-if="getImagesPreview(k).length > 0" class="mt-2 d-flex flex-wrap gap-2">
                                <div v-for="(preview, index) in getImagesPreview(k)" :key="index" class="position-relative d-inline-block" draggable="true" @dragstart="dragStartImage(k, index)" @dragover="dragOverImage($event, k, index)" @dragend="dragEndImage(k)" style="cursor: move;">
                                    <img :src="preview" class="img-thumbnail" style="width: 120px; height: 120px; object-fit: cover;">
                                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1" @click="removeImageItem(k, index)">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                    <div class="position-absolute bottom-0 start-0 m-1 badge bg-dark">{{ index + 1 }}</div>
                                </div>
                            </div>
                            <small class="text-muted d-block mt-1">可选择多张图片，拖拽可排序</small>
                        </div>
                        <div v-if="v.type=='videos'">
                            <input type="file" class="form-control" accept="video/*" multiple @change="videosChange($event,k)" :ref="'videos_'+k">
                            <div v-if="getVideosPreview(k).length > 0" class="mt-2 d-flex flex-wrap gap-2">
                                <div v-for="(preview, index) in getVideosPreview(k)" :key="index" class="position-relative d-inline-block" draggable="true" @dragstart="dragStartVideo(k, index)" @dragover="dragOverVideo($event, k, index)" @dragend="dragEndVideo(k)" style="cursor: move;">
                                    <video :src="preview" controls class="border rounded" style="width: 200px; height: 150px;"></video>
                                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1" @click="removeVideoItem(k, index)">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                    <div class="position-absolute bottom-0 start-0 m-1 badge bg-dark">{{ index + 1 }}</div>
                                </div>
                            </div>
                            <small class="text-muted d-block mt-1">可选择多个视频，拖拽可排序</small>
                        </div>
                        <div v-if="v.type=='radio'" class="input-group">
                            <div class="form-check form-check-inline" v-for="(v1,k1) in v.params">
                                <input class="form-check-input" type="radio" :id="'radio'+k+k1" v-model="v.value" :value="v1.key"/>
                                <label class="form-check-label" :for="'radio'+k+k1">{{v1.name}}</label>
                            </div>
                        </div>
                        <div v-if="v.type=='checkbox'" class="input-group">
                            <div class="form-check form-check-inline" v-for="(v1,k1) in v.params">
                                <input class="form-check-input" type="checkbox" :id="'checkbox'+k+k1" v-model="v.value" :value="v1.key"/>
                                <label class="form-check-label" :for="'checkbox'+k+k1">{{v1.name}}</label>
                            </div>
                        </div>
                        <select v-if="v.type=='select'" class="form-control" v-model="v.value">
                            <option value="">请选择</option>
                            <option v-for="v1 of v.params" :value="v1.key">{{v1.name}}</option>
                        </select>
                        <template v-if="v.type=='editor'">
                            <div class="wrapper">
                                <div :class="'toolbar key'+k"><!-- 工具栏 --></div>
                                <div :class="'editor key'+k"><!-- 编辑器 --></div>
                            </div>
                        </template>
                        
                        <small class="help-block">调用方式：<code>get_config('<?php echo htmlentities((string) $key); ?>.{{k}}')</code></small>
                        
                        
                        
                        <br />
                        <small v-if="v.desc" class="help-block">备注：{{v.desc}}</small>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary m-r-5">确 定</button>
                    </div>
                </form>
			</div>
		</div>
        <?php endif; ?>
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

<script src="/static/wangeditor/index.js"></script>
<script>
    const { createApp } = Vue;
    
    createVueApp({
        data(){
            return {
                form: <?php echo json_encode($configs,256); ?>,
                draggedIndex: null,
                currentKey: '<?php echo htmlentities((string) $key); ?>'
            }
        },
        created(){
            const { createEditor, createToolbar } = window.wangEditor
            let _this = this;
            if(this.form[this.currentKey].config){
                setTimeout(()=>{
                    for(let k in this.form[this.currentKey].config){
                        if(this.form[this.currentKey].config[k].type=='editor'){
                            const editorConfig = {
                                placeholder: '请填写内容',
                                MENU_CONF:{
                                    uploadImage:{
                                        server:"upload_image",
                                        fieldName:'image'
                                    },
                                    uploadVideo:{
                                        server:"upload_image",
                                        fieldName:'video',
                                    }
                                },
                                onChange(editor) {
                                    _this.form[_this.currentKey].config[k].value = editor.getHtml()
                                }
                            }
                            
                            const editor = createEditor({
                                selector: '.editor.key'+k,
                                html: _this.form[_this.currentKey].config[k].value,
                                config: editorConfig,
                                mode: 'default',
                            })
                            
                            const toolbarConfig = {}
                            
                            const toolbar = createToolbar({
                                editor,
                                selector: '.toolbar.key'+k,
                                config: toolbarConfig,
                                mode: 'default',
                            })
                        }
                    }
                },500)
                
            }
        },
        methods:{
            // 单图上传处理
            imageChange(e, k){
                const file = e.target.files[0];
                if (file) {
                    this.form[this.currentKey].config[k].value = file;
                }
            },
            removeImage(k){
                this.form[this.currentKey].config[k].value = '';
                if (this.$refs['image_'+k] && this.$refs['image_'+k][0]) {
                    this.$refs['image_'+k][0].value = '';
                }
            },
            getImagePreview(k){
                const value = this.form[this.currentKey].config[k].value;
                if (!value) return '';
                return typeof value === 'object' ? URL.createObjectURL(value) : value;
            },
            
            // 多图上传处理
            imagesChange(e, k){
                const files = Array.from(e.target.files);
                if (!this.form[this.currentKey].config[k].value || !Array.isArray(this.form[this.currentKey].config[k].value)) {
                    this.form[this.currentKey].config[k].value = [];
                }
                files.forEach(file => {
                    this.form[this.currentKey].config[k].value.push(file);
                });
            },
            removeImageItem(k, index){
                this.form[this.currentKey].config[k].value.splice(index, 1);
                if (this.form[this.currentKey].config[k].value.length === 0 && this.$refs['images_'+k] && this.$refs['images_'+k][0]) {
                    this.$refs['images_'+k][0].value = '';
                }
            },
            getImagesPreview(k){
                const value = this.form[this.currentKey].config[k].value;
                if (!Array.isArray(value)) return [];
                return value.map(item => typeof item === 'object' ? URL.createObjectURL(item) : item);
            },
            dragStartImage(k, index){
                this.draggedIndex = index;
            },
            dragOverImage(e, k, index){
                e.preventDefault();
                if (this.draggedIndex !== null && this.draggedIndex !== index) {
                    const item = this.form[this.currentKey].config[k].value.splice(this.draggedIndex, 1)[0];
                    this.form[this.currentKey].config[k].value.splice(index, 0, item);
                    this.draggedIndex = index;
                }
            },
            dragEndImage(k){
                this.draggedIndex = null;
            },
            
            // 单视频上传处理
            videoChange(e, k){
                const file = e.target.files[0];
                if (file) {
                    this.form[this.currentKey].config[k].value = file;
                }
            },
            removeVideo(k){
                this.form[this.currentKey].config[k].value = '';
                if (this.$refs['video_'+k] && this.$refs['video_'+k][0]) {
                    this.$refs['video_'+k][0].value = '';
                }
            },
            getVideoPreview(k){
                const value = this.form[this.currentKey].config[k].value;
                if (!value) return '';
                return typeof value === 'object' ? URL.createObjectURL(value) : value;
            },
            
            // 多视频上传处理
            videosChange(e, k){
                const files = Array.from(e.target.files);
                if (!this.form[this.currentKey].config[k].value || !Array.isArray(this.form[this.currentKey].config[k].value)) {
                    this.form[this.currentKey].config[k].value = [];
                }
                files.forEach(file => {
                    this.form[this.currentKey].config[k].value.push(file);
                });
            },
            removeVideoItem(k, index){
                this.form[this.currentKey].config[k].value.splice(index, 1);
                if (this.form[this.currentKey].config[k].value.length === 0 && this.$refs['videos_'+k] && this.$refs['videos_'+k][0]) {
                    this.$refs['videos_'+k][0].value = '';
                }
            },
            getVideosPreview(k){
                const value = this.form[this.currentKey].config[k].value;
                if (!Array.isArray(value)) return [];
                return value.map(item => typeof item === 'object' ? URL.createObjectURL(item) : item);
            },
            dragStartVideo(k, index){
                this.draggedIndex = index;
            },
            dragOverVideo(e, k, index){
                e.preventDefault();
                if (this.draggedIndex !== null && this.draggedIndex !== index) {
                    const item = this.form[this.currentKey].config[k].value.splice(this.draggedIndex, 1)[0];
                    this.form[this.currentKey].config[k].value.splice(index, 0, item);
                    this.draggedIndex = index;
                }
            },
            dragEndVideo(k){
                this.draggedIndex = null;
            },
            filterXSS(data){
                if (Array.isArray(data)) {
                    return data.map(item => this.filterXSS(item));
                }
                
                if (typeof data === 'object' && data !== null) {
                    const filtered = {};
                    for (let key in data) {
                        filtered[key] = this.filterXSS(data[key]);
                    }
                    return filtered;
                }
                
                if (typeof data !== 'string') {
                    return data;
                }
                
                if (/<[^>]+>/.test(data)) {
                    return data;
                }
                
                const div = document.createElement('div');
                div.textContent = data;
                return div.innerHTML;
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
