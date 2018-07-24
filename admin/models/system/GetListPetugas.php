<?php
  	include_once '../../includes/koneksi.php';
	$where ='';
	if (!empty($_GET['parent'])) {	
	$id = !empty($_GET['id'])?intval($_GET['id']):0;
	$where = " AND  ".$_GET['parent']." = '".$id."'";
	}
	
			$sql = "SELECT IdPetugas, Nama FROM m_petugas WHERE IdPetugas !='1' ".$where." ORDER BY Nama";
	//echo $sql;
	$result = mysql_query($sql);	
    $items = array();
    if($result && 
       mysql_num_rows($result)>0) {
        while($row = mysql_fetch_array($result)) {
            $items[] = array( $row[0], $row[1] );
        }        
    }
    mysql_close();
    // convert into JSON format and print
    echo json_encode($items); 
?>