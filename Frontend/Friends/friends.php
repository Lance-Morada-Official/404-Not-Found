<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="friends.css"/>
    <link rel="stylesheet" href="..\Navigation\navigation_bar.css">
	<style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');
    </style>
    <title>Navigation Bar Test</title>
</head>
<body class="vh-100 overflow-hidden">
    <?php 
	include '..\..\Frontend\Navigation\navigation_bar.php'; 
	require('..\..\Backend\include\session-include.php');
	require('..\..\Backend\include\dbconnect-include.php');
	require('..\..\Backend\Friends\friendbackend.php');
	$connect->close();
	?>
	
	<div class="container">
        <h1>Friends</h1>

        <div class="section">
            <div style="margin-bottom: 24px;">
                <form method="get">
                    <input type="text" name='search' placeholder="Search ID or Username" value="<?php echo htmlspecialchars($search); ?>">
                </form>
            </div>
			
            <h2 class="pending-title">Pending Request:</h2>
            <div style="margin-bottom: 24px;">
                <?php if ($fetchallp->num_rows > 0): ?>
                    <?php while ($row = $fetchallp->fetch_assoc()): ?>
                        <div class="request-box">
                            <div class="user-info">
                                <div></div>
                                <div>
                                    <p>Username: <?php echo htmlspecialchars($row['username']); ?></p>
                                    <p class="user-id">User ID: <?php echo htmlspecialchars($row['user_id']); ?></p>
                                </div>
                            </div>
                            <form method='POST'>
                                <input type="hidden" name="sender" value="<?php echo $row['user_id']; ?>">
                                <button class="accept-btn" name='action' value='accept'>Accept</button>
                                <button class="decline-btn" name='action' value='decline'>Decline</button>
                            </form>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="no-result">
                        <div></div>
                        <div><p>------No Pending Request------</p></div>
                    </div>
                <?php endif; ?>
            </div>
			
            <h2 class="results-title">Results:</h2>
            <div style="margin-bottom: 24px;">
                <?php if ($fetchallf->num_rows > 0): ?>
                    <?php while ($row = $fetchallf->fetch_assoc()): ?>
                        <div class="friend-box">
                            <div class="user-info">
                                <div></div>
                                <div>
                                    <p>Username: <?php echo htmlspecialchars($row['username']); ?></p>
                                    <p class="user-id">User ID: <?php echo htmlspecialchars($row['user_id']); ?></p>
                                </div>
                            </div>
                            <form method='POST'>
                                <input type="hidden" name="friendid" value="<?php echo htmlspecialchars($row['user_id']); ?>">
                                <button class="unfriend-btn" name='unfriend' type='submit'>Unfriend</button>
                            </form>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="no-result">
                        <div></div>
                        <div><p>------No Result Found------</p></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
