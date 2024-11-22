<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom CSS Files -->
    <link rel="stylesheet" href="Seller_Upload.css" />
    <link rel="stylesheet" href="Details.css" />
    <link rel="stylesheet" href="BoxContainer.css" />
    <link rel="stylesheet" href="Loading.css" />
    <link rel="stylesheet" href="../Navigation/navigation_bar.css" />
    
    <title>Uploaded</title>
</head>

<body class="vh-100 overflow-hidden" style="font-family: 'Poppins', sans-serif; background-color: #161530;">
    
    <?php 
	include '..\..\Frontend\Navigation\navigation_bar.php'; 
	include '..\..\Backend\include\sessionbuyer-include.php';
	include '..\..\Backend\include\dbconnect-include.php';
	include '..\..\Backend\Upload\Seller_Uploaded_Waiting_Confirmation_Backend.php';
	?>

    <div class="container-fluid">
        <div class="row">
            
            <div class="col-lg-2 mt-3 mb-3 ms-3 Details">
                <div class="Details-Header">
                    <h2>Trading With</h2>
                </div>
                
                <div class="Profile-Pic-Wrapper">
                    <img src="../Assets/Test_IMG_1.JPG" id="Profile-Pic" alt="Buyer Profile" class="Buyer-IMG">
                </div>
                
                <?php
                    $Details = ["Username"=>"Username: $buyername", "User ID"=>"User ID: $buyerid", "Email"=>"Email Address: $buyeremail", "Phone"=>"Phone Number: $buyerphone"];
                    foreach ($Details as $Detail) {
                        echo "<h6>$Detail</h6>";
                    }
                ?>
                
                <div class="Details-2">
                    <div class="mb-3">
                        <label for="paidbox">Paid:</label>
                    </div>
                    <div class="mb-3">
                        <input type="number" id="paidbox" name="paidbox" value="<?php echo $payment; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="durationbox">Duration:</label>
                    </div>
                    <div class="mb-3">
                        <input type="date" id="durationbox" name="durationbox" value="<?php echo $exp_date; ?>" readonly>
                    </div>
                    <form method="post" action="../../Backend/Upload/Seller_View_Final_Contract.php" target="_blank">
					<button type="submit" id="btn-contract" class="btn btn-secondary">View Contract</button>
				</form>
                </div>
            </div>

            <div class="col-lg-9 mt-3 ms-4 BoxContainer">
                <h1>Upload</h1>

                <div id="upload-status" class="Loading-Text">
                    <p class="text-success">File Has Been Uploaded. Waiting for Buyer Confirmation.</p>
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
                </div>
            </div>
        </div>
    </div>

</body>

</html>
