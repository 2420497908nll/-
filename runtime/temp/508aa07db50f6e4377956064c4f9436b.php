<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"D:\phpStudy\WWW\one'sRemainingYears\public/../application/home\view\my\index.html";i:1540537727;s:72:"D:\phpStudy\WWW\one'sRemainingYears\application\home\view\base\base.html";i:1540537551;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>HUI - 底部导航</title>
<link rel="stylesheet" type="text/css" href="/one'sRemainingYears/public/static/hui/css/hui.css" />
</head>
<body>
    <!-- 头部banner图 -->

<header class="hui-header">
    <h1>个人中心</h1>
</header>


<!-- 内容消息滚动栏 -->




<!-- 正式内容栏 -->




<!-- 底部导航栏 -->
<div id="hui-footer">
    <a href="<?php echo url('home/index/index'); ?>" id="nav-home">
        <div class="hui-footer-icons hui-icons-home"></div>
        <div class="hui-footer-text">首页</div>
    </a>
    <a href="javascript:hui.toast('新闻');" id="nav-news">
        <div class="hui-footer-icons hui-icons-news"></div>
        <div class="hui-footer-text">新闻</div>
    </a>
    <a href="javascript:hui.toast('新闻');" id="nav-news">
        <div class="hui-footer-icons hui-icons-news"></div>
        <div class="hui-footer-text">新闻</div>
    </a>
    <a href="javascript:hui.toast('社区');" id="nav-forum">
        <div class="hui-footer-icons hui-icons-forum"></div>
        <div class="hui-footer-text">社区</div>
    </a>
    <?php if($islogin == 1): ?>
    <a href="<?php echo url('home/my/index'); ?>" id="nav-my">
        <div class="hui-footer-icons hui-icons-my"></div>
        <div class="hui-footer-text">我的</div>
    </a>
    <?php else: ?>
    <a href="<?php echo url('home/login/index'); ?>" id="nav-my">
        <div class="hui-footer-icons hui-icons-my"></div>
        <div class="hui-footer-text">登录</div>
    </a>
    <?php endif; ?>
    
</div>

<script src="/one'sRemainingYears/public/static/hui/js/hui.js" type="text/javascript" charset="utf-8"></script>


</body>
</html>