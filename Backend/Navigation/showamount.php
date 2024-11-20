<?php
$username = $_SESSION['username'];
				
				$fetchuid = $connect->prepare("Select user_id from _users where username = ? ");
				$fetchuid->bind_param("s",$username);
				$fetchuid->execute();
				$getuid = $fetchuid->get_result();
					if($uidrow = $getuid->fetch_assoc()){
					$user_id = $uidrow['user_id']; // get user_id
					
					$fetchwid = $connect->prepare("Select wallet_id from _wallet where user_id = ? ");
					$fetchwid->bind_param("i",$user_id);
					$fetchwid->execute();
					$getwid = $fetchwid->get_result();
						if($widrow = $getwid->fetch_assoc()){
							$wallet_id = $widrow['wallet_id'];
							
							$fetcha = $connect->prepare("Select amount from _wallet where wallet_id = ? ");
							$fetcha->bind_param("i",$wallet_id);
							$fetcha->execute();
							$geta = $fetcha->get_result();
							if($amountrow = $geta->fetch_assoc()){
								$amount = $amountrow['amount'];
							}
						}
					}
?>