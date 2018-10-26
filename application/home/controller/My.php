<?php

namespace app\home\controller;

use think\Controller;
use think\Session;
class My extends Base
{
	public function index()
	{
		$isLogin = $this -> userIsLogin();

		$this -> assign('islogin',$isLogin);
		return $this -> fetch();
	}
}