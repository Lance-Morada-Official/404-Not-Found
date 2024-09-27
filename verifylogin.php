<?php
// Create and check connection
$conn = new mysqli('localhost', 'root', 'alanrussel0503', 'BCDatabase');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Creating function to verify login
function verifyLogin($conn, $Username, $Password) {
    // Check if the user exists in the _admin table
    $adminQuery = "SELECT * FROM _admin WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($adminQuery);
    $stmt->bind_param("ss", $Username, $Password);
    $stmt->execute();
    $adminResult = $stmt->get_result();
    if ($adminResult->num_rows > 0) {
        echo "Login successful as Admin!";
        return true;
    }

    // Check if the user exists in the _user table
    $userQuery = "SELECT * FROM _user WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($userQuery);
    $stmt->bind_param("ss", $Username, $Password);
    $stmt->execute();
    $userResult = $stmt->get_result();
    if ($userResult->num_rows > 0) {
        echo "Login successful as User!";
        return true;
    }

    // If no account
    echo "Invalid username or password!";
    return false;
}

// Login form handling
    $Username = $_POST['username'];
    $Password = $_POST['password'];

    // Calling the verify function
    verifyLogin($conn, $inputUsername, $inputPassword);


// Close connection
$conn->close();
?>