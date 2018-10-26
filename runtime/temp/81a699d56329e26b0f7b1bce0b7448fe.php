<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"D:\phpStudy\WWW\one'sRemainingYears\public/../application/home\view\index\index.html";i:1540537410;s:72:"D:\phpStudy\WWW\one'sRemainingYears\application\home\view\base\base.html";i:1540536931;}*/ ?>
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

    <div class="hui-wrap">
        <img src="/one'sRemainingYears/public/static/hui/img/banner.png" width="100%">
    </div>


<!-- 内容消息滚动栏 -->

    <div style="background:#FFF; padding:0px 15px; margin:10px;" class="hui-flex">
        <div style="height:46px; width:20px;">
            <img src="/one'sRemainingYears/public/static/hui/img/spiker.png" width="20" style="padding:13px 0px;">
        </div>
        <div class="hui-scroll-news" id="scrollnew1">
            
            
            <div class="hui-scroll-news-items hui-scroll-news-h0">暴雪再袭长三角：交通遭重创 用电量增 菜价涨</div>
        <div class="hui-scroll-news-items "><a href="javascript:hui.toast('test...');">一块橘子皮就能秒开你的手机</a></div><div class="hui-scroll-news-items ">新一轮成品油价或迎年内首次"二连涨"</div></div>
    </div>


<!-- 正式内容栏 -->

    <div class="hui-wrap">
        <div class="hui-media-list" style="padding:10px;">
            <ul>
                <li>
                    <a href="javascript:hui.toast('hi...');">
                        <div class="hui-media-list-img"><img src="/one'sRemainingYears/public/static/hui/img/1.jpg"></div>
                        <div class="hui-media-content">
                            <h1>标题内容....</h1>
                            <p>power by hcoder.net</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:hui.toast('hi...');">
                        <div class="hui-media-list-img"><img src="/one'sRemainingYears/public/static/hui/img/2.jpg"></div>
                        <div class="hui-media-content">
                            <h1>标题内容....</h1>
                            <p>power by hcoder.net</p>
                        </div>
                    </a>
                </li>
            </ul>
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

    <script type="text/javascript">
        hui('#nav-my').pointMsg();
        hui('#nav-news').pointMsg('hot', null, null, null, '1px');
        hui('#nav-forum').pointMsg(8);
    </script>

</body>
</html>