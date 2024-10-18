<?php
    if (!isset($_SESSION['userid'])) {  // Check if the user is logged in by checking the session variable
		die("You must be logged in to view your details.");
	}
?>