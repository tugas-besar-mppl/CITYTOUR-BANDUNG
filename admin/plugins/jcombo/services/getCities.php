<?php

	// connect database
	include("../config.php");
		
	// get id param (from get vars)
	$id = !empty($_GET['id'])?intval($_GET['id']):0;
	// execute query in correct order 
	//(value,text)
	$query = "SELECT id_city, city_name FROM cities WHERE id_country = '$id' ORDER BY city_name ASC";
	$result = mysql_query($query);
	$items = array();
	if($result &&   mysql_num_rows($result)>0) {
		while($row = mysql_fetch_array($result)) {
			$items[] = array( $row[0], $row[1]);
		}		
	}
	mysql_close();
	// encode to json
	echo(json_encode($items)); 
?>