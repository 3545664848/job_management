<?
 session_start();
 require"../conn.php";
 if (@$_POST['submit']=="save"){
 $newpwd=$_POST['newpwd'];
 $oldpwd=$_POST['oldpwd'];
 if ($_SESSION['usertype']=="��ʦ")
 	$sql="update teacher set t_pwd=md5('$newpwd') where t_userid ='". $_SESSION['user']."' and t_pwd=md5('$oldpwd')";
 else if ($_SESSION['usertype']=="����Ա")
    		$sql="update admin set a_pwd=md5('$newpwd') where a_user='".$_SESSION['user']."' and a_pwd=md5('$oldpwd')"; 
 	 else
		    $sql="update student set s_pwd=md5('$newpwd') where s_no='".$_SESSION['s_no']."' and s_pwd=md5('$oldpwd')";
 mysql_query($sql,$conn);
 if (mysql_affected_rows()>0)
   echo "�޸�����ɹ���";
 else
   echo  "�޸�����ʧ�ܣ�";	
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../style/css.css" type="text/css">
<META HTTP-EQUIV=Cache-Control CONTENT=no-cache, must-revalidate>
<META HTTP-EQUIV=pragma CONTENT=no-cache>
<META HTTP-EQUIV=expires CONTENT=Wed, 26 Feb 1990 08:21:57 GMT>
<base onmouseover="window.status='';return true" onmouseout="window.status=''">

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


�޸�����
<hr>
 
<table border="1" cellpadding="5" cellspacing="0" width="450" >
  <tr>
  <td> <form action="admin_change_pwd.php" method="POST" name="pwd"  onSubmit="return submitit(this)">

          �� �� ���� 
          <input type="text" size="20" value="<? echo $_SESSION['user'];?>" >

          <p>ԭ �� �룺 
          <input type="password" name="oldpwd" size="20"></p>

          <p>�� �� �룺 
          <input type="password" name="newpwd" size="20" >
          ���볤�����20���ַ�</p>
         
          <p>��֤���룺 
          <input type="password" name="confirmpwd" size="20"></p>
        
          <p><input type="submit" value="�� ��" name="save">
          &nbsp; 
          <input type="reset" value="�� ��" name="reset">
          <input  type="hidden" name="submit" value="save">

      </form></p>
     </td>
     </tr>

</table>
</body>
</html>
