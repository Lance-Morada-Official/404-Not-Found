<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="navi-styles.css"/>
    <title>Navigation Bar Test</title>
</head>
<body class="vh-100 overflow-hidden">
    <?php include 'navigation-bar.php'; ?>
    <?php include 'invite.php'; // Include the invite logic ?>
    
    <div class="container-fluid">
        <div class="row vh-100">
            <!-- Left Column -->
            <div class="col-md-6">
                <div class="container custom-container-1 mb-2">
                    <h1>Test Container 1</h1>
                    <p>This is a simple container.</p>
                </div>
                <div class="container custom-container-2">
                    <h1>Invitations</h1>
                    <!-- Display Invited Users -->
                    <?php
                    if (!empty($_SESSION['invitedUsers'])) {
                        echo '<h2>Invited Users:</h2>';
                        foreach ($_SESSION['invitedUsers'] as $invitedId) {
                            $invitedUser = array_filter($users, fn($u) => $u['id'] == $invitedId);
                            if (!empty($invitedUser)) {
                                $invitedUser = array_values($invitedUser)[0]; // Get the first match
                                echo "<div class='invited-user'>
                                        <h3>{$invitedUser['username']}</h3>
                                        <p>ID: {$invitedUser['id']}</p>
                                      </div>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6">
                <div class="container custom-container-3 h-100">
                    <h1>Image Carousel</h1>
                    <!-- Your carousel code -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>
