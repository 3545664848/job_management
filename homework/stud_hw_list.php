<?
session_start();
require("../conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="../style/css.css" rel="stylesheet" type="text/css" />
</head>

<body>
你所在班级的作业有：
<hr>
 <table rules="cols">    
    <tr class="thead"> 
      <td>作业编号</td>
      <td>作业标题</td>
      <td>班级</td>
      <td>课程</td>
      <td>>截止上交日期</td>
    </tr>
   <?
    $i=1;
	$sql="select * from homework_v,c_s,student where student.s_id=c_s.s_id and homework_v.c_id=c_s.c_id and student.s_id=".$_SESSION['s_id'] ;
	$rs=mysql_query($sql,$conn);
	if(mysql_num_rows($rs)>0){
	$i=0;
	while ($row=mysql_fetch_array($rs)) {
	?>
    <? if($i%2==0) echo '<tr bgcolor="#f8f8f8">'; else echo '<tr>';?> 
      <td><? echo $row['hw_id']?></td>
      <td><? echo '<a href="stud_hw_view.php?id='.$row['hw_id'].'">' .$row['hw_title']."</a>"?></td>
      <td><? echo $row['c_name'] ?></td>
      <td><? echo $row['course_name']?></td>
      <td><? echo $row['hw_end']?></td>     
    </tr>
      <?
	$i++;
	}
	?>
  </table>
  <? }?>
</body>
</html>