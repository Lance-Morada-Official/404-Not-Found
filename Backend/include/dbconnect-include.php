<?php
// Create and check connection
$connect = new mysqli('localhost:3307', 'root', '', 'BCDatabase');

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>