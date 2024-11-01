<?php


    function encryptData($data, $publicKey){
        // Get the public key .pem file
        $publicKey = file_get_contents('resources/securepay_public_key.pem');

        // Encrypt the data
        openssl_public_encrypt($data, $encryptedData, $publicKey);

        // Save the encrypted data to base64 to survive transport layers that are not 8-bit clean
        $encryptedDataBase64 = base64_encode($encryptedData);
        echo "Encrypted Data: " . $encryptedDataBase64 . "\n";
    }

    function decryptData($privateKey, $encryptedDataBase64){
        // Get the private key .pem file
        $privateKey = file_get_contents('resources/securepay_private_key.pem');

        // Decode the base64 encrypted data
        $encryptedData = base64_decode($encryptedDataBase64);

        // Decrypt the data
        openssl_private_decrypt($encryptedData, $decryptedData, $privateKey);

        // Display the decrypted data
        echo "Decrypted Data: " . $decryptedData . "\n";
    }
    
?>