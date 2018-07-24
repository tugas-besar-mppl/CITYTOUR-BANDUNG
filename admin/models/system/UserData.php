<?php
ob_start();
session_start();
include_once '../../includes/koneksi.php';
//include "../../includes/blowfish.php";
 if ($_GET["olah"] == "add")
    { 
		  
		  $user = $_POST["username"];
		  $pass = md5($_POST["password"]);
		  $group = $_POST["group"];		  
		  $petugas = $_POST["petugas"];
		  $status = $_POST["status_aktif"]==""?"T":$_POST["status_aktif"];
		  $tgl_daftar = date("Y-m-d H:i:s");
		  $sqlInsUser = "INSERT INTO user_login (Username, Password, IdPetugas,IdGroup, Tanggal, StatusAktif,StatusDelete, UserUpdate, WaktuUpdate) 
		  			     VALUES ('".$user."', '".$pass."', '".$petugas."', '".$group."', '".$tgl_daftar."', '".$status."','T', '".$_SESSION["username"]."',
								'".date("Y-m-d H:i:s")."')";

		//echo "ini kode memasukan data ke uer";
		 //echo $sqlInsUser;
		  $res = mysql_query($sqlInsUser);
		  if(!$res)
		  	echo "Data ini gagal disimpan.";
		  else 
		  	echo "Data ini telah disimpan.";
		 //echo "ini kode kode memasukan data ke user menu";		 
		  //header("location:../../?url=user&pesan=1");
	  
	}
	else if ($_GET["olah"] == "edit")
    { 
		  
		  $user = $_POST["username"];
		  $petugas = $_POST["petugas"];
		  $group = $_POST["group"];
		  $status = $_POST["status_aktif"]==""?"T":$_POST["status_aktif"];
		  
		  $sqlUpUser = "UPDATE user_login SET username = '".$user."',
		  								IdPetugas='".$petugas."',
		  								IdGroup= '".$group."',										  										  	 	   																																																								                                        StatusAktif = '".$status."',
										UserUpdate='".$_SESSION["username"]."',
										UserUpdate ='".date("Y-m-d H:i:s")."' 
						WHERE IdUserLogin ='".$_GET["id"]."'";
			//echo $sqlUpUser;			 
		  $res1 = mysql_query($sqlUpUser);
		  		 
		  if(!$res1)
		  	echo "Data ini gagal diubah.";
		  else 
		  	echo "Data ini telah diubah.";
					  
		  //header("location:../../?url=user&pesan=2");
	  
	}
	elseif ($_GET["olah"]=="del")
	 { 
	  $sqlDel = "UPDATE user_login SET StatusDelete = 'Y', 
	                             UserUpdate='".$_SESSION["username"]."', 
	                             WaktuUpdate ='".date("Y-m-d H:i:s")."'
				 WHERE IdUserLogin =  '".$_POST["id_user_login"]."'";
	  $res1=mysql_query($sqlDel);
	  //header("location:../../?url=user&pesan=3");
	  if(!$res1)
		  	echo "Data ini gagal dihapus.";
	  else 
		  	echo "Data ini telah dihapus.";
	 }
	 
?>