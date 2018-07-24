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
<div id="id03" class="modal" style="overflow: hidden;">
    <form class="modal-content animate" action="index.php" method="post">
        <div class="imgcontainer">
      	  <h3>Reset Password</h3> 
        </div>
        <div class="containerx">
            <button type="button" class="close-button" title="Close" onClick="document.getElementById('id03').style.display='none'">X</button>
            <label for="uname"><b>Masukkan Email Yang Terdaftar</b></label>
            <input type="email" placeholder="Masukkan Email" name="uname" required>
            <button type="submit">Kirim</button>
        </div>
        <div class="containerx" style="background-color:#f1f1f1">
                <button type="button" onClick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
        </div>
    </form>
</div>
<div class='preloader'>
	<div class='loaded'>&nbsp;</div>
</div>