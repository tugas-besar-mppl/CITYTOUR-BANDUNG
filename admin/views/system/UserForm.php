<?php
include_once '../../includes/koneksi.php';
?>
<script type="text/javascript" src="plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="plugins/jcombo/jcombo.js"></script>
<script type="text/javascript" src="plugins/jquery-validation/dist/jquery.numeric.js"></script>
<script type="text/javascript" src="plugins/jquery-validation/dist/jquery.number.min.js"></script>
<script type="application/javascript">
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

jQuery.validator.addMethod("uniqueUsername", function(value, element) {
    var response='';
    jQuery.ajax({
        type: "POST",
        url: "models/administrator/get_select_usercheck.php?username="+value+"&proses=<?php echo $_GET["olah"];?>",
        async:false,
        success:function(data){
            response = data;
        }
    });
    if(response == 0)
    {
        return true;
    }
    else
    {
        return false;
    }
    
});

jQuery( "#form_proses" ).validate({
	rules: {
		username: { minlength: 5, required: true, uniqueUsername : true },
		pegawai: "required",
		group: "required",
		password: { minlength: 5,
					required : true
				  },
		ulang_password: { minlength: 5,
						  required : true,
						  equalTo: "#password"
						}	
	},
	messages: {
		username: { minlength : "Username harus lebih dari 5 karakter",
					required : "Harus diisi",
					uniqueUsername : "User ini telah digunakan! coba yang lain"},
		pegawai: "Harus diisi",
		group: "Harus diisi",
		password: { minlength : "Password harus lebih dari 5 karakter",
						  required : "Harus diisi" },
		ulang_password: { minlength : "Password harus lebih dari 5 karakter",
						  required : "Harus diisi",
						  equalTo: "Ulang password tidak sama" }
						  	
	  }  
});	
(function() {
	// use custom tooltip; disable animations for now to work around lack of refresh method on tooltip
	jQuery("#form_proses").tooltip({
		show: false,
		hide: false
	});
})();
//jQuery(document).ready(function(){	
//});
</script>

<?php
if ($_GET["olah"]=="add") {
?>
<form id="form_proses" name="form_proses" method="post" action="models/system/UserData.php?olah=add">
<table width="480" border="0" class="table">
   <tr>
    <td class="dotted_underline">User Group</td>
    <td>
      <select name="group" id="group">
      </select>
      <script type="text/javascript">
        jQuery(function() {
          jQuery("#group").jCombo("models/system/GetListUserGroup.php", {
		    selected_value : '',
			initial_text: "-- Pilih User Group --"
		  });
        });
	  </script>
    </td>
  </tr>  
   <tr>
    <td class="dotted_underline">Nama Petugas</td>
    <td>
      <select name="petugas" id="petugas">
      </select>
      <script type="text/javascript">
        jQuery(function() {
          jQuery("#petugas").jCombo("models/system/GetListPetugas.php", {
		    selected_value : '',
			initial_text: "-- Pilih Petugas --"
		  });
        });
	  </script>
    </td>
  </tr>
  <tr>
    <td width="30%" class="dotted_underline">Username *)</td>
    <td width="70%" ><label for="kode"></label>
    <input name="username" type="text" id="username" size="40" /></td>
  </tr>    
  <tr>
    <td class="dotted_underline">Password *)</td>
    <td><input name="password" type="password" id="password" size="40" /></td>
  </tr>
  <tr>
    <td class="dotted_underline">Ulangi Password *)</td>
    <td><input name="ulang_password" type="password" id="ulang_password" size="40" /></td>
  </tr>
  <tr>
    <td class="dotted_underline">Status Aktif *)</td>
    <td><input name="status_aktif" type="checkbox" id="status_aktif" value="Y" checked="checked" /></td>
  </tr>
</table>
</form>
<?php
} else if ($_GET["olah"]=="edit") {
	
	$sqlEdit = "SELECT * FROM user_login WHERE IdUserLogin = '".$_GET["key"]."'";
	//echo $sqlEdit;
	$results=mysql_query($sqlEdit);
	$rows=mysql_fetch_object($results);
?>
<form id="form_proses" name="form_proses" method="post" action="models/system/UserData.php?olah=edit&id=<?php echo $_GET["key"]; ?>">
<table width="480" border="0" class="table">
   <tr>
    <td class="dotted_underline">User Group</td>
    <td>
      <select name="group" id="group">
      </select>
      <script type="text/javascript">
        jQuery(function() {
          jQuery("#group").jCombo("models/system/GetListUserGroup.php", {
		    selected_value : '<?php echo $rows->IdGroup; ?>',
			initial_text: "-- Pilih User Group --"
		  });
        });
	  </script>
    </td>
  </tr>  
   <tr>
    <td class="dotted_underline">Nama Petugas</td>
    <td>
      <select name="petugas" id="petugas">
      </select>
      <script type="text/javascript">
        jQuery(function() {
          jQuery("#petugas").jCombo("models/system/GetListPetugas.php", {
		    selected_value : '<?php echo $rows->IdPetugas; ?>',
			initial_text: "-- Pilih Petugas --"
		  });
        });
	  </script>
    </td>
  </tr>
  <tr>
    <td width="30%" class="dotted_underline">Username *)</td>
    <td width="70%" ><label for="kode"></label>
    <input name="username" type="text" id="username" size="40" /></td>
  </tr>    
<tr>
	<td>&nbsp;</td>
    <td align="center"><input name="RESET_PASSWORD" type="button" id="RESET_PASSWORD" class="btn" size="40" value="Reset Password" /></td>
<script type="text/javascript">
	jQuery("#RESET_PASSWORD").click(function(){
		var reset = confirm("Anda yakin ingin mereset password '<?php echo $rows->username; ?>'?");
			if (reset) {
				//alert('models/administrator/reset_password.php?id_user=<?php echo $_GET["key"]; ?>&username=<?php echo $rows->username; ?>');
jQuery.post('models/system/ResetPassword.php?id_user=<?php echo $_GET["key"]; ?>&username=<?php echo $rows->username; ?>',function(data) {
					alert(data);																							   
				});
			}
	});
</script>
</tr>
  <tr>
    <td class="dotted_underline">Status Aktif *)</td>
    <td><input name="status_aktif" type="checkbox" id="status_aktif" value="Y" checked="checked" /></td>
  </tr>
</table>
</form>
<?php            
  } else if ($_GET["olah"]=="del") {	 
?>
          	<form width="350" height="100" name="form_proses" id="form_proses" action="models/system/UserData.php?olah=del" method="post" enctype="multipart/form-data">
            <table border="0" cellpadding="0" cellspacing="0" width="350">   
            <tr>
              <td>Anda akan menghapus data user : <?php echo $_GET['v']?> ?
                <input type="hidden" name="<?php echo $_GET['key']?>" id="<?php echo $_GET['key']?>"  value="<?php echo $_GET['val'] ;?>" /></td>
		   </tr>   
		   <tr><td><br /></td></tr>
            </table>                      
            </form>             
<?php
 }
?>

