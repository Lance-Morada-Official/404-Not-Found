<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$con = new mysqli("localhost","root","alanrussel0503","BCDatabase");
	if($con->connect_error){
		die("Failed to Connect: ".$con->connect_error);
	}
		$stmt = $con->prepare("select * from _admin where username = ?");
		$stmt->bind_param("s",$username);
		$stmt->execute();
		$stmt_result = $stmt->get_result();
		if($stmt_result->num_rows > 0){
			$data = $stmt_result->fetch_assoc();
			if($data['password']  === $password){
				echo "Login successfully, Welcome " . htmlspecialchars($username);

			}
			else{
			echo "<h2>Invalid Username or Password</h2>";
			}
		}
		else{
			echo "<h2>Invalid Username or Password</h2>";
		}


?>