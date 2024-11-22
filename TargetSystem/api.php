<?php
    //receive data from curl.php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = $_POST['data'];        
    }
    require_once 'functions-include-server.php';

    // Get the private key .pem file
    $privateKey = file_get_contents('resources/chainguard_private_key.pem');

    $json = decryptData($data, $privateKey);
    $variables = json_decode($json,true);
    print_r($variables);
    $user_id = $variables['user_id'];
    $amount = $variables['amt'] ;
    $variables['a'] = 0;
    echo json_encode($variables);
    //insert database logic here
?>
