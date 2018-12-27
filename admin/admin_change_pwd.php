<?
 session_start();
 require"../conn.php";
 if (@$_POST['submit']=="save"){
 $newpwd=$_POST['newpwd'];
 $oldpwd=$_POST['oldpwd'];
 if ($_SESSION['usertype']=="教师")
 	$sql="update teacher set t_pwd=md5('$newpwd') where t_userid ='". $_SESSION['user']."' and t_pwd=md5('$oldpwd')";
 else if ($_SESSION['usertype']=="管理员")
    		$sql="update admin set a_pwd=md5('$newpwd') where a_user='".$_SESSION['user']."' and a_pwd=md5('$oldpwd')"; 
 	 else
		    $sql="update student set s_pwd=md5('$newpwd') where s_no='".$_SESSION['s_no']."' and s_pwd=md5('$oldpwd')";
 mysql_query($sql,$conn);
 if (mysql_affected_rows()>0)
   echo "修改密码成功！";
 else
   echo  "修改密码失败！";	
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


修改密码
<hr>
 
<table border="1" cellpadding="5" cellspacing="0" width="450" >
  <tr>
  <td> <form action="admin_change_pwd.php" method="POST" name="pwd"  onSubmit="return submitit(this)">

          用 户 名： 
          <input type="text" size="20" value="<? echo $_SESSION['user'];?>" >

          <p>原 密 码： 
          <input type="password" name="oldpwd" size="20"></p>

          <p>新 密 码： 
          <input type="password" name="newpwd" size="20" >
          密码长度最多20个字符</p>
         
          <p>验证密码： 
          <input type="password" name="confirmpwd" size="20"></p>
        
          <p><input type="submit" value="修 改" name="save">
          &nbsp; 
          <input type="reset" value="重 置" name="reset">
          <input  type="hidden" name="submit" value="save">

      </form></p>
     </td>
     </tr>

</table>
</body>
</html>
