<?
session_start();
require("../conn.php");
$sql="insert into course(course_name) values('{$_POST['course_name']}')";
if (mysql_query($sql,$conn))
   header("Location:./admin_course.php?msg=".urlencode('增加课程成功'));
else
   header("Location:./admin_course.php?msg=".urlencode('增加课程失败'));
?>
