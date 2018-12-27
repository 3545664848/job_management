<?
 session_start();
 require("../conn.php"); 

	if (isset($_POST['submit'])){
	$sql="update class set c_grade=".$_POST['grade'].",c_name='".$_POST['name']."',c_faculty='".$_POST['faculty']."' where c_id=".$_POST['id'];
	mysql_query($sql,$conn) or die("修改班级失败");
	header("Location:./admin_class.php");
	exit;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../style/css.css" type="text/css">
<title>修改班级名称</title>
</head>
<body>
修改班级名称
<hr> 
<form name="form1" method="post" action="admin_class_edit.php">
  <input name="id" type="hidden" id="class_id" value="<? echo $_REQUEST['id'];?>">
  <input name="submit" type="hidden">
  <table border="1" cellpadding="5" cellspacing="0">
    <tr> 
      <td> <p align="center">班级编号</td>
      <td> <? echo $_REQUEST['id'];?> </td>
    </tr>
    <tr> 
      <td class="noborder" align="center">入学年度</td>
      <td > 
        <input name="grade" type="text" id="year" value="<? echo $_REQUEST['grade'];?>" size="4" maxlength="5"></td>
    </tr>
    <tr>
      <td class="noborder" align="center">班级名称</td>
      <td ><input name="name" type="text" id="classname" value="<? echo $_REQUEST['name'];?>" size="30" maxlength="40"> </td>
    </tr>
    <tr>
    	<td>所属学院</td>
        <td> <input name="faculty" type="text" value="<? echo $_REQUEST['faculty'];?>" size="30"></td>
    </tr>
    <tr><td colspan="2" align="center"><input name="submit" type="submit" value="保存" border="0"></td></tr>
  </table>
</form>
</body>
</html>