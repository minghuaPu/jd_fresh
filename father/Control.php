<?php
// 父类控制器
// error_reporting(0);
class Control{

	private static $control;
	private static $action;
	private  $smarty;

	public function __construct()
	{
		$this->smarty = new Smarty();

		$this->smarty->template_dir = 'view';  


	}

	static  function run()
	{
		// 里面不能用$this
		// self但是静态方法，只能调用静态属性
		// 显示哪一个控制器
		// 接收控制器参数
		self::$control = $control =  isset($_REQUEST['control'])?$_REQUEST['control']:'goods';
		
		// 接收行为参数
		self::$action = $action =  isset($_REQUEST['action'])?$_REQUEST['action']:'index';

		// 乱传，引入前要判断到底有没有这个文件
		include_once  "control/$control.php"; 

		// $control_obj = new Goods();
		// $control_obj->index();

		$control_obj = new $control();
		$control_obj->$action();
	}

	/**
	 * 显示界面
	 */
	public function display($html='',$smarty=true)
	{

		if ($smarty) {
			// 做什么样的人
			if ($html) {
				$this->smarty->display($html);
			}else{
				$this->smarty->display(self::$control."/".self::$action.".html");
			}
		}else{
			include_once "view/".self::$control."/".self::$action.".html";
		}
		
		
	}

	public function assign($name,$value)
	{
		// 赋予我们什么做人技能
		$this->smarty->assign($name,$value);
	}

	public function model($mm_name)
	{
		$model_name  =  $mm_name."Model";
		include "model/$model_name.php";

		return new $model_name();

	}
}


?>