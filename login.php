<?
require("conn.php");
$sql="create or replace view teach_v
as select teacher.t_id,t_userid,t_name,c_name,course_name from teacher left join c_t on(teacher.t_id=c_t.t_id) left join course on(c_t.course_id=course.course_id) left join class on(c_t.c_id=class.c_id)";
mysql_query($sql)or die (mysql_error());

$sql="create or replace view homework_v
as select hw_id,hw_title,hw_content,hw_pic,hw_answer,c_name,class.c_id,course_name,hw_end from homework left join c_t on(homework.t_id=c_t.t_id) left join course on(c_t.course_id=course.course_id) left join class on(c_t.c_id=class.c_id)";
mysql_query($sql)or die (mysql_error());

$sql="create or replace view student_v
as select student.s_id,s_no,s_name,c_name from student left join c_s on(student.s_id=c_s.s_id) left join class on(c_s.c_id=class.c_id)";
mysql_query($sql)or die (mysql_error());


if(@$_REQUEST['submit']=="login" && isset($_REQUEST['userid'])){
		require("conn.php");
		session_start();
		$userid = $_REQUEST['userid'];
		$pwd = $_REQUEST['pwd'];
		if ($_REQUEST["usertype"]=="学生") {
		   $sql="select * from student where s_no= '$userid' and s_pwd= md5('$pwd')";
		   $result=mysql_query($sql,$conn) or die("执行SQL错误：$sql");
		   if (mysql_num_rows($result)==1) {
			  $row=mysql_fetch_array($result);
			  $_SESSION['s_no']=$row['s_no'];
			  $_SESSION['s_name']=$row['s_name'];
			  $_SESSION['s_id']=$row['s_id'];
			  $_SESSION['user']=$row['s_no'];
			  $_SESSION['usertype']="学生";
			  header("Location:./homework/index.html");
		   } else {
			 include "index.html";
			 echo '<p align="center"><font color="red">登陆失败，请检查用户名和密码！</font>';
			 exit;
			}  
		}else if($_REQUEST["usertype"]=="教师"){ 
		  $sql="select * from teacher where t_userid ='$userid' and t_pwd = md5('$pwd')";
		   $result=mysql_query($sql,$conn) or die("执行SQL错误：$sql");
		   if (mysql_num_rows($result)==1) {
			  $row=mysql_fetch_array($result);
			  $_SESSION['user']=$row['t_userid'];
			  $_SESSION['name']=$row['t_name'];
			  $_SESSION['usertype']="教师";
			  header("Location:./admin/index.php");
		   }else {
			 include "index.html";
			 echo '<p align="center"><font color="red">登陆失败，请检查用户名和密码！</font>';
			 exit;
		   }  
	   }else{ //管理员
		   $sql="select * from admin where a_user='$userid' and a_pwd = md5('$pwd')";
		   $result = mysql_query($sql);
		   if (mysql_num_rows($result)==1){
			   $row=mysql_fetch_array($result);
			   $_SESSION['user'] = $row['a_user'];
			   $_SESSION['usertype']="管理员";
			   header("location:./admin/index.php");
			   }
			else{	
				   
				   include"index.html";
				   echo '<p align="center"><font color="red">登陆失败，请检查用户名和密码！</font>';
				   exit;
				   }
		   }
	
}

?>	 	  