<?php

/**
 * simple method to encrypt or decrypt a plain text string
 * initialization vector(IV) has to be the same when encrypting and decrypting
 * PHP 5.4.9
 *
 * this is a beginners template for simple encryption decryption
 * before using this in production environments, please read about encryption
 *
 * @param string $action: can be 'encrypt' or 'decrypt'
 * @param string $string: string to encrypt or decrypt
 *
 * @return string
 */
 class Utility {
	static function  encrypt_decrypt($action, $string) {
		$output = false;

		$encrypt_method = "AES-256-CBC";
		$secret_key = 'Nooka Ratnam Dadi And Venkata Apparao Rao Dadi\'s key';
		$secret_iv = 'Sarojini Devi Budha  And Mahesh Budha\'s iv';

		// hash
		$key = hash('sha256', $secret_key);
		
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);

		if( $action == 'encrypt' ) {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		}
		else if( $action == 'decrypt' ){
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}

		return $output;
	}

 }

 /*
$plain_txt = "Some plain text";
echo "Plain Text = $plain_txt\n";

$encrypted_txt = Utility::encrypt_decrypt('encrypt', $plain_txt);
echo "Encrypted Text = $encrypted_txt\n";

$decrypted_txt = Utility::encrypt_decrypt('decrypt', $encrypted_txt);
echo "Decrypted Text = $decrypted_txt\n";

if( $plain_txt === $decrypted_txt ) echo "SUCCESS";
else echo "FAILED";

echo "\n";*/

?>
