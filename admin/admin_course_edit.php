<?
 session_start();
if ($_POST['course_id']){
	require("../conn.php");
	$sql="update  course set course_name='".$_POST['course_name']."' where course_id=".$_POST['course_id'];
	mysql_query($sql,$conn) or die("�޸Ŀγ�ʧ��");
	header("Location:./admin_course.php");
	exit;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�޸Ŀγ�</title>
</head>
<body>
�޸Ŀγ�����
<form name="form1" method="post" action="admin_course_edit.php">
<input name="course_id" type="hidden" value="<? echo $_REQUEST['id'];?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#007CD0" width="100%"  height="30"  bgcolor="#F1F1F1">
  <tr> 
    <td width="115" class="noborder" align="center"> <p align="center">�γ̱��</td>
    <td width="872" > <? echo $_REQUEST['id'];?>
    </td>
  </tr>
  <tr>
    <td class="noborder" align="center">�γ�����</td>
    <td ><input name="course_name" type="text" value="<? echo $_REQUEST['cname'];?>" size="40">
      <input name="submit" type="submit" value="����" border="0"></td>
  </tr>
</table>
</form>
</body>
</html>
