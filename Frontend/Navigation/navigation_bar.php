<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container-fluid">
        <!-- Profile Section on the Left -->
        <div class="navbar-profile d-flex align-items-center">
            <img src="..\..\path\to\profile_pictures\default-profile.png" alt="Profile Picture" class="profile-picture">
            <div class="profile-info ms-3">
                <div class="username"><?php echo htmlspecialchars($username ?? 'Username'); ?></div>
                <div class="user-id"><?php echo htmlspecialchars($user_id ?? 'User ID'); ?></div>
            </div>
        </div>

        <!-- "Trade" Button Centered -->
        <div class="trade-button-container">
            <a href="..\..\Frontend\Trade\trade.php" class="trade-button">Trade</a>
        </div>

        <!-- Navigation Links and Account Balance on the Right -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav me-3">
                <a class="nav-link" href="..\..\Frontend\Home\Home.php">
                    <img src="..\..\path\to\icons\home-icon.png" alt="Home" class="nav-icon">
                    <span>Home</span>
                </a>
                <a class="nav-link" href="..\..\Frontend\Search\search.php">
                    <img src="..\..\path\to\icons\search-icon.png" alt="Search" class="nav-icon">
                    <span>Search</span>
                </a>
                <a class="nav-link" href="..\..\Frontend\Messages\message.php">
                    <img src="..\..\path\to\icons\message-icon.png" alt="Messages" class="nav-icon">
                    <span>Messages</span>
                </a>
                <a class="nav-link" href="..\..\Frontend\Profile\profile.php">
                    <img src="..\..\path\to\icons\profile-icon.png" alt="Profile" class="nav-icon">
                    <span>Profile</span>
                </a>
            </div>

            <!-- Account Balance and Wallet Icon -->
            <span class="account-balance me-3">$<?php echo number_format($account_balance ?? 0, 2); ?></span>
            <a class="nav-link" href="..\..\Frontend\Wallet\wallet.php">
                <img src="..\..\path\to\icons\wallet-icon.png" alt="Wallet" class="nav-icon">
                <span>Wallet</span>
            </a>
        </div>
    </div>
</nav>
