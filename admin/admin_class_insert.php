<?
session_start();
require("../conn.php");
$sql="insert into class(enroll_year,classname) values({$_POST['year']},'{$_POST['classname']}')";
if (mysql_query($sql,$conn))
   header("Location:./admin_class.php?msg=".urlencode('���Ӱ༶�ɹ�'));
else
   header("Location:./admin_class.php?msg=".urlencode('���Ӱ༶ʧ��'));
?>