<?
session_start();
require("../conn.php");
if (@$_POST['submit']=="edit"){

	  $sql="update student set s_no='".$_POST['sno']."',s_name='".$_POST['name']."' where s_id=".$_POST['s_id'];
	  mysql_query($sql);
	  $sql="update c_s set c_id=".$_POST['c_id']."  where s_id=".$_POST['s_id'];	  
      mysql_query($sql,$conn) or die("�޸�ѧ����Ϣʧ��");
	  header("Location:./admin_student.php");
	  exit;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../style/css.css" type="text/css">
<title>�޸�ѧ����Ϣ</title>
<script language="javascript">
function submitit(myform)
{
  if(myform.name.value=="")
  {
  	alert("��������Ϊ�գ�");
	myform.name.focus();
  	return false;
  }
  if(myform.xh.value=="")
  {
  	alert("ѧ�Ų���Ϊ�գ�");
	myform.xh.focus();
  	return false;
  }
}
</script>
</head>
<body>
<?
$sql="select * from student where s_id = {$_REQUEST['id']}";
$rs1=mysql_query($sql,$conn);
$row1=mysql_fetch_array($rs1);
?>
�޸�ѧ����Ϣ<br>
<form action="admin_student_edit.php" method="POST" enctype="multipart/form-data" name="studentform1" onSubmit="return submitit(this);">
  <table border="1" cellpadding="5" cellspacing="0" >
    <tr> 
      <td> ѧ��</td>
      <td> <p align="left"> 
          <input name="sno" type="text" value="<? echo $row1['s_no'];?>" size="10" maxlength="10">
      </td>
    </tr>
    <tr> 
      <td>����</td>
      <td ><input name="name" type="text" id="name" value="<? echo $row1['s_name'];?>" size="16" maxlength="16"> 
      </td>
    </tr>
    <tr> 
      <td align="center">�༶</td>
      <td ><select name="c_id" size="1">
          <?
		  $c_id=$row1['c_id'];
		  $rs2=mysql_query("select * from class",$conn) or die("��ѯ�༶��¼ʧ��");
		  if (mysql_num_rows($rs2)>0) {
		     while ($row2=mysql_fetch_array($rs2)) {
			    if ($c_id==$row2['c_id'])
		            echo "<option value=".$row2['c_id']." selected>".$row2['c_name']."</option>";
			    else
			        echo "<option value=".$row2['c_id'].">".$row2['c_name']."</option>";
			 }
		  }
		  ?>
        </select></td>
    </tr>
    <tr> 
      <td align="center">&nbsp;</td>
      <td >
      <input name="submit" type="submit" id="submit2" value="����" border="0">
      <input name="submit" type="hidden" value="edit">
      <input name="s_id"  type="hidden" value="<? echo $_REQUEST['id'];?>">
      
      </td>
    </tr>
  </table>
</form>
</body>
</html>
