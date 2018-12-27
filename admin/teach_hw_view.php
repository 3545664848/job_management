<?
session_start();
require("../conn.php");
	$sql2="select * from hw_do where do_id={$_REQUEST['id']}";
	$rs2=mysql_query($sql2,$conn) or die (mysql_error());
	$row2=mysql_fetch_array($rs2);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../style/css.css" type="text/css">
<title></title>
<script>
function test(){
if(document.form1.do_content.value==""){
	alert("作业不能为空");
	return false;
	}
else
	return true;
}
</script>
<base onmouseover="window.status='';return true" onmouseout="window.status=''">
</head>
<body>
查看作业
<hr>
<form action="teach_hw_save.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return test(this);">
<? 	if(!is_null($row2['do_comment']))
		$flag=1;
	else
		$flag=0;
?>

 <table width="580">  
  <tr><td class="thead">答案：</td></tr>
  <tr> 
    <td><textarea name="do_content"  cols="50" rows="15"><? echo $row2['do_content']?></textarea></td>
  </tr>
  <tr>
		<tr><td>附图:</td></tr>
      <td>
      	<? echo "<img src='getdopic.php?id={$row2['do_id']}' name='pic' border='1'/>";?>
		</td>
    </tr>
	<tr><td class="thead">评语：</td> </tr>
    <tr>
    	<td>

					
        	<?	
				echo "<textarea name='do_comment'  cols='50' rows='5'>".$row2['do_comment']."</textarea>";
				if ($flag==0){
					echo' <p><input type="submit"  value="确定">';
			}else{ 
					echo "<p><font color=#FF0000>已阅！</font>";
					echo "<input type='button' value='返回' onClick='javascript:history.back(-1);'>";
				}
			?>          
            <input type="hidden" name="do_id" value="<? echo $row2['do_id'];?>">

        </td>
    </tr>
</table>

</form>
</body>
</html>