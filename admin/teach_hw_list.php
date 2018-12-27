<?
session_start();
require("../conn.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../style/css.css" type="text/css">
<title>作业列表</title>
</head>

<body>
 作业列表
<hr>
<br>
  <table border="1" cellpadding="5" cellspacing="0">
    <tr class="thead"> 
      <td>作业编号</td>
      <td>作业标题</td>
      <td>>截止上交日期</td>
      <td>操作</td>
    </tr>
   <?
	$sql="select distinct hw_id,hw_title,hw_end from homework,teacher where homework.t_id=teacher.t_id and teacher. t_userid='{$_SESSION['user']}' order by hw_id";
	$rs=mysql_query($sql,$conn);
	$i=0;
	if (mysql_num_rows($rs)==0) echo "no data";
	while ($row=mysql_fetch_array($rs)) {
	?>
    <? if($i%2==0) echo '<tr bgcolor="#f8f8f8">'; else echo '<tr>';?> 
      <td><? echo $row['hw_id']?></td>
      <td><? echo $row['hw_title']?></td>
      <td><? echo $row['hw_end']?></td>
      <td><a href="teach_hw_edit.php?id=<? echo $row['hw_id']?>"><img src="../style/images/edit.png"  border="0"/></a>&nbsp;
          <a href="teach_hw_del.php?id=<? echo $row['hw_id']?>" onClick="var a=confirm('确认删除？'); if(a==0)return(false);"><img src="../style/images/drop.png" border="0"></a>&nbsp;
      </td>
    </tr>
      <?
	$i++;
	}
	?>
  </table>
  </body>
</html>
