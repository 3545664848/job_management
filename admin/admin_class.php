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
	$sql="insert into class values('','{$_POST['classname']}',{$_POST['grade']},'{$_POST['faculty']}')";
	mysql_query($sql) or die ("���Ӱ༶ʧ��");
	}
?>
�༶���� 
<hr >
<form action="admin_class.php" method="POST" name="classform1" onSubmit="return submitit(this);">
  <table border="1" cellpadding="5" cellspacing="0" >
    <tr> 
      <td> <p align="center">��ѧ���</td>
      <td> <p align="left"> 
          <input name="grade" type="text" id="grade" size="10" maxlength="5">
      </td>
    </tr>
    <tr>
      <td>�༶����</td>
      <td ><input name="classname" type="text" id="classname" size="30" maxlength="40">
        </td>
    </tr>
    <tr>
      <td>����ѧԺ</td>
       	 <td><input name="faculty" type="text" size="30">
         	<img src="../style/images/okay.png" border="0">
        	<input name="�ύ" type="submit" value="��Ӱ༶" border="0">
        	<input name="submit" type="hidden" value="add">
          </td>           
    </tr>
  </table>
</form>
<table border="1" cellpadding="5" cellspacing="0">
  <tr class="thead"> 
    <td>�༶���</td>
    <td>��ѧ���</td>
    <td>�༶����</td>
    <td>����ѧԺ</td>
    <td>����</td>
  </tr>
  <?
	$sql="select * from class";
	$rs=mysql_query($sql,$conn) or die("��ѯ�༶ʧ��");
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
	&nbsp;<a href="admin_class_del.php?id=<? echo $row['c_id'];?>&act=del" onClick="var a=confirm('ȷ��ɾ����');if(a==0)return(false);"><img src="../style/images/drop.png" border="0"></a></td>
  </tr>
  <?
	$i++;
	}
	?>
</table>
</body>
</html>
