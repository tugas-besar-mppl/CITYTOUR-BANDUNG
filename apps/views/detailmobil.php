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
<div id="id04" class="modal" style="overflow: hidden;">
    <form class="modal-content animate" action="/action_page.php">
            <div class="imgcontainer">
                <h3>Detail Booking</h3> 
            </div>
            <div class="containerx">
                <h5>Pilih Tanggal</h5>
                <label>Mulai</label>
                <input type="input" name="tgl" id="tgl">
                <label>Sampai</label>
                <input type="input" name="tgl1" id="tgl1">
                <!--Tujuan wisata-->
                <h4>Tujuan Wisata</h4>
                <div style="display:inline-block; text-align:left;">
                    <label class="box"> Tangkuban Perahu
                        <input type="checkbox" name="tujuan" value="Tangkuban Perahu">
                        <span class="checkmark"></span>
                    </label>
                    <label class="box"> Floating Market
                        <input type="checkbox" name="tujuan" value="Floating Market">
                        <span class="checkmark"></span>
                    </label>
                    <label class="box"> Farm House
                        <input type="checkbox" name="tujuan" value="Farm House">
                        <span class="checkmark"></span>
                    </label>
                    <label class="box"> Kawah Putih
                        <input type="checkbox" name="tujuan" value="Kawah Putih">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <!--/Tujuan wisata-->
                <input type="submit" class="btn btn-login btn-lg">  
                <div class="containerx" style="background-color:#f1f1f1">
                	<button type="button" onClick="document.getElementById('id04').style.display='none'" class="cancelbtn">Cancel</button>
            	</div>
            </div>
    </form>
</div>
<div class='preloader'>
	<div class='loaded'>&nbsp;</div>
</div>

