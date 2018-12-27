<?
 session_start();
if ($_REQUEST['id']){
	require("../conn.php");
	$sql="delete from course where course_id=".$_REQUEST['id'];
	mysql_query($sql,$conn) or die("É¾³ý¿Î³ÌÊ§°Ü");
	header("Location:./admin_course.php");
	exit;
}
?>