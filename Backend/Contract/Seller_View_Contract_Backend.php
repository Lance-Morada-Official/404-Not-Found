<?php
require 'vendor\autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

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

if(isset($_POST['action'])){
			$action = $_POST['action'];
			
			if($action == 'send'){
				$payment = $_POST['paidbox'];
				$duration = $_POST['durationbox'];
				$projectdetails = $_POST['projectdetails'];
				$intellectualproperty = $_POST['intellectualproperty'];
				$notes = $_POST['notes'];
				
				$getdir = "Select directory from _contracts where buyer_id = '$buyerid' and seller_id = '$seller'";
				$fetchdir= $connect->query($getdir);
				$dirrow = $fetchdir->fetch_assoc();
				$directory = $dirrow['directory'];

				$csvFile = "{$directory}";
				$handle = fopen($csvFile, 'w');
				fputcsv($handle, [$payment,$duration, $projectdetails,$intellectualproperty,$notes ]);
				fclose($handle);
				
				$updateescrowstatus = "UPDATE _escrows SET status = '3' where contract_id = '$contract_id'";
				$updatestatus = $connect->prepare($updateescrowstatus);
					if($updatestatus->execute()){
						header('location: ..\..\Frontend\Contract\Seller_Wait_Confirm_Of_Edited_Contract.php');
					}
			}
			else if($action == 'accept'){
				$payment = $_POST['paidbox'];
				$duration = $_POST['durationbox'];
				$projectdetails = $_POST['projectdetails'];
				$intellectualproperty = $_POST['intellectualproperty'];
				$notes = $_POST['notes'];
				
				$getdir = "Select directory from _contracts where buyer_id = '$buyerid' and seller_id = '$seller'";
				$fetchdir= $connect->query($getdir);
				$dirrow = $fetchdir->fetch_assoc();
				$directory = $dirrow['directory'];

				$csvFile = "{$directory}";
				$handle = fopen($csvFile, 'w');
				fputcsv($handle, [$payment,$duration, $projectdetails,$intellectualproperty,$notes ]);
				fclose($handle);
				
				
				//chesum the directory (hashed)
				$getdir = "Select directory from _contracts where buyer_id = '$buyerid' and seller_id = '$seller'";
				$fetchdir= $connect->query($getdir);
				$dirrow = $fetchdir->fetch_assoc();
				$directory = $dirrow['directory'];

				
				// Path to the file you want to hash
				$filePath = "{$directory}";

				// Check if the file exists
				if (!file_exists($filePath)) {
					die("File does not exist: $filePath");
				}

				// Generate a checksum for the file using SHA-256
				$checksum = hash_file('sha256', $filePath);

				$updatechecksum = "UPDATE _contracts SET checksum = '$checksum' where buyer_id = '$buyerid' and seller_id = '$seller'";
				$updatec = $connect->prepare($updatechecksum);
				$updatec->execute();
				
				
				//make a pdf file then save to PDF Folder of the csvFile
				$folder = "../../Backend/Contract/PDFFILES/"; // Define the folder name

				// Check if the folder exists; if not, create it
				if (!file_exists($folder)) {
					mkdir($folder, 0777, true); // Create the folder with permissions
				}
				
				// Generate PDF
				$pdfContent = "
					<h1>Contract</h1>
					<p><strong>Payment: </strong> $payment</p>
					<p><strong>Duration Date: </strong> $duration</p>
					<p><strong>Project Details: </strong> $projectdetails</p>
					<p><strong>Intelectual Property: </strong> $intellectualproperty</p>
					<p><strong>Notes: </strong> $notes</p>
				";

				// Configure Dompdf
				$options = new Options();
				$options->set('defaultFont', 'Arial');
				$dompdf = new Dompdf($options);
				$dompdf->loadHtml($pdfContent);
				$dompdf->setPaper('A4', 'portrait');
				$dompdf->render();
				
				$timestamp = date('Y-m-d_H-i-s');

				// Save the PDF to a file
				$pdfOutput = $dompdf->output();
				$pdfFilePath = $folder . "buyer_{$buyerid}_seller_{$seller}_{$timestamp}.pdf";
				file_put_contents($pdfFilePath, $pdfOutput);
				
				/*$updatedate = "UPDATE _contracts SET directory = '$pdfFilePath' where buyer_id = '$buyerid' and seller_id = '$seller'";
				$updated = $connect->prepare($updatedate);
				$updated->execute();
				
				// Path to the file you want to hash
				$filePath = "{$pdfFilePath}";

				// Check if the file exists
				if (!file_exists($filePath)) {
					die("File does not exist: $filePath");
				}

				// Generate a checksum for the file using SHA-256
				$checksum = hash_file('sha256', $filePath);
				
				$updatechecksum = "UPDATE _contracts SET checksum = '$checksum' where buyer_id = '$buyerid' and seller_id = '$seller'";
				$updatec = $connect->prepare($updatechecksum);
				$updatec->execute();*/
/*
				// Display the PDF to the user
				header("Content-type: application/pdf");
				header("Content-Disposition: inline; filename=$pdfFilePath");
				echo $pdfOutput;
*/
				
				//minus the payment to buyers account
				$updatepayment = "UPDATE _escrows SET payment = '$payment' where contract_id = '$contract_id'";
				$updatedp = $connect->prepare($updatepayment);
				if($updatedp->execute()){
				
					$getwid = "SELECT wallet_id FROM _wallet WHERE user_id = '$buyerid'";
					$fetchwid = $connect -> query($getwid);
					
					if ($wallet_row = $fetchwid->fetch_assoc()) {
						$wallet_id = $wallet_row['wallet_id'];
						
						$getamount= "UPDATE _wallet SET amount = amount - $payment WHERE wallet_id = '$wallet_id'";
						$deductedamount = $connect->query($getamount);
					}
					
					
					
				}
				
				// declare the expirydate
				$updatedate = "UPDATE _escrows SET exp_date = '$duration' where contract_id = '$contract_id'";
				$updated = $connect->prepare($updatedate);
				$updated->execute();
				
				
				// declate date created
				$updatedate = "UPDATE _contracts SET datecreated = '$timestamp' where buyer_id = '$buyerid' and seller_id = '$seller'";
				$updated = $connect->prepare($updatedate);
				$updated->execute();
				
				//update status to 4
				$updateescrowstatus = "UPDATE _escrows SET status = '4' where contract_id = '$contract_id'";
				$updatestatus = $connect->prepare($updateescrowstatus);
					if($updatestatus->execute()){
						header('location: ..\..\Frontend\Upload\Seller_Upload.php'); //go to upload
					}
				
			}
			
		}

?>