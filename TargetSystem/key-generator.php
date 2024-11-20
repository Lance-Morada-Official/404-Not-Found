<?php

    //generate a new key resource instance
    $config = [
        "digest_alg" => "sha256",
        "private_key_bits" => 2048,
        "private_key_type" => OPENSSL_KEYTYPE_RSA,
    ];
    $resource = openssl_pkey_new($config);

    //extract the private key from the resource
    openssl_pkey_export($resource, $privateKey);
    echo "Private key: <br> $privateKey <br>";

    //save the private key in a .pem file
    file_put_contents('resources/securepay_private_key.pem', $privateKey);

    //extract the public key from the resource
    $publicKey = openssl_pkey_get_details($resource)['key'];
    echo "Public key: <br> $publicKey <br>";

    //save the public key in a .pem file
    file_put_contents('resources/securepay_public_key.pem', $publicKey);

    echo "Public and Private keys successfully generated and saved.\n";
?>