<?php
include_once '../../includes/koneksi.php';
?>
<!--<script type="text/javascript" src="plugins/jquery-validation/dist/jquery.numeric.js"></script>
<script type="text/javascript" src="plugins/jquery-validation/dist/jquery.number.min.js"></script>-->
<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css" />
<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
<script type="text/javascript" src="plugins/jcombo/jcombo.js"></script>
<script type="text/javascript" src="plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="plugins/jquery-validation/dist/jquery.numeric.js"></script>

<script type="text/javascript">
var n = 0; 

jQuery(document).ready(function(){
}); 	
jQuery.validator.setDefaults({
	submitHandler: function() {  
	  jQuery.post(jQuery("#form_master").attr("action"),jQuery("#form_master").serialize(), function(info) {
		  jQuery("#dialog-form").dialog('close');			  
		  jQuery.showMessageBox({
				title: 'Informasi',				
				content:info,
				CloseButtonDoneFunction : function() { 
				oTable.fnStandingRedraw();
				}
			});
	  }); 
	},
	showErrors: function(map, list) {
		// there's probably a way to simplify this
		var focussed = document.activeElement;
		if (focussed && jQuery(focussed).is("input, textarea")) {
			jQuery(this.currentForm).tooltip("close", { currentTarget: focussed }, true)
		}
		this.currentElements.removeAttr("title").removeClass("ui-state-highlight");
		jQuery.each(list, function(index, error) {
			jQuery(error.element).attr("title", error.message).addClass("ui-state-highlight");
		});
		if (focussed && jQuery(focussed).is("input, textarea")) {
			jQuery(this.currentForm).tooltip("open", { target: focussed });
		}
	}
});	

jQuery( "#form_master" ).validate({
	rules: {
		nama_pemasok: "required",
		inputBuku : "required"
	},
	messages: {
		nama_pemasok: "Harus diisi",
		inputBuku : "Harus diisi"
	  }
  });	
</script>			  
<?php
if ($_GET["olah"]=="edit") {
	
	$sqlEdit = "SELECT
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
					WHERE tb_booking.IdBooking = '".$_GET["key"]."'";
	$results=mysql_query($sqlEdit);
	$rows=mysql_fetch_object($results);
?>
<h4 class="widgettitle nomargin shadowed">Edit Data Pemesanan</h4>
<div class="widgetcontent bordered shadowed nopadding">
<form id="form_master" name="form_master" method="post"  action="models/pemesanan/PemesananData.php?olah=edit&id=<?php echo $_GET["key"]; ?>">
<table style="width:100%" class="table" align="center" cellpadding="0" cellspacing="0" >
<tr>
    <td style="width:15%">No. Booking</td>
    <td colspan="2" style="width:65%">
    <input type="text" name="KodeBooking" id="KodeBooking" class="input-medium" value="<?php echo $rows->KodeBooking; ?>" readonly="readonly"/>
    </td>
</tr>
<tr>
    <td>Jenis Kendaraan</td>
    <td colspan="2">
    <input type="text" name="Jenis" id="Jenis" class="input-medium" value="<?php echo $rows->Jenis; ?>" readonly="readonly"/></td>
</tr> 
<tr>
    <td>Paket Wisata</td>
    <td colspan="2">
    <input type="text" name="Paket" id="Paket" class="input-medium" value="<?php echo $rows->Paket; ?>" readonly="readonly"/></td>
</tr> 
<tr>
    <td>Nama Pelanggan</td>
    <td colspan="2">
    <input type="text" name="Nama" id="Nama" style="width:250px" value="<?php echo $rows->Nama; ?>" readonly="readonly"/>   
    </td>
</tr>
<tr>
    <td>Tanggal Registrasi</td>
    <td colspan="2">
    <input type="text" name="nama_anggota" id="nama_anggota" style="width:250px" value="<?php echo $rows->Nama; ?>" readonly="readonly"/> 
    </td>
</tr>
<tr>
    <td>Status bayar</td>
    <td colspan="2">
<select id="StatusBayar" name="StatusBayar">
<option value="Y" <?php if($rows->StatusBayar == 'Y'){ echo "selected='selected'";}?> selected="selected">Sudah Bayar</option>
<option value="T" <?php if($rows->StatusBayar == 'T'){ echo "selected='selected'";}?>>Belum Bayar</option>
</select>    
    </td>
</tr>

</table>
</form>
<?php            
  } else if ($_GET[olah]=="del") {	 
?>
          	<form name="form_master" id="form_master" action="models/pemesanan/PemesananData.php?olah=del" method="post" enctype="multipart/form-data">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" align="center">   
            <tr>
              <td align="center"><strong>Anda akan menghapus data pemesanan: <?php echo $_GET['v']?> ?</strong>
              <input type="hidden" name="<?php echo $_GET['key']?>" id="<?php echo $_GET['key']?>"  value="<?php echo $_GET['val']?>" /></td>
            </tr>            
            </table>                      
            </form>             
<?php
 }
?>

