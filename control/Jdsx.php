<?php

/**
 * 	京东生鲜控制器
 */
class Jdsx extends Control
{
	
	public function home()
	{
		include_once 'view/jdsx/home.html';
	}

	public function info()
	{
		$id = $_GET['id'];
		$g_model = $this->model('goods');

		$info = $g_model->find("id=$id");
		$this->assign('info',$info);

		$list = $g_model->select();
		$this->assign('goods_list',$list);

		$this->display();
	}

	public function reg()
	{
		$this->display();
	}


	public function getGoods()
	{
		// 查询操作
		echo json_encode($this->model('goods')->select());
	}
}

?>