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
<div id="id01" class="modal" style="overflow: hidden;">
    <form class="modal-content animate" action="apps/models/LoginProses.php?login_attempt=1" method="post">
    <div class="imgcontainer">
    	<h3>Login</h3> 
    </div>
    	<div class="containerx">
            <button type="button" class="close-button" title="Close" onClick="document.getElementById('id01').style.display='none'">X</button>
            <label for="uname"><b>Email</b></label>
            <input type="text" placeholder="Enter Username" name="email" id="email" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>
            <button type="submit">Login</button>
            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
            <span align="right" class="psw">Belum Punya Akun? <a href="#register" onclick="signup()">Registrasi</a></span>
        </div>
        <div class="containerx" style="background-color:#f1f1f1">
        	<button type="button" onClick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#lupapass" onClick="lupa()">password?</a>
<!--
* @author		: develop team kelompok 1 mppl citytourbdg 
* @version		: v.1.0
* @param		: id01 diambil dari id div
* @param		: id03 diambil dari id div
* @return		: menampilkan dan menghilangkan div
* @throws		: -
* @see			: -
* @since		: 1.0
* @deprecated	: -
-->			
			<script>
				function lupa() {
				 document.getElementById('id01').style.display='none';
				 document.getElementById('id03').style.display='block';
				// Get the modal
				var modal = document.getElementById('id03');
				// When the user clicks anywhere outside of the modal, close it
					window.onclick = function(event) {
						if (event.target == modal) {
						  modal.style.display = "none";
						}
					}
				}
            </script>
        </span>
    </div>
    </form>
</div>
<div class='preloader'>
	<div class='loaded'>&nbsp;</div>
</div>