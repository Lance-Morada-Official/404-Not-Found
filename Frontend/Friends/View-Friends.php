<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="View-Friends.css">
    <link rel="stylesheet" href="../Navigation/navigation_bar.css">
    <title>View Friend</title>
</head>
<body class="vh-100 overflow-hidden">
<?php 
require('..\..\Frontend\Navigation\navigation_bar.php');
?>
<div class="container-fluid vh-100">
    <div class="row h-100 g-0">
        <div class="col-lg-3">
            <div class="card shadow-sm p-3 mb-5 bg-white">
                <div class="text-center mb-3">
                    <img src="../Assets/Test_IMG_1.JPG" alt="Profile Picture" class="profile-picture">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>User ID:</strong> <?php echo $user_id; ?></li>
                    <li class="list-group-item"><strong>Username:</strong> <?php echo $user_name; ?></li>
                    <li class="list-group-item"><strong>Firstname:</strong> <?php echo $first_name; ?></li>
                    <li class="list-group-item"><strong>Lastname:</strong> <?php echo $last_name; ?></li>
                    <li class="list-group-item"><strong>Email:</strong> <?php echo $email; ?></li>
                    <li class="list-group-item"><strong>Phone Number:</strong> <?php echo $phone_num; ?></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9 HistoryContainer d-flex flex-column">
            <div class="table-responsive flex-grow-1 overflow-auto">
                <table class="table table-striped table-dark mb-0">
                    <thead>
                        <tr>
                            <th>Trade Partner</th>
                            <th>Trade Partner ID</th>
                            <th>Action</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="clickable-row" data-url="details.php?id=12345">
                            <td>John Doe</td>
                            <td>12345</td>
                            <td>Buy</td>
                            <td>$100</td>
                            <td><span class="badge bg-success">Success</span></td>
                        </tr>
                        <tr class="clickable-row" data-url="details.php?id=67890">
                            <td>Jane Smith</td>
                            <td>67890</td>
                            <td>Sell</td>
                            <td>$200</td>
                            <td><span class="badge bg-warning text-dark">On-Going</span></td>
                        </tr>
                        <tr class="clickable-row" data-url="details.php?id=11223">
                            <td>Michael Brown</td>
                            <td>11223</td>
                            <td>Buy</td>
                            <td>$150</td>
                            <td><span class="badge bg-danger">Failed</span></td>
                        </tr>
                        <tr>
                            <td colspan="5">No more transactions available</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
