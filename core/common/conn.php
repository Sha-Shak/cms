<?php

error_reporting(E_ALL);
ini_set('display_errors', 0);


$rootpath = $_SERVER['DOCUMENT_ROOT'].'/core';
$hostpath = 'http://cms.bithut.com.bd/core';
//$imgpath = 'http://almas.bithut.biz/dev/assets/images';

$db_name="bithutco_test";
$mysql_username="bithutco_kazi";
$mysql_password="asdf@1234X";

$server_name="localhost";
//$server_name="143.95.233.87";
$conn=mysqli_connect($server_name,$mysql_username,$mysql_password,$db_name);


/* setting for rak_framework */


		$link = $conn;
		$dbhost	=	$server_name;
		$dbname	=	$db_name;
		$dbuser	=	$mysql_username;
		$dbpassword = $mysql_password;	
?>