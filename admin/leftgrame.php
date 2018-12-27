<?
 session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../style/css.css" type="text/css">
<title>系统菜单</title>
</head>
<body>
<?
if ($_SESSION['usertype']=="管理员") {
?>
<div class="leftframe">

    <div class="user"> 
    <p><? echo $_SESSION['user'];?></p>

    <p><? echo $_SESSION['usertype'];?></p><br></div>


<div class="left"><p><img src="../style/images/lang.png" border="0">&nbsp;管理员功能菜单 
        <hr>
      </div>

    <li ><a href="admin_course.php" target="mainFrame">课程管理</a></li>

    <li><a href="admin_class.php" target="mainFrame">班级管理</a></li>

    <li><a href="admin_student.php" target="mainFrame">学生管理</a></li>

    <li><a href="admin_teacher.php" target="mainFrame">教师管理</a></li>

	<li><a href="admin_admin.php" target="mainFrame">用户管理</a></li>

    <li><a href="admin_change_pwd.php" target="mainFrame">修改密码</a></li>

    <li><a href="rightframe.php" target="mainFrame">帮助</a></li>

    <li><a href="../logout.php" target="_top">退出系统</a></li>
 </div>

<?
} else if ($_SESSION['usertype']=="教师" ){
?>

<div class="leftframe">
    
    <div class="user">
    <p><? echo $_SESSION['user'];?></p>
    <p><? echo $_SESSION['usertype'];?></p><br></div>

<div class="left"><p><img src="../style/images/lang.png" border="0">&nbsp;教师功能菜单
        <hr>
      </div>

    <li><a href="teach_hw_lay.php" target="mainFrame">布置作业</a> </li>

    <li><a href="teach_hw_list.php" target="mainFrame">作业列表</a></li>

    <li><a href="teach_hw_submit.php" target="mainFrame">已交作业</a></li>

    <li><a href="admin_change_pwd.php" target="mainFrame">修改密码</a></li>

    <li><a href="rightframe.php" target="mainFrame">帮助</a></li>

    <li><a href="../logout.php" target="_top">退出系统</a></li>
</div>
<?
}
?>

</body>
</html>
