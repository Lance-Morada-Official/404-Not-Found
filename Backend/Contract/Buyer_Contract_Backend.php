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


?>