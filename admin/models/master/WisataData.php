<?php
session_start();
include_once '../../includes/koneksi.php';

if ($_GET["olah"] == "add"){   


		  $sqlIns = "INSERT INTO m_wisata (Paket, Keterangan, Harga, StatusAktif)
		  			 VALUES ('".$_POST['paket']."','".$_POST['keterangan']."','".$_POST['harga']."', '".$_POST['status']."')";
		  $resIns = mysql_query($sqlIns);
		  //echo $sqlIns;
		  if(!$resIns)
		  	echo "Data ini gagal disimpan. Keterangan : ".$resDel;
		  else 
		  	echo "Data ini telah disimpan."; 
	}
	else if ($_GET["olah"] == "edit")
    { 
		 $sqlUpdate="UPDATE m_wisata SET Paket='".$_POST["paket"]."',Keterangan='".$_POST["keterangan"]."',Harga='".$_POST["harga"]."',   
		 							 StatusAktif='".$_POST["status"]."'
		 			 WHERE IdWisata ='".$_GET["id"]."';";
		 $resUp = mysql_query($sqlUpdate);		  
		  //header("location:../../?url=klinik&pesan=2");
		  if(!$resUp)
		  	echo "Data ini gagal diubah. \Keterangan : ".$resDel;
		  else 
		  	echo "Data ini telah diubah."; 
	}
	elseif ($_GET["olah"]=="del")
	 { 
	     $sqlDel =  "UPDATE m_wisata SET StatusDelete = 'Y'
					WHERE IdWisata =  '".$_POST["id_wisata"]."'";
		 $resDel = mysql_query($sqlDel);	
			  if(!$resDel)
				echo "Data ini gagal dihapus. Keterangan : ".$resDel;
			  else 
				echo "Data ini telah dihapus.";
	}
	 

?>