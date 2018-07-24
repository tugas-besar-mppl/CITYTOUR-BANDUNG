<?php

	
	define("DATABASE_SERVER","localhost");
	define("DATABASE_USER","root");
	define("DATABASE_PASSWORD","nadipw");
	define("DATABASE_NAME","test");
	

	// connecting to database
	$link = mysql_connect(DATABASE_SERVER,DATABASE_USER,DATABASE_PASSWORD);
	mysql_select_db(DATABASE_NAME,$link);
	
	
?>