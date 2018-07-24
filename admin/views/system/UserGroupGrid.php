<script type="text/javascript" language="javascript" src="plugins/datatables/media/js/StandingRedraw.js"></script>
<script type="text/javascript" language="javascript" src="plugins/datatables/media/js/TableToolsExButton.js"></script>
<script type="text/javascript" charset="utf-8">
var oTable;

jQuery(document).ready(function() {
 oTable = jQuery('#gridData').dataTable( {
  "sDom": 'T<"clear">lfrtip',
	"aoColumns": [{"bSortable": false,"sClass": "center"},{"sClass": "center"},{"sClass": "center"}, {
				   "sName": "RoleId",
					"bSearchable": false,
					"bSortable": false,
					"sClass": "center",
					"fnRender": function (oObj)                              
					{
						// oObj.aData[0] returns the RoleId
						var paremeter = "'"+ oObj.aData[3] +"','"+ oObj.aData[1] +"'";
						var strEdit = "<button title='Edit data' id='edit-data' class='btn' onclick='edit_data(" + oObj.aData[3] + ");'><span class='icon-edit'></span></button>";
						var strHapus = '<button title="Hapus data" id="hapus-data" class="btn" onclick="hapus_data(' + paremeter + ');"><span class="icon-trash"></span></button>';
						return strEdit + "&nbsp;"+strHapus;
					}
				  }],
"oTableTools": {
	  "sSwfPath": "plugins/datatables/media/swf/copy_csv_xls_pdf.swf",
	  "aButtons": [
				 {
				  'sExtends':    'text',
				  'sButtonText': 'Tambah Data',									
				  'fnClick': function ( nButton, oConfig, oFlash )
				  {				
					jQuery("#dialog-form").dialog({
						  autoOpen: false,		
						  height: 400,
						  width: 520,
						  modal: true,
						  buttons: {
							  'Simpan': function() {			
								  jQuery("#form_proses").submit();
							  },
							  'Batal' : function() {
								  jQuery(this).dialog('close');
							  }				
						  },
						  open: function(event, ui) {
							  //alert("views/administrator/user_group_form.php?olah=add");
							  jQuery.get("views/system/UserGroupForm.php?olah=add", function(data,status) {
								  if (status == "success") {	
										jQuery("div#dialog-form").html(data);	
								  }
																	  
	  
							  });
						  }
					});
					jQuery( "#dialog-form" ).dialog( "option", "title", "Tambah Data User" );
					jQuery('#dialog-form').dialog('open');        
				 }}]
},		
		"bFilter": true,
		"bSort": true,
		"bSortClasses": true,
		//"bProcessing": true,
		"bServerSide": true,				
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",					
		"sAjaxSource": "models/system/UserGroupModels.php",
	
	} );					
	
} );
function edit_data(id) {
 jQuery("#dialog-form").dialog({
	autoOpen: false,		
	height: 400,
	width: 520,
	modal: true,
	buttons: {
		'Simpan': function() {			
				  jQuery("#form_proses").submit();
				  },
		'Batal' : function() {																
				  jQuery(this).dialog('close');
				  }				
	},
	 open: function(event, ui) {
		 //alert(id);
		jQuery.get("views/system/UserGroupForm.php?olah=edit&key="+id, function(data,status) {
				  if (status == "success") {	
					  jQuery("div#dialog-form").html(data);																	
				  }																									
		}); // end get
	  } // end open
	});	// end dialog		
    jQuery( "#dialog-form" ).dialog( "option", "title", "Ubah Data User" );
	jQuery('#dialog-form').dialog('open');  								
}
function hapus_data(id,nama) {
  jQuery("#dialog-form").dialog({
	  autoOpen: false,		
	  height: 150,
	  width: 400,
	  modal: true,
	  buttons: {
		  'Hapus': function() {			
					jQuery("#form_proses").submit();
					},
		  'Batal' : function() {																
					jQuery(this).dialog('close');
					}				
	  },
		 open: function(event, ui) {
				//alert("views/administrator/user_form.php?olah=del&key=id_user_login&val="+id+"&v="+nama);			 
				jQuery.get("views/system/UserGroupForm.php?olah=del&key=id_group&val="+id+"&v="+nama, function(data,status) {
				if (status == "success") {	
				   jQuery("div#dialog-form").html(data);
				}
				}); // end get
		 }  // end open		
	}); // end dialog		
   jQuery( "#dialog-form" ).dialog( "option", "title", "Hapus Data User" );
	jQuery('#dialog-form').dialog('open'); 
}
function alert_data(info) {
jQuery("#alert1").dialog({
	autoOpen: false,		
	height: 150,
	width: 250,
	modal: true,
	buttons: {
		'Close' : function() {
			jQuery(this).dialog('close');
			window.location="./?url=user_grup&start="+jQuery("#iStart").val()+"&length="+jQuery("#iLength").val();
		}				
	}
});
jQuery('#alert1').dialog('open'); 
}
</script>    

<div id="dialog-form"></div>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="gridData">
<thead>
  <tr>
    <th width="5%">NO</th>
    <th width="15%">GROUP</th>
    <th width="60%">MENU</th>    
    <th width="10%">ACTION</th>  
  </tr>
</thead>  
<tbody>  
  <tr>
    <td colspan="8" class="dataTables_empty">Loading data from server</td>
  </tr>
</tbody>  
</table>