<?
 session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../style/css.css" type="text/css">
<title>ϵͳ�˵�</title>
</head>
<body>
<?
if ($_SESSION['usertype']=="����Ա") {
?>
<div class="leftframe">

    <div class="user"> 
    <p><? echo $_SESSION['user'];?></p>

    <p><? echo $_SESSION['usertype'];?></p><br></div>


<div class="left"><p><img src="../style/images/lang.png" border="0">&nbsp;����Ա���ܲ˵� 
        <hr>
      </div>

    <li ><a href="admin_course.php" target="mainFrame">�γ̹���</a></li>

    <li><a href="admin_class.php" target="mainFrame">�༶����</a></li>

    <li><a href="admin_student.php" target="mainFrame">ѧ������</a></li>

    <li><a href="admin_teacher.php" target="mainFrame">��ʦ����</a></li>

	<li><a href="admin_admin.php" target="mainFrame">�û�����</a></li>

    <li><a href="admin_change_pwd.php" target="mainFrame">�޸�����</a></li>

    <li><a href="rightframe.php" target="mainFrame">����</a></li>

    <li><a href="../logout.php" target="_top">�˳�ϵͳ</a></li>
 </div>

<?
} else if ($_SESSION['usertype']=="��ʦ" ){
?>

<div class="leftframe">
    
    <div class="user">
    <p><? echo $_SESSION['user'];?></p>
    <p><? echo $_SESSION['usertype'];?></p><br></div>

<div class="left"><p><img src="../style/images/lang.png" border="0">&nbsp;��ʦ���ܲ˵�
        <hr>
      </div>

    <li><a href="teach_hw_lay.php" target="mainFrame">������ҵ</a> </li>

    <li><a href="teach_hw_list.php" target="mainFrame">��ҵ�б�</a></li>

    <li><a href="teach_hw_submit.php" target="mainFrame">�ѽ���ҵ</a></li>

    <li><a href="admin_change_pwd.php" target="mainFrame">�޸�����</a></li>

    <li><a href="rightframe.php" target="mainFrame">����</a></li>

    <li><a href="../logout.php" target="_top">�˳�ϵͳ</a></li>
</div>
<?
}
?>

</body>
</html>
