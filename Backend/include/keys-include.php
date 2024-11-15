<?php
    require_once 'functions-include.php';

    // Get the public key .pem file
    $publicKey = file_get_contents('resources/chainguard_public_key.pem');

    // Get the private key .pem file
    $privateKey = file_get_contents('resources/chainguard_private_key.pem');
?>