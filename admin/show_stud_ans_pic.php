<?
session_start();
require("../conn.php");
if ($_SESSION['t_userid']) {
	$field=$_REQUEST['field'];
	$id=$_REQUEST['id'];
	$rs=mysql_query("select $field from stud_exam_ans where id=$id",$conn);
	$row=mysql_fetch_array($rs);
	$pic=$row["$field"];
	header("Content-type:image/jpeg");
	print $pic;
}
?>