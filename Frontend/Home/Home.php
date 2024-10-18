<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Home.css"/>
    <link rel="stylesheet" href="..\Navigation\navigation_bar.css">
    <title>Navigation Bar Test</title>
    <style>
        .custom-container-2 {
            position: relative;
        }
    </style>
</head>
<body class="vh-100 overflow-hidden">
    <?php 
	include '..\..\Frontend\Navigation\navigation_bar.php'; 
	session_start();
		if (!isset($_SESSION['username'])) {  // Check if the user is logged in by checking the session variable
			die("You must be logged in to view your details.");
		}
		require('..\..\Backend\include\dbconnect-include.php');
		
		$connect->close();
	?>   



    <div class="container-fluid mt-4">
        <div class="row vh-90">
            <!-- Left Column -->
            <div class="col-md-6">
                <div class="container custom-container-1 mb-2">
                    <h1>Test Container 1</h1>
                    <p>This is a simple container.</p>
                </div>
                <div class="container custom-container-2">
                    <h1>Test Container 2</h1>
                    <p>This is a simple container.</p>
                    
                    <div class="row mt-3" id="invited-users">
                        <!-- Invited Users Will Be Displayed Here -->
                    </div>
                    
                    <!-- User Invitation Section -->
                    <div class="row mt-3">
                        <?php
                        // Sample user data (In a real application, this data would come from a database)
                        $users = [
                            ['id' => 1, 'username' => 'User1'],
                            ['id' => 2, 'username' => 'User2'],
                            ['id' => 3, 'username' => 'User3'],
                        ];

                        // Loop through users to create user invitation cards
                        foreach ($users as $user) {
                            echo "<div class='col-12 mb-2'>
                                    <div class='card'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>Username: {$user['username']}</h5>
                                            <p class='card-text'>ID: {$user['id']}</p>
                                            <button class='btn btn-success' onclick=\"inviteUser('{$user['username']}', {$user['id']})\">Invite</button>
                                            <button class='btn btn-danger'>Decline</button>
                                        </div>
                                    </div>
                                  </div>";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6">
                <div class="container custom-container-3 h-100">
                    <h1>Image Carousel</h1>
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="Shenhe_1.jpg" class="d-block w-100" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>First Slide Title</h5>
                                    <p>Description for the first slide.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="YaeMiko_1.jpg" class="d-block w-100" alt="Second slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Second Slide Title</h5>
                                    <p>Description for the second slide.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="Ganyu_4.png" class="d-block w-100" alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Third Slide Title</h5>
                                    <p>Description for the third slide.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Array to hold invited users
        const invitedUsers = [];

        // Function to invite a user
        function inviteUser(username, id) {
            // Check if the user is already invited
            if (!invitedUsers.includes(username)) {
                invitedUsers.push(username);
                updateInvitedUsersDisplay(username, id);
            } else {
                alert(`${username} is already invited.`);
            }
        }

        // Function to update the display of invited users
        function updateInvitedUsersDisplay(username, id) {
            const invitedUsersDiv = document.getElementById('invited-users');
            const userCard = document.createElement('div');
            userCard.className = 'col-12 mb-2';
            userCard.innerHTML = `
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Username: ${username}</h5>
                        <p class="card-text">ID: ${id}</p>
                    </div>
                </div>
            `;
            invitedUsersDiv.appendChild(userCard);
        }
    </script>
</body>
</html>
