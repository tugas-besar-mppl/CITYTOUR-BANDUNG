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
include_once '../../config/koneksi.php';
if(isset($_GET['register_attempt']))
{
$nama= $_POST['nama'];
$telp= $_POST['telp'];
$email= $_POST['email'];
$password= $_POST['password'];
	$sqlIns = "INSERT INTO m_pelanggan (Nama, NoTelpon, Email, Password)
			   VALUES ('".$nama."','".$telp."','".$email."','".md5($password)."')";
	$resIns = mysql_query($sqlIns);	

	if(!$resIns){
	  echo "Data ini gagal disimpan. Data Error : ".$resIns;
	}
	$spf=sprintf("Select * from m_pelanggan where Email='%s' and Password='%s'",$_POST['email'],md5($_POST['password']));
	$rs=mysql_query($spf);
	$rw=mysql_fetch_array($rs);
	$rc=mysql_num_rows($rs);
	if($rc==1)
	{
		session_start();
		$_SESSION['pelanggan']=$rw['IdPelanggan'];
		$_SESSION['email']=$rw['Email'];
		$_SESSION['pass']=$rw['Password'];
		$_SESSION['nama']=$rw['Nama'];			
		echo "<script>window.location='../../index.php'</script>";
	}
}
?>