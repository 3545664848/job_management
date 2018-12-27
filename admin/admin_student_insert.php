<?
session_start();
require("../conn.php");
if ($_POST['submit']=="add") {
	$sql="insert into student values('','{$_POST['sno']}',md5({$_POST['sno']}),'{$_POST['sname']}')";
    $rs1=mysql_query($sql);
	$sql2="insert into c_s values('',{$_POST['c_id']},last_insert_id())";
	$rs2=mysql_query($sql2);
}
if ($rs1 && $rs2)
   header("Location:./admin_student.php?msg=".urlencode('增加学生成功'));
else
   header("Location:./admin_student.php?msg=".urlencode('增加学生失败'));
?>