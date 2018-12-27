<?php 

//�������ݱ�

require 'conn.php';

$sql='create table course(
		course_id int(5) unsigned not null auto_increment,
		course_name varchar(40) not null,
 		primary key(course_id)
)'; 
mysql_query($sql) or die ("���ݱ��Ѿ�����");

$sql='create table teacher(
		t_id int(5) not null auto_increment,
		t_userid varchar(40)  not null,
		t_pwd varchar(40) not null,
		t_name varchar(40),
		primary key(t_id)
)';
mysql_query($sql);

$sql='create table class(
		c_id int(5) not null auto_increment,
		c_name varchar(40) not null,
		c_grade int(4) not null,
		c_faculty varchar(40) not null,
        primary key(c_id)
)';
mysql_query($sql);

$sql='create table c_t(
        ct_id int(5) not null auto_increment,
		course_id int(5),
		t_id int(5),
		c_id int(5),
		primary key (ct_id),
		foreign key (course_id) REFERENCES course (course_id),
		foreign key (t_id) references teacher(t_id),
		foreign key (c_id) references class(c_id)		
)';
mysql_query($sql);

$sql='create table student (
		s_id int(10) not null auto_increment,
		s_no char(10) not null,
		s_pwd varchar(40) not null,
		s_name char(40) not null,
		primary key (s_id)
)';
mysql_query($sql);

$sql='create table c_s (
        cs_id int(5) not null auto_increment,
		c_id int(5) not null,
		s_id int(5) not null,
		primary key (cs_id),
		foreign key (c_id) references class  (c_id),
		foreign key (s_id) references student (s_id)							 

)';
mysql_query($sql);


$sql='create table homework(
        hw_id int(4) not null auto_increment,
		hw_title varchar(50) not null,
		hw_content text,
		hw_pic mediumblob,
		hw_answer text,
		t_id int(5),
		hw_start date,
		hw_end date,
		primary key (hw_id),
		foreign key (t_id) references teacher (t_id)
)';
mysql_query($sql);

$sql='create table hw_do(
		do_id int(5) not null auto_increment,
		s_id int(5),
		hw_id int(5),
		do_pic mediunblob,
		do_content text,
		do_comment text,
		primary key(do_id),
		foreign key (s_id) references student (s_id),
		foreign key (hw_id) references homework (hw_id)

)';
mysql_query($sql);

$sql='create table admin(
		a_id int(5) not null auto_increment,
		a_user varchar(40) not null,
		a_pwd varchar(40),
		a_name varchar(20),
		primary key(a_id)

)';
mysql_query($sql);



$sql='insert into admin value(1,"admin",md5("admin"),"ϵͳ����Ա")';
mysql_query($sql) or die ("��������Աʧ��");
 
mysql_close($conn); 
?>

<p>��ϲ!���ݿ��Ѿ��ɹ�������<hr> 
<a href="index.html" target="_self">��½��̨</a>
(Ĭ�Ϻ�̨����Ա�ʺ�Ϊadmin������Ϊadmin);
</p>
		
