<?php 
    $current_page = basename($_SERVER['PHP_SELF']); // Get the current page name
	require('..\..\Backend\include\session-include.php');
	require('..\..\Backend\include\dbconnect-include.php');
	require('..\..\Backend\Navigation\showamount.php');
				
	$connect->close();
    ?>
<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container-fluid">
		<!-- Profile Section on the Left -->
        <div class="navbar-profile d-flex align-items-center">
            <div class="profile-info ms-3">
                <div class="username"><?php echo htmlspecialchars($username ?? 'Username'); ?></div>
                <div class="user-id"><?php echo htmlspecialchars($user_id ?? 'User ID'); ?></div>
            </div>
        </div>
		
		<!-- "Trade" Button Centered -->
        <div class="trade-button-container">
            <a href="..\..\Frontend\Invite\invite.php" class="trade-button">Trade</a>
        </div>
		
		<!-- Toggle Button for Mobile View -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
		
		<!-- Navigation Links and Account Balance on the Right -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav me-3">
                <a class="nav-link" href="..\..\Frontend\Home\Home.php">Home</a>
                <a class="nav-link" href="..\..\Frontend\Search\search.php">Search</a>
                <a class="nav-link" href="..\..\Frontend\Friends\friends.php">Friends</a>
                <a class="nav-link" href="..\..\Frontend\Profile\profile.php">Profile</a>
                <a class="nav-link" href="..\..\Frontend\Profile\profile.php">Notification</a>
                <a class="nav-link" href="..\..\Frontend\Wallet\wallet.php">Wallet</a>
                <span class="account-balance me-3">$<?php echo number_format($amount ?? 0, 2); ?></span>
            </div>
        </div>
    </div>
</nav>
