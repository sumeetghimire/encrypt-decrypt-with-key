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
        $ciphering = "AES-256-GCM"; // Upgraded to AES-256-GCM for authenticated encryption
        $iv_length = openssl_cipher_iv_length($ciphering);
        $encryption_iv = openssl_random_pseudo_bytes($iv_length);
        $encryption_key = env("ENCRYPT_KEY", 'nKHWPqRywS');
        $encryption = openssl_encrypt($string, $ciphering, $encryption_key, 0, $encryption_iv, $tag);
        return base64_encode($encryption . '::' . $encryption_iv . '::' . $tag);
    }

    /**
     * Decrypt a string.
     *
     * @param  string  $string
     * @return string
     */
    public static function decryptString($string)
    {
        $ciphering = "AES-256-GCM";
        $data = explode('::', base64_decode($string));
        if (count($data) !== 3) {
            throw new \InvalidArgumentException('Invalid encrypted data format');
        }
        list($encryptedData, $decryption_iv, $tag) = $data;
        $decryption_key = env("ENCRYPT_KEY", 'nKHWPqRywS');
        $decryption = openssl_decrypt($encryptedData, $ciphering, $decryption_key, 0, $decryption_iv, $tag);
        if ($decryption === false) {
            throw new \RuntimeException('Decryption failed');
        }
        return $decryption;
    }
}
