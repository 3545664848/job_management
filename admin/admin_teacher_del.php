<?
 session_start();
if ($_REQUEST['id']){
	require("../conn.php");
	$sql="delete from teacher where t_id=".$_REQUEST['id'];
	mysql_query($sql,$conn) or die("ɾ����ʦ��Ϣʧ��");
	$sql="delete from c_t where t_id=".$_REQUEST['id'];
	mysql_query($sql) or die(mysql_error());
	header("Location:./admin_teacher.php");
	exit;
}
?>