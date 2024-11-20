<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom CSS Files -->
    <link rel="stylesheet" href="Seller_Contract.css" />
    <link rel="stylesheet" href="Details.css" />
    <link rel="stylesheet" href="BoxContainer.css" />
    <link rel="stylesheet" href="../Navigation/navigation_bar.css" />
    
    <title>Contract</title>
</head>

<body class="vh-100 overflow-hidden" style="font-family: 'Poppins', sans-serif; background-color: #161530;">
    
    <!-- Navigation Bar -->
    <?php 
	include '../../Frontend/Navigation/navigation_bar.php';
	include '../../Backend/include/sessionseller-include.php';
	include '../../Backend/include/dbconnect-include.php'; 
	include '../../Backend/Contract/Buyer_Contract_Backend.php';
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
            <div id= "Top-Form" class="form-container row">
                <div class="form-item">
                <label for="paidbox">Paid</label>
                <input type="number" id="paidbox" name="paidbox" placeholder="$00.00">
                </div>

        <div class="form-item">
            <label for="durationbox">Duration:</label>
            <input type="date" id="durationbox" name="durationbox" placeholder="MM/DD/YYYY">
                </div>
    </div>

    <div id = "Bottom-Form" class="form-container row mt-3">
        <div class="col-12 form-item mt-3">
            <label for="projectdetails">Project Details:</label>
            <textarea id="projectdetails" name="projectdetails" rows="4" placeholder="Enter project details here..." class="form-control"></textarea>
        </div>

        <div class="col-12 form-item mt-3">
            <label for="intellectualproperty">Intellectual Property:</label>
            <textarea id="intellectualproperty" name="intellectualproperty" rows="4" placeholder="Enter intellectual property details here..." class="form-control"></textarea>
        </div>

        <div class="col-12 form-item mt-3">
            <label for="notes">Notes:</label>
            <textarea id="notes" name="notes" rows="4" placeholder="Enter notes here..." class="form-control"></textarea>
        </div>
    </div>
    
    <button type="button" id="btn-Confirm" class="btn btn-success">Submit</button>

</div>

    
</div>

                

        </div>
    </body>
</html>