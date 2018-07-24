<?php
session_start();
include_once '../../includes/koneksi.php';

if ($_GET["olah"] == "add"){   


		  $sqlIns = "INSERT INTO m_petugas (Nama, Alamat, NoTelpon, StatusAktif)
		  			 VALUES ('".$_POST['nama']."','".$_POST['alamat']."', '".$_POST['telpon']."', '".$_POST['status']."')";
		  $resIns = mysql_query($sqlIns);
		  //echo $sqlIns;
		  if(!$resIns)
		  	echo "Data ini gagal disimpan. Keterangan : ".$resDel;
		  else 
		  	echo "Data ini telah disimpan."; 
	}
	else if ($_GET["olah"] == "edit")
    { 
		 $sqlUpdate="UPDATE m_petugas SET Nama='".$_POST["nama"]."',Alamat='".$_POST["alamat"]."', NoTelpon='".$_POST["telpon"]."',  
		 							 StatusAktif='".$_POST["status"]."'
		 			 WHERE IdPetugas ='".$_GET["id"]."';";
		 $resUp = mysql_query($sqlUpdate);		  
		  //header("location:../../?url=klinik&pesan=2");
		  if(!$resUp)
		  	echo "Data ini gagal diubah. \Keterangan : ".$resDel;
		  else 
		  	echo "Data ini telah diubah."; 
	}
	elseif ($_GET["olah"]=="del")
	 { 
	     $sqlDel =  "UPDATE m_petugas SET StatusDelete = 'Y'
					WHERE IdPetugas =  '".$_POST["id_petugas"]."'";
		 $resDel = mysql_query($sqlDel);	
			  if(!$resDel)
				echo "Data ini gagal dihapus. Keterangan : ".$resDel;
			  else 
				echo "Data ini telah dihapus.";
	}
	 

?>