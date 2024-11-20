<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="Buyer_Preview.css" />
    <link rel="stylesheet" href="Details.css" />
    <link rel="stylesheet" href="Loading.css" />
    <link rel="stylesheet" href="BoxContainer.css" />
    <link rel="stylesheet" href="../Navigation/navigation_bar.css" />
    <title>Preview</title>
</head>

<body class="vh-100 overflow-hidden" style="font-family: 'Poppins', sans-serif; background-color: #161530;">
    <?php 
	include '../../Frontend/Navigation/navigation_bar.php';
	include '../../Backend/include/sessionseller-include.php';
	include '../../Backend/include/dbconnect-include.php';
	include '../../Backend/Contract/Buyer_Waiting_Accept_Backend.php';
	?>
	
    <div class="container-fluid">
        <div class="row">
            
            <!-- Left Column for Buyer Details -->
            <div class="col-lg-2 mt-3 mb-3 ms-3 Details">
                <div class="Details-Header">
                    <h2>Trading With</h2>
                </div>
                
                <div class="Profile-Pic-Wrapper">
                    <img src="../Assets/Test_IMG_1.JPG" id="Profile-Pic" alt="Seller Profile" class="Buyer-IMG">
                </div>
                
                <?php
                    $Details = ["Username"=>"Username: $sellername", "User ID"=>"User ID: $sellerid", "Email"=>"Email Address: $selleremail", "Phone"=>"Phone Number: $sellerphone"];
                    foreach ($Details as $Detail) {
                        echo "<h6>$Detail</h6>";
                    }
                ?>
                
            </div>

            <div class="col-lg-9 mt-3 ms-4 BoxContainer">
                
            <div class = "Loading-Text mt-2">
                    <h1>Waiting for Seller to Accept Invite.</h1>

                 
                    <div class="spinner-container">
                     
                        <div class="spinner-grow text-light" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="spinner-grow text-light" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="spinner-grow text-light" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>

                        </div>
                        <button type="button" id="btn-home" class="btn btn-secondary">Home</button>
            </div>
        </div>
        </div>
    </div>
</body>
</html>
