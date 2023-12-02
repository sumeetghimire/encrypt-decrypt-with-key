<?php

namespace SumeetGhimire\EncryptDecryptWithKey;

class EncryptionHelper
{
    /**
     * Encrypt a string.
     *
     * @param  string  $string
     * @return string
     */
    public static function encryptString($string)
    {
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '1234567891011121';
        $encryption_key = env("ENCRYPT_KEY",'nKHWPqRywS');
        $encryption = openssl_encrypt($string, $ciphering, $encryption_key, $options, $encryption_iv);
        return base64_encode($encryption);
    }

    /**
     * Decrypt a string.
     *
     * @param  string  $string
     * @return string
     */
    public static function decryptString($string)
    {
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $decryption_iv = '1234567891011121';
        $decryption_key =  env("ENCRYPT_KEY",'nKHWPqRywS');
        $decryption = openssl_decrypt(base64_decode($string), $ciphering, $decryption_key, $options, $decryption_iv);
        return $decryption;
    }
}
