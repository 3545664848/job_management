<?
 session_start();
require("../conn.php");
?>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../style/css.css" type="text/css">
<title>�༶����</title>
<script language="javascript">
function submitit(myform)
{
  if (myform.grade.value=="")
  {
	  alert("�꼶����Ϊ�գ�");
	  myform.grade.focus();
	  return false;
	  }
  if(myform.classname.value=="")
  {
  	alert("�༶���Ʋ���Ϊ�գ�");
	myform.classname.focus();
  	return false;
  }
  if (myform.faculty.value=="")
  {
	  alert("����ѧԺ����Ϊ�գ�");
	  myform.faculty.focus();
	  return false;
	  }
}
</script>
</head>
<body>
<?
if (@$_POST['submit']=="add"){
	$sql="insert into admin values('','{$_POST['user']}',md5('{$_POST['pwd']}'),'{$_POST['name']}')";
	mysql_query($sql) or die ("�����û�ʧ��");
	}
if (@$_REQUEST['act']=="del"){
	$sql="delete from admin where a_id=".$_REQUEST['id'];
	mysql_query($sql);
	}	

?>
�༶���� 
<hr >
<form action="admin_admin.php" method="POST"  onSubmit="return submitit(this);">
  <table border="1" cellpadding="5" cellspacing="0" >
    <tr> 
      <td> <p align="center">�û�ID</td>
      <td> <p align="left"> 
          <input name="user" type="text"  size="10" maxlength="5">
      </td>
    </tr>
    <tr>
      <td>�û�����</td>
      <td ><input name="pwd" type="text" size="30" maxlength="40">
        </td>
    </tr>
    <tr>
      <td>�û�����</td>
       	 <td><input name="name" type="text" size="30">
         	<img src="../style/images/okay.png" border="0">
        	<input name="�ύ" type="submit" value="���" border="0">
        	<input name="submit" type="hidden" value="add">
          </td>           
    </tr>
  </table>
</form>
<table border="1" cellpadding="5" cellspacing="0">
  <tr class="thead">
  	<td>���</td> 
    <td>�û�ID</td>
    <td>�û�����</td>
    <td>����</td>
  </tr>
  <?
	$sql="select * from admin";
	$rs=mysql_query($sql,$conn) or die("��ѯ�û�ʧ��");
	$i=0;
	while ($row=mysql_fetch_array($rs)) {
	?>
    <? if($i%2==0) echo '<tr bgcolor="#f8f8f8">'; else echo '<tr>';?> 
    <td><? echo $row['a_id'];?></td>
    <td><div align="center"><? echo $row["a_user"];?></div></td>
    <td ><? echo $row["a_name"];?> </td>
    <td align="center">
	<a href="admin_admin.php?id=<? echo $row['a_id'];?>&act=edit"><img src="../style/images/edit.png"  border="0"/></a>
	&nbsp;<a href="admin_admin.php?id=<? echo $row['a_id'];?>&act=del" onClick="var a=confirm('ȷ��ɾ����');if(a==0)return(false);"><img src="../style/images/drop.png" border="0"></a></td>
  </tr>
  <?
	$i++;
	}
	?>
</table>
</body>
</html>
