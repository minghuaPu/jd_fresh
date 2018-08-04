<?php
// 父类模型

// PDO数据库操作类

class Model{
	private $pdo = null;
	public $debug = false;//不开启调试
	protected $table_name = '';
	private $where_sql = '';//条件属性
	// 构造函数
	// 特点：
	// 1、无需调用
	function __construct($C,$debug=false){
		$this->debug = $debug;
		// 连接
		$dsn = $C['driver'].":dbhost=".$C['dbhost'].";dbname=".$C['dbname'].";charset=".$C['charset'];

		$dbuname = $C['dbuser'];
		$dbpwd = $C['dbpwd'];
		// PHP连接mysql
		// mongodb、oracle、
		$this->pdo = new PDO($dsn,$dbuname,$dbpwd);
		
		// PDO报错级别设置，默认不安全显示出来
		if ($this->debug) {
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		
	}
	
	// 增
	public function insert($data)
	{
		$table_name =  $this->table_name;
		// insert into $table_name (g_name,g_price) values ('榴莲','1.68')
		//array_keys($data);// ['g_name','g_price'] 
		// 数组转换字符串  implode(连接符合,数组)
		// echo implode(",", array_keys($data));exit();
		$cols = implode(",", array_keys($data));
		// print_r(array_values($data));exit();//['榴莲','1.68']
		
		$values = $this->setValues(array_values($data));
		
		$sql = "insert into $table_name ($cols) values ($values)";
		try {
			$this->pdo->exec($sql);
		} catch (PDOException $e) {
			if ($this->debug) {
				echo "小哥哥你出错了！";
				echo $sql;
			}
		}
		
	}

	public function setValues($value_data)
	{
		// ['榴莲','1.68']  ...... "'榴莲',1.68"
		 
		foreach ($value_data as $key => $value) {
			if (is_string($value)) {
				$value_data[$key] = "'".$value."'";
			}
		}
		return implode(",", $value_data);
		# code...
	}
	// 删
	// 改
	// 查
	public function select()
	{

		// sql注入
		$pdoStatement = $this->pdo->prepare("select * from ".$this->table_name." order by id desc");//pdoStatement结果集

		$pdoStatement->execute();

		return $pdoStatement->fetchAll();
	}

	public function where($str)
	{
		$this->where_sql = $str;
		return $this->pdo;
	}
	public function find($where_str)
	{
		// $where_str = '';
		// if ($this->where_sql) {
		// 	$where_str = " where ".$this->where_sql;
		// }
		$pdoStatement = $this->pdo->prepare("select * from ".$this->table_name." where ".$where_str);
		$pdoStatement->execute();

		return  $pdoStatement->fetch();

	}
}


?>