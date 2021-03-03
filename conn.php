<?php
header('content-type:text/html;charset=utf-8');
require 'vendor/autoload.php';

//导入命名空间
use Medoo\Medoo as Db;

// 配置数据库
$config = [
    'database_type' => 'mysql',
    'database_name' => 'newlibrary',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8'
];


$db = new Db($config);
?>