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

$getidc = "Select contract_id from _contracts where buyer_id = '$buyer' and seller_id = '$sellerid'";
$fetchidc = $connect->query($getidc);
$idrowc = $fetchidc->fetch_assoc();
$contract_id = $idrowc['contract_id'];

	$getdir = "Select directory from _contracts where buyer_id = '$buyer' and seller_id = '$sellerid'";
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
		
	if(isset($_POST['action'])){
			$payment = $_POST['paidbox'];
			$duration = $_POST['durationbox'];
			$projectdetails = $_POST['projectdetails'];
			$intellectualproperty = $_POST['intellectualproperty'];
			$notes = $_POST['notes'];
			$action = $_POST['action'];
			
			if($action == 'send'){
				$getdir = "Select directory from _contracts where buyer_id = '$buyer' and seller_id = '$sellerid'";
				$fetchdir= $connect->query($getdir);
				$dirrow = $fetchdir->fetch_assoc();
				$directory = $dirrow['directory'];

				$csvFile = "{$directory}";
				$handle = fopen($csvFile, 'w');
				fputcsv($handle, [$payment,$duration, $projectdetails,$intellectualproperty,$notes ]);
				fclose($handle);
				
				$updateescrowstatus = "UPDATE _escrows SET status = '2' where contract_id = '$contract_id'";
				$updatestatus = $connect->prepare($updateescrowstatus);
					if($updatestatus->execute()){
						header('location: ..\..\Frontend\Contract\Buyer_Wait_Seller_Respond_Contract.php');
					}
			}
			else if($action == 'accept'){
				//chesum the directory (hashed)
				//make a pdf file of the csvFil
				
				$updateescrowstatus = "UPDATE _escrows SET status = '2' where contract_id = '$contract_id'";
				$updatestatus = $connect->prepare($updateescrowstatus);
					if($updatestatus->execute()){
						header('location: ..\..\Frontend\Contract\Buyer_Wait_Seller_Respond_Contract.php');
					}
				
			}
			
		}

?>