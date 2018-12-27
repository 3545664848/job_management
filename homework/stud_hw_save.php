<?
session_start();
require("../conn.php");

$content=htmlspecialchars($_POST['do_content']);
if(isset($content)&&(""!= trim($content))){

		$sql="insert into hw_do(s_id,do_content,hw_id)values({$_POST['s_id']},'".$content."',{$_POST['hw_id']})";
	mysql_query($sql)or die(mysql_error());
	
	$photoname=$_FILES['pic']['tmp_name'];  //上传的题目附图文件名
	if (! empty($photoname)) {
		$photo=fread(fopen($photoname,"rb"),filesize($photoname));
		$photo = '0x' . bin2hex($photo);
		$sql2="select do_id from hw_do where s_id={$_POST['s_id']} and hw_id={$_POST['hw_id']}";
		$result=mysql_query($sql2);
		$row=mysql_fetch_array($result);

		mysql_query("update hw_do set do_pic= $photo where do_id=last_insert_id()",$conn) or die(mysql_error());
	}
	 echo"作业提交成功";	
	}

?>


