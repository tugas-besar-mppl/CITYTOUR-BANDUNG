<?php
include_once '../../includes/koneksi.php';
?>
<script type="text/javascript" src="../../citytourbdg/admin/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="../../citytourbdg/admin/plugins/jcombo/jcombo.js"></script>
<script type="text/javascript" src="../../citytourbdg/admin/plugins/jquery-validation/dist/jquery.number.min.js"></script>
<script type="application/javascript">

jQuery(document).ready(function() {
     jQuery("#kapasitas").numeric(); 	
     jQuery("#jumlah").numeric();  	
    // jQuery("#harga").number( true, 0 );       
	// validate the comment form when it is submitted
});

jQuery.validator.setDefaults({
	 debug: true,
	submitHandler: function() {  
	var formData = new FormData(jQuery('form')[0]);
	jQuery.ajax({
        url: jQuery("#form_proses").attr("action"),  //server script to process data
        type: 'POST',
        //Ajax events
        //beforeSend: false,
        success: function(data) { 
		  jQuery("#dialog-form").dialog('close');			  
		  jQuery.showMessageBox({
				title: 'Informasi',				
				content:data,
				CloseButtonDoneFunction : function() { 
				oTable.fnStandingRedraw();
				}
			});
		},
        // Form data
        data: formData,
        //Options to tell JQuery not to process data or worry about content-type
        cache: false,
        contentType: false,
        processData: false
    });		},
	showErrors: function(map, list) {
		// there's probably a way to simplify this
		var focussed = document.activeElement;
		if (focussed && jQuery(focussed).is("input, textarea, file")) {
			jQuery(this.currentForm).tooltip("close", { currentTarget: focussed }, true)
		}
		this.currentElements.removeAttr("title").removeClass("ui-state-highlight");
		jQuery.each(list, function(index, error) {
			jQuery(error.element).attr("title", error.message).addClass("ui-state-highlight");
		});
		if (focussed && jQuery(focussed).is("input, textarea, file")) {
			jQuery(this.currentForm).tooltip("open", { target: focussed });
		}
	}
});

jQuery( "#form_proses" ).validate({
	rules: {
		jenis: "required",
		kapasitas : "required",	
		jumlah : "required",			
		harga : "required"
	},
	messages: {
		jenis: "Harus diisi",
		kapasitas : "Harus diisi",	
		jumlah : "Harus diisi",	
		harga : "Harus diisi"
	  }  
});	

(function() {
	// use custom tooltip; disable animations for now to work around lack of refresh method on tooltip
	jQuery("#form_proses").tooltip({
		show: false,
		hide: false
	});
})();
</script>

<?php
if ($_GET["olah"]=="add") {
?>
<form id="form_proses" name="form_proses" method="post" action="models/master/KendaraanData.php?olah=add" enctype="multipart/form-data">
<table width="480" border="0" class="table">
  <tr>
    <td class="dotted_underline" style="width:25%">Jenis *)</td>
    <td style="width:75%"><input name="jenis" type="text" id="jenis" size="35" class="required" /></td>
  </tr>
  <tr>
    <td class="dotted_underline">Kapasitas *)</td>
    <td><input name="kapasitas" type="text" id="kapasitas" size="10" /></td>
  </tr>
  <tr>
    <td class="dotted_underline">Jumlah *)</td>
    <td><input name="jumlah" type="text" id="jumlah" size="10" /></td>
  </tr>
  <tr>
    <td class="dotted_underline">Harga*)</td>
    <td><input name="harga" type="text" id="harga" style="width:100px" /></td>
  </tr>
  <tr>
    <td class="dotted_underline">Status Aktif *)</td>
    <td><input name="status" type="checkbox" id="status" value="Y" checked="checked" /></td>
  </tr>
  <tr>
    <td class="dotted_underline">Photo</td>
    <td>
    <input type="file" name="photo" id="photo" />
    </td>
  </tr>      
</table>
</form>
<?php
} else if ($_GET["olah"]=="edit") {
	
	$sqlEdit = "SELECT * FROM m_kendaraan WHERE IdKendaraan = '".$_GET["key"]."'";
	//echo $sqlEdit;
	$results=mysql_query($sqlEdit);
	$rows=mysql_fetch_object($results);
?>
<form id="form_proses" name="form_proses" method="post" action="models/master/KendaraanData.php?olah=edit&id=<?php echo $_GET["key"]; ?>">
<table width="480" border="0" class="table">
  <tr>
    <td class="dotted_underline" style="width:25%">Jenis *)</td>
    <td style="width:75%"><input name="jenis" type="text" id="jenis" value="<?php echo $rows->Jenis; ?>" /></td>
  </tr>
   <tr>
    <td class="dotted_underline" style="width:25%">Kapasitas *)</td>
    <td style="width:75%"><input name="kapasitas" type="text" id="kapasitas" value="<?php echo $rows->Kapasitas; ?>" /></td>
  </tr>
  <tr>
    <td class="dotted_underline" style="width:25%">Jumlah *)</td>
    <td style="width:75%"><input name="jumlah" type="text" id="jumlah" value="<?php echo $rows->Jumlah; ?>" /></td>
  </tr>
   <tr>
    <td class="dotted_underline">Harga *)</td>
    <td><input name="harga" type="text" id="harga" style="width:100px" value="<?php echo $rows->Harga; ?>" /></td>
  </tr>
  <tr>
    <td class="dotted_underline">Status Aktif *)</td>
    <td><input name="status" type="checkbox" id="status" value="Y" <?php if($rows->StatusAktif == 'Y') echo 'checked="checked"'; ?> /></td>
  </tr>
  <tr>
    <td class="dotted_underline">Photo</td>
    <td>
    <input type="file" name="photo" id="photo" />
    <?php 
		$file = "../assets/images/mobil/".$rows->Photo;
		//echo $file;
		if (file_exists($file) && $rows->PHOTO=="")
			$photo = "../assets/images/mobil/no_photo.jpg";
		else
			$photo = "../assets/images/mobil/".$rows->Photo;
	?>
    
    <img src="<?php echo $photo;?>" width="113" height="151" /><br />
    <input type="text" name="photo_text" id="photo_text" value="<?php echo $rows->Photo;?>" readonly="readonly" style="width:100px"/>
    </td>
  </tr>        
</table>
</form>
<?php            
  } else if ($_GET["olah"]=="del") {	 
?>
          	<form width="350" height="100" name="form_proses" id="form_proses" action="models/master/KendaraanData.php?olah=del" method="post" enctype="multipart/form-data">
            <table border="0" cellpadding="0" cellspacing="0" width="350">   
            <tr>
              <td>Anda akan menghapus data kendaraan : <?php echo $_GET['v']?> ?
                <input type="hidden" name="<?php echo $_GET['key']?>" id="<?php echo $_GET['key']?>"  value="<?php echo $_GET['val'] ;?>" /></td>
		   </tr>   
		   <tr><td><br /></td></tr>
            </table>                      
            </form>             
<?php
 }
?>

