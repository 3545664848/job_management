<?
 session_start();
if ($_REQUEST['id']){
	require("../conn.php");
	$sql="delete from student where s_id=".$_REQUEST['id'];
	mysql_query($sql,$conn) or die("ɾ��ѧ����Ϣʧ��");
	header("Location:./admin_student.php");
	exit;
}
?>