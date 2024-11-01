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
		
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');
    
        .custom-container-2 {
            position: relative;
        }
    </style>
</head>
<body class="vh-100 overflow-hidden" style="font-family: 'Poppins', sans-serif; background-color: #161530;">
    <?php 
	include '..\..\Frontend\Navigation\navigation_bar.php'; 
		require('..\..\Backend\include\session-include.php');
		require('..\..\Backend\include\dbconnect-include.php');
		require('..\..\Backend\Home\homebackend.php');
		
		
		$connect->close();
	?>   



    <div class="container-fluid mt-4">
        <div class="row vh-90">
            <!-- Left Column -->
            <div class="col-md-6">
                <div class="container custom-container-1 mb-2">
                    <form method='POST'>
					<h1>Invite a Seller</h1>
					<p>Buy from a Seller</p>
					<button class='btn btn-success' type='submit' name='trade'>Initiate a Trade</button>
                    </form>
                </div>
				
                <div class="container custom-container-2">
                    <h1>Trade Invites</h1>
                    <p>Sell to a Buyer.</p>
					
                    <!-- User Invitation Section -->
                    <?php if ($invites->num_rows > 0): ?>
						<?php while ($row = $invites->fetch_assoc()): ?>
							<div class="row mt-3">
								<div class='col-12 mb-2'>
									<div class='card'>
										<div class='card-body'>
											<h5 class='card-title'>Username: <?php echo htmlspecialchars($row['username']); ?></h5>
											<p class='card-text'>ID: <?php echo htmlspecialchars($row['user_id']); ?></p>
											<form method="post">
												<input type="hidden" name="invitedby" value="<?php echo $row['user_id'];?>">
												<button class='btn btn-success' name="action" value="accept">Accept</button>
												<button class='btn btn-danger' name="action" value="decline">Decline</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					<?php else: ?>
						<div class="row mt-3">
								<div class='col-12 mb-2'>
									<div class='card'>
										<div class='card-body'>
											<h5 class='card-title'>---No Pending Request---</h5>
										</div>
									</div>
								</div>
						</div>
					<?php endif; ?>
					
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

    
</body>
</html>
