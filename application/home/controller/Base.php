<?php
namespace app\home\controller;

use think\Controller;
use think\Session;
use email\PHPMailer;

/**
 * 
 */
class Base extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}


	//判断用户是否登陆
	public function userIsLogin()
	{
		if(Session::has('id'))
		{
			$is_login = 1;
		}else{
			$is_login = 0;
		}

		return $is_login;
	}


	/**
	 * 公共发送邮件方法
	 * @author liangguangchuan 2018-10-26
	 * @param  [string] $email   [电子邮箱]
	 * @param  [string] $connect [发送内容]
	 * @return [json]          [json对象]
	 */
	public function email($email,$connect)
	{
		$mail = new PHPMailer();
		$mail->isSMTP();// 使用SMTP服务
        $mail->CharSet = "utf8";// 编码格式为utf8，不设置编码的话，中文会出现乱码
        $mail->Host = "smtp.qq.com";// 发送方的SMTP服务器地址
        $mail->SMTPAuth = true;// 是否使用身份验证
        $mail->Username = "2420497908@qq.com";// 发送方的163邮箱用户名，就是你申请163的SMTP服务使用的163邮箱</span><span style="color:#333333;">
        $mail->Password = "wwysfwetwoibebbd";// 发送方的邮箱密码，注意用163邮箱这里填写的是“客户端授权密码”而不是邮箱的登录密码！</span><span style="color:#333333;">
        $mail->SMTPSecure = "ssl";// 使用ssl协议方式</span><span style="color:#333333;">
        $mail->Port = 465;// 163邮箱的ssl协议方式端口号是465/994
        $mail->setFrom("2420497908@qq.com","Mailer");// 设置发件人信息，如邮件格式说明中的发件人，这里会显示为Mailer(xxxx@163.com），Mailer是当做名字显示
        $mail->addAddress($email,'小Q资源网博客回复消息');// 设置收件人信息，如邮件格式说明中的收件人，y这里会显示为Liang(yyy@163.com)
        $mail->addReplyTo("","Reply");// 设置回复人信息，指的是收件人收到邮件后，如果要回复，回复邮件将发送到的邮箱地址
        //$mail->addCC("xxx@163.com");// 设置邮件抄送人，可以只写地址，上述的设置也可以只写地址(这个人也能收到邮件)
        //$mail->addBCC("xxx@163.com");// 设置秘密抄送人(这个人也能收到邮件)
        //$mail->addAttachment("bug0.jpg");// 添加附件
        $mail->Subject = "往后余生";// 邮件标题
        $mail->Body = $connect;// 邮件正文
        //$mail->AltBody = "This is the plain text纯文本";// 这个是设置纯文本方式显示的正文内容，如果不支持Html方式，就会用到这个，基本无用
 
        if(!$mail->send()){// 发送邮件
            return $mail->ErrorInfo;
        // echo "Message could not be sent.";
        // echo "Mailer Error: ".$mail->ErrorInfo;// 输出错误信息
        }else{
            return 1;
        }
	}
}