<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="..\..\Frontend\Home\Home.php">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <?php 
                $current_page = basename($_SERVER['PHP_SELF']); // Get the current page name
                ?>
                <a class="nav-link <?php echo $current_page == 'home.php' ? 'active' : ''; ?>" href="..\..\Frontend\Home\Home.php">Home</a>
                <a class="nav-link <?php echo $current_page == 'search.php' ? 'active' : ''; ?>" href="..\..\Frontend\Search\search.php">Search</a>
                <a class="nav-link <?php echo $current_page == 'friends.php' ? 'active' : ''; ?>" href="..\..\Frontend\Friends\friends.php">Friends</a>
                <a class="nav-link <?php echo $current_page == 'profile.php' ? 'active' : ''; ?>" href="..\..\Frontend\Profile\profile.php">Profile</a>
                <a class="nav-link <?php echo $current_page == 'wallet.php' ? 'active' : ''; ?>" href="..\..\Frontend\Wallet\wallet.php">Wallet</a>
				<a class="nav-link <?php echo $current_page == 'logout.php' ? 'active' : ''; ?>" href="..\..\Backend\Logout\logout.php">Logout</a>
            </div>
        </div>
    </div>
</nav>
