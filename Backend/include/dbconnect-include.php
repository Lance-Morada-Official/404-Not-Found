<?php
// Create and check connection
$connect = new mysqli('localhost', 'root', 'alanrussel0503', 'BCDatabase');

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>