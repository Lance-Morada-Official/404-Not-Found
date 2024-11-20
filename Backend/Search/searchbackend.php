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

//LEFT JOIN _friendsystem AS f ON u.user_id = f.Ruser_id or , and (f.Suser_id IS NULL or f.Suser_id = '$Muser_id' ) and (f.Ruser_id IS NULL or f.Ruser_id = '$Muser_id' ) and (f.status IS NULL or f.status = '0')
//SELECT * FROM _users AS u INNER JOIN users_roles AS r ON u.user_id = r.user_id where r.role_id = '1' and u.user_id != '$Muser_id'
//SELECT * FROM _users AS u INNER JOIN users_roles AS r ON u.user_id = r.user_id LEFT JOIN _friendsystem AS f ON u.user_id = f.Ruser_id and u.user_id = f.Suser_id WHERE (r.role_id = '1' and u.user_id != '$Muser_id') and (f.Suser_id IS NULL or f.Suser_id = '$Muser_id' ) and ((f.Ruser_id IS NULL or f.Ruser_id = '$Muser_id' ) or (f.Suser_id IS NULL or f.Suser_id = '$Muser_id' ) and (f.status IS NULL or f.status = '0')) 

//see all users or search specific users except admins
$selectallu = " SELECT * FROM _users AS u INNER JOIN users_roles AS r ON u.user_id = r.user_id where r.role_id = '1' and u.user_id != '$Muser_id'" ;
if($search){
	$selectallu = "SELECT * FROM _users AS u INNER JOIN users_roles AS r ON u.user_id = r.user_id  WHERE r.role_id = '1' and (u.user_id != '$Muser_id' or u.username != '$username') and (u.user_id = '$search' or u.username = '$search') "; 
}
$fetchallu = $connect->query($selectallu);

//Adding Friend
if(isset($_POST['addfriend'])){
	$Ruser_id = $_POST['searched_id'];
	//check if there existing request
	$invited = $connect->prepare("Select * from _friendsystem where (Suser_id = ? and Ruser_id = ?) or (Suser_id = ? and Ruser_id = ?) ");
	$invited->bind_param("iiii", $Muser_id,$Ruser_id,$Ruser_id,$Muser_id);
	$invited->execute();
	$checkin = $invited->get_result();
	
	if ($checkin->num_rows > 0) {
        $row = $checkin->fetch_assoc();
        if ($row['status'] == '2') {
            echo "You are already friends with this user.";
			header("Location: ..\..\Frontend\Search\search.php?error=friend_already");
        } elseif ($row['status'] == '1') {
            echo "Friend request is already pending.";
			header("Location: ..\..\Frontend\Search\search.php?error=friend_pending");
        } elseif ($row['status'] == '0') {
            // update friend request to pending (1)
			$update_status = "UPDATE _friendsystem SET status = '1',dateconnected = current_timestamp where (Suser_id = '$Muser_id' and Ruser_id = '$Ruser_id') or (Suser_id = '$Ruser_id' and Ruser_id = '$Muser_id')";
						if ($connect->query($update_status)){
							echo "Updated";
							header ('location: ..\..\Frontend\Search\search.php');
						}
        }
    } else {
        // Insert a new friend request if no existing relationship is found
        $sql_insert = "INSERT INTO _friendsystem (Suser_id, Ruser_id) VALUES (?, ?)";
        $stmt_insert = $connect->prepare($sql_insert);
        $stmt_insert->bind_param("ii", $Muser_id, $Ruser_id);

        if ($stmt_insert->execute()) {
            echo "Friend request sent.";
			header ('location: ..\..\Frontend\Search\search.php');
        } else {
            echo "Error: " . $connect->error;
        }
    }
}
		
//display all pending request by Mainuser
$selectallu = "SELECT * FROM _users AS u INNER JOIN _friendsystem AS f ON u.user_id = f.Ruser_id WHERE f.status = '1' and f.Suser_id = '$Muser_id'";
$fetchallp = $connect->query($selectallu);

?>