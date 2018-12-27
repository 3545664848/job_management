<?
 session_start();
require("../conn.php");
?>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../style/css.css" type="text/css">
<title>班级管理</title>
<script language="javascript">
function submitit(myform)
{
  if (myform.grade.value=="")
  {
	  alert("年级不能为空！");
	  myform.grade.focus();
	  return false;
	  }
  if(myform.classname.value=="")
  {
  	alert("班级名称不能为空！");
	myform.classname.focus();
  	return false;
  }
  if (myform.faculty.value=="")
  {
	  alert("所属学院不能为空！");
	  myform.faculty.focus();
	  return false;
	  }
}
</script>
</head>
<body>
<?
if (@$_POST['submit']=="add"){
	$sql="insert into class values('','{$_POST['classname']}',{$_POST['grade']},'{$_POST['faculty']}')";
	mysql_query($sql) or die ("增加班级失败");
	}
?>
班级管理 
<hr >
<form action="admin_class.php" method="POST" name="classform1" onSubmit="return submitit(this);">
  <table border="1" cellpadding="5" cellspacing="0" >
    <tr> 
      <td> <p align="center">入学年度</td>
      <td> <p align="left"> 
          <input name="grade" type="text" id="grade" size="10" maxlength="5">
      </td>
    </tr>
    <tr>
      <td>班级名称</td>
      <td ><input name="classname" type="text" id="classname" size="30" maxlength="40">
        </td>
    </tr>
    <tr>
      <td>所属学院</td>
       	 <td><input name="faculty" type="text" size="30">
         	<img src="../style/images/okay.png" border="0">
        	<input name="提交" type="submit" value="添加班级" border="0">
        	<input name="submit" type="hidden" value="add">
          </td>           
    </tr>
  </table>
</form>
<table border="1" cellpadding="5" cellspacing="0">
  <tr class="thead"> 
    <td>班级编号</td>
    <td>入学年度</td>
    <td>班级名称</td>
    <td>所属学院</td>
    <td>操作</td>
  </tr>
  <?
	$sql="select * from class";
	$rs=mysql_query($sql,$conn) or die("查询班级失败");
	$i=0;
	while ($row=mysql_fetch_array($rs)) {
	?>
    <? if($i%2==0) echo '<tr bgcolor="#f8f8f8">'; else echo '<tr>';?> 
    <input name="course_id" type="hidden" value="<? echo $row['course_id']; ?>">
    <td><? echo $row['c_id'];?></td>
    <td><div align="center"><? echo $row["c_grade"];?></div></td>
    <td ><? echo $row["c_name"];?> </td>
    <td><? echo $row["c_faculty"];?></td>
    <td align="center">
	<a href="admin_class_edit.php?id=<? echo $row['c_id']; ?>&act=edit&grade=<? echo $row['c_grade'];?>&name=<? echo urlencode($row['c_name']);?>&faculty=<? echo urlencode($row['c_faculty'])?>"><img src="../style/images/edit.png"  border="0"/></a>
	&nbsp;<a href="admin_class_del.php?id=<? echo $row['c_id'];?>&act=del" onClick="var a=confirm('确定删除？');if(a==0)return(false);"><img src="../style/images/drop.png" border="0"></a></td>
  </tr>
  <?
	$i++;
	}
	?>
</table>
</body>
</html>
