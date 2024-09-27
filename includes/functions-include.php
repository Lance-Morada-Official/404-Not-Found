<?php
function emptyInputSignup($uname,$fname,$lname,$password,$bdate,$email,$phonenum){
    if(empty($uname) ||empty($fname) || empty($lname) || empty($password) || empty($bdate) || empty($email) || empty($phonenum)){
        return true;
    }else{
        return false;
    }
}
function invalidUsername($uname){
    if(!preg_match("/^[a-zA-Z0-9]*$/"),$lname){
        return true;
    }else{
        return false;
    }
}
function invalidFname($fname){
    if(!preg_match("/^[a-zA-Z0-9]*$/"),$fname){
        return true;
    }else{
        return false;
    }
}
function invalidLname($lname){
    if(!preg_match("/^[a-zA-Z0-9]*$/"),$lname){
        return true;
    }else{
        return false;
    }
}
function invalidEmail($email){
    if(!filter_var($email,FILTER_VALDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}
function uidExists($conn,$uname,$email){
    $result;
    $sql = "SELECT * FROM _user WHERE usernane = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=preparedstatementfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$uname,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}
function invalidPhoneNum($phonenum){
    if(!preg_match("/^[0-9]{11,12}$/"),$phonenum){
        return true;
    }else{
        return false;
    }
}
function createUser($conn, $fname, $lname, $bdate, $email, $password){
    $result;
    $sql = "INSERT INTO users () VALUES ();";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=preparedstatementfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}