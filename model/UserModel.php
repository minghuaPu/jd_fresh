<?php

class UserModel extends Model{
	protected $table_name = 'user';

	function __construct()
	{
		global $C;

		parent::__construct($C);
	}
}

?>