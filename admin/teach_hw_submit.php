<?
session_start();
require("../conn.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../style/css.css" type="text/css">
<title>view homework</title>
</head>
<body>
已交作业
<hr>
<table cellpadding="5"  cellspacing="0" border="1">

    <?
      
    $i=0;
	$sql="select  hw_do.do_id,hw_title,s_no,s_name from hw_do,teacher,homework,student where hw_do.hw_id=homework.hw_id and student.s_id=hw_do.s_id and homework.t_id=teacher.t_id and teacher.t_userid='{$_SESSION['user']}'";
		  $result=mysql_query($sql) or die (mysql_error());
		  if(mysql_num_rows($result)>0){
			  	echo "
					<tr>
						<td>作业编号</td>
						<td>学号</td>
						<td>姓名</td>
						<td>作业</td>
					</tr>";
				while($row=mysql_fetch_array($result)){
    			 if($i%2==0) echo '<tr bgcolor="#f8f8f8">'; else echo '<tr>';					
					echo "<td>$row[do_id]</td>"?>
							<td><? echo '<a href="teach_hw_view.php?id='.$row['do_id'].'">' .$row['s_no']."</a>"?></td>
						     <?echo "<td>$row[s_name]</td>
					         <td>$row[hw_title]</td>
							</tr>";
					$i++;		
					}
			  }

	?>
</table>
</body>
</html>
