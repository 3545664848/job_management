<?
 session_start();
if ($_POST['course_id']){
	require("../conn.php");
	$sql="update  course set course_name='".$_POST['course_name']."' where course_id=".$_POST['course_id'];
	mysql_query($sql,$conn) or die("修改课程失败");
	header("Location:./admin_course.php");
	exit;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>修改课程</title>
</head>
<body>
修改课程名称
<form name="form1" method="post" action="admin_course_edit.php">
<input name="course_id" type="hidden" value="<? echo $_REQUEST['id'];?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#007CD0" width="100%"  height="30"  bgcolor="#F1F1F1">
  <tr> 
    <td width="115" class="noborder" align="center"> <p align="center">课程编号</td>
    <td width="872" > <? echo $_REQUEST['id'];?>
    </td>
  </tr>
  <tr>
    <td class="noborder" align="center">课程名称</td>
    <td ><input name="course_name" type="text" value="<? echo $_REQUEST['cname'];?>" size="40">
      <input name="submit" type="submit" value="保存" border="0"></td>
  </tr>
</table>
</form>
</body>
</html>
