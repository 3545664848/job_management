<?
 session_start();
if ($_REQUEST['id']){
	require("../conn.php");
	$sql="delete from class where c_id=".$_REQUEST['id'];
	mysql_query($sql,$conn) or die("ɾ���༶ʧ��");
	header("Location:./admin_class.php");
	exit;
}
?>