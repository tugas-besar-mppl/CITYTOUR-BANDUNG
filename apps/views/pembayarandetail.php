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
	include_once 'config/koneksi.php';
?>
<section id="aboutus" class="sections lightbg">
    <div class="container text-center">
        <div class="heading-content">
            <h3>DETAIL PEMBAYARAN</h3>
        </div>
        <p>
<?php
	$data= $_GET['data'];
	$sql="SELECT
			*,
			DATE_FORMAT(DATE_ADD(tb_booking.TanggalRegistrasi, INTERVAL 1 DAY),'%d-%m-%Y') AS tgltenggang,
			DATE_FORMAT(DATE_ADD(tb_booking.TanggalRegistrasi, INTERVAL 1 DAY),'%H:%i') AS tglhari
		  FROM tb_booking
			INNER JOIN m_pelanggan
			  ON tb_booking.IdPelanggan = m_pelanggan.IdPelanggan
			INNER JOIN m_kendaraan
			  ON tb_booking.IdKendaraan = m_kendaraan.IdKendaraan
			INNER JOIN m_wisata
			  ON tb_booking.IdWisata = m_wisata.IdWisata
		  WHERE tb_booking.KodeBooking = '".$data."'";
		  //echo $sql;
		$result=mysql_query($sql);
		$rows=mysql_fetch_object($result);
?>    
<strong>
<table border="0" align="center">
    <tr>
        <td colspan="3" style="width:600px;" align="left">
            Hai <?php echo $_SESSION["nama"];?>,
        </td>
    </tr>
    <tr>
        <td colspan="3" style="width:600px;" align="left">
            Terima kasih atas kepercayaan anda telah menggunakan jasa booking online di citytourbdg, Mohon segera lakukan pembayaran sebelum :
        </td>
    </tr>
    <tr>
        <td colspan="3" style="width:600px;" align="left">
        <button type="submit" disabled="disabled" style="background-color:#9FC; color:#000">
            <strong>
                Tanggal <?php echo $rows->tgltenggang;?>
                Pukul <?php echo $rows->tglhari;?> (1x24 jam)
            </strong>
        </button>
        </td>
    </tr>
    <tr>
        <td colspan="3" style="width:600px;" align="center">
            Lakukan Pembayaran Sebesar :<br />
                <font size="+5">
                    Rp. <?php echo number_format($rows->TotalHarga);?>
                </font>
                <br />
                    <strong>TEPAT</strong> hingga <strong>3 digit terakhir</strong>
                <br />
            <i>Perbedaan nilai transfer akan menghambat proses verifikasi</i>
        </td>
    </tr>
    <tr>
        <td colspan="3" style="width:600px;" align="center">
            Pembayaran dapat dilakukan ke salah satu nomor rekening <strong>a/n PT DSC Citytourbdg</strong>;
        </td>
    </tr>
    <tr style="border-top:solid;"">
        <td colspan="3" style="width:600px;" align="center">
        	<img src="assets/images/BNI.png" class="image" alt="BNI" style="width:250px; height:100px;">
        </td>
    </tr>
    <tr style="border-bottom:solid;">
        <td colspan="3" style="width:600px;" align="center">
        <strong>Bank BNI, Bandung<br />
        022 656 3442</strong>
        </td>
    </tr>
    <tr>
        <td colspan="3" style="width:600px;" align="left">
            <br />
            Berikut Adalah penjelasan tagihan pembayaran:
        </td>
    </tr>
    <tr>
        <td colspan="3" style="width:600px;" align="left">
            <button type="submit" disabled="disabled" style="background-color:#CF3430;">
                <strong>
                    Tagihan #<?php echo $rows->KodeBooking;?>
                </strong>
            </button>
        </td>
    </tr>
    <tr style="border-bottom:solid;">
        <td colspan="3" style="width:600px;" align="left">
        <table>
            <tr>
                <td><br />		Tanggal Booking</td>
                <td><br />:</td>
                <td><br />&nbsp;&nbsp;<?php echo $rows->tgltenggang.' '.$rows->tglhari;?></td>
            </tr>
            <tr>
                <td><br />Nama Pelanggan</td>
                <td><br />:</td>
                <td><br />&nbsp;&nbsp;<?php echo $rows->Nama;?></td>
            </tr>
            <tr>
                <td><br />Jenis Kendaraan</td>
                <td><br />:</td>
                <td><br />&nbsp;&nbsp;<?php echo $rows->Jenis;?></td>
            </tr>
            <tr>
                <td><br />Paket Wisata</td>
                <td><br />:</td>
                <td><br />&nbsp;&nbsp;<?php echo $rows->Paket;?></td>
            </tr>            
        </table>
        <br />
        </td>
    </tr>
</table>  
</strong>      
</p>
</div> <!-- /container -->
</section>
