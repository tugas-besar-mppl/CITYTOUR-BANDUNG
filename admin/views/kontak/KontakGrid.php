<script type="text/javascript" language="javascript" src="plugins/datatables/media/js/StandingRedraw.js"></script>
<script type="text/javascript" language="javascript" src="plugins/datatables/media/js/TableToolsExButton.js"></script>
<script type="text/javascript" charset="utf-8">
var oTable;

jQuery(document).ready(function() {
 oTable = jQuery('#gridData').dataTable( {
  "sDom": 'T<"clear">lfrtip',
	"aoColumns": [{"bSortable": false,"sClass": "center"},{"sClass": "center"},{"sClass": "center"},{"sClass": "center"},{"sClass": "center"},{"sClass": "center"}, {
				   "sName": "RoleId",
					"bSearchable": false,
					"bSortable": false,
					"sClass": "center",
					"fnRender": function (oObj)                              
					{
						// oObj.aData[0] returns the RoleId
						var strEdit = "<button title='View data' id='edit-data' class='btn' onclick='edit_data(" + oObj.aData[6] + ");'><span class='icon-edit'></span></button>";
						return strEdit;
					}
				  }],
"oTableTools": {
	  "sSwfPath": "plugins/datatables/media/swf/copy_csv_xls_pdf.swf",
	  "aButtons": []
},		
		"bFilter": true,
		"bSort": true,
		"bSortClasses": true,
		//"bProcessing": true,
		"bServerSide": true,				
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",					
		"sAjaxSource": "models/kontak/KontakModels.php",
	
	} );					
	
} );
function edit_data(id) {
 jQuery("#dialog-form").dialog({
	autoOpen: false,		
	height: 400,
	width: 400,
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
		jQuery.get("views/kontak/KontakForm.php?olah=edit&key="+id, function(data,status) {
				  if (status == "success") {	
					  jQuery("div#dialog-form").html(data);																	
				  }																									
		}); // end get
	  } // end open
	});	// end dialog		
    jQuery( "#dialog-form" ).dialog( "option", "title", "Detail Kontak" );
	jQuery('#dialog-form').dialog('open');  								
}

</script>    

<div id="dialog-form"></div>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="gridData">
<thead>
  <tr>
    <th width="63">NO.</th>
    <th width="100">Nama</th>
    <th width="100">Email</th>
    <th width="100">Subjek</th>
    <th width="250">Pesan</th>
    <th width="100">Tanggal</th>                
    <th width="100">ACTION</th>
  </tr>
</thead>  
<tbody>  
  <tr>
    <td colspan="8" class="dataTables_empty">Loading data from server</td>
  </tr>
</tbody>  
</table>