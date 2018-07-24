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
<div id="id02" class="modal">
  <form class="modal-content animate" action="apps/models/RegisterProses.php?register_attempt=1" method="post">
    <div class="imgcontainer">
		<h3>Registrasi</h3> 
    </div>
    <div class="containerx">
    <button type="button" class="close-button" title="Close" onClick="document.getElementById('id02').style.display='none'">X</button>
      <label for="nama"><b>Nama Lengkap</b></label>
      <input type="text" placeholder="Nama Lengkap" name="nama" id="nama" required>
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Email" name="email" id="email" required>
      <label for="telp"><b>No. Telp</b></label>
      <input type="text" placeholder="No. Telp" name="telp" id="telp" required>
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Password" name="password" id="password" required>
      <label for="psw"><b>Ulangi Password</b></label>
      <input type="password" placeholder="Ulangi Password" name="repassword" id="repassword" required>
      <label>
      <input type="checkbox" name="remember" required> Saya setuju dengan syarat dan ketentuan yang berlaku
      </label>
      <button type="submit">Daftar</button>
    </div>
    <div class="containerx" style="background-color:#f1f1f1">
      <button type="button" onClick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Sudah Punya Akun? <a href="#login" onclick="signin()">Sign in</a></span>
    </div>
  </form>
</div>
<div class='preloader'>
	<div class='loaded'>&nbsp;</div>
</div>