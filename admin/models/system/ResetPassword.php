<?php
include_once '../../includes/koneksi.php';
include "../../includes/blowfish.php";
 if ($_GET["id_user"] != "")
    { 		  		
		  $pass = blowfish_encrypt("12345");
		  
		  $sqlUpUser = "UPDATE user_login SET Password = '".$pass."'
						 WHERE IdUserLogin ='".$_GET["id_user"]."'";
		  $res1 = mysql_query($sqlUpUser);
		  		 
		  if($res1)
		  	echo "Password dengan Usernama ".$_GET["username"]." telah direset menjadi 12345";
		  else 
		  	echo "reset password gagal direset.";
					  
		  //header("location:../../?url=user&pesan=2");
	  
	}	
	 
?>