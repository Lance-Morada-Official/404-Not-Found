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

$getallc = "Select * from _contracts where buyer_id = '$buyerid' and seller_id = '$seller'";
$fetchallc = $connect->query($getallc);
$allrowc = $fetchallc->fetch_assoc();
$contract_id = $allrowc['contract_id'];
$createddate = $allrowc['datecreated'];
$directory = $allrowc['directory'];

$getalles = "Select * from _escrows where contract_id = '$contract_id'";
$fetchalles = $connect->query($getalles);
$allrowe = $fetchalles->fetch_assoc();
$escrow_id = $allrowe['escrow_id'];
$contract_id = $allrowe['contract_id'];
$exp_date = $allrowe['exp_date'];
$payment = $allrowe['payment'];
$file_id = $allrowe['file_id'];
$status = $allrowe['status'];


// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the file is uploaded successfully
    if (isset($_FILES['file-upload']) && $_FILES['file-upload']['error'] === 0) {
		
        $content_title = $_POST['title'] ?? "Untitled";
        
        // Get uploaded file details
        $file = $_FILES['file-upload'];
        $tempPath = $file['tmp_name'];
        $originalFileName = $file['name'];
        $fileType = $file['type'];
        $fileSize = $file['size'];

        // Generate checksum (hash) of the file
        $checksum = hash_file('sha256', $tempPath);

        // Define upload directory (ensure the directory exists and is writable)
        $uploadDir = '../../Backend/Upload/UPLOADSFOLDER/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Create the full path to store the file
        $pathDirectory = $uploadDir . basename($originalFileName);

        // Move the uploaded file to the defined directory
        if (move_uploaded_file($tempPath, $pathDirectory)) {
            // Get current date and time
            $dateTimeUploaded = date('Y-m-d H:i:s');

            // Insert file details into the database
            $query = "INSERT INTO _sellerupload (user_id, art_title, checksum, date_time, pathdirectory) 
                      VALUES (?, ?, ?, ?, ?)";
            
            $stmt = $connect->prepare($query);
            $stmt->bind_param('issss', $seller, $content_title, $checksum, $dateTimeUploaded, $pathDirectory);
            if ($stmt->execute()) {
				$file_id = $stmt->insert_id;
                
				$updateescrowstatus = "UPDATE _escrows SET status = '5', file_id = '$file_id' where contract_id = '$contract_id'";
				$updatestatus = $connect->prepare($updateescrowstatus);
					if($updatestatus->execute()){
					header('location: ..\..\Frontend\Upload\Seller_Uploaded_Waiting_Confirmation.php');
					echo "Success Upload";
			}
				
				
            } else {
                echo "<h3>Error: Unable to save file information to the database.</h3>";
                echo "<p>" . $stmt->error . "</p>";
            }

            $stmt->close();
        } else {
            echo "<h3>Error: Failed to move the uploaded file.</h3>";
        }
    } else {
        echo "<h3>Error: No file uploaded or an upload error occurred.</h3>";
    }
}




?>