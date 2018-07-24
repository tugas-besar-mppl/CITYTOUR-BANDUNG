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
	$sql = "SELECT * FROM tb_about";
	$results=mysql_query($sql);
	$rows=mysql_fetch_object($results);
?>
<section id="aboutus" class="sections lightbg">
    <div class="container text-center">
        <div class="heading-content">
            <h3>About Us</h3>
        </div>
        <p><?php echo $rows->About;?></p>
    </div> <!-- /container -->
</section>
