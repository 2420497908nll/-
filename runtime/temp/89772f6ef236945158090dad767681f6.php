<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:87:"E:\phpstudy\WWW\one'sRemainingYears\public/../application/home\view\login\register.html";i:1540568729;s:72:"E:\phpstudy\WWW\one'sRemainingYears\application\home\view\base\base.html";i:1540563430;}*/ ?>
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
    <h1>注册账号</h1>
</header>


<!-- 内容消息滚动栏 -->




<!-- 正式内容栏 -->

<div class="hui-wrap">
    <form style="padding:28px 10px;" class="hui-form" id="form1">
        <div class="hui-form-items">
        	<div class="hui-form-items-title">您的昵称</div>
            <input type="text" class="hui-input hui-input-clear" name="user_name" placeholder="昵称必须在8-16位之间">
        </div>
        <div class="hui-form-items">
        	<div class="hui-form-items-title">电子邮箱</div>
            <input type="text" class="hui-input" placeholder="请输入电子邮箱" name="email">
        </div>
        <div class="hui-form-items">
        	<div class="hui-form-items-title">登录密码</div>
            <input type="password" name="pwd" class="hui-input hui-pwd-eye" placeholder="登录密码">
        <div class="hui-pwd-eyes" onclick="hui.eyesChange(this);"></div></div>
        <div class="hui-form-items">
            <div class="hui-form-items-title">性别</div>
            <div class="hui-form-radios" style="line-height:38px;">
                <input type="radio" value="1" name="sex" id="g1" checked="checked">
                <label for="g1">男生</label><br>
                <input type="radio" value="2" name="sex" id="g2">
                <label for="g2">女生</label>
            </div>
        </div>
        <div class="hui-form-items">
            <div class="hui-form-items-title">验证码</div>
            <input type="number" class="hui-input" name="code">
            <div style="width:250px;">
            	<a href="#" style="color: blue" onclick="phonenum()" id="phonenum">点击获取验证码</a>
            </div>
        </div>
        <div style="padding:15px 8px;">
            <button type="button" onclick="register()" class="hui-button hui-primary hui-fr" id="submitBtn">注册</button>
        </div>
    </form>
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

<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
	//验证码倒计时
	var countdown=60;

	function phonenum(){
        var email = $('input[name="email"]').val();

        $.post("<?php echo url('home/login/sendEmail'); ?>",{'email':email},function(res){
            hui.toast(res.msg);
        },'json');

	    var obj = $("#phonenum");
	    settime(obj);
    }

    function settime(obj) { //发送验证码倒计时
    if (countdown == 0) { 
	        obj.attr('disabled',false); 
	        //obj.removeattr("disabled"); 
	        obj.html("免费获取验证码");
	        countdown = 60; 
	        return;
	    } else { 
	        obj.attr('disabled',true);
	        obj.html("重新发送(" + countdown + ")");
	        countdown--; 
	    } 
		setTimeout(function() { 
		    settime(obj) 
		},1500) 
	}


    //注册
    function register()
    {
        var user_name = $('input[name="user_name"]').val();
        var email = $('input[name="email"]').val();
        var pwd = $('input[name="pwd"]').val();
        var sex = $('input[name="sex"]').val();
        var code = $('input[name="code"]').val();

        var json = {'user_name': user_name, 'email':email, 'pwd':pwd, 'sex': sex, 'code':code};

        $.post("<?php echo url('home/login/registerProcess'); ?>",json,function(res){
            if(res.code == 200)
            {
                hui.toast(res.msg);
                setTimeout(function(){window.location.href = "<?php echo url('home/login/index'); ?>"},1000);
            }else{
                hui.toast(res.msg);
            }
        },'json');
    }
</script>

</body>
</html>