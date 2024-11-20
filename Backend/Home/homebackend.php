<?php
		//As Buyer
		if(isset($_POST['trade'])){
			header('location: ..\..\Frontend\Invite\invite.php');
		}
		
		//user_id session not working, had to query to get the ID
		$username = $_SESSION['username'];
		$getid = "Select user_id from _users where username = '$username'";
		$fetchid = $connect->query($getid);
		$idrow = $fetchid->fetch_assoc();
		$Muser_id = $idrow['user_id'];
		
		
		
		//As Seller
		//Fetch all the pending invites
		$fetchinvites = "SELECT u.user_id, u.username FROM _users AS u INNER JOIN _invitesystem AS i ON u.user_id = i.Cuser_id WHERE i.Iuser_id = $Muser_id and status = '1'";
		$invites = $connect->query($fetchinvites);
		
		if(isset($_POST['action'])){
			$sender = $_POST['invitedby'];
			$_SESSION["buyer_id"] = $sender;
			$action = $_POST['action'];
			
			if($action == 'accept'){
				$updatestatus = "Update _invitesystem set status = '2',dateinvited = current_timestamp where Cuser_id = '$sender' and Iuser_id = '$Muser_id'";

				$makecontract = $connect->prepare("INSERT INTO _contracts (buyer_id, seller_id ) VALUES (? , ? )");
				$makecontract->bind_param("ii", $sender,$Muser_id);
        
				if($makecontract->execute()){
					$contract_id = $makecontract->insert_id;
					$makeescrow = $connect->prepare("INSERT INTO _escrows (contract_id ) VALUES (? )");
					$makeescrow->bind_param("i",$contract_id);
						if($makeescrow->execute()){
							header('location: ..\..\Frontend\Contract\Seller_Wait_Contract_Of_Buyer.php');
						}
				}
				
			}
			else if($action == 'decline'){
				$updatestatus = "Update _invitesystem set status = '0',dateinvited = current_timestamp where Cuser_id = '$sender' and Iuser_id = '$Muser_id'";
				header('location: ..\..\Frontend\Home\Home.php');
			}
			
			if($connect->query($updatestatus)){
				echo "Update Successful";
			}
			
		}
?>