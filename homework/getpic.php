<?
session_start();
require("../conn.php");
if ($_REQUEST['id']) {
	$sql="select do_pic from hw_do where do_id=".$_REQUEST['id'];
	$rs=mysql_query($sql,$conn);
	$row=mysql_fetch_array($rs);
	echo $row['do_pic'];
}
?>