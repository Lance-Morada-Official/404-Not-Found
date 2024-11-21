<?php
$username = $_SESSION['username'];
$getid = "Select user_id from _users where username = '$username'";
$fetchid = $connect->query($getid);
$idrow = $fetchid->fetch_assoc();
$buyer = $idrow['user_id'];

$seller_id = $_SESSION['seller_id'];
$getsid = "Select * from _users where user_id = '$seller_id'";
$fetchsid = $connect->query($getsid);
$idsrow = $fetchsid->fetch_assoc();
$sellername = $idsrow['username'];
$sellerid = $idsrow['user_id'];
$selleremail = $idsrow['email'];
$sellerphone = $idsrow['phone_num'];

if (isset($_POST['confirm'])){
	$payment = $_POST['paidbox'];
	$duration = $_POST['durationbox'];
	$projectdetails = $_POST['projectdetails'];
	$intellectualproperty = $_POST['intellectualproperty'];
	$notes = $_POST['notes'];
	
	$folder = "../../Backend/Contract/CSVFILES/"; // Define the folder name
	$createdate = date('Y-m-d H:i:s'); // Current timestamp

	// Check if the folder exists; if not, create it
	if (!file_exists($folder)) {
		mkdir($folder, 0777, true); // Create the folder with permissions
	}
	
	$csvFile = $folder . "buyer_{$buyer}_seller_{$sellerid}_" .time() . ".csv";
	$handle = fopen($csvFile, 'a');
	fputcsv($handle, [$payment,$duration, $projectdetails,$intellectualproperty,$notes ]);
	fclose($handle);
	
	
	$savedirectory = $connect->prepare("UPDATE _contracts SET directory = ? where (buyer_id = ? and seller_id = ?)");
	$savedirectory->bind_param("sii",$csvFile,$buyer,$sellerid);
	
	
	$getidc = "Select contract_id from _contracts where buyer_id = '$buyer' and seller_id = '$sellerid'";
	$fetchidc = $connect->query($getidc);
	$idrowc = $fetchidc->fetch_assoc();
	$contract_id = $idrowc['contract_id'];
	
	if($savedirectory->execute()){
		
		$updateescrowstatus = "UPDATE _escrows SET status = '2' where contract_id = '$contract_id'";
		$updatestatus = $connect->prepare($updateescrowstatus);
			if($updatestatus->execute()){
				header('location: ../../Frontend/Contract/Buyer_Wait_Seller_Respond_Contract.php');
				echo "Success Make Contract";
			}
	}
}


?>