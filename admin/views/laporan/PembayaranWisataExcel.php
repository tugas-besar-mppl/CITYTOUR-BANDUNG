<?php

header('Content-Type: application/vnd.ms-excel');
header('Expires: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Content-Disposition: attachment; filename="Laporan Pembayaran Jenis Wisata.xls"');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: no-cache');

include "../../includes/koneksi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Peminjaman</title>
<table width="100%" style="border:2" class="display" id="gridData">
  <thead>
  <tr>
    <th  align="center" colspan="3"><h3>Laporan Pembayaran</h3></th>    
  </tr> 
  <tr>
  	<th  align="center" colspan="3"><h4><?php echo "Dari Tanggal ".$_GET['tgl']." Sampai Dengan ".$_GET['tgl1'];?></h4></th>
  </tr>  
  <tr>
    <th width="100">No</th>   
    <th width="100">Jenis Kendaraan</th>
    <th width="100">Jumlah Harga</th>
  </tr>
  </thead>
  <tbody>
<?php 
$sql = "SET GLOBAL log_bin_trust_function_creators = 1";
mysql_query($sql);
	
function format_date($date_format) {
	$date = explode("-", $date_format);
	return $date[2] . "-" . $date[1] . "-" . $date[0];
}

$dateStart = format_date($_GET[tgl]);
$dateEnd = format_date($_GET[tgl1] );

$query="SELECT
  tb_booking.IdBooking,
  tb_booking.KodeBooking,
  m_kendaraan.Jenis,
  m_wisata.Paket,
  m_wisata.Harga,  
  m_pelanggan.Nama,
  tb_booking.JmlHari,
  SUM(tb_booking.TotalHarga) AS TotalHarga,
  DATE_FORMAT(tb_booking.TanggalRegistrasi,'%d-%m-%Y %H:%i:%s') AS TanggalRegistrasi,
  DATE_FORMAT(tb_booking.TanggalBookingAwal,'%d-%m-%Y') AS TanggalBookingAwal,
  DATE_FORMAT(tb_booking.TanggalBookingAkhir,'%d-%m-%Y') AS TanggalBookingAkhir,
  tb_booking.StatusBayar
FROM tb_booking
  INNER JOIN m_kendaraan
    ON tb_booking.IdKendaraan = m_kendaraan.IdKendaraan
  INNER JOIN m_wisata
    ON tb_booking.IdWisata = m_wisata.IdWisata
  INNER JOIN m_pelanggan
    ON tb_booking.IdPelanggan = m_pelanggan.IdPelanggan
        WHERE m_wisata.TanggalRegistrasi >=' ".$dateStart."' AND tb_booking.TanggalRegistrasi <=' ".$dateEnd." ' GROUP BY  m_kendaraan.Jenis";

//if ($_GET["keyword"] !="") {
//	$queryWhere = $queryWhere . " AND m_item.id_item = '" . $_GET["keyword"] . "'";
//}
//$queryGroup =" GROUP BY IDREG ";
//$queryOrder =" ORDER BY r.TGL_REGISTRASI DESC";
//echo $query.$queryWhere;		
//exit;
$no = 1;
$rResult = mysql_query($query);
while ($rows = mysql_fetch_object($rResult)){
?>
  <tr class="list calibriTabel" align="center">
      <td><?php echo $no;?></td>  
    <td><?php echo $rows->Paket;?></td>   
    <td><?php echo number_format($rows->Harga);?></td>
    
  </tr>
  
<?php 
	$total_penjualan = $total_penjualan  + $rows->Harga;
	$no++;} ?>  
    </tbody>
    <tfoot>
    <tr>
        <td colspan="2" align="center"><strong>TOTAL</strong></td>
        <td align="center"><?php echo number_format($total_penjualan);?></td>    
    </tr>
    </tfoot>
</table>

