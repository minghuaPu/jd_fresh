<?php

// 权限管理
class Auth extends Control{

	public function __construct()
	{
		parent::__construct();

		if (empty($_SESSION['uname'])) { 

			message($this,url("user","register"),'你还没有登录！');

			exit();

		}
		// 会员标识跟存会话里面
		// 判断控制器再判断行为是不是会员的操作
		// 是会员的操作，用户就必须是会员
		// 不是会员的，就直接放行
	}
}

?>