<?php
if (!isset($_SESSION['seller_id'])) {  // Check if the user is logged in by checking the session variable
	die("You must have a seller to enter...");
}

?>