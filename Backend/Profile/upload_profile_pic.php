<?php
session_start();
$user_id = $_SESSION['user_id']; // Assuming user is logged in

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_pic'])) {
    $target_dir = "profile_pics/";
    $target_file = $target_dir . $user_id . ".jpg"; // Save the file as user_id.jpg
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file is an actual image
    $check = getimagesize($_FILES['profile_pic']['tmp_name']);
    if ($check === false) {
        echo "File is not an image.";
        exit;
    }

    // Check file size (limit to 5MB)
    if ($_FILES['profile_pic']['size'] > 5000000) {
        echo "Sorry, your file is too large.";
        exit;
    }

    // Allow only jpg, jpeg, png file formats
    if ($imageFileType != "jpg" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG files are allowed.";
        exit;
    }

    // Move the uploaded file to the correct directory
    if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
        echo "The file has been uploaded.";
        header("Location: profile.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
