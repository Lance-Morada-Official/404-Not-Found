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


	
	$getstatus = " SELECT status FROM _escrows AS e INNER JOIN _contracts AS c ON e.contract_id = c.contract_id where (c.buyer_id = '$buyer' and c.seller_id = '$sellerid')";
	$getstatus = $connect->query($getstatus);
	$fetchstatus = $getstatus->fetch_assoc();
	//$status = $fetchstatus['status'];
	
	if ($fetchstatus['status'] == '3') {
			echo "<meta http-equiv='refresh' content='5'>";
            echo "Status: Contract is being edited";
			header('location: ..\..\Frontend\Contract\Buyer_Wait_Seller_Respond_Contract.php');
			
			
        }
		elseif ($fetchstatus['status'] == '2') {
			echo "<meta http-equiv='refresh' content='5'>";
        }

?>