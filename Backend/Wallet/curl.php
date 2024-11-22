<?php
    include('..\include\functions-include.php');
    // URL of the target domain where you want to send data
    $url = "http://localhost/ChainGuardMain/TargetSystem/api.php";
    $publicKey = file_get_contents('..\include\resources\chainguard_public_key.pem');
    //create array to store variables

    /* remove this comment for deployment version
    $variables = array(
        'user_id' => $_SESSION['user_id'],
        'amt' => $_POST['amount']
    );
    */
    //test version array
    $variables = array(
        'user_id' => '1',
        'amt' => '1000'
    );

    $json = json_encode($variables);

    //encrypt the array
    $enc_arr = encryptData($json,$publicKey);
    //configure curl options and save array as a header
    $data = array(
        'data' => $enc_arr
    );

    //initialize curl
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    // Execute the cURL session
    $response = curl_exec($ch);
    
    // Check for errors
    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
    } else {
        // Handle the response        
        echo "Response from target domain: " . $response;

    }

    // Close cURL session
    curl_close($ch);
?>