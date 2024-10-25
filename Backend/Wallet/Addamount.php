<?php
//Get the username from the session
$username = $_SESSION['username'];
//fetch the usernames userid
$getuid = "SELECT user_id FROM _users WHERE username = '$username'";
$fetchid = $connect->query($getuid);
$idrow = $fetchid->fetch_assoc();
$user_id = $idrow['user_id'];


//get the amount to be added
if(isset($_POST['submit'])){
	$addamount = htmlspecialchars($_POST['amount']);
	//fetch the wallet binded to the user
	$getwid = "SELECT wallet_id FROM _wallet WHERE user_id = '$user_id'";
	$fetchwid = $connect -> query($getwid);

	if ($wallet_row = $fetchwid->fetch_assoc()) {
		$wallet_id = $wallet_row['wallet_id'];
	}
	//update the amount
	$getamount= "UPDATE _wallet SET amount = amount + $addamount WHERE wallet_id = '$wallet_id'";
	$amount = $connect->query($getamount);
	header('location: ..\..\Frontend\Wallet\successfuladd.php');
}


?>