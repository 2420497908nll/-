<?php

namespace app\home\controller;

use think\Controller;
use think\Session;
class Index extends Base
{
	//渲染手机端主页
	public function index()
	{
		
		$isLogin = $this -> userIsLogin();

		$this -> assign('islogin',$isLogin);
		return $this -> fetch();
	}
}