<?php
  include_once '../../includes/koneksi.php';
		$sQuery = "SELECT
					  COUNT(tb_booking.IdKendaraan) AS jml,
					  m_kendaraan.Jenis
					FROM tb_booking
					  INNER JOIN m_kendaraan
						ON tb_booking.IdKendaraan = m_kendaraan.IdKendaraan
					GROUP BY tb_booking.IdKendaraan";	   
	//echo $sQuery; 
	$rResult = mysql_query($sQuery);
	while($aRow = mysql_fetch_array( $rResult )) {
	  //$jml = ($jml + $aRow["jml"]);	
	  $items[]= array($aRow["Jenis"], (int)$aRow["jml"]);
	}
    mysql_free_result($rResult);
    mysql_close();
echo json_encode($items);
?>