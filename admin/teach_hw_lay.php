  <?
  session_start();
  require("../conn.php");
  
  if (@$_POST['submit']=="add") {
	$content = $_POST['content'];
	$content = htmlspecialchars($content);
	$answer = $_POST['answer'];
	$answer = htmlspecialchars($answer);
	$sql="select * from teacher where t_userid='{$_SESSION['user']}'";
	$result=mysql_query($sql) or die (mysql_error());
	$row=mysql_fetch_array($result);
	$t_id = $row['t_id'];

	if(isset($content)&&(""!= trim($content))){  

	$sql="insert into homework(hw_title,hw_content,hw_answer,t_id,hw_start,hw_end)values('{$_POST['title']}','".$content."','".$answer."',$t_id,'{$_POST['start']}','{$_POST['end']}')";

	 mysql_query($sql,$conn) or die(mysql_error()); 

	 } 

$photoname=$_FILES['pic']['tmp_name'];  //上传的题目附图文件名
	if (! empty($photoname)) {
		$photo=fread(fopen($photoname,"rb"),filesize($photoname));
		$photo = '0x' . bin2hex($photo);
		mysql_query("update homework set hw_pic= $photo where hw_id= last_insert_id()",$conn);
	}
	 header("Location:teach_hw_list.php");
	 echo '<img src="../style/images/okay.png" border="0">&nbsp;<font color=#FF0000>添加作业成功';
	 exit;
  }

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../style/css.css" type="text/css">
<title>布置作业</title>
</head>
<body>
布置作业
<hr>
<form method="POST" action="teach_hw_lay.php" name="lay" enctype="multipart/form-data" >
  <table border="1" cellpadding="5" cellspacing="0" >
    <tr>
      <td >作业标题</td>
      <td ><input name="title" type="text" size="30"></td>
    </tr>
    <tr>
      <td>内容</td>
      <td ><textarea name="content" cols="50" rows="7"></textarea></td>
    </tr>
    <tr>
      <td>参考答案</td>
      <td ><textarea name="answer" cols="50" rows="7"></textarea></td>
    </tr>
    <tr>
      <td>附图</td>
      <td><img src="" name="pic" onMouseOut="hiddenPic();" onMouseMove="showPic(this.src);" />
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
      <td><input name="end" type="text" size="20"></td>
    </tr>
    <tr>
      <td colspan="2">
      <img src="../style/images/okay.png" border="0">
      <input type="submit" name="Submit" value="添加">
      <input type="hidden" name="submit" value="add"></td>
    </tr>
  </table>
</form>
</body>
</html>
