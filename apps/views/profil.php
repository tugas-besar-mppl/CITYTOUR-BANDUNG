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
<div id="profil" class="modal" style="overflow: hidden;">
  <form class="modal-content animate" action="apps/models/LogoutProses.php?logout_attempt=1" method="post">
    <div class="imgcontainer">
		<h3>Anda Yakin Akan Logout ?</h3> 
    </div>
    <div class="containerx">
    <button type="button" class="close-button" title="Close" onClick="document.getElementById('profil').style.display='none'">X</button>            
      <button type="submit">Logout</button>
    </div>
  </form>
</div>
<div class='preloader'>
	<div class='loaded'>&nbsp;</div>
</div>