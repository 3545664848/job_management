<?
session_start();
    require("../conn.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../style/css.css" type="text/css">
<title>��ʦ����</title>
<script language="javascript">
function submitit(myform)
{

  if(myform.userid.value=="")
  {
  	alert("�û�������Ϊ�գ�");
	myform.userid.focus();
  	return false;
  }
  if(myform.pwd.value=="")
  {
	  alert("���벻��Ϊ�գ�");
	  myform.pwd.focus();
	  return false;
	  }
  if(myform.name.value=="")
  {
  	alert("��������Ϊ�գ�");
	myform.name.focus();
  	return false;
  }	  
}
</script>
</head>
<body>
��ʦ���� 
<hr>
<form action="admin_teacher_insert.php" method="POST"  name="myform" onSubmit="return submitit(this);">
  <table border="1" cellpadding="5" cellspacing="0" >
    <tr> 
      <td> �û���</td>
      <td>  <input name="userid" type="text" id="userid" size="20" maxlength="20">        
      </td>
    </tr>
    <tr> 
      <td>����</div></td>
      <td ><input name="pwd" type="password"  size="20" maxlength="20"> 
      </td>
    </tr>
    <tr> 
      <td>����</div></td>
      <td ><input name="name" type="text" id="name" size="20" maxlength="20"> 
      </td>
    </tr>    
    <tr>
      <td>�οΰ༶</td>
      <td >
			<?
		  $rs3=mysql_query("select * from class",$conn) or die("��ѯ�༶��¼ʧ��");
		  if (mysql_num_rows($rs3)>0) {
		     while ($row2=mysql_fetch_array($rs3))			 
			 echo "<input type='checkbox' name='c_id[]'  value={$row2['c_id']}>".$row2['c_name'];			
		  }
		  ?>
       </td>
    </tr>
      <tr>
      <td>���ογ�</td>
      <td ><select name="course_id" size="1">
          <?
		  $rs2=mysql_query("select * from course",$conn) or die("��ѯ�γ̼�¼ʧ��");
		  if (mysql_num_rows($rs2)>0) {
		     while ($row2=mysql_fetch_array($rs2)) {
			    if ($course_id==$row2['course_id'])
		            echo "<option value=".$row2['course_id']." selected>".$row2['course_name']."</option>";
			    else
			        echo "<option value=".$row2['course_id'].">".$row2['course_name']."</option>";
			 }
		  }
		  ?>
        </select></td>    
    </tr>
    <tr> 
      <td height="23"  align="center">&nbsp;</td>
      <td>  <img src="../style/images/okay.png" border="0">
      		<input name="submit" type="submit" id="submit2" value="���" border="0">
            <input name="submit" type="hidden" value="add"> 
      </td>
    </tr>
  </table>
</form>
<table border="1" cellpadding="5" cellspacing="0">
  <tr  class="thead"> 
    <td>��ʦ���</td>
    <td>����</td>
    <td>�οΰ༶</td>
    <td>���ογ�</td>
    <td>����</td>
  </tr>
  <?
    $i=0;
	$sql="select t_id,t_name,c_name,course_name from teach_v";
	$rs=mysql_query($sql,$conn);
	while ($row=mysql_fetch_array($rs)) {
	?>
    <? if($i%2==0) echo '<tr bgcolor="#f8f8f8">'; else echo '<tr>';?> 
    <input name="t_id" type="hidden" value="<? echo $row['t_id']; ?>">
    <td><? echo $row['t_id'];?></td>
    <td><? echo $row["t_name"];?></td>
    <td ><? echo $row["c_name"];?> </td>
    <td><? echo $row["course_name"];?></td>
    <td align="center"><a href="admin_teacher_edit.php?id=<? echo $row['t_id']; ?>"><img src="../style/images/edit.png"  border="0"/></a> 
      &nbsp;<a href="admin_teacher_del.php?id=<? echo $row['t_id'];?>" onClick="var a=confirm('ȷ��ɾ����');if(a==0)return(false);"><img src="../style/images/drop.png" border="0"></a></td>
  </tr>
  <?
	$i++;}
  ?>
</table>
</body>
</html>
