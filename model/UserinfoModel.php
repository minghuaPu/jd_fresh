<?php

class UserinfoModel extends Model{
	protected $table_name = 'user_info';

	function __construct()
	{
		global $C;

		parent::__construct($C);
	}
}

?>