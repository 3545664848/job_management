<?
session_start();
require("../conn.php");
if ($_POST['submit']=="add"){
 	$sql="insert into teacher(t_userid,t_pwd,t_name) values('{$_POST['userid']}',md5('{$_POST['pwd']}'),'{$_POST['name']}')";
	mysql_query($sql) or die (mysql_error());
	$tid=(int)mysql_insert_id();
    if (isset($_POST['c_id'])){
	foreach($_POST['c_id'] as $value){
		$cid=(int)$value;
		$sql="insert into c_t values('',{$_POST['course_id']},$tid,$cid)";
		mysql_query($sql)or die(mysql_error());
	}
	}
	header("Location:./admin_teacher.php");
}
?>