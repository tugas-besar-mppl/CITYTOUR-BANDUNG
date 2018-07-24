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
include_once 'config/koneksi.php';
?>
<section id="booking" class="sections">
    <div class="container text-center">
    <div class="heading-content">          
<h3>Booking</h3>
<div class="booking">
<?php
	$sql = "SELECT * FROM m_kendaraan WHERE StatusAktif='Y'";
	//echo $sqlEdit;
	$results=mysql_query($sql);
	while($rows=mysql_fetch_object($results)){
		$no=1;
?>
<div class="gallery">
    <div class="con"><img src="assets/images/mobil/<?=$rows->Photo;?>" class="image" alt="<?=$rows->Jenis;?>" style="width:350px; height:200px;">
        <div class="middle">
        	<a href="#detailmobil" class="text">Detail</a>
        </div>
    </div>
  <div class="desc"><?=$rows->Jenis;?></div>
 	 <button type="button" id="booking" onClick="document.getElementById('<?=$rows->Jenis;?>').style.display='block'" >Booking</button>
  <script>
/*
* @author		: develop team kelompok 1 mppl citytourbdg 
* @version		: v.1.0
* @param		: modal diambil dari id div
* @return		: menghilangkan tampilan div dari parameter div
* @throws		: -
* @see			: -
* @since		: 1.0
* @deprecated	: -
*/
	window.onclick = function(event) {
		//alert(modal);
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
</script>
</div>
<?php
}
?> 

</div> <!-- booking -->
</div> <!-- content -->     
    </div> <!-- /container -->
</section>
