<?
 session_start();
if ($_REQUEST['id']){
	require("../conn.php");
	$sql="delete from homework where hw_id='".$_REQUEST['id']."'";
	mysql_query($sql,$conn);
	header("Location:./teach_hw_list.php");
	exit;
}
?>