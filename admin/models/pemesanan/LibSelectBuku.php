<?php
$q = strtolower($_GET["q"]);
if (!$q) {
	return;
}
include "../../includes/koneksi.php";
$query = "SELECT
				  IdBuku,
				  Judul,
				  Pengarang,
				  Penerbit,
				  CONCAT(Judul,'-',Pengarang,'-',Penerbit) AS DATT,
				  StokBuku
				FROM m_buku
							WHERE Judul LIKE '%" . $q . "%' OR Judul LIKE '%" . $q . "%' OR Judul LIKE '%" . $q . "%' LIMIT 10";
//echo  $query;			
$result = mysql_query($query);
	if (0 < mysql_num_rows($result)) {
		while ($row = mysql_fetch_object($result)) {
			echo $row->DATT . "|" . $row->IdBuku . "|" . $row->StokBuku . "\n";			
			continue;
		}
	}
	 else  {
		echo "Not found anything.";
		exit();
	}  
?>