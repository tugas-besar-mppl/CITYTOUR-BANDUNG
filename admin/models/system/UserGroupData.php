<?php
include_once '../../includes/koneksi.php';
 if ($_GET["olah"] == "add")
    { 
		  $id_group = $_POST["id_group"];
		  $group = $_POST["nama"];
		  
		  $sqlInsGroup = "INSERT INTO user_group (IdGroup, NamaGroup) VALUES ('".$id_group."','".$group."')";

		//echo "ini kode memasukan data ke uer";
		 //echo $sqlInsUser;
		  $resIns = mysql_query($sqlInsGroup);
		  if(!$resIns)
		  	echo "Data ini gagal disimpan.";
		  else 
		  	echo "Data ini telah disimpan."; 
		 //echo "ini kode kode memasukan data ke user menu";
		  foreach ($_POST["menu_id"] as $key=>$value) {
			
			if (strlen($value) == 3 ) {
				$strMenuGrup1 = "SELECT count(*) FROM user_group_menu WHERE id_group =  '".$id_group."' and menu_id = '".substr($value,0,1)."'";
		  		
				$hasilGrup1=mysql_query($strMenuGrup1);
		  		$rowGrup1=mysql_fetch_array($hasilGrup1);
				//echo $strMenuGrup1."<br>";
					if ($rowGrup1[0] == 0){
				        $sqlinsert1 = "INSERT INTO  user_group_menu (id_group,menu_id) VALUES ('".$id_group."','".substr($value,0,1)."')";				
				  		mysql_query($sqlinsert1);
						//echo $sqlinsert1."<br>";
				    }				  
			}
			elseif (strlen($value) == 5 ) {
				$strMenuGrup2 = "SELECT count(*) FROM user_group_menu WHERE id_group =  '".$id_group."' and menu_id = '".substr($value,0,1)."'";
		  		$hasilGrup2=mysql_query($strMenuGrup2);
		  		$rowGrup2=mysql_fetch_array($hasilGrup2);
				//echo $strMenuGrup2."<br>";
					if ($rowGrup2[0] == 0){
				        $sqlinsert2 = "INSERT INTO USER user_group_menu (id_group,menu_id) VALUES ('".$id_group."','".substr($value,0,1)."')";				
				  		mysql_query($sqlinsert2);
						//echo $sqlinsert2."<br>";
				    }
					
				$strMenuGrup3 = "SELECT count(*) FROM user_group_menu WHERE id_group =  '".$id_group."' and menu_id = '".substr($value,0,3)."'";
		  		$hasilGrup3=mysql_query($strMenuGrup3);
		  		$rowGrup3=mysql_fetch_array($hasilGrup3);
				//echo $strMenuGrup2."<br>";
					if ($rowGrup3[0] == 0){
				        $sqlinsert3 = "INSERT INTO USER user_group_menu (id_group,menu_id) VALUES ('".$user."','".substr($value,0,3)."')";				
				  		mysql_query($sqlinsert3);
						//echo $sqlinsert3."<br>";
				    }
				  
			}
			$sqlinsert4 = "INSERT INTO  user_group_menu (id_group,menu_id) VALUES ('".$id_group."','".$value."')";	
			//echo $sqlinsert4."<br>";
			mysql_query($sqlinsert4);
			
		  }	
		  
		  //header("location:../../?url=user_grup&pesan=1");
	  
	}
	else if ($_GET["olah"] == "edit")
    { 
		  
		  $id_group = $_POST["id_group"];
		  $group = $_POST["nama"];
		  
		  $sqlUpGroup = "UPDATE user_group SET NamaGroup = '".$group."'
						 WHERE IdGroup ='".$id_group."'";
		  mysql_query($sqlUpGroup);
		  
		  $sqlDel = "DELETE FROM user_group_menu WHERE id_group =  '".$id_group."'";
		  $resUp=mysql_query($sqlDel);
		  
		  if(!$resUp)
		  	echo "Data ini gagal diedit.";
		  else 
		  	echo "Data ini telah diedit."; 
		  
		  foreach ($_POST["menu_id"] as $key=>$value) {
			
			if (strlen($value) == 3 ) {
				$strMenuGrup1 = "SELECT count(*) FROM user_group_menu WHERE id_group =  '".$id_group."' and menu_id = '".substr($value,0,1)."'";
		  		$hasilGrup1=mysql_query($strMenuGrup1);
		  		$rowGrup1=mysql_fetch_array($hasilGrup1);
				//echo $strMenuGrup1."<br>";
					if ($rowGrup1[0] == 0){
				        $sqlinsert1 = "INSERT INTO user_group_menu (id_group,menu_id) VALUES ('".$id_group."','".substr($value,0,1)."')";				
				  		mysql_query($sqlinsert1);
						//echo $sqlinsert1."<br>";
				    }				  
			}
			elseif (strlen($value) == 5 ) {
				$strMenuGrup2 = "SELECT count(*) FROM user_group_menu WHERE id_group =  '".$id_group."' and menu_id = '".substr($value,0,1)."'";
		  		$hasilGrup2=mysql_query($strMenuGrup2);
		  		$rowGrup2=mysql_fetch_array($hasilGrup2);
				//echo $strMenuGrup2."<br>";
					if ($rowGrup2[0] == 0){
				        $sqlinsert2 = "INSERT INTO  user_group_menu (id_group,menu_id) VALUES ('".$id_group."','".substr($value,0,1)."')";				
				  		mysql_query($sqlinsert2);
						//echo $sqlinsert2."<br>";
				    }
					
				$strMenuGrup3 = "SELECT count(*) FROM user_group_menu WHERE id_group =  '".$id_group."' and menu_id = '".substr($value,0,3)."'";
		  		$hasilGrup3=mysql_query($strMenuGrup3);
		  		$rowGrup3=mysql_fetch_array($hasilGrup3);
				//echo $strMenuGrup2."<br>";
					if ($rowGrup3[0] == 0){
				        $sqlinsert3 = "INSERT INTO  user_group_menu (id_group,menu_id) VALUES ('".$id_group."','".substr($value,0,3)."')";				
				  		mysql_query($sqlinsert3);
						//echo $sqlinsert3."<br>";
				    }
				  
			}
			$sqlinsert4 = "INSERT INTO  user_group_menu (id_group,menu_id) VALUES ('".$id_group."','".$value."')";	
			//echo $sqlinsert4."<br>";
			mysql_query($sqlinsert4);
			
		  }	
		  
		  //header("location:../../?url=user_grup&pesan=2");
	  
	}
	elseif ($_GET["olah"]=="del")
	 { 
	  $sqlDelMnlevel =  "UPDATE user_group SET StatusDelete = 'Y' WHERE IdGroup =  '".$_POST["id_group"]."'";				  
	  $resDel1 = mysql_query($sqlDelMnlevel);
	  //echo $sqlDelMnlevel;
      $sqlDellevel =  "DELETE FROM user_group_menu WHERE id_group =  '".$_POST["id_group"]."'";				  
	  $resDel2 = mysql_query($sqlDellevel);
	  
	  if(!$resDel1 && !$resDel2)
		  	echo "Data ini gagal dihapus.";
		  else 
		  	echo "Data ini telah dihapus."; 
			
	  //header("location:../../?url=user_grup&pesan=3");
	 }
	 
?>