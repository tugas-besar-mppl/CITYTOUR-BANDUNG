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
if(isset($_GET['register_attempt']))
{
		$blnthn = date("dmy");
		$month = date("my");
		$sql_noreg="SELECT
			  KodeBooking,
			  SUBSTR(KodeBooking,3,4) AS dast
			FROM tb_booking
			WHERE SUBSTR(KodeBooking,3,4) = '".$month."'
			ORDER BY TanggalRegistrasi DESC
			LIMIT 1";
			//echo $sql_noreg;		
		$q_noreg=mysql_query($sql_noreg);
		$jum_noreg=mysql_num_rows($q_noreg);
			if($jum_noreg > 0){
				$d_noreg=mysql_fetch_array($q_noreg);
				//echo $d_noreg['No_Nota'];
				$no_kwi = explode("-",$d_noreg["KodeBooking"]);
				//echo $no_kwi[1];
				$urut = intval($no_kwi[1]) + 1;
				//echo "-".$urut;

				if($urut<10){$noreg="00".$urut;}
				else if($urut<100){$noreg="0".$urut;}
				else{$noreg=$urut;}
			}
			else{
				$noreg="001";
			}					
		$kodebooking = $blnthn."-".$noreg;
		$idkendarran= $_POST['kendaraan'];
		$idpaket= $_POST['paket'];
		$idpelanggan= $_SESSION['pelanggan'];
		$jml= $_POST['jml'];
		$angka=range(0,9);
		shuffle($angka);
		$ambilangka=array_rand($angka,3);
		$angkastring=implode('',$ambilangka);
		$total= $_POST['total'];
		$totalangkaunik=$total+$angkastring;
		$tanggalawal= $_POST['awal'];
		$tanggalakhir= $_POST['akhir'];
		$sqlIns = "
					INSERT INTO citytourbdg.tb_booking 
						(IdKendaraan,KodeBooking, 	IdWisata, 	IdPelanggan, JmlHari, TotalHarga,TanggalRegistrasi,	TanggalBookingAwal,TanggalBookingAkhir)
						VALUES
						('".$idkendarran."','".$kodebooking."','".$idpaket."','".$idpelanggan."','".$jml."','".$totalangkaunik."',
						 '".date('Y-m-d H:i:s')."','".$tanggalawal."', 	'".$tanggalakhir."'	) ";
						//echo $sqlIns;
		$resIns = mysql_query($sqlIns);	
		if(!$resIns){
		  echo "Data ini gagal disimpan. Data Error : ".$resIns;
		}else{	
			echo "<script>window.location='../../?pages=pembayarandetail&data=".$kodebooking."'</script>";	
		}
	
}
?>