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

$getallc = "Select * from _contracts where buyer_id = '$buyer' and seller_id = '$sellerid'";
$fetchallc = $connect->query($getallc);
$allrowc = $fetchallc->fetch_assoc();
$contract_id = $allrowc['contract_id'];
$createddate = $allrowc['datecreated'];
$directory = $allrowc['directory'];

$getalles = "Select * from _escrows where contract_id = '$contract_id'";
$fetchalles = $connect->query($getalles);
$allrowe = $fetchalles->fetch_assoc();
$escrow_id = $allrowe['escrow_id'];
$contract_id = $allrowe['contract_id'];
$exp_date = $allrowe['exp_date'];
$payment = $allrowe['payment'];
$file_id = $allrowe['file_id'];
$status = $allrowe['status'];

		
$getallupload = "Select * from _sellerupload where file_id = '$file_id'";
$fetchallup = $connect->query($getallupload);
$allrowup = $fetchallup->fetch_assoc();
$selleridupload = $allrowup['user_id'];
$art_title = $allrowup['art_title'];
$checksum = $allrowup['checksum'];
$date_time = $allrowup['date_time'];
$pathdirectory = $allrowup['pathdirectory'];


?>