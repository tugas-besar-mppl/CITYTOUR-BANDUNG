<?php

 	ob_start();

	session_start();

	include_once("../../includes/koneksi.php");
	$idreg = $_GET["id"];
	$id_peserta = $_GET["id_peserta"];	
	$jenis = $_GET["jenis"];
  
	$query = "SELECT
  tb_booking.IdBooking,
  tb_booking.KodeBooking,
  m_kendaraan.Jenis,
  m_wisata.Paket,
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
		WHERE tb_booking.IdBooking = '".$_GET["id"]."' ";
  
	//echo $query;		  
  
	$result = mysql_query($query);	
  	$rows = mysql_fetch_object($result);


?>


<page backtop="1mm" backbottom="1mm" backleft="1mm" backright="1mm" orientation="portrait" format="225x300" >

<table cellspacing="0" cellpadding="0" style="width:100mm;border:1px" border="0" style="width:100%">
  <tr>

    <td align="center">
    <table  cellspacing="0" cellpadding="0" style="width:100%;" >

      <tr>      
      	<td  style="width:100%;text-align:center"><strong>KWITANSI PEMBAYARAN</strong></td>
      </tr>      
    </table>
   </td>

  </tr>  
  <tr>
    <td align="center">
    <table style="width:100%;padding-left:5px;font-size:12px" cellspacing="0" cellpadding="0" align="center">
      <tr>

        <td style="width:10%;">&nbsp;</td>

        <td style="width:1%;">&nbsp;</td>

        <td style="width:35%;">&nbsp;</td>

        <td style="width:10%;">&nbsp;</td>

        <td style="width:1%;">&nbsp;</td>

        <td style="width:25%;">&nbsp;</td>

      </tr>
      <tr>

        <td>Nama</td>

        <td>:</td>

        <td><?php echo $rows->Nama; ?>&nbsp;</td>

        <td style="width:10%;">Tanggal</td>

        <td style="width:1%;">:</td>

        <td style="width:25%;"><?php echo $rows->TanggalRegistrasi; ?></td>
      </tr>
      	</table>
	</td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>      
  <tr>

    <td align="center">  
        <table style="width:100%; font-size:12px; font-style: italic;" cellspacing="0" cellpadding="0" border="1" align="center">
      <tr>
        <td style="width:100px;" align="center"><strong>NO</strong></td>
        <td style="width:200px;" align="center"><strong>Jenis Kendaraan</strong></td>
        <td style="width:200px;" align="center"><strong>Jenis Wisata</strong></td> 
        <td style="width:100px;" align="center"><strong>Jumlah</strong></td>                              
      </tr>  
      <tr style="border-bottom:none">
        <td align="center">1</td>      
        <td align="center"><strong><?php echo $rows->Jenis;?></strong></td>
        <td align="center"><strong><?php echo $rows->Paket;?></strong></td>        
        <td align="center"><strong><?php echo "Rp. ".number_format($rows->TotalHarga);?></strong></td>        
      </tr> 
      </table>
    </td>
  </tr> 

  <tr>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td>

    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:12px">

      <tr>

        <td style="width:20%;text-align:center">&nbsp;</td>

        <td style="width:40%">&nbsp;</td>

        <td style="width:35%;text-align:center">Subang,<?php echo date('d-m-Y'); ?></td>

      </tr>

      <tr>

        <td style="text-align:center">&nbsp;</td>

        <td><span style="text-align:center">Yang Menerima</span></td>

        <td style="text-align:center">Yang Menyerahkan</td>

      </tr>

      <tr>

        <td style="height:50px">&nbsp;</td>

        <td>&nbsp;</td>

        <td>&nbsp;</td>

      </tr>

      <tr>

        <td style="text-align:center">&nbsp;</td>

        <td><span style="text-align:center">(<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>)</span></td>

        <td align="center">(<u><?php if($row->NAMA ==""){
										echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
										}else{
										echo $row->NAMA_PEMERIKSA;
										}?></u>)</td>

      </tr>

      <tr>

        <td style="text-align:center">&nbsp;</td>

        <td>&nbsp;</td>

        <td align="center">&nbsp;</td>

      </tr>

    </table></td>

  </tr>

</table>

</page>   



<?php

     $content = ob_get_clean();



    // convert

    require_once(dirname(__FILE__).'../../../plugins/html2pdf/html2pdf.class.php');

    try

    {

        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('invoice rawat inap.pdf');

    }

    catch(HTML2PDF_exception $e) {

        echo $e;

        exit;

    }

?>

