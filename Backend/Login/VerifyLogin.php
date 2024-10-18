<?php
session_start();
require('..\..\Backend\include\dbconnect-include.php');
require('..\..\Backend\include\functions-include.php');




//get login form
if(isset($_POST['submit'])){
    $Username =htmlspecialchars($_POST['username']);  //'Lancelot'; 
    $Password =htmlspecialchars($_POST['password']); //'lance';
	$Username = $connect->real_escape_string($Username);
	$Password = $connect->real_escape_string($Password);

//login validation
Verifylogin($connect,$Username,$Password);
}
$connect->close();
?>

