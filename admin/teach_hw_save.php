<?
session_start();
require("../conn.php");

$content=htmlspecialchars($_POST['do_comment']);
if(isset($content)&&(""!= trim($content))){

	$sql="update hw_do set do_comment='".$content."' where do_id=".$_POST['do_id'];
	mysql_query($sql)or die(mysql_error());
	 header("location:teach_hw_submit.php");	
}

?>


