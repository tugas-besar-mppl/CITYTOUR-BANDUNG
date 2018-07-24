<!--
* @author		: develop team kelompok 1 mppl citytourbdg 
* @version		: v.1.0
* @param		: -
* @return		: -
* @throws		: -
* @see			: -
* @since		: 1.0
* @deprecated	: -
-->
<?php
	include_once '../../config/koneksi.php';
	$where ='';
	if (!empty($_GET['parent'])) {	
	$id = !empty($_GET['id'])?intval($_GET['id']):0;
	$where = " WHERE  ".$_GET['parent']." = '".$id."'";
	}
			$sql = "SELECT CONCAT(Paket,'- Rp.',Harga) AS WISATA, IdWisata, Harga, Photo FROM m_wisata ORDER BY Paket";
	//echo $sql;
	$result = mysql_query($sql);	
    $items = array();
    if($result && 
       mysql_num_rows($result)>0) {
        while($row = mysql_fetch_array($result)) {
            $items[] = array( $row[1], $row[0] );
        }        
    }
    mysql_close();
    // convert into JSON format and print
    echo json_encode($items); 
?>