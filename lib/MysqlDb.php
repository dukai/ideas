<?php

class MysqlDb{
	private $con;
	private $db;
	
	public function __construct($host, $db, $username, $password){
		$this->db = $db;
		$this->con = mysql_connect($host,$username,$password, 1);
		mysql_select_db($db, $this->con);
		mysql_query("set names utf8", $this->con);
	}
	
	public function close() {
		mysql_close($this->con);
		$this->con = null;
	}
	
	public function fetchRow($cmd){
		$result = $this->query($cmd);
		$row = mysql_fetch_array($result);
		return $row;
	}
	
	public function fetchAll($cmd){
		$arr = array();
		$result = $this->query($cmd);
		while($row = mysql_fetch_array($result)){
			$arr[] = $row;
		}
		return $arr;
	}
	
	public function query($cmd){
		return mysql_query($cmd, $this->con);
	}
	
	public function fetchOne($cmd){
		$row = $this->fetchRow($cmd);
		
		return $row[0];
	}
	
	public function insertData($tableName, $data, $showDebug=false){
		$sql = "insert into {$tableName} ";
		$fields = array();
		$values = array();
		foreach($data as $col=>$value){
			$fields[] = $col;
			$value = $this->checkInput($value);
			$values[] = $value;
		}
		$sql .= "(`".implode("`,`", $fields)."`) values ('".implode("','", $values)."')";
		$result = $this->query($sql);
		if($showDebug){
			echo "SQL:".$sql."\r\n";
			echo "result:[".$result."]";
			echo "error_num:".mysql_errno($this->conn)." error:".mysql_error($this->conn);
			exit;
		}
		if($result){
			return mysql_insert_id();
		}
		return $result;
	}
	
	public function checkInput($value){
		if (get_magic_quotes_gpc()) {
			$value = stripslashes($value);
		}
		//如果不是数字则加引号
		$value = mysql_real_escape_string($value);
		return $value;
	}
	
	public function lastId(){
		return mysql_insert_id($this->con);
	}
}
