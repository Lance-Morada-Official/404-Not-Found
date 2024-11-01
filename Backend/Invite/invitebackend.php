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
$selectallf = "SELECT * FROM _users AS u INNER JOIN _friendtable AS f ON u.user_id = f.Fuser_id where f.Muser_id = '$Muser_id'";
if($search){
	$selectallf = "SELECT * FROM _users AS u INNER JOIN _friendtable AS f ON u.user_id = f.Fuser_id where f.Muser_id = '$Muser_id' and (u.user_id != '$Muser_id' or u.username != '$username') and (u.user_id = '$search' or u.username = '$search')";
}
$fetchallf = $connect->query($selectallf);


//inviting
if(isset($_POST['invite'])){
	$Iuser_id = $_POST['searched_id'];
	
	$invited = $connect->prepare("Insert into _invitesystem (Cuser_id,Iuser_id) values (?,?)");
	$invited->bind_param("ii", $Muser_id,$Iuser_id);
	if($invited->execute()){
		header('location: ..\..\Frontend\Invite\ContractForm.php');
	}else{
		echo "Failed to Invite" . $connect->error;
	}
}

?>