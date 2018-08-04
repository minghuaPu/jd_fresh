<?php

// 个人中心类有什么特点
// 必须要经过登录后才能进来
// 权限管理
class Ucenter extends Auth{

	public function order()
	{
		$this->display();
	}
	public function profile()
	{
		$info = $this->model('userinfo')->find('id=1');
		$this->assign('info',json_encode($info));


		$hobby = ['图书音像/电子书刊', '家用电器', '手机/数码', '电脑/办公', '家居/家具/家装/厨具', '服饰内衣/珠宝首饰', '个护化妆', '鞋靴/箱包/钟表/奢侈品', '运动健康', '汽车用品', '母婴/玩具乐器'];

		$this->assign('hobby',json_encode($hobby));

		$this->display();
	}
	public function doProfile()
	{
		$this->model('userinfo')->insert([
			'nick_name'=>$_POST['nick_name'],
			'uid'=>0,
			'sex'=>$_POST['sex'],
			'hobby'=>$_POST['hobby'],
		]);
		message($this,url('ucenter','profile'),'资料更新成功');
	}
	public function vipBuy()
	{
		// 只有会员才可以进来
	}

	public function address()
	{
		$this->display();
	}

	public function saveAdres()
	{
		$area  = implode('|',json_decode($_POST['area'],true));
		$this->model('address')->insert([
			'receive_people' => $_POST['receive_people'],
			'area' => $area
		]);

		echo json_encode(['status'=>1,'area' => $area]);

	}

	public function getAdres()
	{
		$ad_list = $this->model('address')->select();

		echo json_encode($ad_list);exit();
	}
}

?>