<?php

$username = null;
$username_error = null;
$firstname = null;
$finame_error = null;
$lastname = null;
$laname_error = null;
$password = null;
$password_error = null;
$confirm_password = null;
$confirm_password_error = null;
$passworderror = "Password Mismatch";
$phone_number = null;
$phone_error = null;
$email = null;
$email_error = null;

if(!empty(isset($_POST['confirm']))){
	//connect to database
	/*$connect = new mysqli('localhost', 'root', 'alanrussel0503', 'BCDatabase');

	if ($connect->connect_error) {
		die("Connection failed: " . $connect->connect_error);
	}*/
	include('..\..\Backend\include\dbconnect-include.php');

	//username
    if (empty(trim($_POST["username"]))) {
        $username_error = "Field Username is empty";
    } else {
        $username = htmlspecialchars(trim($_POST["username"]));
    }
	//firstname
	if (empty(trim($_POST["fname"]))) {
        $finame_error = "Field Firstname is empty";
    } else {
        $firstname = htmlspecialchars(trim($_POST["fname"]));
    }
	//lastnames
	if (empty(trim($_POST["lname"]))) {
        $laname_error = "Field Lastname is empty";
    } else {
        $lastname = htmlspecialchars(trim($_POST["lname"]));
    }
	//password
    if (empty(trim($_POST["password"]))) {
        $password_error = "Field Password is empty";
    } else {
        $password = htmlspecialchars(trim($_POST["password"]));
    }
	//confirm password
	if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_error = "Confirm your password";
    }
	else if ($_POST["password"] != $_POST["confirm_password"]) {
        $confirm_password_error = "Password Mismatch";
    }
	else {
        $confirm_password = htmlspecialchars(trim($_POST["confirm_password"]));
    }
	//email
	if (empty(trim($_POST["email"]))) {
        $email_error = "Field Email is empty";
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
    }
	//phone
	if (empty(trim($_POST["email"]))) {
		$phone_error = "Field Phone Number is empty";
    } else {
		$phone_number = htmlspecialchars(trim($_POST['phone_number']));
	}
	//no empty field
	if (empty($username_error) && empty($finame_error) && empty($laname_error) && empty($password_error) && empty($confirm_password_error) && empty($email_error) && (empty($phone_error))) {
	
		include('..\..\Backend\include\functions-include.php');
		Inserttouser($connect,$username,$firstname,$lastname, $confirm_password, $email, $phone_number);
	}
//close connection
$connect->close();
}
?>