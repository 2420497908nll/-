<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"E:\phpstudy\WWW\one'sRemainingYears\public/../application/home\view\login\index.html";i:1540563430;s:72:"E:\phpstudy\WWW\one'sRemainingYears\application\home\view\base\base.html";i:1540563430;}*/ ?>
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
    <h1>请先登录</h1>
</header>


<!-- 内容消息滚动栏 -->



<!-- 正式内容栏 -->

<div class="hui-wrap">
	<div class="hui-center-title" style="margin-top:40px;margin-bottom: 40px;">
    	<div style="width: 100px;height: 100px;border:1px solid red;margin: 0 auto;border-radius: 50%;text-align: center;">
    		
    	</div>
    </div>
    <div style="margin:20px 10px; margin-bottom:15px;" class="hui-form" id="form1">
        <div class="hui-form-items">
        	<div class="hui-form-items-title">用户名</div>
            <input type="text" class="hui-input hui-input-clear" name="user_name" placeholder="输入用户名" checktype="string" checkdata="5,20" checkmsg="用户名应为5-20个字符">
        </div>
        <div class="hui-form-items">
        	<div class="hui-form-items-title">登录密码</div>
            <input type="password" class="hui-input hui-pwd-eye" name="password" placeholder="登录密码" checktype="string" id="pwd" checkdata="6,20" checkmsg="密码应为6-20个字符">
        </div>
    </div>
    <div style="padding:10px; padding-top:10px;">
        <button type="button" class="hui-button hui-button-large hui-primary" id="submit" onclick="login()">立即登录</button>
    </div>
    <a href="<?php echo url('home/Login/register'); ?>" style="float: right;margin-right: 10px;font-family: '黑体'">没有账号？去注册</a>
</div>


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
<script type="text/javascript" src="/one'sRemainingYears/public/static/hui/js/hui-form.js"></script>

<script type="text/javascript">
	function login()
	{
		var user_name = hui('input[name="user_name"]').val();
		var password = hui('input[name="password"]').val();

		hui.postJSON(
            "<?php echo url('home/Login/loginProcess'); ?>",
            {'user_name': user_name, 'password': password},
            function(msg){
                console.log(msg);
                if(msg.code == 200)
                {
                    hui.toast(msg.msg);
                    setTimeout(function(){window.location.href="<?php echo url('home/index/index'); ?>"},1000);
                }else
                {
                    hui.toast(msg.msg);
                }
            }
        );
	}
</script>

</body>
</html>