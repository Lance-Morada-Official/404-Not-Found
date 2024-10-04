<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="profile.css"/>
    <link rel="stylesheet" href="../Navigation/navigation_bar.css">
    <title>User Profile</title>
</head>
<body class="vh-100 overflow-hidden">
    <?php include '../Navigation/navigation_bar.php'; ?>
    <?php
    // Assume connection to the database is already established
    session_start();

    // Get user information from the database
    $user_id = $_SESSION['user_id']; 

    $query = "SELECT username, firstname, lastname, email, phone_num FROM _user WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->bind_result($username, $firstname, $lastname, $email, $phone_num);
    $stmt->fetch();
    $stmt->close();
    ?>

    <div class="container mt-5">
        <div class="row">
            <!-- Left Side: User Information -->
            <div class="col-md-4">
                <div class="card shadow-sm p-3 mb-5 profile-card">
                    <!-- Profile Picture -->
                    <form action="upload_profile_pic.php" method="POST" enctype="multipart/form-data">
                        <div class="text-center mb-3">
                            <img src="..\..\Backend\Profile-Functions\upload_profile_pic.php/<?php echo $user_id; ?>.jpg" alt="Profile Picture" class="img-fluid rounded-circle" width="150">
                            <input type="file" name="profile_pic" class="form-control mt-2">
                            <button type="submit" class="btn btn-primary mt-2">Upload New Picture</button>
                        </div>
                    </form>
                    <!-- User Details -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Name:</strong> <?php echo $firstname . " " . $lastname; ?></li>
                        <li class="list-group-item"><strong>User ID:</strong> <?php echo $user_id; ?></li>
                        <li class="list-group-item"><strong>Email:</strong> <?php echo $email; ?></li>
                        <li class="list-group-item"><strong>Phone Number:</strong> <?php echo $phone_num; ?></li>
                    </ul>
                </div>
            </div>

            <!-- Right Side: Placeholder for more content -->
            <div class="col-md-8">
                <!-- Future content can go here -->
            </div>
        </div>
    </div>
</body>
</html>
