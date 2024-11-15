<?php
//verify login
function Verifylogin($connect,$Username,$Password){
	$sql = "Select * from _users where BINARY username = '$Username' and BINARY password = '$Password'";
	$result = $connect->query($sql);
    if ($result->num_rows > 0) {
		$getid = "SELECT user_id FROM _users WHERE username = '$Username'";
		$idresult = $connect->query($getid);
		
		if ($user_row = $idresult->fetch_assoc()) {
			$user_id = $user_row['user_id'];
		} else {
			die("User not found.");
		}
		$getrole = "SELECT role_id FROM users_roles WHERE user_id = '$user_id'";
		$roleidresult = $connect->query($getrole);
		
		if ($role_row = $roleidresult->fetch_assoc()) {
			$role_id = $role_row['role_id'];
			if($role_id == '1'){
				echo "Login successful as User!";
				$_SESSION['username'] = $Username;
				$_SESSION['user_id'] = $user_id;
				header('Location: ..\..\Frontend\Home\Home.php');
				return true;
				exit();
			}
			elseif($role_id == '2'){
				echo "Login successful as Admin!";
				$_SESSION['username'] = $Username;
				$_SESSION['user_id'] = $user_id;
				return true;
				exit();
			}
			// can add other roles if ever..
		}
    }
	else {
		header("Location: ..\..\Frontend\Login\LoginPage.php?error=account_not_found");
		return false;
		exit();
	}
}

//signing up users
function Inserttouser($connect,$username,$firstname,$lastname, $confirm_password, $email, $phone_number){
	$stmt = $connect->prepare("INSERT INTO _users (username, fname, lname, password, email, phone_num) VALUES (? , ? , ? , ? , ? , ?)");
	$stmt->bind_param("sssssi", $username,$firstname,$lastname, $confirm_password, $email, $phone_number);
        
        if($stmt->execute()){
            $user_id = $stmt->insert_id; // Get the ID of the newly created user
            
            // Insert card data into cards table
            $stmt = $connect->prepare("INSERT INTO users_roles (user_id) VALUES (?)");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
			
			$stmt = $connect->prepare("INSERT INTO _wallet (user_id) VALUES (?)");
            $stmt->bind_param("i", $user_id);
			$stmt->execute();
			
			header('location: ..\..\Frontend\Signup\successfulsignup.php');
        }
		else{
            header('location: SignUpPage.php');
			$stmt->error;
        }
	//close statement
	$stmt->close();
}

//encrypt
function encryptData($data, $publicKey){
	// Get the public key .pem file
	$publicKey = file_get_contents('resources/chainguard_public_key.pem');

	// Encrypt the data
	openssl_public_encrypt($data, $encryptedData, $publicKey);

	// Save the encrypted data to base64 to survive transport layers that are not 8-bit clean
	$encryptedDataBase64 = base64_encode($encryptedData);
	echo "Encrypted Data: " . $encryptedDataBase64 . "\n";
}

//decrypt
function decryptData($encryptedDataBase64, $privateKey){
	// Get the private key .pem file
	$privateKey = file_get_contents('resources/chainguard_private_key.pem');

	// Decode the base64 encrypted data
	$encryptedData = base64_decode($encryptedDataBase64);

	// Decrypt the data
	openssl_private_decrypt($encryptedData, $decryptedData, $privateKey);

	// Display the decrypted data
	echo "Decrypted Data: " . $decryptedData . "\n";
}

//request server public key
?>