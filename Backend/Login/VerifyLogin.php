<?php
session_start();
require('..\..\Backend\include\dbconnect-include.php');
require('..\..\Backend\include\functions-include.php');




//get login form
if(isset($_POST['submit'])){
    $Username =htmlspecialchars($_POST['username']); 
    $Password =htmlspecialchars($_POST['password']);
	$Username = $connect->real_escape_string($Username);
	$Password = $connect->real_escape_string($Password);

//login validation
Verifylogin($connect,$Username,$Password);
}
$connect->close();
?>

