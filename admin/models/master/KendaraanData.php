<?php
session_start();
include_once '../../includes/koneksi.php';

if ($_GET["olah"] == "add")
    {	  $jenis = $_POST["jenis"];
		  $file = $_FILES['photo']['name'];		

		  $sqlIns = "INSERT INTO m_kendaraan (Jenis, Kapasitas, Jumlah, Harga,Photo, StatusAktif)
		  			 VALUES ('".$_POST["jenis"]."','".$_POST["kapasitas"]."', '".$_POST["jumlah"]."', '".$_POST["harga"]."',
							'".$jenis.'.png'."','".$_POST["status"]."')";
		  $resIns = mysql_query($sqlIns);
		  //echo $sqlIns;
		  //echo $file;
		  if ($_FILES['photo']['name']!="")
			{
					move_uploaded_file($_FILES['photo']['tmp_name'], "../../../assets/images/mobil/".$jenis.".png");  
			}
			
		  if(!$resIns)
		  	echo "Data ini gagal disimpan. Data Error : ".$resIns;
		  else 
		  	echo "Data ini telah disimpan."; 
	}
	else if ($_GET["olah"] == "edit")
    {
		$jenis = $_POST["jenis"];
		  $file = $_FILES['photo']['name'];
		  $file_txt = $_POST["photo_text"];
		  
		  if (!empty($file) || !empty($file_txt))
		  	 $file_save = $jenis.".png";		
	
		 $sqlUpdate="UPDATE m_kendaraan SET Jenis='".$_POST["jenis"]."',Kapasitas='".$_POST["kapasitas"]."', Jumlah='".$_POST["jumlah"]."',  
					 Harga='".$_POST["harga"]."',Photo='".$jenis.'.png'."', StatusAktif='".$_POST["status"]."' WHERE IdKendaraan ='".$_GET["id"]."';";
		 $resUp = mysql_query($sqlUpdate);		  
		  //header("location:../../?url=klinik&pesan=2");
		  if ($_FILES['photo']['name']!="")
			{
					move_uploaded_file($_FILES['photo']['tmp_name'], "../../../assets/images/mobil/".$jenis.".png");  
			}		  
		  
		  
		  if(!$resUp)
		  	echo "Data ini gagal diubah. \Kapasitas : ".$resDel;
		  else 
		  	echo "Data ini telah diubah."; 
	}
	elseif ($_GET["olah"]=="del")
	 { 
	     $sqlDel =  "UPDATE m_kendaraan SET StatusDelete = 'Y'
					WHERE IdKendaraan =  '".$_POST["id_kendaraan"]."'";
		 $resDel = mysql_query($sqlDel);	
			  if(!$resDel)
				echo "Data ini gagal dihapus. Kapasitas : ".$resDel;
			  else 
				echo "Data ini telah dihapus.";
	}
	 

?>