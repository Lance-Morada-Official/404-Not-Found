<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="home.css"/>
    <link rel="stylesheet" href="../Navigation/navigation_bar.css">
    <title>Navigation Bar Test</title>
</head>
<body class="vh-100 overflow-hidden" style="font-family: 'Poppins', sans-serif; background-color: #161530;">
    <?php include '../../Frontend/Navigation/navigation_bar.php'; 
    require('..\..\Backend\include\session-include.php');
    require('..\..\Backend\include\dbconnect-include.php');
    require('..\..\Backend\Invite\invitebackend.php');
    ?>
    

    <div class="container-fluid">
        <div class="row vh-90">
            <!-- Left Column: Trade Invites -->
            <div class="col-md-3">
                <div class="container custom-container-invites">
                    <h1>Invites</h1>
                    <p class="subtitle">Sell to a Buyer</p>

                    <?php if ($invites->num_rows > 0): ?>
                        <?php while ($row = $invites->fetch_assoc()): ?>
                            <div class="row mt-3">
                                <div class="col-12 mb-2">
                                    <div class="card invite-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Username: <?php echo htmlspecialchars($row['username']); ?></h5>
                                            <p class="card-text">ID: <?php echo htmlspecialchars($row['user_id']); ?></p>
                                            <form method="post" class="invite-buttons">
                                                <input type="hidden" name="invitedby" value="<?php echo $row['user_id']; ?>">
                                                <button class="btn btn-accept" name="action" value="accept">&#10003;</button>
                                                <button class="btn btn-decline" name="action" value="decline">&#10005;</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="row mt-3">
                            <div class="col-12 mb-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">---No Pending Request---</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right Column: On-Going Transactions -->
            <div class="col-md-9 d-flex justify-content-center align-items-center">
                <div class="container custom-container-transactions">
                    <h1>On-Going Transactions</h1>

                    <!-- Example Transactions -->
                    <div class="transaction-card selling">
                        <span class="transaction-label selling-label">Selling</span>
                        <div class="transaction-info">
                            <div class="transaction-user">
                                <span class="user-icon">A</span>
                                <div>
                                    <p>Username</p>
                                    <p>User ID</p>
                                </div>
                            </div>
                            <p class="transaction-due">Due in 1 M : 24 D : 54 M : 59 S</p>
                        </div>
                    </div>

                    <div class="transaction-card buying">
                        <span class="transaction-label buying-label">Buying</span>
                        <div class="transaction-info">
                            <div class="transaction-user">
                                <span class="user-icon">A</span>
                                <div>
                                    <p>Username</p>
                                    <p>User ID</p>
                                </div>
                            </div>
                            <p class="transaction-due">Due in 1 M : 24 D : 54 M : 59 S</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
