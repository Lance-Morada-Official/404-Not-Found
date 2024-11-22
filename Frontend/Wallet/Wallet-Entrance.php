<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Wallet-Entrance.css">
    <link rel="stylesheet" href="..\Navigation\navigation_bar.css">
    <title>Wallet</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');
    </style>
<?php 
require('..\..\Frontend\Navigation\navigation_bar.php'); 
require('..\..\Backend\include\session-include.php');
	require('..\..\Backend\include\dbconnect-include.php');
	require('..\..\Backend\Search\searchbackend.php');

$connect->close();
?>
</head>
<body class="vh-100 overflow-hidden" style="font-family: 'Poppins', sans-serif; background-color: #161530;">
    <div class="container-fluid full-screen-container">
        <!-- Left container with click event -->
        <div class="col-6 left-image" onclick="window.location.href='wallet.php';">
            <div class="text-overlay">
                <h2 class="text-white">Buy System Currency</h2>
            </div>
        </div>
        <!-- Right container with click event -->
        <div class="col-6 right-image" onclick="window.location.href='Wallet-Sell.php';">
            <div class="text-overlay">
                <h2 class="text-white">Sell System Currency</h2>
            </div>
        </div>
    </div>
</body>
</html>
