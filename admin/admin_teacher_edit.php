<?
session_start();
require("../conn.php");
if (@$_POST['submit']=="edit"){
	  $sql="update teacher set t_name='{$_POST['t_name']}' where t_id=".$_POST['t_id'];
	  mysql_query($sql) or die(mysql_error());
		if (isset($_POST['c_id']) && isset($_POST['course_id'])){
            $sql="delete from c_t  where t_id=".$_POST['t_id'];
			mysql_query($sql) or die(mysql_error());
			foreach($_POST['c_id'] as $value){
			$cid=(int)$value;
			$sql="insert into c_t(course_id,t_id,c_id) values({$_POST['course_id']},{$_POST['t_id']},$cid)";
			mysql_query($sql) or die(mysql_error());
			}
		}else{
		   $sql="delete from c_t  where t_id=".$_POST['t_id'];
			mysql_query($sql) or die(mysql_error());
			}
	  header("Location:./admin_teacher.php");
	  exit;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../style/css.css" type="text/css">
<title>修改教师信息</title>
<script language="javascript">
function submitit(myform)
{
  if(myform.t_name.value=="")
  {
  	alert("姓名不能为空！");
	myform.t_name.focus();
  	return false;
  }

}
</script>
</head>
<body>
<?
$sql="select * from teacher where t_id = {$_REQUEST['id']}";
$rs1=mysql_query($sql,$conn);
$row1=mysql_fetch_array($rs1);
?>
修改教师信息<hr>
<form action="admin_teacher_edit.php" method="POST" enctype="multipart/form-data" name="studentform1" onSubmit="return submitit(this);">
  <table border="1" cellpadding="5" cellspacing="0" >
    <tr> 
      <td> 教师ID</td>
      <td> <p align="left"> 
          <? echo $row1['t_userid'];?>
      </td>
    </tr>
    <tr> 
      <td>姓名</td>
      <td ><input name="t_name" type="text" id="name" value="<? echo $row1['t_name'];?>" size="16" maxlength="16"> 
      </td>
    </tr>
    <tr>
      <td>任课班级</td>
      <td >
			<?
		  $rs2=mysql_query("select * from class",$conn) or die("查询班级记录失败");
		  if (mysql_num_rows($rs2)>0) {
		     while ($row2=mysql_fetch_array($rs2))			 
			 echo "<input type='checkbox' name='c_id[]'  value={$row2['c_id']}>".$row2['c_name'];			
		  }
		  ?>
       </td>
    </tr>
      <tr>
      <td>担任课程</td>
      <td ><select name="course_id" size="1">
          <?
		  $rs3=mysql_query("select * from course",$conn) or die("查询课程记录失败");
		  if (mysql_num_rows($rs3)>0) {
		     while ($row3=mysql_fetch_array($rs3)) {
			    if ($course_id==$row3['course_id'])
		            echo "<option value=".$row3['course_id']." selected>".$row3['course_name']."</option>";
			    else
			        echo "<option value=".$row3['course_id'].">".$row3['course_name']."</option>";
			 }
		  }
		  ?>
        </select></td>    
    </tr>
    <tr> 
      <td height="23"  align="center">&nbsp;</td>
      <td >
      <input name="submit" type="submit" id="submit2" value="保存" border="0">
      <input name="submit" type="hidden" value="edit">
      <input name="t_id"  type="hidden" value="<? echo $_REQUEST['id'];?>">
      
      </td>
    </tr>
  </table>
</form>
</body>
</html>
