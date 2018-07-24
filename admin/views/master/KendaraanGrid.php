<script type="text/javascript" language="javascript" src="plugins/datatables/media/js/StandingRedraw.js"></script>
<script type="text/javascript" language="javascript" src="plugins/datatables/media/js/TableToolsExButton.js"></script>
<script type="text/javascript" charset="utf-8">
var oTable;

jQuery(document).ready(function() {
 oTable = jQuery('#gridData').dataTable( {
  "sDom": 'T<"clear">lfrtip',
	"aoColumns": [{"bSortable": false,"sClass": "center"},{}, {"sClass": "center"},{"sClass": "center"},{"sClass": "center"}, {"sClass": "center"}, {
				   "sName": "RoleId",
					"bSearchable": false,
					"bSortable": false,
					"sClass": "center",
					"fnRender": function (oObj)                              
					{
						// oObj.aData[0] returns the RoleId
						var paremeter = "'"+ oObj.aData[6] +"','"+ oObj.aData[1] +"'";
						var strEdit = "<button title='Edit data' id='edit-data' class='btn' onclick='edit_data(" + oObj.aData[6] + ");'><span class='icon-edit'></span></button>";
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
							  jQuery.get("views/master/KendaraanForm.php?olah=add", function(data,status) {
								  if (status == "success") {	
										jQuery("div#dialog-form").html(data);	
								  }
																	  
	  
							  });
						  }
					});
					jQuery( "#dialog-form" ).dialog( "option", "title", "Tambah Data Kendaraan" );
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
		"sAjaxSource": "models/master/KendaraanModels.php",
	
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
		jQuery.get("views/master/KendaraanForm.php?olah=edit&key="+id, function(data,status) {
				  if (status == "success") {	
					  jQuery("div#dialog-form").html(data);																	
				  }																									
		}); // end get
	  } // end open
	});	// end dialog		
    jQuery( "#dialog-form" ).dialog( "option", "title", "Ubah Data Kendaraan" );
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
				jQuery.get("views/master/KendaraanForm.php?olah=del&key=id_kendaraan&val="+id+"&v="+nama, function(data,status) {
				if (status == "success") {	
				   jQuery("div#dialog-form").html(data);
				}
				}); // end get
		 }  // end open		
	}); // end dialog		
   jQuery( "#dialog-form" ).dialog( "option", "title", "Hapus Data Kendaraan" );
	jQuery('#dialog-form').dialog('open'); 
}

</script>    

<div id="dialog-form"></div>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="gridData">
<thead>
  <tr>
    <th width="32">NO.</th>
    <th width="89" class="ui-state-default centeralign">JENIS</th>
    <th width="65" class="ui-state-default centeralign">KAPASITAS</th>
    <th width="65" class="ui-state-default centeralign">JUMLAH</th>
    <th width="32"class="ui-state-default centeralign">HARGA</th>
    <th width="32"class="ui-state-default centeralign">STATUS AKTIF</th>    
    <th width="62">ACTION</th>
  </tr>
</thead>  
<tbody>  
  <tr>
    <td colspan="7" class="dataTables_empty">Loading data from server</td>
  </tr>
</tbody>  
</table>