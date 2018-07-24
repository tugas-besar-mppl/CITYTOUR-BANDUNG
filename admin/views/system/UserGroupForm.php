<?php
include_once '../../includes/koneksi.php';
include_once '../../includes/function.php';
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

jQuery( "#form_proses" ).validate({
	rules: {
		id_group: "required",
		nama: "required"
	},
	messages: {
		id_group: "Harus diisi",
		nama : "Harus diisi"
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
<form id="form_proses" name="form_proses" method="post" action="models/system/UserGroupData.php?olah=add">
<table width="99%" border="0" class="calibri">
<!--  <tr>
    <td width="30%" class="dotted_underline">ID Group *)</td>
    <td width="70%">-->
    
    <input name="id_group" type="hidden" id="id_group" size="10" value="<?php echo autonumber("id_group","user_group");?>" readonly />
    
<!--    </td>
  </tr>-->
  
  <tr>
    <td width="30%" class="dotted_underline">Nama Group *)</td>
    <td width="70%"><input name="nama" type="text" id="nama" size="40" /></td>
  </tr>
  <tr>
    <td class="dotted_underline">Menu</td>
    <td><div style="overflow:auto;width:250px;height:350px">
      <?php
						  $strMenu = "SELECT * FROM menu WHERE parent_id= '0' ORDER BY id";
						  $hasil=mysql_query($strMenu);
						  while($row=mysql_fetch_array($hasil))
						  {				
							   
							  $strCekMenuLev1 = "SELECT COUNT(*) AS cnt FROM menu WHERE parent_id= '".$row[menu_id]."'";
							  $hasilCekLev1=mysql_query($strCekMenuLev1);
							  $rowCekLev1=mysql_fetch_array($hasilCekLev1);
							  if ($rowCekLev1[cnt] > 0)
							  {
							    echo "$row[text]<br>";
								
								  $strMenuLev1 = "SELECT * FROM menu WHERE parent_id= '".$row[menu_id]."' ORDER BY id";
								  $hasilLev1=mysql_query($strMenuLev1);
								  while($rowLev1=mysql_fetch_array($hasilLev1))
								  {													  	
									  $strCekMenuLev2 = "SELECT COUNT(*) AS cnt FROM menu WHERE parent_id= '".$rowLev1[menu_id]."'";
									  $hasilCekLev2=mysql_query($strCekMenuLev2);
									  $rowCekLev2=mysql_fetch_array($hasilCekLev2);
									  if ($rowCekLev2[cnt] > 0)
									  {
									    echo "&nbsp;&nbsp;$rowLev1[text]<br>";
										
                                          $strMenuLev2 = "SELECT * FROM menu WHERE parent_id= '".$rowLev1[menu_id]."' ORDER BY id";
                                          $hasilLev2=mysql_query($strMenuLev2);
                                          while($rowLev2=mysql_fetch_array($hasilLev2))
                                          {                                     													 
                                          echo "&nbsp;&nbsp;&nbsp;&nbsp;<input name=\"menu_id[]\" type=\"checkbox\" value=\"$rowLev2[menu_id]\">$rowLev2[text]<br>";
										  }
								     }
									 else{								 
									     echo "&nbsp;&nbsp;<input name=\"menu_id[]\" type=\"checkbox\" value=\"$rowLev1[menu_id]\" $centang1>$rowLev1[text]<br>";
									 }
						          }								  
						       }
							   else{						   
							   echo "<input name=\"menu_id[]\" type=\"checkbox\" value=\"$row[menu_id]\" $centang>$row[text]<br>";
							   }
						 }
						?>
    </div>
      </td>
  </tr>
</table>
</form>
<?php
} else if ($_GET["olah"]=="edit") {
	
	$sqlEdit = "SELECT * FROM user_group WHERE IdGroup = '".$_GET["key"]."'";
	//echo $sqlEdit;
	$results=mysql_query($sqlEdit);
	$rows=mysql_fetch_object($results);
?>
<form id="form_proses" name="form_proses" method="post" action="models/system/UserGroupData.php?olah=edit&userid=<?php echo $_GET["key"]; ?>">
<table width="99%" border="0" class="calibri">
<!--  <tr>
    <td width="30%" class="dotted_underline">ID Group *)</td>
    <td width="70%">-->
    <input name="id_group" type="hidden" id="id_group" size="10" value="<?php echo $rows->IdGroup;?>" readonly />
    
<!--    </td>
  </tr>-->
  
  <tr>
    <td width="35%" class="dotted_underline">Nama Group *)</td>
    <td width="65%"><input name="nama" type="text" id="nama" size="40" value="<?php echo $rows->NamaGroup; ?>" /></td>
  </tr>
  <tr>
    <td class="dotted_underline">Menu</td>
    <td><div style="overflow:auto;width:250px;height:350px">
      <?php
						  $strMenu = "SELECT * FROM menu WHERE parent_id= '0' ORDER BY id";
						  $hasil=mysql_query($strMenu);
						  while($row=mysql_fetch_array($hasil))
						  {				
							   
							  $strCekMenuLev1 = "SELECT COUNT(*) AS cnt FROM menu WHERE parent_id= '".$row[menu_id]."'";
							  $hasilCekLev1=mysql_query($strCekMenuLev1);
							  $rowCekLev1=mysql_fetch_array($hasilCekLev1);
							  if ($rowCekLev1[cnt] > 0)
							  {
							    echo "$row[text]<br>";
								
								  $strMenuLev1 = "SELECT * FROM menu WHERE parent_id= '".$row[menu_id]."' ORDER BY id";
								  $hasilLev1=mysql_query($strMenuLev1);
								  while($rowLev1=mysql_fetch_array($hasilLev1))
								  {													  	
									  $strCekMenuLev2 = "SELECT COUNT(*) AS cnt FROM menu WHERE parent_id= '".$rowLev1[menu_id]."'";
									  $hasilCekLev2=mysql_query($strCekMenuLev2);
									  $rowCekLev2=mysql_fetch_array($hasilCekLev2);
									  if ($rowCekLev2[cnt] > 0)
									  {
									    echo "&nbsp;&nbsp;$rowLev1[text]<br>";
										
                                          $strMenuLev2 = "SELECT * FROM menu WHERE parent_id= '".$rowLev1[menu_id]."' ORDER BY id";
                                          $hasilLev2=mysql_query($strMenuLev2);
                                          while($rowLev2=mysql_fetch_array($hasilLev2))
                                          {               
										  		 $strMenuGrup2 = "SELECT count(*) FROM user_group_menu 
												 				  WHERE id_group = '".$rows->IdGroup."' AND menu_id= '".$rowLev2[menu_id]."'";
												// echo $strMenuGrup2;
												 $hasilGrup2=mysql_query($strMenuGrup2);
												 $rowGrup2=mysql_fetch_array($hasilGrup2);
												   if ($rowGrup2[0] >0)
													 $centang2 = "checked";												   
												   else
												     $centang2 = "";                        
													 
                                            echo "&nbsp;&nbsp;&nbsp;&nbsp;<input name=\"menu_id[]\" type=\"checkbox\" value=\"$rowLev2[menu_id]\" $centang2>$rowLev2[text]<br>";
										  }
								     }
									 else{
 										$strMenuGrup1 = "SELECT count(*) FROM user_group_menu WHERE ID_GROUP = '".$rows->IdGroup."' AND menu_id= '".$rowLev1[menu_id]."'";
												// echo $strMenuGrup2;
										$hasilGrup1=mysql_query($strMenuGrup1);
										$rowGrup1=mysql_fetch_array($hasilGrup1);
										if ($rowGrup1[0] >0)
										    $centang1 = "checked";												   
										else
											$centang1 = ""; 									 
									     echo "&nbsp;&nbsp;<input name=\"menu_id[]\" type=\"checkbox\" value=\"$rowLev1[menu_id]\" $centang1>$rowLev1[text]<br>";
									 }
						          }								  
						       }
							   else{
 									$strMenulevel =  "SELECT count(*) FROM user_group_menu WHERE id_group = '".$rows->IdGroup."' AND menu_id= '".$row[menu_id]."'";
									//echo $strMenulevel;
									$hasillevel = mysql_query($strMenulevel);
									$rowlevel = mysql_fetch_array($hasillevel);
										if ($rowlevel[0] >0)
										    $centang = "checked";												   
										else
											$centang = ""; 							   
							   echo "<input name=\"menu_id[]\" type=\"checkbox\" value=\"$row[menu_id]\" $centang>$row[text]<br>";
							   }
						 }
						?>
    </div>
      </td>
  </tr>
</table>
</form>
<?php            
  } else if ($_GET[olah]=="del") {	   
?>
          	<form name="form_proses" id="form_proses" action="models/system/UserGroupData.php?olah=del" method="post" enctype="multipart/form-data">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">   
            <tr>
              <td>Anda akan menghapus data user group: <?=$_GET['v']?> ?
              <input type="hidden" name="<?=$_GET['key']?>" id="<?=$_GET['key']?>"  value="<?=$_GET['val']?>" /></td>
            </tr>            
            </table>                      
            </form>             
<?php
 }
?>

