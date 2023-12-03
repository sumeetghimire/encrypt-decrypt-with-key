<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use SumeetGhimire\EncryptDecryptWithKey\EncryptionHelper;

class ExampleTest extends TestCase
{
    /**
     * A basic feature test example test.
     *
     * @return void
     */
    public function test_example()
    {
        // Encrypt a string
        $originalString = 'Hello, Laravel!';
        $encryptedString = EncryptionHelper::encryptString($originalString);

        // Decrypt the string
        $decryptedString = EncryptionHelper::decryptString($encryptedString);

        // Assert that the decrypted string matches the original string
        $this->assertEquals($originalString, $decryptedString);
    }
}
