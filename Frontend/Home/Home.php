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
	
		
		require('..\..\Backend\include\dbconnect-include.php');
		require('..\..\Backend\Home\homebackend.php');
		
		
		$connect->close();
	?>   

    <div class="container-fluid">
        <div class="row vh-90">
            <!-- Left Column: Trade Invites -->
            <div class="col-12 col-md-3 p-0"> 
                <div class="container custom-container-invites">
                    <h1>Invites</h1>
                    <p class="subtitle">Sell to a Buyer</p>

                    <!-- User Invitation Section -->
                    <?php if ($invites->num_rows > 0): ?>
						<?php while ($row = $invites->fetch_assoc()): ?>
							<div class="row mt-3">
								<div class='col-12 mb-2'>
									<div class='card invite-card'>
										<div class='card-body d-flex align-items-center'>
											<div class="flex-grow-1">
											<h5 class='card-title'>Username: <?php echo htmlspecialchars($row['username']); ?></h5>
											<p class='card-text'>ID: <?php echo htmlspecialchars($row['user_id']); ?></p>
											</div>
											<form method="post">
												<input type="hidden" name="invitedby" value="<?php echo $row['user_id'];?>">
												<button class='btn btn-success' name="action" value="accept">&#10003;</button>
												<button class='btn btn-danger' name="action" value="decline">&#10005;</button>
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

            <!-- Right Column: On-Going Transactions -->
            <div class="col-12 col-md-9 d-flex justify-content-center align-items-center">
                <div class="container custom-container-transactions">
                    <div class="transactions-heading">
                        <h1>On-Going Transactions</h1>
                    </div>

                    <!-- Transactions -->
				<?php if ($sellerside->num_rows > 0): ?>
					<?php while ($sellerrow = $sellerside->fetch_assoc()): ?>
                    <a href="<?php if($sellerrow['status'] === '1'){
						echo '..\..\Frontend\Contract\Seller_Wait_Contract_Of_Buyer.php';
					}elseif($sellerrow['status'] === '2'){
						echo '..\..\Frontend\Contract\Seller_View_Contract.php';
					}elseif($sellerrow['status'] === '3'){
						echo '..\..\Frontend\Contract\Seller_Wait_Confirm_Of_Edited_Contract.php';
					}elseif($sellerrow['status'] === '4'){
						echo '..\..\Frontend\Upload\Seller_Upload.php';
					}elseif($sellerrow['status'] === '5'){
						echo '..\..\Frontend\Upload\Seller_Uploaded_Waiting_Confirmation.php';
					}
					?>"class="transaction-card selling">
                        <span class="transaction-label selling-label">Selling</span>
                        <div class="transaction-info">
                            <div class="transaction-user">
                                <!-- Profile Image Template -->
                                <div class="profile-image me-3">
                                    <img src="path/to/profile-image-placeholder.jpg" alt="Profile" class="img-fluid rounded-circle" style="width: 50px; height: 50px;">
                                </div>
                                <div>
                                    <p>Buyer: <?php echo htmlspecialchars($sellerrow['username']); ?></p>
                                    <p>User ID: <?php echo htmlspecialchars($sellerrow['user_id']); ?></p>
                                </div>
                            </div>
                            <p class="transaction-due">Due in 1 M : 24 D : 54 M : 59 S</p>
                        </div>
                    </a>
					<?php endwhile; ?>
				<?php else: ?>
						
				<?php endif; ?>
					
				<?php if ($buyerside->num_rows > 0): ?>
					<?php while ($buyerrow = $buyerside->fetch_assoc()): ?>
                    <a href="<?php if($buyerrow['status'] === '1'){
						echo '..\..\Frontend\Contract\Buyer_Contract.php';
					}elseif($buyerrow['status'] === '2'){
						echo '..\..\Frontend\Contract\Buyer_Wait_Seller_Respond_Contract.php';
					}elseif($buyerrow['status'] === '3'){
						echo '..\..\Frontend\Contract\Buyer_View_Edited_Contract_Backend.php';
					}elseif($buyerrow['status'] === '4'){
						echo '..\..\Frontend\Upload\Buyer_Wait_Seller_Upload.php';
					}elseif($buyerrow['status'] === '5'){
						echo '..\..\Frontend\Upload\Buyer_Preview_Upload.php';
					}
					?>"class="transaction-card buying">
                        <span class="transaction-label buying-label">Buying</span>
                        <div class="transaction-info">
                            <div class="transaction-user">
                                <!-- Profile Image Template -->
                                <div class="profile-image me-3">
                                    <img src="path/to/profile-image-placeholder.jpg" alt="Profile" class="img-fluid rounded-circle" style="width: 50px; height: 50px;">
                                </div>
                                <div>
                                    <p>Seller: <?php echo htmlspecialchars($buyerrow['username']); ?></p>
                                    <p>User ID: <?php echo htmlspecialchars($buyerrow['user_id']); ?></p>
                                </div>
                            </div>
                            <p class="transaction-due">Due in 1 M : 24 D : 54 M : 59 S</p>
                        </div>
                    </a>
					<?php endwhile; ?>
				<?php else: ?>
						
				<?php endif; ?>
                </div>
            </div>
			
			
        </div>
    </div>

    <script>
    // Limit window size on resize
    window.addEventListener('resize', function() {
        // Get the current width and height
        const maxWidth = 1024;
        const maxHeight = 800;

        // Resize the window if it's too large
        if (window.innerWidth > maxWidth || window.innerHeight > maxHeight) {
            window.resizeTo(Math.min(window.innerWidth, maxWidth), Math.min(window.innerHeight, maxHeight));
        }
    });
    </script>
    
</body>
</html>