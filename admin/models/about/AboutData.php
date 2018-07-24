<?php
session_start();
include_once '../../includes/koneksi.php';

		 $sqlUpdate="UPDATE tb_about SET About='".$_POST["about"]."', Tanggal='".date('Y-m-d H:i:s')."'";
		 $resUp = mysql_query($sqlUpdate);		  
		  //header("location:../../?url=klinik&pesan=2");
		  if(!$resUp)
		  	echo "Data ini gagal diubah. \Keterangan : ".$resDel;
		  else 
		  	echo "Data ini telah diubah."; 

		  header("location:../../dashboard.php?cat=about&page=AboutGrid&menu=5&title=About Us");	 

?>