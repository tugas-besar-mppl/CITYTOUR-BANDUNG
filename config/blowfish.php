<?php

function blowfish_encrypt($cleartext) {
	$cipher = mcrypt_module_open(MCRYPT_BLOWFISH, "", MCRYPT_MODE_CBC, "");
	$iv = "12345678";
	$key256 = "1234567890123456ABCDEFGHUJKLMNOPSIKESKA";
	if (mcrypt_generic_init($cipher, $key256, $iv) != -1) {
		$cipherText = mcrypt_generic($cipher, $cleartext);
		mcrypt_generic_deinit($cipher);
		return bin2hex($cipherText);
	}
	 else  {
		return "encrypt failed!";
	}
	return;
}

return 1;
