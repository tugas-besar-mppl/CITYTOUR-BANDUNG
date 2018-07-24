<?php
include_once '../../includes/koneksi.php';
?>
<script type="text/javascript" src="plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="plugins/jcombo/jcombo.js"></script>
<script type="text/javascript" src="plugins/jquery-validation/dist/jquery.numeric.js"></script>
<script type="application/javascript">

jQuery(document).ready(function() {
	
     jQuery("#no_telp").numeric();     	  
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
		satuan : "required"
	},
	messages: {
		satuan : "Harus diisi"
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
if ($_GET["olah"]=="edit") {
	
	$sqlEdit = "SELECT *,DATE_FORMAT(Tanggal,'%d-%m-%Y %H:%i:%s') as Tanggal FROM tb_kontak WHERE IdKontak = '".$_GET["key"]."'";
	//echo $sqlEdit;
	$results=mysql_query($sqlEdit);
	$rows=mysql_fetch_object($results);
?>
<form id="form_proses" name="form_proses" method="post" action="models/kontak/KontakData.php?olah=edit&id=<?php echo $_GET["key"]; ?>">
<table width="480" border="0" class="table">
  <tr>
    <td class="dotted_underline" style="width:30%">Nama *)</td>
    <td style="width:75%"><input name="satuan" type="text" id="satuan" value="<?php echo $rows->Nama; ?>" /></td>
  </tr>
  <tr>
    <td class="dotted_underline" style="width:30%">Email *)</td>
    <td style="width:75%"><input name="satuan" type="text" id="satuan" value="<?php echo $rows->Email; ?>" /></td>
  </tr>
  <tr>
    <td class="dotted_underline" style="width:30%">Subjek *)</td>
    <td style="width:75%"><input name="satuan" type="text" id="satuan" value="<?php echo $rows->Subjek; ?>" /></td>
  </tr>
  <tr>
    <td class="dotted_underline" style="width:30%">Pesan *)</td>
    <td style="width:75%"><textarea><?php echo $rows->Pesan; ?></textarea></td>
  </tr>
  <tr>
    <td class="dotted_underline" style="width:30%">Tanggal *)</td>
    <td style="width:75%"><input name="satuan" type="text" id="satuan" value="<?php echo $rows->Tanggal; ?>" /></td>
  </tr>          
</table>
</form>
<?php            
  } 
?>

