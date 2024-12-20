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
    <title>Digital Currency</title>
	<style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');
    </style>
<?php 
require('..\..\Frontend\Navigation\navigation_bar.php'); 

require('..\..\Backend\include\dbconnect-include.php');
require('..\..\Backend\Wallet\Addamount.php');

$connect->close();
?>

</head>
<body class="vh-100 overflow-hidden" style="font-family: 'Poppins', sans-serif; background-color: #161530;">


    <div class="container d-flex justify-content-center align-items-center h-100">
        <div class="card text-center p-4 shadow-lg wallet-card">
            <h3 class="mb-4">Enter Digital Currency Amount</h3>
            <form  method="POST" action="wallet.php">
                <div class="mb-3">
                    <!-- Add min="0" to prevent negative values in the input -->
                    <input type="number" class="form-control" name="amount" id="currencyInput" placeholder="Enter amount" min="0" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>

            <div id="displayAmount" class="mt-4 alert alert-info d-none">
                You have entered <span id="amountDisplay"></span> digital currency.
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