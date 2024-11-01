<?php
    require_once 'functions-include.php';

    // Get the public key .pem file
    $publicKey = file_get_contents('resources/securepay_public_key.pem');

    // Get the private key .pem file
    $privateKey = file_get_contents('resources/securepay_private_key.pem');
?>
<DOCTYPE html>
<html>
    <head>
        <title>Secure Pay</title>
    </head>
    <body>

        <?php
            if(isset($_POST['Encrypt'])){
                encryptData($_POST['encrypt_message'], $publicKey);
            }else{
                decryptData($_POST['decrypt_message'], $privateKey);
            }
        ?>

        <h1>Secure Pay</h1><br>
        <h2>Encrypt</h2><br>
        <form action="index.php" method="POST">
            <label for="encrypt_message">Message: </label>
            <input type="text" name="encrypt_message" id="encrypt_message">

            <input type="submit" name="encrypt" value="Encrypt">
        </form>

        <h1>Secure Pay</h1><br>
        <h2>Decrypt</h2><br>
        <form action="index.php" method="POST">
            <label for="decrypt_message">Message: </label>
            <input type="text" name="decrypt_message" id="decrypt_message">

            <input type="submit" name="decrypt" value="Decrypt">
        </form>
    </body>
</html>