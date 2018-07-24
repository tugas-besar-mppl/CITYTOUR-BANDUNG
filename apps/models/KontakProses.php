<!--
* @author		: develop team kelompok 1 mppl citytourbdg 
* @version		: v.1.0
* @param		: -
* @return		: -
* @throws		: -
* @see			: -
* @since		: 1.0
* @deprecated	: -
-->
<?php
session_start();
include_once '../../config/koneksi.php';
if(isset($_GET['kontak_attempt']))
{
		$date 	= date("Y-m-d");
		$nama	= $_POST['nama'];
		$email	= $_POST['email'];
		$subjek	= $_POST['subjek'];
		$pesan	= $_POST['pesan'];
		$sqlIns = "
				INSERT INTO citytourbdg.tb_kontak 
					(Nama,Email, Subjek, Pesan,Tanggal)
					VALUES
					('".$nama."','".$email."','".$subjek."','".$pesan."','".date('Y-m-d H:i:s')."') ";
	$resIns = mysql_query($sqlIns);	
	if(!$resIns){
	  echo "Data ini gagal disimpan. Data Error : ".$resIns;
	}else{
		echo "<script>window.location='../../';</script>";	
	}
}
?>