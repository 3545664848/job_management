<?
session_start();
require("../conn.php");
if ($_SESSION['t_userid']) {
	$field=$_REQUEST['field'];
	$st_id=$_REQUEST['st_id'];
	$rs=mysql_query("select $field from exam_test where st_id=$st_id",$conn);
	$row=mysql_fetch_array($rs);
	$pic=$row["$field"];
	header("Content-type:image/jpeg");
	print $pic;
}
?>