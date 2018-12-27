<?
 session_start();
require("../conn.php");
if ($_POST['submit']=="修改") {
	$newpwd=$_POST['newpwd'];
	$oldpwd=$_POST['oldpwd'];
	$sql="update student_user set s_pwd=PASSWORD('".$newpwd."') where s_xh ='". $_SESSION['xh']."' and s_pwd=PASSWORD('".$oldpwd."');";
	mysql_query($sql,$conn) or die("修改密码失败");
	if (mysql_affected_rows()>0)
	   echo "修改密码成功！";
	else
	   echo  "修改密码失败！";
	exit;
}   	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>修改密码</title>
<script language="javascript">
function submitit(myform){
    if (myform.oldpwd.value=="")
        {
            alert("请输入原密码！");
            myform.oldpwd.focus();
            return false;
        }
    if (myform.newpwd.value=="")
        {
            alert("请输入新密码！");
            myform.newpwd.focus();
            return false;
        }
    if (myform.confirmpwd.value=="")
        {
            alert("请再输入一次新密码！");
            myform.confirmpwd.focus();
            return false;
        }
    if (myform.newpwd.value!=myform.confirmpwd.value)
        {
            alert("新密码和验证密码不一致！");
            return false;
        }
}
</script>
</head>
<body>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#007CD0" width="100%" >
  <tr> 
    <td width="100%" class="border_blue">&nbsp;修改密码</td>
  </tr>
  <tr> 
    <td width="520" bgcolor="#F1F1F1"> 
	<form action="stud_change_pwd.php" method="POST" name="passwdform1" id="passwdform1" onsubmit="return submitit(this)">
        <p><br>
          学号： 
          <input type="text" size="20" value="<? echo $_SESSION['xh'];?>" readonly style="background-color:#efefef">
          <br>
          <br>
          原 密 码： 
          <input type="password" name="oldpwd" size="20">
          <font color="#FF0000"></font><br>
          <br>
          新 密 码： 
          <input type="password" name="newpwd" size="20" >
          密码长度最多20个字符<br>
          <br>
          验证密码： 
          <input type="password" name="confirmpwd" size="20">
        </p>
        <p align="center"> 
          <input name="submit" type="submit" id="submit" value="修改">
          &nbsp; 
          <input type="reset" value="重置" name="B2">
        </p>
      </form></td>
  </tr>
</table>
</body>
</html>
