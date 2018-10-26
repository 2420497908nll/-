<?php
namespace app\home\controller;

use think\Session;
use think\Controller;
use think\Db;


class Login extends Base
{
	public function index()
	{

		$isLogin = $this -> userIsLogin();

		$this -> assign('islogin',$isLogin);
		return $this -> fetch();
	}

	public function loginProcess()
	{
		$user_name = $this -> request -> param('user_name');

		$password = $this -> request -> param('password');

		$userinfo = Db::table('user') -> where(['user_name' => $user_name]) -> find(); 
		if($userinfo)
		{
			$trueinfo = Db::table('user') -> where(['user_name' => $user_name, 'user_password' => md5($password)]) -> find();

			if($trueinfo)
			{
				if($trueinfo['user_is_forbidden'] == 1)
				{
					exit(json_encode(array('code' => 201, 'msg' => '用户被禁止登录,请联系系统管理员！！！')));
				}

				$id = $trueinfo['user_id'];
				Db::table('user') -> where(['user_id' => $id]) -> update(['user_end_login' => date("Y-m-d h:i:s")]);
				Session::set('id',$id);
				exit(json_encode(array('code' => 200, 'msg' => '登录成功')));

			}else{
				exit(json_encode(array('code' => 201, 'msg' => '用户名或密码错误')));
			}

		}else{
			exit(json_encode(array('code' => 201, 'msg' => '用户名或密码错误')));
		}
	}



	//email发送电子邮件
	public function sendEmail()
	{
		$emali = $this -> request -> param('email');
		$remailer = rand('1000','9999');
		Session::set('code',$remailer);
		$connect = '【往后余生】验证码：'.$remailer.'您正在进行注册操作[验证码告知他人将导致账户被盗，请勿泄露]';
		$is = $this -> email($emali,$connect);
		if($is == 1){
			exit(json_encode(array('code' => 200, 'msg' => '发送成功')));
		}else{
			exit(json_encode(array('code' => 201, 'msg' => '服务器繁忙')));
		}
	}


	//退出登陆
	public function quit()
	{
		Session::delete('id');
		exit(json_encode(array('code' => 200, 'msg' => '退出成功')));
	}



	//用户注册页面
	public function register()
	{
		$isLogin = $this -> userIsLogin();

		$this -> assign('islogin',$isLogin);
		return $this -> fetch();
	}

	public function registerProcess()
	{
		$data = $this -> request -> param();

		$code = Session::get('code');
		//判断验证码是否输入正确
		if($code != $data['code'])
		{
			exit(json_encode(array('code' => 201, 'msg' => '验证码不正确')));
		}

		//判断昵称是否重复
		$isName = Db::table('user') -> where(['user_name' => $data['user_name']]) -> find();
		if($isName)
		{
			exit(json_encode(array('code' => 201, 'msg' => '用户名已被占用')));
		}

		$list = [
			'user_name' => $data['user_name'],
			'user_img' => '123132',
			'user_email' => $data['email'],
			'user_password' => md5($data['pwd']),
			'user_set' => $data['sex'],
			'user_create_time' => date("Y-m-d h:i:s"),
			'user_end_login' => date("Y-m-d h:i:s")
		];

		$register = Db::table('user') -> insert($list);
		if(!$register)
		{
			exit(json_encode(array('code' => 201, 'msg' => '服务器繁忙，请稍后再试')));
		}
		exit(json_encode(array('code' => 200, 'msg' => '注册成功')));
	}
}