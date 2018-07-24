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
include_once 'config/koneksi.php';
	$sqldetail = "SELECT * FROM m_kendaraan WHERE StatusAktif='Y'";
	//echo $sqlEdit;
	$resultd=mysql_query($sqldetail);
	while($rowd=mysql_fetch_object($resultd)){
		$no=1;
?>
<div id="<?=$rowd->Jenis;?>" class="modal" style="overflow: hidden;">
  <form class="modal-content animate" method="post" action="../citytourbdg/?pages=pembayaran">
    <div class="imgcontainer">
	<h3>Detail Booking</h3>
    </div>
    <div class="containerx" align="center">
    <button type="button" class="close-button" title="Close" onClick="document.getElementById('<?=$rowd->Jenis;?>').style.display='none'">X</button>
	<script type="text/javascript">
/*
* @author		: develop team kelompok 1 mppl citytourbdg 
* @version		: v.1.0
* @param		: dari_tanggal diambil dari id input
* @param		: sampai_tanggal diambil dari id input
* @return		: menampilkan fungsi dari library datepicker
* @throws		: -
* @see			: -
* @since		: 1.0
* @deprecated	: Datepicker | jQuery UI
*/    
    jQuery(document).ready(function() {
            jQuery("#dari_tanggal<?=$rowd->Jenis;?>").datepicker({ 
                dateFormat: 'dd-mm-yy',  
                changeMonth: true,
                changeYear: true 
            });	
            jQuery("#sampai_tanggal<?=$rowd->Jenis;?>").datepicker({ 
                dateFormat: 'dd-mm-yy',  
                changeMonth: true,
                changeYear: true 
            });
        });
    </script> 
    <h5>Pilih Tanggal</h5>
    <label>Mulai</label>
    <input name="dari_tanggal<?=$rowd->Jenis;?>" type="text" id="dari_tanggal<?=$rowd->Jenis;?>" style="width:150px"/>
    <label>Sampai</label>
    <input type="text" name="sampai_tanggal<?=$rowd->Jenis;?>" id="sampai_tanggal<?=$rowd->Jenis;?>" style="width:150px">
<br/>
<br/>
<!--Tujuan wisata-->
<h5>Tujuan Wisata</h5>
        <div style="display:inline-block; text-align:left;">
          <input type="hidden" id="jenis" name="jenis" value="<?=$rowd->Jenis;?>"/>
          <input type="hidden" id="kendaraan" name="kendaraan" value="<?=$rowd->IdKendaraan;?>"/>
              <select name="wisata<?=$rowd->Jenis;?>" id="wisata<?=$rowd->Jenis;?>">
 <?php
	$Qrt = "SELECT CONCAT(Paket,'- Rp.',Harga) AS WISATA, IdWisata, Harga, Photo FROM m_wisata ORDER BY Paket";
	//echo $sqlEdit;
	$gets=mysql_query($Qrt);
	while($push=mysql_fetch_object($gets)){
	
	echo "<option value='".$push->IdWisata."'>".$push->WISATA."</option>";
	}
 
 ?>
              </select>            
              
                <div class="containerx">
                  <input type="submit" class="btn btn-login btn-lg" value="BOOKING NOW"> 
                  <button type="button" onClick="document.getElementById('<?=$rowd->Jenis;?>').style.display='none'" class="cancelbtn">Cancel</button>
                </div>
             </div>   
    </div>
  </form>
</div>
<div class='preloader'>
<div class='loaded'>&nbsp;</div>
</div>
<?php
	}
?> 