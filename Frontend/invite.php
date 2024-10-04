<?php
session_start(); // Start the session

// Include user data
include 'users.php';

// Handle invite submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['invite'])) {
    $userId = $_POST['user_id']; // Get user ID from the invite button
    if (!isset($_SESSION['invitedUsers'])) {
        $_SESSION['invitedUsers'] = []; // Initialize if not set
    }
    if (!in_array($userId, $_SESSION['invitedUsers'])) {
        $_SESSION['invitedUsers'][] = $userId; // Add user to invited users
    }
}
?>
