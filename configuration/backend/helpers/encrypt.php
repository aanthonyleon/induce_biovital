<?php 
	function encrypt($string){
		// Store the cipher method
		$ciphering = "AES-128-CTR";

		// Use OpenSSl Encryption method
		$iv_length = openssl_cipher_iv_length($ciphering);
		$options = 0;

		// Non-NULL Initialization Vector for encryption
		$encryption_iv = '1234567891011121';

		// Store the encryption key
		$encryption_key = "drenamex_key";

		// Use openssl_encrypt() function to encrypt the data
		$encryption = openssl_encrypt($string, $ciphering,
					$encryption_key, $options, $encryption_iv);

		// Display the encrypted string
		return $encryption;

		// Non-NULL Initialization Vector for decryption
		$decryption_iv = '1234567891011121';

		// Store the decryption key
		$decryption_key = "drenamex_key";

		// Use openssl_decrypt() function to decrypt the data
		$decryption=openssl_decrypt ($encryption, $ciphering,
				$decryption_key, $options, $decryption_iv);

		// Display the decrypted string
		// echo "<br>Decrypted String: " . $decryption;
	}

	function decrypt($string){
		// Store the cipher method
		$ciphering = "AES-128-CTR";

		// Use OpenSSl Encryption method
		$iv_length = openssl_cipher_iv_length($ciphering);
		$options = 0;

		// Non-NULL Initialization Vector for encryption
		$encryption_iv = '1234567891011121';

		// Store the encryption key
		$encryption_key = "drenamex_key";

		// Use openssl_encrypt() function to encrypt the data
		$encryption = openssl_encrypt($string, $ciphering,
					$encryption_key, $options, $encryption_iv);

		// Display the encrypted string
		// return $encryption;

		// Non-NULL Initialization Vector for decryption
		$decryption_iv = '1234567891011121';

		// Store the decryption key
		$decryption_key = "drenamex_key";

		// Use openssl_decrypt() function to decrypt the data
		$decryption=openssl_decrypt ($string, $ciphering,
				$decryption_key, $options, $decryption_iv);

		// Display the decrypted string
		return $decryption;
	}

	// echo decrypt("FtAaThYSWxMeGxUdj3IX");
?>