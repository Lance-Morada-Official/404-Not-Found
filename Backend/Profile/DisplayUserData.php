<?php
//Get the username from the session
$username = $_SESSION['username'];

//query to retrieve the user detail
$query = "SELECT user_id,username,fname,lname, email, phone_num FROM _users WHERE username = '$username'";
$result = $connect->query($query);
if ($row = mysqli_fetch_assoc($result)) {
	$user_id = $row['user_id'];
    $user_name = $row['username'];
	$first_name = $row['fname'];
    $last_name = $row['lname'];
	$email = $row['email'];
    $phone_num = $row['phone_num'];
} else {
    echo "User details not found.";
}

$connect->close();
?>