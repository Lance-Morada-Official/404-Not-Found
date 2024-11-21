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


	
	$getstatus = " SELECT status FROM _escrows AS e INNER JOIN _contracts AS c ON e.contract_id = c.contract_id where (c.buyer_id = '$buyerid' and c.seller_id = '$seller')";
	$getstatus = $connect->query($getstatus);
	$fetchstatus = $getstatus->fetch_assoc();
	//$status = $fetchstatus['status'];
	
	if ($fetchstatus['status'] == '2') {
			echo "<meta http-equiv='refresh' content='5'>";
            echo "Status: Contract Ready for Viewing";
			header('location: ..\..\Frontend\Contract\Seller_View_Contract.php');
			
			
        }
		elseif ($fetchstatus['status'] == '1') {
			echo "<meta http-equiv='refresh' content='5'>";
        }

?>