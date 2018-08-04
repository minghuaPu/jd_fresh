<?php
//商品业务模型
class GoodsModel extends Model{

	protected $table_name = 'goods';

	function __construct()
	{
		global $C;
		parent::__construct($C,true);
	}


	public function add_cart()
	{
		echo '加入购物车';
	}
}


?>