<?php
require_once "MysqlDb.php";
date_default_timezone_set('Asia/Shanghai');

$config = array(
	'host' => 'localhost',
	'db' => 'ideas_db',
	'username' => 'root',
	'password' => '1'
);

function getDb(){
	global $config;
	return new MysqlDb($config['host'], $config['db'], $config['username'], $config['password']);
}
