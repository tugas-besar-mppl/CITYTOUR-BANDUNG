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
ob_start();
include_once '../../config/koneksi.php';
		
if(isset($_GET['reset_attempt']))
{		
		$email = addslashes (strip_tags ($_POST['email']));
		$message = "<html><body>";					
		$message .= "<p>Jika anda tidak merasa melakukan pendaftaran Online, silahkan abaikan email ini</p>";
		$message .= "<p>Terima Kasih<br /></p>";
		$message .= "</body></html>";	
		$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i"; 
		if (preg_match($pattern, trim(strip_tags($email)))) { 
			$cleanedFrom = trim(strip_tags($email)); 
		} else { 
			return "The email address you entered was invalid. Please try again!"; 

		} 

		$subject = 'Konfirmasi Akun Pendaftaran';
		
		$headers = "From: " . $cleanedFrom . "\r\n";
		$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		require '../../plugins/PHPMailer-master/PHPMailerAutoload.php';
		$mail = new PHPMailer();
		$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->Debugoutput = 'html';
			$mail->Host = $mail_host;
			$mail->Port = $mail_port;
			$mail->SMTPSecure = 'ssl';
			$mail->SMTPAuth = true;
			$mail->Username = $mail_user;
			$mail->Password = $mail_pwd;
			$mail->setFrom($mail_user, $mail_setfrom);
			$mail->addReplyTo($mail_user);
		$mail->addAddress($email);
		$mail->Subject = $subject;
		$mail->msgHTML($message);
		$mail->AltBody = $headers;
		if ($mail->send()) {
			header("location:../../?menu=konfirmasi_pendaftaran&id=".$id_en."&msg=1");
		} else {			
			header("location:../../?menu=konfirmasi_pendaftaran&id=".$id_en."&msg=2");
		}	
}
?> 
