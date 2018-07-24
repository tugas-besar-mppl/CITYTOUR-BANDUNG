<?php
$q = strtolower($_GET["q"]);
if (!$q) {
	return;
}
include "../../includes/koneksi.php";
$query = "SELECT
				  IdAnggota,
				  KodeAnggota,
				  CONCAT(KodeAnggota,'-',Nama) AS DATT
				FROM m_anggota
							WHERE Nama LIKE '%" . $q . "%' OR KodeAnggota LIKE '%" . $q . "%' LIMIT 10";
//echo  $query;			
$result = mysql_query($query);
	if (0 < mysql_num_rows($result)) {
		while ($row = mysql_fetch_object($result)) {
			echo $row->DATT . "|" . $row->IdAnggota . "|" . $row->KodeAnggota . "\n";			
			continue;
		}
	}
	 else  {
		echo "Not found anything.";
		exit();
	}  
?>