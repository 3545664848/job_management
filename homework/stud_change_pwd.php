<?
 session_start();
require("../conn.php");
if ($_POST['submit']=="�޸�") {
	$newpwd=$_POST['newpwd'];
	$oldpwd=$_POST['oldpwd'];
	$sql="update student_user set s_pwd=PASSWORD('".$newpwd."') where s_xh ='". $_SESSION['xh']."' and s_pwd=PASSWORD('".$oldpwd."');";
	mysql_query($sql,$conn) or die("�޸�����ʧ��");
	if (mysql_affected_rows()>0)
	   echo "�޸�����ɹ���";
	else
	   echo  "�޸�����ʧ�ܣ�";
	exit;
}   	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�޸�����</title>
<script language="javascript">
function submitit(myform){
    if (myform.oldpwd.value=="")
        {
            alert("������ԭ���룡");
            myform.oldpwd.focus();
            return false;
        }
    if (myform.newpwd.value=="")
        {
            alert("�����������룡");
            myform.newpwd.focus();
            return false;
        }
    if (myform.confirmpwd.value=="")
        {
            alert("��������һ�������룡");
            myform.confirmpwd.focus();
            return false;
        }
    if (myform.newpwd.value!=myform.confirmpwd.value)
        {
            alert("���������֤���벻һ�£�");
            return false;
        }
}
</script>
</head>
<body>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#007CD0" width="100%" >
  <tr> 
    <td width="100%" class="border_blue">&nbsp;�޸�����</td>
  </tr>
  <tr> 
    <td width="520" bgcolor="#F1F1F1"> 
	<form action="stud_change_pwd.php" method="POST" name="passwdform1" id="passwdform1" onsubmit="return submitit(this)">
        <p><br>
          ѧ�ţ� 
          <input type="text" size="20" value="<? echo $_SESSION['xh'];?>" readonly style="background-color:#efefef">
          <br>
          <br>
          ԭ �� �룺 
          <input type="password" name="oldpwd" size="20">
          <font color="#FF0000"></font><br>
          <br>
          �� �� �룺 
          <input type="password" name="newpwd" size="20" >
          ���볤�����20���ַ�<br>
          <br>
          ��֤���룺 
          <input type="password" name="confirmpwd" size="20">
        </p>
        <p align="center"> 
          <input name="submit" type="submit" id="submit" value="�޸�">
          &nbsp; 
          <input type="reset" value="����" name="B2">
        </p>
      </form></td>
  </tr>
</table>
</body>
</html>
