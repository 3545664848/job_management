<?
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../style/css.css" type="text/css">
<title>ѧ������</title>
<script language="javascript">
function submitit(studentform)
{
  if(studentform.sno.value=="")
  {
  	alert("ѧ�Ų���Ϊ�գ�");
	studentform.sno.focus();
  	return false;
  }
  if(studentform.sname.value=="")
  {
  	alert("��������Ϊ�գ�");
	studentform.sname.focus();
  	return false;
  }
}
</script>
</head>
<body>
ѧ������
<hr>
<form action="admin_student_insert.php" method="POST" enctype="multipart/form-data" name="studentform" onSubmit="return submitit(this);">
  <table border="1" cellpadding="5" cellspacing="0" width="400" >
    <tr>
      <td> ѧ��</td>
      <td><p align="left">
          <input name="sno" type="text"  size="10" maxlength="10">
      </td>
    </tr>
    <tr>
      <td>����</td>
      <td ><input name="sname" type="text" id="name" size="16" maxlength="16"></td>
    </tr>
    <tr>
      <td>�༶</td>
      <td ><select name="c_id" size="1" id="class_id">
          <?
		  	require("../conn.php");
		  	$rs2=mysql_query("select * from class",$conn) or die("��ѯ�༶��¼ʧ��");
		  	if (mysql_num_rows($rs2)>0) {
		     $row=mysql_fetch_array($rs2);
		     echo "<option value=".$row['c_id']." selected>".$row['c_name']."</option>";
		     while ($row=mysql_fetch_array($rs2)) {
			    echo "<option value=".$row['c_id'].">".$row['c_name']."</option>";
			 }
		  }
		  ?>
        </select></td>
    </tr>
    <tr>
      <td height="23"  align="center">&nbsp;</td>
      <td >
      <img src="../style/images/okay.png" border="0">
      <input name="submit" type="submit" id="submit2" value="���ѧ��" border="0">
      <input name="submit" type="hidden" value="add">
      
      </td>
    </tr>
  </table>
</form>
<table border="1" cellpadding="5" cellspacing="0">
  <tr class="thead">
    <td>ѧ��</td>
    <td>����</td>
    <td>�༶</td>
    <td>����</td>
  </tr>
  <?
	require_once"../conn.php";
	$i=0;
	$sql3="select * from student,c_s,class where student .s_id = c_s .s_id and c_s.c_id = class.c_id";
	$rs3=mysql_query($sql3,$conn);
	while ($row=mysql_fetch_array($rs3)) {
	?>
    <? if($i%2==0) echo '<tr bgcolor="#f8f8f8">'; else echo '<tr>';?> 
    <input name="s_id" type="hidden" value="<? echo $row['s_id']; ?>">
    <td><? echo $row['s_no'];?></td>
    <td><div align="center"><? echo $row["s_name"];?></div></td>
    <td ><? echo $row["c_name"];?></td>
    <td align="center"><a href="admin_student_edit.php?id=<? echo $row['s_id']; ?>"><img src="../style/images/edit.png"  border="0"/></a> &nbsp;<a href="admin_student_del.php?id=<? echo $row['s_id'];?>" onClick="var a=confirm('ȷ��ɾ����');if(a==0)return(false);"><img src="../style/images/drop.png" border="0"></a>&nbsp; </td>
  </tr>
  <?
	$i++;}
	?>
</table>
</body>
</html>
