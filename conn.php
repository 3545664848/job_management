<?php
$dbhost="120.79.27.123";
$dbuser="work";
$dbpwd="work";
$dbname="work";
$conn=mysql_connect($dbhost,$dbuser,$dbpwd) or die("连接MYSQL服务器失败");
mysql_query("set names 'gb2312'");
mysql_select_db($dbname);
?>
