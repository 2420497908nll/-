<?php
namespace app\home\controller;

use think\Controller;
use think\Session;

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
}