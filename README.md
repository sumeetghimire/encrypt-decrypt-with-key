<!DOCTYPE html>
<html lang="en">


<body>

  <h1>EncryptDecryptWithKey</h1>

  <h2>Laravel EncryptDecryptWithKey Package</h2>

  <h3>Configuration</h3>
  <p>You can customize the package configuration by modifying the <code>config/encrypt-decrypt.php</code> file.</p>

  <h3>License</h3>
  <p>The Laravel EncryptDecryptWithKey package is open-sourced software licensed under the MIT license.</p>

  <h3>Support</h3>
  <p>For any issues or suggestions, please open an issue on <a href="https://github.com/sumeetghimire/encrypt-decrypt-with-key">GitHub</a>.</p>

  <h3>Credits</h3>
  <p>This package is maintained by Sumeet Ghimire.</p>

  <h2>Laravel</h2>

  <p>Require this package in your <code>composer.json</code> and update composer.</p>

<pre class="notranslate"><code>composer require sumeetghimire/encrypt-decrypt-with-key</code></pre>

  <h2>Example How to use</h2>
  <code><pre>
    use SumeetGhimire\EncryptDecryptWithKey\EncryptionHelper;
    $encryptedString = EncryptionHelper::encryptString('test');
    $decryptedString = EncryptionHelper::decryptString($encryptedString);
    return $decryptedString; // Returns 'test'
  </pre>
</code>

  <p>In .env key will be auto generated change as per your requirement</p>
  <code>
    <pre>
      ENCRYPT_KEY=8141b227d15377e8249b4c2cd42df4a7
  </pre>
</code>

</body>

</html>
