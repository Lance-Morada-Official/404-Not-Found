<?php
$hostname = "localhost";
$dbUsername = "root";
$dbPassword = "alanrussel0503";
$dbName = "BCDatabase";

$conn = mysqli_connect($hostname, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}