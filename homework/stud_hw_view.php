<?
session_start();
require("../conn.php");
	$sql2="select * from hw_do where s_id={$_SESSION['s_id']} and hw_id={$_REQUEST['id']}";
	$rs2=mysql_query($sql2,$conn);
	$row2=mysql_fetch_array($rs2);

	$sql="select * from homework where hw_id={$_REQUEST['id']}";
	$rs=mysql_query($sql,$conn) or die(mysql_error());
	$row=@mysql_fetch_array($rs);

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
<table width="560">
  <tr> 
    <td class="thead"><? echo $row['hw_title']?></td>
  </tr>
  <tr> 
    <td><? echo $row['hw_content'];?> </td>
  </tr>
  <tr> 
      <td><? echo "附图：<img src='../admin/getpic.php?id=".$_REQUEST['id']."' name='pic' border='1'/>";?>
        <div id="Layer1" style="display:none;position:absolute;z-index:1;"></div>
        </td>
  </tr>
</table>
<br>
<form action="stud_hw_save.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return test(this);">
<? 	if(mysql_num_rows($rs2)>0)
		$flag=1;
	else
		$flag=0;
?>

 <table width="560">  
  <tr><td class="thead">你的答案：</td></tr>
  <tr> 
    <td><textarea name="do_content"  cols="50" rows="8"><? echo $row2['do_content']?></textarea></td>
  </tr>
  <tr>
      <td>
      	<? echo "<img src='getpic.php?id={$row2['do_id']}' name='pic' border='1'/>";
        if($flag==0) echo '<input type="file" name="pic" onChange="lay.pic.src=this.value;">
        <font size="2" color="#666666">如果该题目含有图形，则选择图片文件</font>';?>
		</td>
    </tr>
    <tr>
    	<td>
        	<? if ($flag==0)echo '<img src="../style/images/okay.png" border="0">&nbsp;<input type="submit"  value="提交作业">';
				else{ 
					echo '<img src="../style/images/notice.png" border="0">&nbsp;&nbsp;<font color=#FF0000>提示：你已经提交作业！</font>';
					echo "<p>参考答案：<textarea cols='50' row='8' readonly>".$row['hw_answer']."</textarea>";
					echo "<p>老师评语：".$row2['do_comment'];
				}
			?>
            <p><input type="button" value="返回" onClick="javascript:history.back(-1);">
            <input type="hidden" name="hw_id" value="<? echo $row['hw_id'];?>">
            <input type="hidden" name="c_id" value="<? echo $row['c_id'];?>">
            <input type="hidden" name="course_id" value="<? echo $row['course_id'];?>">
            <input type="hidden" name="s_id" value="<? echo $_SESSION['s_id'];?>"> 
        </td>
    </tr>
</table>

</form>
</body>
</html>