<?php

/**
 * 		用户子类控制器
 */
class User extends Control
{
	
	//  注册
	public function register()
	{
		$this->display();
	}

	public function doReg()
	{
		$uname = $_POST['uname'];
		$upwd = $_POST['upwd'];

		$this->model('user')->insert([
			'uname'=>$uname,
			'upwd'=>$upwd,
		]);

		$_SESSION['uname'] = $uname;

		message($this,url("ucenter","profile"),'注册成功');
	}

	public function logout()
	{
		unset($_SESSION['uname']);
		message($this,url("user","register"),'退出成功！');

	}
}

?>