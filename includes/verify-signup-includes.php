<?php

if (isset($_POST["signup"])){
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $bdate = $_POST["birthdate"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once 'header-dbconn-include.php'; #file does not exist yet
    require_once 'functions-include.php'; #file does not exist yet

    if (emptyInputSignup($fname,$lname,$bdate,$email,$password) !== false){
        header("location: ../signup.php?error=emptyinput");
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
    if (emailExists($conn, $email) !== false){
        header("location: ../signup.php?error=emailalreadyexists");
        exit();
    }

    createUser($conn, $fname. $lname, $bdate, $email, $password);
}
else {
    header("location: ../signup.php");
    exit();
}