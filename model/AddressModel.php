<?php

class AddressModel extends Model{
	protected $table_name = 'address';

	function __construct()
	{
		global $C;

		parent::__construct($C,true);
	}
}

?>