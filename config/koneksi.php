<?php
	//mysql_connect("10.6.0.190:3306","admin_it","4dm1n1t")or die ("Error while connecting server");
	mysql_connect("localhost","root","")or die ("Error while connecting server");
	mysql_select_db("citytourbdg") or die("Error while accessing database.");
	
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'citytourbdg');

	$mail_host = "smtp.gmail.com";
	$mail_port = 465;
	$mail_user = "alloneshare@gmail.com";
	$mail_pwd = "ALLoneshare@222";
	$mail_setform = "ALLone share";	
	
?>
