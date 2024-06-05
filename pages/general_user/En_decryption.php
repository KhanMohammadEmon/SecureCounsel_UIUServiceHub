<?php
function simpleEncrypt($plaintext, $key) {
    $keyLength = strlen($key);
    $encryptedText = '';

    for ($i = 0; $i < strlen($plaintext); $i++) {
        $encryptedText .= chr(ord($plaintext[$i]) + ord($key[$i % $keyLength]));
    }

    return base64_encode($encryptedText);
}


function simpleDecrypt($encryptedText, $key) {
    $encryptedText = base64_decode($encryptedText);
    $keyLength = strlen($key);
    $decryptedText = '';

    for ($i = 0; $i < strlen($encryptedText); $i++) {
        $decryptedText .= chr(ord($encryptedText[$i]) - ord($key[$i % $keyLength]));
    }

    return $decryptedText;
}
?>