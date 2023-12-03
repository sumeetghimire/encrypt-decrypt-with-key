<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      line-height: 1.6;
      margin: 20px;
    }

    h1,
    h2,
    h3 {
      color: #333;
    }

    code {
      color: #d9534f;
      background-color: #f2dede;
      padding: 2px 5px;
      border-radius: 4px;
    }
  </style>
  <title>EncryptDecryptWithKey</title>
</head>

<body>

  <h1>EncryptDecryptWithKey</h1>

  <h2>Laravel EncryptDecryptWithKey Package</h2>

  <h3>Configuration</h3>
  <p>You can customize the package configuration by modifying the <code>config/encrypt-decrypt.php</code> file.</p>

  <h3>License</h3>
  <p>The Laravel EncryptDecryptWithKey package is open-sourced software licensed under the MIT license.</p>

  <h3>Support</h3>
  <p>For any issues or suggestions, please open an issue on <a href="https://github.com/your-username/encrypt-decrypt-with-key">GitHub</a>.</p>

  <h3>Credits</h3>
  <p>This package is maintained by Sumeet Ghimire.</p>

  <h2>Laravel</h2>

  <p>Require this package in your <code>composer.json</code> and update composer.</p>

  <code>composer require sumeetghimire/encrypt-decrypt-with-key</code>

  <h2>Example How to use</h2>

  <code>
    use SumeetGhimire\EncryptDecryptWithKey\EncryptionHelper;

    $encryptedString = EncryptionHelper::encryptString('test');
    $decryptedString = EncryptionHelper::decryptString($encryptedString);

    return $decryptedString; // Returns 'test'
  </code>

  <p>Feel free to replace the GitHub link with your actual repository link.</p>

</body>

</html>
