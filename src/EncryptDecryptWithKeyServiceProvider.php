<?php

namespace Sumeetghimire\EncryptDecryptWithKey;

use Illuminate\Support\ServiceProvider;

class EncryptDecryptWithKeyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishing configuration file
        $this->publishes([
            __DIR__.'/../config/encrypt-decrypt.php' => config_path('encrypt-decrypt.php'),
        ], 'encrypt-decrypt-config');

        // Only generate key once during installation, not on every boot
        if (!$this->app->configurationIsCached() && !config('encrypt-decrypt.key')) {
            $this->generateDefaultEncryptionKey();
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Registering a singleton instance of EncryptionHelper
        $this->app->singleton('encryption-helper', function ($app) {
            return new EncryptionHelper();
        });

        // You can add more bindings or service registrations as needed
    }

    /**
     * Generate a default encryption key and add it to the .env file.
     * This method now only runs once during package installation.
     *
     * @return void
     */
    protected function generateDefaultEncryptionKey()
    {
        // Check if key already exists in .env to prevent multiple generations
        $envPath = base_path('.env');
        if (!file_exists($envPath)) {
            return; // Don't create .env if it doesn't exist
        }
        
        $envContent = file_get_contents($envPath);
        if (strpos($envContent, 'ENCRYPT_KEY=') !== false) {
            return; // Key already exists, don't generate again
        }
        
        // Generate a secure 32-byte key and encode it
        $key = base64_encode(random_bytes(32));
        
        // Append to .env file
        file_put_contents($envPath, PHP_EOL . "ENCRYPT_KEY={$key}", FILE_APPEND);
        
        // Set in config for current request
        config(['encrypt-decrypt.key' => $key]);
        
        // Log that key was generated (optional)
        if (function_exists('info')) {
            info('Generated new ENCRYPT_KEY for encrypt-decrypt package');
        }
    }
}
