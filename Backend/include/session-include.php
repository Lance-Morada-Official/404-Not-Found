<?php
session_start();

if (!isset($_SESSION['username']) && !isset($_SESSION['user_id'])) {  // Check if the user is logged in by checking the session variable
	die("You must be logged in to view your details.");
}

?>