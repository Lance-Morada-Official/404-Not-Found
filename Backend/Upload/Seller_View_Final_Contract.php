<?php
require('..\..\Backend\include\session-include.php');
include '..\..\Backend\include\sessionbuyer-include.php';
include '..\..\Backend\include\dbconnect-include.php';

require 'vendor/autoload.php';


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

$getallc = "Select * from _contracts where buyer_id = '$buyerid' and seller_id = '$seller'";
$fetchallc = $connect->query($getallc);
$allrowc = $fetchallc->fetch_assoc();
$contract_id = $allrowc['contract_id'];
$createddate = $allrowc['datecreated'];
$directory = $allrowc['directory'];

	// open data to a CSV file
$csvFile = "{$directory}";

$handle = fopen($csvFile, 'r');

while(($data = fgetcsv($handle, 1000, ",")) !== false){
	list($payment,$duration, $projectdetails,$intellectualproperty,$notes) = $data;
	$name = htmlspecialchars($name);
	$text = htmlspecialchars($text);
	$amount = htmlspecialchars($amount);
	
		$payment = htmlspecialchars($payment);
		$duration = htmlspecialchars($duration);
		$projectdetails = htmlspecialchars($projectdetails);
		$intellectualproperty = htmlspecialchars($intellectualproperty);
		$notes = htmlspecialchars($notes);


// Generate PDF
$pdfContent = "
    <h1>Contract</h1>
	<p><strong>Payment: </strong> $payment</p>
	<p><strong>Duration Date: </strong> $duration</p>
	<p><strong>Project Details: </strong> $projectdetails</p>
	<p><strong>Intelectual Property: </strong> $intellectualproperty</p>
	<p><strong>Notes: </strong> $notes</p>
";

$folder = "../../Backend/Contract/PDFFILES/";
	if (!file_exists($folder)) {
		echo "folder doesn't exist";
	}
	

// Configure Dompdf
$options = new Options();
$options->set('defaultFont', 'Arial');
$dompdf = new Dompdf($options);
$dompdf->loadHtml($pdfContent);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Save the PDF to a file
$pdfOutput = $dompdf->output();
$pdfFilePath = $folder . "buyer_{$buyerid}_seller_{$seller}_{$createddate}.pdf";
file_put_contents($pdfFilePath, $pdfOutput);

// Display the PDF to the user
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=$pdfFilePath");
echo $pdfOutput;

fclose($handle);
}

?>