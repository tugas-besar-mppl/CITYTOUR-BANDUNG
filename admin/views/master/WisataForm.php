<?php
include_once '../../includes/koneksi.php';
?>
<script type="text/javascript" src="plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="plugins/jcombo/jcombo.js"></script>
<script type="text/javascript" src="plugins/jquery-validation/dist/jquery.number.min.js"></script>
<script type="application/javascript">

jQuery(document).ready(function() {
     jQuery("#harga").number( true, 0 );       
	// validate the comment form when it is submitted
});
jQuery.validator.setDefaults({
	submitHandler: function() {  
	  jQuery.post(jQuery("#form_proses").attr("action"),jQuery("#form_proses").serialize(), function(info) {
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

jQuery( "#form_proses" ).validate({
	rules: {
		paket: "required",
		keterangan : "required",		
		harga : "required"
	},
	messages: {
		paket: "Harus diisi",
		keterangan : "Harus diisi",		
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
<form id="form_proses" name="form_proses" method="post" action="models/master/WisataData.php?olah=add">
<table width="480" border="0" class="table">
  <tr>
    <td class="dotted_underline" style="width:25%">Paket *)</td>
    <td style="width:75%"><input name="paket" type="text" id="paket"/></td>
  </tr>
  <tr>
    <td class="dotted_underline" style="width:25%">Keterangan *)</td>
    <td style="width:75%"><textarea id="keterangan" name="keterangan"></textarea></td>
  </tr>
  <tr>
    <td class="dotted_underline">Harga*)</td>
    <td><input name="harga" type="text" id="harga" style="width:100px" /></td>
  </tr>
  <tr>
    <td class="dotted_underline">Status Aktif *)</td>
    <td><input name="status" type="checkbox" id="status" value="Y" checked="checked" /></td>
  </tr>   
</table>
</form>
<?php
} else if ($_GET["olah"]=="edit") {
	
	$sqlEdit = "SELECT * FROM m_wisata WHERE IdWisata = '".$_GET["key"]."'";
	//echo $sqlEdit;
	$results=mysql_query($sqlEdit);
	$rows=mysql_fetch_object($results);
?>
<form id="form_proses" name="form_proses" method="post" action="models/master/WisataData.php?olah=edit&id=<?php echo $_GET["key"]; ?>">
<table width="480" border="0" class="table">
  <tr>
    <td class="dotted_underline" style="width:25%">Paket *)</td>
    <td style="width:75%"><input name="paket" type="text" id="paket" value="<?php echo $rows->Paket; ?>" /></td>
  </tr>
  <tr>
    <td class="dotted_underline" style="width:25%">Keterangan *)</td>
    <td style="width:75%"><textarea id="keterangan" name="keterangan"><?php echo $rows->Keterangan; ?></textarea></td>
  </tr>
  <tr>
    <td class="dotted_underline">Harga *)</td>
    <td><input name="harga" type="text" id="harga" style="width:40%" value="<?php echo $rows->Harga; ?>" /></td>
  </tr>
  <tr>
    <td class="dotted_underline">Status Aktif *)</td>
    <td><input name="status" type="checkbox" id="status" value="Y" <?php if($rows->StatusAktif == 'Y') echo 'checked="checked"'; ?> /></td>
  </tr>     
</table>
</form>
<?php            
  } else if ($_GET["olah"]=="del") {	 
?>
          	<form width="350" height="100" name="form_proses" id="form_proses" action="models/master/WisataData.php?olah=del" method="post" enctype="multipart/form-data">
            <table border="0" cellpadding="0" cellspacing="0" width="350">   
            <tr>
              <td>Anda akan menghapus data wisata : <?php echo $_GET['v']?> ?
                <input type="hidden" name="<?php echo $_GET['key']?>" id="<?php echo $_GET['key']?>"  value="<?php echo $_GET['val'] ;?>" /></td>
		   </tr>   
		   <tr><td><br /></td></tr>
            </table>                      
            </form>             
<?php
 }
?>

