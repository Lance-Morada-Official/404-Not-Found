<?php
if (!isset($_SESSION['buyer_id'])) {  // Check if the user is logged in by checking the session variable
	die("You must have a buyer to enter...");
}

?>