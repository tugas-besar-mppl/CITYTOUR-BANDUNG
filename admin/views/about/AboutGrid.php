<?php
include_once 'includes/koneksi.php';
?>
<script type="text/javascript" src="plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="plugins/jcombo/jcombo.js"></script>
<script type="text/javascript" src="plugins/jquery-validation/dist/jquery.numeric.js"></script>
		<link rel="stylesheet" href="plugins/sceditor/minified/themes/default.min.css" type="text/css" media="all" />
		<script src="js/jquery-1.9.1.min.js"></script>
		<script src="plugins/sceditor/minified/jquery.sceditor.bbcode.min.js"></script>
<script type="application/javascript">

jQuery(document).ready(function() {
					jQuery("#about").sceditor({
						plugins: 'xhtml',
						style: ".plugins/sceditor/minified/jquery.sceditor.default.min.css"
					});
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
</script>

<?php	
	$sqlEdit = "SELECT *,DATE_FORMAT(Tanggal,'%d-%m-%Y %H:%i:%s') as Tanggal FROM tb_about ";
	//echo $sqlEdit;
	$results=mysql_query($sqlEdit);
	$rows=mysql_fetch_object($results);
?>
<form id="form_proses" name="form_proses" method="post" action="models/About/AboutData.php?olah=edit&id=<?php echo $_GET["key"]; ?>">
<table width="480" border="0" class="table">

  <tr>
    <td class="dotted_underline" style="width:30%">About Us *)</td>
    <td style="width:75%"><textarea name="about" id="about" style="width:650px; height:300px"><?php echo $rows->About; ?></textarea></td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td colspan="2" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" title='View data' id='edit-data' class='btn' value="Simpan"/></td>
  </tr>           
</table>
</form>
