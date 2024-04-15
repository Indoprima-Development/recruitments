<?php

//$jsonString --> string of json which will be decode to object again
function JsonDecode($jsonString){
    return json_decode($jsonString);
}

//$object --> make object to string of json
function JsonEncode($object){
    return json_encode($object);
}

function EncryptData($data) {
    $key = "ThisIsASecretKey";
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    // Convert binary IV and encrypted data to hexadecimal
    $ivHex = bin2hex($iv);
    $encryptedHex = bin2hex($encrypted);
    return $ivHex . $encryptedHex;
}

// Decryption function
function DecryptData($data) {
    $key = "ThisIsASecretKey";
    // Convert hexadecimal IV and encrypted data back to binary
    $iv = hex2bin(substr($data, 0, 32)); // IV length is 16 bytes (32 hex characters)
    $encrypted = hex2bin(substr($data, 32));
    return openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, $iv);
}

function EncryptKTP($creditCardNumber) {
    // Mask the digits except the first 6 and last 2
    $masked = substr($creditCardNumber, 0, 6) . str_repeat('*', 6) . substr($creditCardNumber, -2);
    return $masked;
}
