<?php
ob_start();
include_once '../../includes/koneksi.php';
include_once '../../includes/function.php';

if ($_GET["olah"] == "edit"){
		  $StatusBayar = $_POST["StatusBayar"];	
		  
		  $sqlUpdate = "UPDATE tb_booking SET StatusBayar = '".$StatusBayar."'	WHERE IdBooking = '".$_GET["id"]."'";
		  //echo $sqlUpdate; 			 
		  $resUp = mysql_query($sqlUpdate) or die("Error: (" . mysql_errno() . ") " . mysql_error());		  
		  if(!$resUp) {
		  	echo "Data ini gagal diubah. \Keterangan : ".$resDel;
		  } else  {		
			echo "Data ini telah diubah."; 
		  }
	}
elseif ($_GET["olah"]=="del")
{ 	  	 
      $sqlDel =  "DELETE FROM tb_booking WHERE IdBooking =  '".$_POST["IdBooking"]."'";		
	  //echo $sqlDel;
	  $resDel = mysql_query($sqlDel);
	  if(!$resDel) {
		  	echo "Data ini gagal dihapus. \Keterangan : ".$resDel;
	  } else {
		  	echo "Data ini telah dihapus.";			
	  }
}
?>