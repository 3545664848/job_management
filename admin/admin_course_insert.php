<?
session_start();
require("../conn.php");
$sql="insert into course(course_name) values('{$_POST['course_name']}')";
if (mysql_query($sql,$conn))
   header("Location:./admin_course.php?msg=".urlencode('���ӿγ̳ɹ�'));
else
   header("Location:./admin_course.php?msg=".urlencode('���ӿγ�ʧ��'));
?>
