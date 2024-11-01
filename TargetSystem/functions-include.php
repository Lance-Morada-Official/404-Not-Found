<?php


    function encryptMessage($data, $publicKey){
        // Get the public key .pem file
        $publicKey = file_get_contents('resources/securepay_public_key.pem');

        // Encrypt the data
        openssl_public_encrypt($data, $encryptedMessage, $publicKey);

        // Save or display the encrypted message
        $encryptedMessageBase64 = base64_encode($encryptedMessage);
        echo "Encrypted Message: " . $encryptedMessageBase64 . "\n";
    }
    
?>