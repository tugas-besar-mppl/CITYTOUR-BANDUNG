<?php
  	include_once '../../includes/koneksi.php';
	if (!empty($_GET['username']) && $_GET["proses"] == "add") {		
		$sql = "SELECT id_user_login,  username, pegawai FROM user_login WHERE username = '".$_GET["username"]."'";
		//echo $sql;
		$result = mysql_query($sql);	
		if($result && mysql_num_rows($result)>0) {
		  echo "1";    
		} else {
		  echo "0";		
		}
		mysql_close();
	} else {
	  echo "0";		
	}    
?>