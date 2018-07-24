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
session_start();
include_once 'config/koneksi.php';
?>
<section id="aboutus" class="sections lightbg">
    <div class="container text-center">
        <div class="heading-content">
            <h3>PEMBAYARAN</h3>
        </div>
        <p>
			<?php
            $jenis= $_POST['jenis'];
            $idkendarran= $_POST['kendaraan'];
            $idpaket= $_POST['wisata'.$jenis];
            $tanggalawal= $_POST['dari_tanggal'.$jenis];
            $tanggalakhir= $_POST['sampai_tanggal'.$jenis];
        
            $Qkendaraan="SELECT * FROM m_kendaraan WHERE IdKendaraan='".$idkendarran."' ";
                $Rkendaraan=mysql_query($Qkendaraan);
                $Skendaraan=mysql_fetch_object($Rkendaraan);
            
            $Qpaket="SELECT * FROM m_wisata WHERE IdWisata='".$idpaket."' ";
            $Rpaket=mysql_query($Qpaket);
            $Spaket=mysql_fetch_object($Rpaket);
            
            $tglAwl = explode("-",$tanggalawal);
            $tglawal=$tglAwl[2].'-'.$tglAwl[1].'-'.$tglAwl[0];
            $tglakhr = explode("-",$tanggalakhir);
            $tglakhir=$tglakhr[2].'-'.$tglakhr[1].'-'.$tglakhr[0];
            $hari = $tglakhr[0] -  $tglAwl[0];
            if($hari >0){
				$totalkendaraan	=$hari*$Skendaraan->Harga;
				$totalpaket		=$hari*$Spaket->Harga;
            }else{
				$totalkendaraan	=$Skendaraan->Harga;
				$totalpaket		=$Spaket->Harga;
            }
            $total=$totalkendaraan+$totalpaket;
            ?>        
            <strong>
                <table border="0" align="center">
                    <tr>
                        <td colspan="3" style="width:600px;">
                            <div class="gallery" style="width:600px;" align="center">
                                <h3><?=$Spaket->Paket;?></h3>
                                <div class="con">
                                    <img src="assets/images/wisata/<?=$Spaket->Photo;?>" class="image" alt="<?=$Spaket->Paket;?>" style="width:350px; height:200px;">
                                </div>
                                <div class="desc"><?=$Spaket->Keterangan;?></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Booking</td>
                        <td>:</td>
                        <td><?=$tanggalawal.' s/d '.$tanggalakhir;?></td>
                    </tr>
                    <tr>
                        <td>Kendaraan</td>
                        <td>:</td>
                        <td><?=$jenis?></td>
                    </tr>
                    <tr>
                        <td>Harga Kendaraan</td>
                        <td>:</td>
                        <td align="right"><?=$hari;?> Hari X Rp. <?=number_format($Skendaraan->Harga);?></td>
                    </tr>
                    <tr>
                        <td>Harga Wisata</td>
                        <td>:</td>
                        <td align="right"><?=$hari;?> Hari X Rp. <?=number_format($Spaket->Harga);?></td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>:</td>
                        <td align="right">Rp. <?=number_format($total);?></td>
                    </tr>
                    <tr>
                    <td colspan="3" align="center">
                    <form method="post" action="apps/models/PembayaranProses.php?register_attempt=1"  >
                    <input type="hidden" id="kendaraan" name="kendaraan" value="<?=$idkendarran;?>"/>
                    <input type="hidden" id="paket" name="paket" value="<?=$idpaket;?>"/>
                    <input type="hidden" id="jml" name="jml" value="<?=$hari;?>"/>
                    <input type="hidden" id="total" name="total" value="<?=$total;?>"/>
                    <input type="hidden" id="awal" name="awal" value="<?=$tglawal;?>"/>
                    <input type="hidden" id="akhir" name="akhir" value="<?=$tglakhir;?>"/> 
                    
                    <?php
					if($_SESSION['pelanggan'] != ""){
					$hide ="";
					$show ="style='display:none'";
					}else{
					$hide ="style='display:none'";
					$show ="";
					}
					?>
                    <button <?=$hide?>type='submit' id='booking' >Bayar Sekarang</button>                   
                    <a href="../citytourbdg/#login"><button <?=$show?>type='button' id='blum' >Untuk Pembayaran Silahkan Login terlebih dahulu</button></a>                    
                    </form>
                    </td>
                    </tr>
                </table>
            </strong>      
        </p>
    </div> <!-- /container -->
</section>
