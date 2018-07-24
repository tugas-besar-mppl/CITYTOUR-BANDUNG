<?php
include "../../includes/koneksi.php";
if ($_GET["id"]) {
	$query = "SELECT 
				tb_peminjaman_detail.IdPeminjamanDetail,
				m_buku.IdBuku,
				m_buku.Judul,
				tb_peminjaman_detail.Jumlah
				FROM tb_peminjaman_detail
				INNER JOIN m_buku
				ON tb_peminjaman_detail.IdBuku = m_buku.IdBuku WHERE IdPeminjaman = '" . $_GET["id"] . "'";
	$result = mysql_query($query);	
	$n=0;
    if($result &&  mysql_num_rows($result)>0) {
        while($row = mysql_fetch_array($result)) {
?>	
    <tr id='row<?php echo $n; ?>' border='1'>
		<td>
            <input type='hidden' name='t_id_buku[]' value='<?php echo $row["IdBuku"]; ?>'>
			<input type='hidden' name='t_inputBuku[]' value='<?php echo $row["Judul"]; ?>'>
			<?php echo $row["Judul"]; ?>
		</td>
		<td class='centeralign'>
			<input type='hidden' name='t_jumlah[]' value='<?php echo $row["Jumlah"]; ?>'>
			<?php echo $row["Jumlah"]?></td>
		<td class='centeralign'><button class='btn' type='button' onclick='delRow("<?php echo $n; ?>")'><span class='icon-trash'></span></button></td>
	</tr>
<?php  
 		$n++;
		}
		
	}
	?>
    <tr style="display:none;">
    <td>
	<input type='text' name='num' id="num" value='<?php echo $n; ?>'>
	</td>
	</tr>
    <?php
	mysql_close();
}	

?>		