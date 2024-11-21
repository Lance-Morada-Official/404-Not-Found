<?php

//user_id session not working, had to query to get the ID
$username = $_SESSION['username'];
$getid = "Select user_id from _users where username = '$username'";
$fetchid = $connect->query($getid);
$idrow = $fetchid->fetch_assoc();
$Muser_id = $idrow['user_id'];



//search a user
$search = NULL;
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

//see all friends or search specific friend
$selectallf = "SELECT * FROM _users AS u INNER JOIN _friendsystem AS f ON u.user_id = f.Ruser_id where f.Suser_id = '$Muser_id' and f.status = '2' UNION ALL SELECT * FROM _users AS u INNER JOIN _friendsystem AS f ON u.user_id = f.Suser_id where f.Ruser_id = '$Muser_id' and f.status = '2'";

if($search){
	$selectallf = "SELECT * FROM _users AS u INNER JOIN _friendsystem AS f ON u.user_id = f.Ruser_id where f.Suser_id = '$Muser_id' and (u.user_id != '$Muser_id' or u.username != '$username') and (u.user_id = '$search' or u.username = '$search') and f.status = '2' UNION ALL SELECT * FROM _users AS u INNER JOIN _friendsystem AS f ON u.user_id = f.Suser_id where f.Ruser_id = '$Muser_id' and (u.user_id != '$Muser_id' or u.username != '$username') and (u.user_id = '$search' or u.username = '$search') and f.status = '2'";
}
$fetchallf = $connect->query($selectallf);


//inviting
if(isset($_POST['invite'])){
	$Iuser_id = $_POST['searched_id'];
	$_SESSION["seller_id"] = $Iuser_id;
	
	//check if there existing invite request
	
	$invited = $connect->prepare("Select * from _invitesystem where (Cuser_id = ? and Iuser_id = ?) or (Cuser_id = ? and Iuser_id = ?)  ");
	$invited->bind_param("iiii", $Muser_id,$Iuser_id,$Iuser_id,$Muser_id);
	$invited->execute();
	$checkin = $invited->get_result();
	
	if ($checkin->num_rows > 0) {
        $row = $checkin->fetch_assoc();
        if ($row['status'] == '2') {
			
			//or(c.buyer_id = '$Iuser_id' and c.seller_id = '$Muser_id')
			
			$statusescrow = $connect->prepare("SELECT status FROM _escrows AS e INNER JOIN _contracts AS c ON e.contract_id = c.contract_id where (c.buyer_id = ? and c.seller_id = ?) or(c.buyer_id = ? and c.seller_id = ?) ");
			$statusescrow->bind_param("iiii", $Muser_id,$Iuser_id,$Iuser_id,$Muser_id);
			$statusescrow->execute();
			$checkes = $statusescrow->get_result();
			
			if ($checkes->num_rows > 0) {
				$row = $checkes->fetch_assoc();
					if ($row['status'] == '1' || $row['status'] == '2' || $row['status'] == '3'|| $row['status'] == '4' || $row['status'] == '5') {
						echo "Transaction is On-going";
						header("Location: ..\..\Frontend\Invite\invite.php?error=transaction_pending");
					}
			}
			
        } elseif ($row['status'] == '1') {
            echo "Invite request is already pending.";
			header("Location: ..\..\Frontend\Invite\invite.php?error=invite_pending");
        } elseif ($row['status'] == '0') {
            // update invite data to waiting invite (0)
			$update_istatus = "UPDATE _invitesystem SET status = '1' where (Cuser_id = '$Muser_id' and Iuser_id = '$Iuser_id') or (Cuser_id = '$Iuser_id' and Iuser_id = '$Muser_id')";
						if ($connect->query($update_istatus)){
							echo "Updated";
							header ('location: ..\..\Frontend\Contract\Buyer_Waiting_Accept.php');
						}
        }
    } else {
		$invited = $connect->prepare("Insert into _invitesystem (Cuser_id,Iuser_id) values (?,?)");
		$invited->bind_param("ii", $Muser_id,$Iuser_id);
		if($invited->execute()){
			header('location: ..\..\Frontend\Contract\Buyer_Waiting_Accept.php');
		}else{
			echo "Failed to Invite" . $connect->error;
		}
	}
}

?>