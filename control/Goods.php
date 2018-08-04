<?php
// 子类控制器，相同类型的行为


class Goods extends Control{

	// 增删改查
	public function index()
	{
		
		$this->display();
	}
	
	public function add()
	{
		$this->display();
	}

	public function save()
	{
		// 保存商品
		// 链式操作
		$g_thumb = '';
		if ($_FILES['thumb']['tmp_name']) {

			$g_thumb = 'public/uploads/'.time().".jpg";

			copy($_FILES['thumb']['tmp_name'],$g_thumb);
		}

		// jQuery 框架 .find().html()
		$this->model('goods')->insert([
			'g_name' => $_POST['g_name'],
			'g_price' => $_POST['g_price'],
			'add_time' => time(),
			'g_content' => $_POST['g_content'],
			'g_thumb' => $g_thumb
		]);

		header('location:http://localhost/18shujia/lesson_11/index.php?action=index');
	}

	public function getList()
	{
		echo json_encode($this->model('goods')->select());
	}
}


?>