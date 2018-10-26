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
}