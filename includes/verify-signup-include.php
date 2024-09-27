<?php

if (isset($_POST["Signup"])){
    $uname = $_POST["uname"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $password = $_POST["password"];
    $bdate = $_POST["birthdate"];
    $email = $_POST["email"];
    $phonenum = $_POST["phonenum"];
    
    require_once 'header-dbconn-include.php';
    require_once 'functions-include.php';

    if (emptyInputSignup($uname,$fname,$lname,$password,$bdate,$email,$phonenum) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidUsername($uname) !== false){
        header("location: ../signup.php?error=invalidusername");
        exit();
    }
    if (invalidFname($fname) !== false){
        header("location: ../signup.php?error=invalidfname");
        exit();
    }
    if (invalidLname($lname) !== false){
        header("location: ../signup.php?error=invalidlname");
        exit();
    }
    if (invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (uidExists($conn, $email) !== false){
        header("location: ../signup.php?error=emailalreadyexists");
        exit();
    }
    if (invalidPhoneNum($phonenum) !== false){
        header("location: ../signup.php?error=invalidphonenumber");
        exit();
    }

    createUser($conn, $fname, $lname, $bdate, $email, $password);
}
else {
    header("location: ../signup.php?error=invallidaccess");
    exit();
}