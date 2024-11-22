<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="wallet.css"/>
    <link rel="stylesheet" href="..\Navigation\navigation_bar.css">
    <title>Sell Currency</title>
	<style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');
    </style>
<?php 
require('..\..\Frontend\Navigation\navigation_bar.php'); 
require('..\..\Backend\include\session-include.php');
require('..\..\Backend\include\dbconnect-include.php');
require('..\..\Backend\Wallet\Addamount.php');

$connect->close();
?>

</head>
<body class="vh-100 overflow-hidden" style="font-family: 'Poppins', sans-serif; background-color: #161530;">

    <div class= "container-fluid g-0">
        <div class= "row g-0">
        <div class="col-3 ConversionDisplay p-3">
    <h3 class="mb-4 text-center">Conversion Rates</h3>
    
    <!-- Row 1 -->
    <div class="row mb-3">
    <div class="col-md-6">
            <label class="form-label d-block">₱ PHP</label>
            <input type="text" class="form-control" value="₱1" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label d-block">System Currency</label>
            <input type="text" class="form-control" value="1.00" readonly>
        </div>
        
    </div>

    <!-- Row 2 -->
    <div class="row mb-3">
        
        <div class="col-md-6">
            <label class="form-label d-block">$ USD</label>
            <input type="text" class="form-control" value="$1.00" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label d-block">System Currency</label>
            <input type="text" class="form-control" value="0.017" readonly>
        </div>
    </div>
</div>


            <div class="col-9 ConversionContainer">
                <div class="card text-center p-4 shadow-lg wallet-card">
                    <h3 class="mb-4">Sell System Currency</h3>
                    <form  method="POST" action="wallet.php">
                    <div class="mb-3">
                    <!-- Add min="0" to prevent negative values in the input -->
                    <input type="number" class="form-control" name="amount" id="currencyInput" placeholder="Enter amount" min="0" required>
                    </div>
                    <button type="submit" name="submit" id = "btn-buy" class="btn btn-primary">Sell</button>
                    </form>
                    <div id="displayAmount" class="mt-4 alert alert-info d-none">
                    You have entered <span id="amountDisplay"></span> system currency.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('currencyForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const amount = document.getElementById('currencyInput').value;

            if (amount >= 0) {
                // If amount is valid, display it
                document.getElementById('amountDisplay').innerText = amount;
                document.getElementById('displayAmount').classList.remove('d-none');
            } else {
                // If the input is negative, alert the user
                alert("Please enter a positive amount.");
            }
        });
    </script>
</body>
</html>