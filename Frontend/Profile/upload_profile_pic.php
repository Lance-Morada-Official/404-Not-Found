<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_pic'])) {
    $targetDir = "profile_pics/";
    $userId = $_SESSION['user_id']; // Ensure that the user ID is being correctly set in the session
    $targetFile = $targetDir . $userId . ".jpg";

    // Ensure the directory exists
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    // Attempt to move the uploaded file
    if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $targetFile)) {
        echo "Profile picture updated successfully.";
    } else {
        echo "Error uploading profile picture.";
    }
} else {
    echo "No file uploaded or incorrect request.";
}
?>
