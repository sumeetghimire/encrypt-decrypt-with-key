<?php

namespace SumeetGhimire\EncryptDecryptWithKey;

class EncryptionHelper
{
    /**
     * Cached encryption key to prevent repeated environment reads
     */
    private static $cachedKey = null;
    
    /**
     * Get the encryption key, caching it for performance
     */
    private static function getEncryptionKey()
    {
        if (self::$cachedKey === null) {
            // Use getenv directly to avoid Laravel dependency issues
            $rawKey = getenv("ENCRYPT_KEY");
            
            if (!$rawKey) {
                throw new \RuntimeException('ENCRYPT_KEY is not set in the environment. Please set it in your .env file.');
            }
            
            // Cache the decoded key
            self::$cachedKey = base64_decode($rawKey);
        }
        
        return self::$cachedKey;
    }

    /**
     * Encrypt a string.
     *
     * @param  string  $string
     * @return string
     */
    public static function encryptString($string)
    {
        $ciphering = "AES-256-GCM";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $encryption_iv = openssl_random_pseudo_bytes($iv_length);

        $encryption_key = self::getEncryptionKey();

        $encryption = openssl_encrypt($string, $ciphering, $encryption_key, 0, $encryption_iv, $tag);

        return base64_encode(json_encode([
            'data' => $encryption,
            'iv' => base64_encode($encryption_iv),
            'tag' => base64_encode($tag),
        ]));
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
        $decoded = json_decode(base64_decode($string), true);

        if (
            !is_array($decoded) ||
            !isset($decoded['data'], $decoded['iv'], $decoded['tag'])
        ) {
            throw new \InvalidArgumentException('Invalid encrypted data format.');
        }

        $encryptedData = $decoded['data'];
        $decryption_iv = base64_decode($decoded['iv']);
        $tag = base64_decode($decoded['tag']);

        $decryption_key = self::getEncryptionKey();

        $decryption = openssl_decrypt($encryptedData, $ciphering, $decryption_key, 0, $decryption_iv, $tag);

        if ($decryption === false) {
            throw new \RuntimeException('Decryption failed.');
        }

        return $decryption;
    }
    
    /**
     * Clear the cached key (useful for testing or key rotation)
     */
    public static function clearCache()
    {
        self::$cachedKey = null;
    }
}
