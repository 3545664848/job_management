<?
  session_start();
  require("../conn.php");
  
  if (@$_POST['submit']=="edit") {
 
	  $sql="update homework set hw_title='".$_POST['title']."',hw_content='".$_POST['content']."',hw_answer='".$_POST['answer']."',hw_end='".$_POST['end']."' where hw_id={$_POST['id']};"; 
	  echo $sql;
 	  mysql_query($sql,$conn) or die(mysql_error());

	$photoname=$_FILES['pic']['tmp_name'];  //上传的题目附图文件名
	if (! empty($photoname)) {
		$photo=fread(fopen($photoname,"rb"),filesize($photoname));
		$photo = '0x' . bin2hex($photo);
		mysql_query("update homework set hw_pic= $photo where hw_id= {$_POST['id']}",$conn);
	}
	 header("Location:teach_hw_list.php");
	 exit;
  }

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../style/css.css" type="text/css">
<title></title>
</head>
<body>
修改作业基本信息
<hr>
<form method="POST" action="teach_hw_edit.php"  enctype="multipart/form-data" >
  <table border="1" cellpadding="5" cellspacing="0" >
    <tr>
      <td colspan="2" align="center">修改作业</td>
    </tr>
     <?
	$sql="select * from homework where hw_id=".$_REQUEST['id'];
	$rs=mysql_query($sql,$conn);
    $row=mysql_fetch_array($rs);
	?>
    <tr>
      <td >作业标题</td>
      <td ><input name="title" type="text" size="30" value="<? echo $row['hw_title']?>"></td>
    </tr>
    <tr>
      <td>内容</td>
      <td ><textarea name="content" cols="50" rows="7" ><? echo $row['hw_content'] ?></textarea></td>
    </tr>
    <tr>
      <td>参考答案</td>
      <td ><textarea name="answer" cols="50" rows="7"><? echo $row['hw_answer']?></textarea></td>
    </tr>
    <tr>
      <td>附图</td>
      <td><? echo "<img src='getpic.php?id=".$_REQUEST['id']."' name='pic' border='1'/>";?>
        <input type="file" name="pic" onChange="lay.pic.src=this.value;">
        <font size="2" color="#666666">如果该题目含有图形，则选择图片文件</font>
        <div id="Layer1" style="display:none;position:absolute;z-index:1;"></div>
        <p></p></td>
    </tr>
    <tr>
      <td height="18" >命题教师</td>
      <td ><input name="teacher" type="text" value="<? echo $_SESSION['name'];?>" size="20" readonly></td>
    </tr>
    <tr>
      <td>布置日期</td>
      <td ><input name="start" type="text" value="<? echo $start=date("Y-m-d");?>" size="20" readonly></td>
    </tr>
    <tr>
      <td>提交日期</td>
      <td><input name="end" type="text" size="20" value="<? echo $row['hw_end']?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="Submit" value="保存">
		<input type="hidden" name="id" value="<? echo $_REQUEST['id']?>">	
        <input type="hidden" name="submit" value="edit"></td>
    </tr>
  </table>
</form>
</body>
</html>
