<?
 session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../style/css.css" type="text/css">
<title>�ޱ����ĵ�</title>
</head>

<body>
<div class="leftframe">
<div class="user">
<p><? echo $_SESSION['s_no'];?>
<p><? echo $_SESSION['s_name'];?>
<br></div>

<div class="fun"><p><img src="../style/images/lang.png" border="0">&nbsp;ѧ�����ܲ˵�

<hr width="100%">

    <li><a href="stud_hw_list.php" target="mainFrame">��ҵ�б�</a></li>

    <li><a href="../admin/admin_change_pwd.php" target="mainFrame">�޸�����</a></li>

    <li><a href="stud_help.php" target="mainFrame">����</a></li>

    <li><a href="../logout.php" target="_top">�˳�ϵͳ</a></li>
</div>
</div>
</body>
</html>
