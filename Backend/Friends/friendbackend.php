<?php
	//user_id session not working, had to query to get the ID
$username = $_SESSION['username'];
$getid = "Select user_id from _users where username = '$username'";
$fetchid = $connect->query($getid);
$idrow = $fetchid->fetch_assoc();
$Muser_id = $idrow['user_id'];


//see all pending request by other user
$selectallu = "SELECT * FROM _users AS u INNER JOIN _friendsystem AS f ON u.user_id = f.Suser_id WHERE f.status = '1' and f.Ruser_id = '$Muser_id'";
$fetchallp = $connect->query($selectallu);

if(isset($_POST['action'])){
			$sender = $_POST['sender'];
			$action = $_POST['action'];
			
			if($action == 'accept'){
				$asql = "SELECT * FROM _friendsystem WHERE Suser_id = ? AND Ruser_id = ? AND status = '1'";
				$astmt = $connect->prepare($asql);
				$astmt->bind_param("ii", $sender, $Muser_id );  // Reverse because the other user sent the request
				$astmt->execute();
				$result = $astmt->get_result();
				
				if ($result->num_rows > 0) {
				// Update the status to 'accepted'
				$asql_update = "UPDATE _friendsystem SET status = '2',dateconnected = current_timestamp WHERE Suser_id = ? AND Ruser_id = ?";
				$astmt_update = $connect->prepare($asql_update);
				$astmt_update->bind_param("ii", $sender, $Muser_id);
        
				if ($astmt_update->execute()) {
					echo "Friend request accepted.";
					header('location: ..\..\Frontend\Friends\friends.php');
					
				} else {
					echo "Error: " . $connect->error;
				}
				} else {
				echo "No pending friend request found.";
				}
			}
			else if($action == 'decline'){
				$dsql = "SELECT * FROM _friendsystem WHERE Suser_id = ? AND Ruser_id = ? AND status = '1'";
				$dstmt = $connect->prepare($dsql);
				$dstmt->bind_param("ii", $sender, $Muser_id);  // Reverse because the other user sent the request
				$dstmt->execute();
				$result = $dstmt->get_result();
				
				if ($result->num_rows > 0) {
				// Update the status to 'accepted'
				$dsql_update = "UPDATE _friendsystem SET status = '0',dateconnected = current_timestamp WHERE Suser_id = ? AND Ruser_id = ?";
				$dstmt_update = $connect->prepare($dsql_update);
				$dstmt_update->bind_param("ii", $sender, $Muser_id);
        
				if ($dstmt_update->execute()) {
					echo "Friend request declined.";
					header('location: ..\..\Frontend\Friends\friends.php');
				} else {
					echo "Error: " . $connect->error;
				}
				} else {
				echo "No pending friend request found.";
				}
			}
			}

//search a user
$search = NULL;
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
// /*
//see all friends or search specific friend
$selectallf = "SELECT * FROM _users AS u INNER JOIN _friendsystem AS f ON u.user_id = f.Ruser_id where f.Suser_id = '$Muser_id' and f.status = '2' UNION ALL SELECT * FROM _users AS u INNER JOIN _friendsystem AS f ON u.user_id = f.Suser_id where f.Ruser_id = '$Muser_id' and f.status = '2'";

if($search){
	$selectallf = "SELECT * FROM _users AS u INNER JOIN _friendsystem AS f ON u.user_id = f.Ruser_id where f.Suser_id = '$Muser_id' and (u.user_id != '$Muser_id' or u.username != '$username') and (u.user_id = '$search' or u.username = '$search') and f.status = '2' UNION ALL SELECT * FROM _users AS u INNER JOIN _friendsystem AS f ON u.user_id = f.Suser_id where f.Ruser_id = '$Muser_id' and (u.user_id != '$Muser_id' or u.username != '$username') and (u.user_id = '$search' or u.username = '$search') and f.status = '2'";
}
$fetchallf = $connect->query($selectallf);

//Unfriending
if(isset($_POST['unfriend'])){
	$Fuser_id = $_POST['friendid'];
		//check if there existing request
		$invited = $connect->prepare("Select * from _friendsystem where (Suser_id = ? and Ruser_id = ?) or (Suser_id = ? and Ruser_id = ?) ");
		$invited->bind_param("iiii", $Muser_id,$Fuser_id,$Fuser_id,$Muser_id);
		$invited->execute();
		$checkin = $invited->get_result();
		
			if ($checkin->num_rows > 0) {
			$row = $checkin->fetch_assoc();
				if ($row['status'] == '2') {
					$update_status = "UPDATE _friendsystem SET status = '0',dateconnected = current_timestamp where (Suser_id = '$Muser_id' and Ruser_id = '$Fuser_id') or (Suser_id = '$Fuser_id' and Ruser_id = '$Muser_id')";
						if ($connect->query($update_status)){
							echo "Unfriended";
							header('location: ..\..\Frontend\Friends\friends.php');
						}
				}
			}
}
// */
?>