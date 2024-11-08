<?php
//verify login
function Verifylogin($connect,$Username,$Password){
	//and BINARY password = '$hashpassword'
	
	$getall = $conn->prepare("Select * from _users where BINARY username = ? ");
	$getall->bind_param("s", $Username);
	$getall->execute();
	$resultall = $getall->get_result();
	$alldata = $resultall->fetch_assoc();
	
    if ($alldata->num_rows > 0) {
		
		$gethash = $conn->prepare("Select password from _users where BINARY username = ? ");
		$gethash->bind_param("s", $Username);
		$gethash->execute();
		$fetchhash = $gethash->get_result();
		$hash_row = $fetchhash->fetch_assoc()
		$storedhash = $hash_row['password'];
		
		if(password_verify($Password,$storedhash)){
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
	else {
		header("Location: ..\..\Frontend\Login\LoginPage.php?error=account_not_found");
		return false;
		exit();
	}
}

//example of using prepared statement not only by inserting

// Database connection (replace with your actual database credentials)
$servername = "localhost";
$dbUsername = "your_username";
$dbPassword = "your_password";
$dbName = "testdb";

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// User-provided data
$userInputUsername = 'user1'; // This would typically come from a login form

// Prepare the SELECT query
$stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
$stmt->bind_param("s", $userInputUsername); // "s" specifies the variable type (string)

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Fetch the hashed password from the result
if ($row = $result->fetch_assoc()) {
    $hashedPassword = $row['password'];
    // Now you can use password_verify to check if the provided password matches
    echo "User found! Ready to verify password.";
} else {
    echo "User not found.";
}

// Close statement and connection
$stmt->close();
$conn->close();


?>