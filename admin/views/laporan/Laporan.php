<?php
session_start();
?>
<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css" />
<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.tablescroll.css"/>
<script type="text/javascript" src="plugins/jquery-validation/dist/jquery.numeric.js"></script>
<script type="application/javascript">
jQuery(document).ready(function() {
		jQuery("#dari_tanggal").datepicker({ 
			dateFormat: 'dd-mm-yy',  
			changeMonth: true,
			changeYear: true 
		});	
		jQuery("#sampai_tanggal").datepicker({ 
			dateFormat: 'dd-mm-yy',  
			changeMonth: true,
			changeYear: true 
		});
		jQuery("#tampilkan").click(function(){
			if (jQuery("#dari_tanggal").val() != "" && jQuery("#sampai_tanggal").val() != "" && jQuery("#jns_lap").val() != "") {
				jQuery("#loading").fadeIn();
				if(jQuery("#jns_lap").val() ==1 && jQuery("#jns_lap").val() !=0){	
					jQuery.get('views/laporan/Pembayaran.php?tgl='+jQuery("#dari_tanggal").val()+'&tgl1='+jQuery("#sampai_tanggal").val(),
					function(data) {	
						jQuery('#griddef').html(data); 
						jQuery("#loading").fadeOut();																																																										
					});
				} else if(jQuery("#jns_lap").val() ==2 && jQuery("#jns_lap").val() !=0){
					jQuery.get('views/laporan/PembayaranKendaraan.php?tgl='+jQuery("#dari_tanggal").val()+'&tgl1='+jQuery("#sampai_tanggal").val(), 								 					function(data) {	
						jQuery('#griddef').html(data); 
						jQuery("#loading").fadeOut();																																																										
				});
				} else if(jQuery("#jns_lap").val() ==3 && jQuery("#jns_lap").val() !=0){
					jQuery.get('views/laporan/PembayaranWisata.php?tgl='+jQuery("#dari_tanggal").val()+'&tgl1='+jQuery("#sampai_tanggal").val(), 								 					function(data) {	
						jQuery('#griddef').html(data); 
						jQuery("#loading").fadeOut();																																																										
				});
				}			
			
			
			}else{
			alert_msgbox("Tanggal Dan Jenis Laporan Tidak Boleh Kosong!!");
			}
		});
	});
	function callback_parameter() {
		jQuery("#loading").fadeOut();
		jQuery("#Laporan").fadeIn();
	}
</script>
<body>
<br />
<box>
<div align="center">
<form id="stok_barang">
  <table width="800" border="0" class="calibri">
    <tr>
      <td class="dotted_underline">Tanggal</td>
      <td><input name="dari_tanggal" type="text" id="dari_tanggal" style="width:100px"/>&nbsp;&nbsp;&nbsp;s/d&nbsp;&nbsp;&nbsp;<input name="sampai_tanggal" type="text" id="sampai_tanggal" style="width:100px"/>
      <div class="keterangan">Contoh format pengisian tanggal : <b>dd-mm-yyyy</b>.</div>
      </td>
    </tr>
    <tr>
      <td class="dotted_underline">JENIS LAPORAN</td>
      <td><select name="jns_lap" id="jns_lap" style="width:150px">
        <option value="">Pilih Jenis Laporan</option>
<!--        <option value="0">ALL</option>-->
        <option value="1">Pembayaran</option>
        <option value="2">Jenis Kendaraan</option>
        <option value="3">Jenis Wisata</option>        
      </select></td>
    </tr>
    <tr>
      <td class="dotted_underline">&nbsp;</td>
      <td><input type="button" class="btn" name="tampilkan" id="tampilkan" value="Tampilkan"/></td>
    </tr>
  </table>
</form>
</div>
</box>
<br>
<box>
<center><div id="loading" style="display:none"><img src="img/loaders/loader15.gif"  id="loadingGif" /> Harap tunggu beberapa saat...</div></center>
<center><div id="griddef"></div></center>
<br>
</box>