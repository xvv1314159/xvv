<?php /*a:1:{s:65:"/www/wwwroot/www.xvv.cc//vendor/xvv/think-jump/src/tpl/error.html";i:1773747366;}*/ ?>
<!doctype html>
<html lang="zh-cn">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>操作失败</title>
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  body {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #fff1f2 0%, #ffe4e6 100%);
    font-family: "Microsoft Yahei", "PingFang SC", "Helvetica Neue", Arial, sans-serif;
  }
  .card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 8px 40px rgba(239,68,68,0.12), 0 2px 8px rgba(0,0,0,0.06);
    padding: 48px 56px;
    max-width: 480px;
    width: 90%;
    text-align: center;
    border-top: 5px solid #ef4444;
  }
  .icon {
    width: 72px;
    height: 72px;
    background: linear-gradient(135deg, #ef4444, #b91c1c);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    box-shadow: 0 4px 16px rgba(239,68,68,0.3);
  }
  .icon svg {
    width: 36px;
    height: 36px;
    fill: none;
    stroke: #fff;
    stroke-width: 3;
    stroke-linecap: round;
    stroke-linejoin: round;
  }
  h1 {
    font-size: 22px;
    font-weight: 600;
    color: #b91c1c;
    margin-bottom: 12px;
  }
  .msg {
    font-size: 15px;
    color: #4b5563;
    line-height: 1.7;
    margin-bottom: 28px;
    word-break: break-all;
  }
  .jump-info {
    font-size: 13px;
    color: #9ca3af;
    margin-bottom: 20px;
  }
  .jump-info b {
    color: #ef4444;
    font-weight: 600;
  }
  .btn {
    display: inline-block;
    padding: 10px 32px;
    background: linear-gradient(135deg, #ef4444, #b91c1c);
    color: #fff;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    box-shadow: 0 2px 8px rgba(239,68,68,0.25);
    transition: opacity 0.2s;
  }
  .btn:hover { opacity: 0.85; }
  @media (prefers-color-scheme: dark) {
    body { background: linear-gradient(135deg, #1c0a0a 0%, #2d1010 100%); }
    .card { background: #2a1515; border-top-color: #ef4444; box-shadow: 0 8px 40px rgba(0,0,0,0.4); }
    h1 { color: #f87171; }
    .msg { color: #fecaca; }
    .jump-info { color: #6b7280; }
  }
</style>
</head>
<body>
<div class="card">
  <div class="icon">
    <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
  </div>
  <h1>操作失败</h1>
  <p class="msg"><?=strip_tags($msg)?></p>
  <p class="jump-info"><b id="wait"><?=$wait?></b> 秒后自动跳转</p>
  <a class="btn" id="href" href="<?=$url?>">返回</a>
</div>
<script>
(function() {
  var wait = document.getElementById('wait');
  var href = document.getElementById('href');
  var interval = setInterval(function() {
    var t = --wait.innerHTML;
    if (t <= 0) { window.location.href = href.href; clearInterval(interval); }
  }, 1000);
})();
</script>
</body>
</html>
