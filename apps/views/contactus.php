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
<section id="contact" class="sections">
      <div class="container text-center">
<table align="center" border="0">
<tr>
<td width="401" style="width:400px;">
        <div class="heading-content">
              <div align="left">
                <h1 class='con-title'>City Tour</h1>
                  <p class='con-text'>Menemani liburan anda dan memberikan fasilitas terbaikan untuk perjalanan anda.</p>
                  <ul class='con-list'>
                    <br/> <li><img src="assets/images/map.png" width="50" height="50" alt="Address :" /> Komplek Kopo Permai III blok 39A/2 Bandung </li>
                    <br/> <li><img src="assets/images/phone.png" width="50" height="50" alt="Phone :" /> 082678890664</li>
                    <br/> <li><img src="assets/images/mail.png" width="50" height="50" alt="E-mail" /> bagja@citytour.com</li>
                    </ul>
              </div>            
          </div>
</td>
<td width="161"><br />
<br />

        <section id="contact" style="width:600px; margin-right:130px">
            <div id="kontaku"></div>
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
                        <div class="contact-form-area">
								<form method="post" action="apps/models/KontakProses.php?kontak_attempt=1"  >
                                <h3>Kontak</h3>	
                                <div class="form-group">
                                    <input type="text"  name="nama" id="nama" class="form-control" placeholder="Nama Lengkap" style="height:40px">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" style="height:40px">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subjek" id="subjek" class="form-control" placeholder="Subjek" style="height:40px">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="7" name="pesan" id="pesan" placeholder="pesan"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary contact-btn">Kirim</button>
                            </form>
                        </div>	
                    </div>
                </div>
            </div> <!-- /container -->       
        </section>
</td>
</tr>

</table>    
        </div> <!-- /container -->
</section>
