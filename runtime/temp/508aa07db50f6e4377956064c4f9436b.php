<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"D:\phpStudy\WWW\one'sRemainingYears\public/../application/home\view\my\index.html";i:1540540379;s:72:"D:\phpStudy\WWW\one'sRemainingYears\application\home\view\base\base.html";i:1540542824;}*/ ?>
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

<div class="hui-wrap">
    <div class="hui-list" style="background:#FFFFFF; margin-top:28px;">
        <a href="javascript:hui.toast('Hello Hcoder UI !');" style="height:auto; height:80px; padding-bottom:8px;">
    		<div class="hui-list-icons" style="width:110px; height:80px;">
    			<img src="/one'sRemainingYears/public/static/hui/img/list/home.png" style="width:66px; margin:0px; border-radius:50%;">
    		</div>
    		<div class="hui-list-text" style="height:79px; line-height:79px;">
    			<div class="hui-list-text-content">
    				Hcoder.net
    			</div>
    			<div class="hui-list-info">
    				<span class="hui-icons hui-icons-right"></span>
    			</div>
    		</div>
    	</a>
    	<!-- <a href="javascript:hui.toast('Hello Hcoder UI !');">
    		<div class="hui-list-text">
    			账户余额 : 1000元 | 积分 : 2000
    		</div>
    	</a> -->
    </div>
    <div class="hui-list" style="background:#FFFFFF; margin-top:28px;">
        <ul>
            <li>
            	<a href="javascript:void(0);">
            		<div class="hui-list-icons">
		    			<img src="/one'sRemainingYears/public/static/hui/img/list/sc.png">
		    		</div>
		    		<div class="hui-list-text">
		    			我的收藏
		    			<div class="hui-list-info">
		    				<span class="hui-icons hui-icons-right"></span>
		    			</div>
		    		</div>
            	</a>
           	</li>
            <li>
            	<a href="javascript:void(0);">
            		<div class="hui-list-icons">
		    			<img src="/one'sRemainingYears/public/static/hui/img/list/ht.png">
		    		</div>
		    		<div class="hui-list-text">
		    			我的话题
		    			<div class="hui-list-info">
		    				<span class="hui-icons hui-icons-right"></span>
		    			</div>
		    		</div>
            	</a>
           	</li>
           	<li>
            	<a href="javascript:void(0);">
            		<div class="hui-list-icons">
		    			<img src="/one'sRemainingYears/public/static/hui/img/list/order.png">
		    		</div>
		    		<div class="hui-list-text">
		    			我的订单
		    			<div class="hui-list-info">
		    				<span class="hui-icons hui-icons-right"></span>
		    			</div>
		    		</div>
            	</a>
           	</li>
           	<li>
            	<a href="javascript:void(0);">
            		<div class="hui-list-icons">
		    			<img src="/one'sRemainingYears/public/static/hui/img/list/lishi.png">
		    		</div>
		    		<div class="hui-list-text">
		    			历史足迹
		    			<div class="hui-list-info">
		    				<span class="hui-icons hui-icons-right"></span>
		    			</div>
		    		</div>
            	</a>
           	</li>
        </ul>
    </div>
    <div style="background:#FFFFFF; margin-top:28px;">
        <button type="button" class="hui-button hui-button-large" onclick="quit()">
        	<span class="hui-icons hui-icons-logoff"></span>退出系统
       	</button>
    </div>
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
	function quit()
	{

		var user_name = hui('input[name="user_name"]').val();
		var password = hui('input[name="password"]').val();

		hui.postJSON(
            "<?php echo url('home/Login/quit'); ?>",
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
                // hui.upToast(msg.name +' age : ' + msg.age);
            }
        );
	}
</script>

</body>
</html>