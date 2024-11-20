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

/*echo "Seller: " , "User# " ,$seller ,"<br>";
echo "Seller Username: ",$sellername ,"<br>" ;*/

$getinvited = "SELECT invited_id FROM _invitesystem WHERE Cuser_id = '$buyer' and Iuser_id = '$sellerid' ";
$fetchiid = $connect->query($getinvited);

if($idirow = $fetchiid->fetch_assoc()){;
	$invited_id = $idirow['invited_id'];

	echo "Invitation ID: " , $invited_id ,"<br>";
	
	$getstatus = "SELECT status FROM _invitesystem WHERE invited_id = '$invited_id' ";
	$getstatus = $connect->query($getstatus);
	$fetchstatus = $getstatus->fetch_assoc();
	//$status = $fetchstatus['status'];
	
	if ($fetchstatus['status'] == '2') {
			echo "<meta http-equiv='refresh' content='5'>";
            echo "Status: Accepted";
			header('location: ..\..\Frontend\Contract\Buyer_Contract.php');
			
			
        } elseif ($fetchstatus['status'] == '1') {
            echo "Status: Pending";
			echo "<meta http-equiv='refresh' content='5'>";
        }
}
?>