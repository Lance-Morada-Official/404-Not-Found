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

if ($status == '6') {
			echo "<meta http-equiv='refresh' content='5'>";
            echo "Status: Transaction Finished";
			//header('location: ..\..\Frontend\Upload\Seller_Payment_Success.php');
			
			
        }
		elseif ($status == '5') {
			echo "<meta http-equiv='refresh' content='5'>";
        }elseif ($status == '1') {
			echo "Status: Enter Dispute Resolution System";
			echo "<meta http-equiv='refresh' content='5'>";
			//header('location: ..\..\Frontend\Upload\Seller_Wait_Contract_Of_Buyer.php');
        }

?>