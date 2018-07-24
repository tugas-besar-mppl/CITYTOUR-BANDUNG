<script type="text/javascript" language="javascript" src="plugins/datatables/media/js/StandingRedraw.js"></script>
<script type="text/javascript" language="javascript" src="plugins/datatables/media/js/TableToolsExButton.js"></script>
<script type="text/javascript" charset="utf-8">
var oTable;

jQuery(document).ready(function() {

oTable = jQuery('#gridData').dataTable( {
  "sDom": 'T<"clear">lfrtip',
  "aoColumns": [{"sClass": "center"},{"sClass": "center"}, {"sClass": "center"},{"sClass": "center"},{"sClass": "center"},{"sClass": "center"},{"sClass": "center"},{"sClass": "center"},{"sClass": "center"},{"sClass": "center"},  {
				 "sName": "RoleId",
				  "bSearchable": false,
				  "bSortable": false,
				  "sClass": "center",
				  "fnRender": function (oObj)                              
				  {
					  // oObj.aData[0] returns the RoleId <a href="" class="btn"><span class="icon-edit"></span> Edit</a>
					  var paramHapus = '"'+oObj.aData[10]+'","'+escape(oObj.aData[3])+'"';
					  //var strEdit = "<button title='Edit data' class='icon-edit' onclick='edit_data(" + oObj.aData[4] + ");'>Edit</button>";
					  var strEdit = "<button title='Edit Data' class='btn' onclick='edit_data(" + oObj.aData[10] + ");'><span class='icon-edit'></span></button>";
					  var strHapus = "<button title='Hapus Data' class='btn' onclick='hapus_data(" + paramHapus + " );'><span class='icon-trash'></span></button>";
					  var strPrint = "<button title='Print Data' class='btn' onclick='print_data(" + oObj.aData[10] + " );'><span class='icon-print'></span></button>";					  
					  return strEdit + "&nbsp;"+strHapus+ "&nbsp;"+strPrint;
				  }
				}], 
  "oTableTools": {
	  "sSwfPath": "plugins/datatables/media/swf/copy_csv_xls_pdf.swf",
	  "aButtons": []
  },
  "bFilter": true,
  "bSort": true,
  "bSortClasses": true,
  "bServerSide": true,				
  "sPaginationType": "full_numbers",
  "bJQueryUI": true,					
  "sAjaxSource": "models/pemesanan/PemesananModels.php"

});
});
		
function edit_data(id) {
 jQuery("#dialog-form").dialog({
	autoOpen: false,		
	height: 500,
	width: 800,
	modal: true,
	buttons: {
		'Simpan': function() {			
				  jQuery('#form_master').submit(function() {								
					return false;
				  });			
				  jQuery.ajax({
						type: 'POST',
						url: jQuery('#form_master').attr('action'),
						data: jQuery('#form_master').serialize(),
						success: function(data) {
							//alert(data);
							jQuery("#dialog-form").dialog('close');			  
							  jQuery.showMessageBox({
									title: 'Informasi',				
									content:data,
									CloseButtonDoneFunction : function() { 
									oTable.fnStandingRedraw();
									}
								});
						}
					});					  				  
				  },
		'Batal' : function() {																
				  jQuery(this).dialog('close');
				  }				
	},
	 open: function(event, ui) {
		jQuery.get("views/pemesanan/PemesananForm.php?olah=edit&key="+id, function(data,status) {
				  if (status == "success") {	
					  jQuery("div#dialog-form").html(data);																	
				  }																									
		}); // end get
	  }, // end open
	  close:function(event, ui) {  jQuery("div#dialog-form").html(""); }
	});	// end dialog													
	jQuery('#dialog-form').dialog('open');  								
}
function hapus_data(id, nama) {
	jQuery("#dialog-form").dialog({
	utoOpen: false,		
	height: 150,
	width: 400,
		modal: true,
		buttons: {
			'Hapus': function() {			
					  jQuery('#form_master').submit(function() {								
						return false;
					  });			
					  jQuery.ajax({
							type: 'POST',
							url: jQuery('#form_master').attr('action'),
							data: jQuery('#form_master').serialize(),
							success: function(data) {
								jQuery("#dialog-form").dialog('close');			  
								  jQuery.showMessageBox({
										title: 'Informasi',				
										content:data,
										CloseButtonDoneFunction : function() { 
										oTable.fnStandingRedraw();
										}
									});
							}
						});
					  },
			'Batal' : function() {																
					  jQuery(this).dialog('close');
					  }				
		}, open: function(event, ui) {
				jQuery.get("views/pemesanan/PemesananForm.php?olah=del&key=IdBooking&val="+id+"&v="+nama, function(data,status) {
				if (status == "success") {	
				   jQuery("div#dialog-form").html(data);
				}
				}); // end get
		},  // end open		
		close:function(event, ui) {  jQuery("div#dialog-form").html(""); } 
	}); // end dialog												
	jQuery('#dialog-form').dialog('open'); 
}

function print_data(id) {

	jQuery("#dialog-print").dialog({

		autoOpen: false,		

		height: 600,

		width: 850,

		modal: true,

		buttons: {

			'Close' : function() {												

				jQuery(this).dialog('close');

			}				

		},

		 open: function(event, ui) {

		  jQuery.get("views/pemesanan/PrintKwitansi.php?id="+id, function(data,status) {

			  if (status == "success") {	

					jQuery("div#dialog-print").html(data);	

			  }

		  });

		}  

	});

	jQuery('#dialog-print').dialog('open'); 	

}
</script>

<br />  
<div id="dialog-print"></div>       
<div id="dialog-form"></div>

<table width="100%" cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="gridData">
<thead>
  <tr>
    <th width="50">No Booking</th>
    <th width="70">Jenis Kendaraan</th>
    <th width="70">Paket Wisata</th>
    <th width="50">Nama Pemesan</th>
    <th width="50">Jumlah Hari</th>
    <th width="50">Jumlah Harga</th>
    <th width="50">Tanggal Registrasi</th>
    <th width="50">Tanggal Berangkat</th>
    <th width="50">Tanggal Pulang</th>
    <th width="50">Status Bayar</th>                    
    <th width="100">ACTION</th>
  </tr>
</thead>  
<tbody>  
  <tr>
    <td colspan="11" class="dataTables_empty">Loading data from server</td>
  </tr>
</tbody>  
</table>