<?php
include "../../includes/koneksi.php";
?>
<script type="text/javascript" charset="utf-8">
var oTable;
jQuery(document).ready( function() {

  jQuery('#gridData').dataTable( {
	 "sDom": 'T<"clear">lfrtip',						 
	"oTableTools": {
	"sSwfPath": "plugins/datatables/media/swf/copy_csv_xls_pdf.swf",
	"aButtons": [{
				  'sExtends':    'text',
				  'sButtonText': 'Excel',									
				  'fnClick': function ( nButton, oConfig, oFlash )
				  {
					  dExport();					
				  }}]
	},
	"sScrollY" : "100%",
	"sScrollX" : "100%",
	"bScrollCollapse" : true,						 
	"bFilter": false,
	"bSort": false,
	"bSortClasses": false,
	"bJQueryUI": true,
	"sPaginationType": "full_numbers"
  });

});
 
function dExport(){
	var page = 'views/laporan/PembayaranWisataExcel.php?tgl='+jQuery("#dari_tanggal").val()+'&tgl1='+jQuery("#sampai_tanggal").val();
		//alert(page);
	vWinCal = window.open(page, "AWins", "toolbar=no,menubar=no,location=no,scrollbars=yes,width=750,height=400,leff=90,top=115,resizable=yes");
	vWinCal.opener = self;
	
}
</script>
<div id="dialog-form"></div>
<div style="width:100%;" class="ui-grid-header ui-widget-header ui-corner-all ui-helper-clearfix"></div>
<br />
<table width="100%" style="border:2" class="display" id="gridData">
  <thead>
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
  tb_booking.TotalHarga,
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
        WHERE tb_booking.TanggalRegistrasi >=' ".$dateStart."' AND tb_booking.TanggalRegistrasi <=' ".$dateEnd." '
		GROUP BY  m_wisata.Paket";

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

