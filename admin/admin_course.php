<?
 session_start();
require("../conn.php");
$sql="select * from course";
$rs=mysql_query($sql,$conn) or die("��ѯ�γ�ʧ��");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../style/css.css" type="text/css">
<title>�γ̹���</title>
<script language="javascript">
function submitit(myform)
{
  if(myform.name.value=="")
  {
  	alert("�γ����Ʋ���Ϊ�գ�");
  	myform.name.focus();
	return false;
  }
}
</script>
</head>
<body>
<? if (@$_REQUEST['submit']=="add"){
	 $sql="insert into course values('','{$_POST['name']}')";
     mysql_query($sql,$conn) or die ("���ӿγ�ʧ��");
	 header("location:admin_course.php");
	 exit;
	}
?>
�γ̹��� 
<hr>
<form action="admin_course.php" method="POST" name="myform" onSubmit="return submitit(this);">
  <table border="1" cellpadding="5" cellspacing="0">
    <tr> 
      <td> <p align="center">�γ�����</td>
      <td> <p align="left"> &nbsp; 
          <input type="text" name="name" size="40">
          <img src="../style/images/okay.png" border="0">
          <input border="0" value="��ӿγ�" type="submit">
          <input type="hidden" name="submit" value="add">
      </td>
    </tr>
  </table>
</form>
<form name="courseform2" method="get">
  <table border="1" cellpadding="5" cellspacing="0" width="400">
    <tr class="thead"> 
      <td>�γ̱��</td>
      <td>�γ�����</td>
      <td>����</td>
    </tr>
    <?
	$i=0;
	while ($row=mysql_fetch_array($rs)) {
	?>
    <? if($i%2==0) echo '<tr bgcolor="#f8f8f8">'; else echo '<tr>';?> 
      <input name="id" type="hidden" value="<? echo $row['course_id']; ?>">
      <td><? echo $row['course_id'];?></td>
      <td><? echo $row["course_name"];?></td>
      <td align="center"> <!--<a href="admin_course_edit.php?id=<? echo $row['course_id']; ?>&cname=<? echo urlencode($row['course_name']);?>">�༭</a>&nbsp;--><a href="admin_course_del.php?id=<? echo $row['course_id'];?>" onClick="var a=confirm('ȷ��ɾ����');if(a==0)return(false);"><img src="../style/images/drop.png" border="0"></a></td>
    </tr>
    <?
	$i++;
	}
	?>
  </table>
</form>
</body>
</html>
