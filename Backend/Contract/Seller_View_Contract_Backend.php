<?php
$username = $_SESSION['username'];
$getid = "Select user_id from _users where username = '$username'";
$fetchid = $connect->query($getid);
$idrow = $fetchid->fetch_assoc();
$seller = $idrow['user_id'];

$buyer_id = $_SESSION['buyer_id'];
$getsid = "Select * from _users where user_id = '$buyer_id'";
$fetchsid = $connect->query($getsid);
$idsrow = $fetchsid->fetch_assoc();
$buyername = $idsrow['username'];
$buyerid = $idsrow['user_id'];
$buyeremail = $idsrow['email'];
$buyerphone = $idsrow['phone_num'];

$getidc = "Select contract_id from _contracts where buyer_id = '$buyerid' and seller_id = '$seller'";
$fetchidc = $connect->query($getidc);
$idrowc = $fetchidc->fetch_assoc();
$contract_id = $idrowc['contract_id'];

	
	$getdir = "Select directory from _contracts where buyer_id = '$buyerid' and seller_id = '$seller'";
	$fetchdir= $connect->query($getdir);
	$dirrow = $fetchdir->fetch_assoc();
	$directory = $dirrow['directory'];

	$csvFile = "{$directory}";

	$handle = fopen($csvFile, 'r');

	while(($data = fgetcsv($handle, 1000, ",")) !== false){
		list($payment,$duration, $projectdetails,$intellectualproperty,$notes) = $data;
		
	}
		$payment = htmlspecialchars($payment);
		$duration = htmlspecialchars($duration);
		$projectdetails = htmlspecialchars($projectdetails);
		$intellectualproperty = htmlspecialchars($intellectualproperty);
		$notes = htmlspecialchars($notes);
	
		fclose($handle);

?>