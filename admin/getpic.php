<?
session_start();
require("../conn.php");
if ($_REQUEST['id']) {
	$sql="select hw_pic from homework where hw_id=".$_REQUEST['id'];
	$rs=mysql_query($sql,$conn);
	$row=mysql_fetch_array($rs);
	echo $row['hw_pic'];
}
?>