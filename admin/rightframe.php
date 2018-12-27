<?
 session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../style/css.css" type="text/css">
<title>菜单帮助</title>
</head>
<body>
<?
if ($_SESSION['usertype']=="管理员") {
?>
<table width="550" height="199"  cellpadding="5" cellspacing="0">
  <tr> 
    <td><font color="#0000FF">管理员菜单说明</font></td>
  </tr>
  <tr> 
    <td><ul>
        <li>课程管理：包括增加、删除、修改课程。</li>
      </ul></td>
  </tr>
  <tr> 
    <td><ul>
        <li>设置班级：包括增加、删除、修改班级。</li>
      </ul></td>
  </tr>
  <tr> 
    <td><ul>
        <li>学生管理：包括增加、删除、修改学生个人信息。</li>
      </ul></td>
  </tr>
  <tr> 
    <td><ul>
        <li>教师管理：包括增加、删除、修改教师用户信息。</li>
      </ul></td>
  </tr>
  <tr> 
    <td><ul>
        <li>权限：增加、删除、修改管理员信息</li>
      </ul></td>
  </tr>
  <tr> 
    <td><ul>
        <li>帮助：显示本菜单说明</li>
      </ul></td>
  </tr>
</table>
<?
} else {
?>
<table width="550" height="156"  cellpadding="5" cellspacing="0">
  <tr> 
    <td height="28"><font color="#0000FF">教师菜单说明</font></td>
  </tr>
  <tr> 
    <td height="27">
<ul>
        <li>布置作业： 包括增加、删除、修改。</li>
      </ul></td>
  </tr>
  <tr> 
    <td height="32">
<ul>
        <li>评阅作业 。</li>
      </ul></td>
  </tr>
  <tr> 
    <td height="23">
<ul>
        <li>输出成绩表： 按班级输出各课程的考试成绩。</li>
      </ul></td>
  </tr>
  <tr> 
    <td height="20">
<ul>
        <li>修改密码：修改用户的密码。</li>
      </ul></td>
  </tr>
</table>
<?
}
?>
</body>
</html>
