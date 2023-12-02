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

        // Generating a default encryption key if it doesn't exist
        if (!config('encrypt-decrypt.key')) {
            $this->generateDefaultEncryptionKey();
        }
        
        // Additional boot logic can be added here
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
     *
     * @return void
     */
    protected function generateDefaultEncryptionKey()
    {
        $key = bin2hex(random_bytes(16));

        file_put_contents(base_path('.env'), PHP_EOL . "ENCRYPT_KEY={$key}", FILE_APPEND);

        config(['encrypt-decrypt.key' => $key]);
    }
}
