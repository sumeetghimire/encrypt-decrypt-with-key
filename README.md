<!DOCTYPE html>
<html lang="en">


<body>

  <h1>EncryptDecryptWithKey</h1>

  <h2>Laravel EncryptDecryptWithKey Package - Version 1.0.5</h2>
  
  <h3>🚀 Key Generation Fix</h3>
  <p><strong>Fixed Issue:</strong> The package was previously generating new encryption keys on every request, which caused performance issues and potential data corruption.</p>
  
  <p><strong>What was fixed:</strong></p>
  <ul>
    <li>Added key caching to prevent repeated environment variable reads</li>
    <li>Improved service provider to only generate keys once during installation</li>
    <li>Enhanced error handling and key validation</li>
  </ul>

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
  
  <h3>Key Management</h3>
  <ul>
    <li><strong>Automatic Generation:</strong> The package will automatically generate a secure key if none exists</li>
    <li><strong>Key Caching:</strong> Keys are cached in memory for performance</li>
    <li><strong>Key Rotation:</strong> Use <code>EncryptionHelper::clearCache()</code> to clear cached keys when rotating</li>
  </ul>
  
  <p>In .env key will be auto generated change as per your requirement</p>
  <code>
    <pre>
      ENCRYPT_KEY=8141b227d15377e8249b4c2cd42df4a7
  </pre>
</code>
</body>

</html>
