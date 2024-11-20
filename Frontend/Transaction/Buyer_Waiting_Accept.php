<html>
<head>
</head>
<body>
<h1> Wait for the Response of the Seller... <h1>

<?php
require('..\..\Backend\include\session-include.php');
require('..\..\Backend\include\dbconnect-include.php');

$username = $_SESSION['username'];
$getid = "Select user_id from _users where username = '$username'";
$fetchid = $connect->query($getid);
$idrow = $fetchid->fetch_assoc();
$buyer = $idrow['user_id'];

$searched_id = $_SESSION['searched_id'];

$getsid = "Select * from _users where user_id = '$searched_id'";
$fetchsid = $connect->query($getsid);
$idsrow = $fetchsid->fetch_assoc();
$sellername = $idsrow['username'];
$seller = $idsrow['user_id'];

echo "Seller: " , "User# " ,$seller ,"<br>";
echo "Seller Username: ",$sellername ,"<br>" ;

$getinvited = "SELECT invited_id FROM _invitesystem WHERE Cuser_id = '$buyer' and Iuser_id = '$seller' ";
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

/*
if ($status == '2') {
    header('location: ..\..\Frontend\Invite\ContractForm.php'); // Redirect to the next page
    exit();
} else {
    // Display waiting message and reload after a few seconds
    echo "<meta http-equiv='refresh' content='5'>"; // Refresh the page every 5 seconds
	
<script type="text/javascript">
        // JavaScript redirect after 5 seconds
        setTimeout(function() {
            window.location.href = 'wallet.php';
        }, 2000); // 5000ms = 5 seconds
</script>
}
*/

?>
<body>
</html>