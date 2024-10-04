<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <?php 
                $current_page = basename($_SERVER['PHP_SELF']); // Get current page name
                ?>
                <a class="nav-link <?php echo $current_page == '..\Home\home.php' ? 'active' : ''; ?>" href="..\Home\home.php">Home</a>
                <a class="nav-link <?php echo $current_page == 'add_friends.php' ? 'active' : ''; ?>" href="#">Add Friends</a>
                <a class="nav-link <?php echo $current_page == 'friends.php' ? 'active' : ''; ?>" href="#">Friends</a>
                <a class="nav-link <?php echo $current_page == '..\Profile\profile.php' ? 'active' : ''; ?>" href="..\Profile\profile.php">Profile</a>
                <a class="nav-link <?php echo $current_page == 'wallet.php' ? 'active' : ''; ?>" href="#">Wallet</a>
                <a class="nav-link <?php echo $current_page == 'wallet.php' ? 'active' : ''; ?>" href="val.php">Test</a>
            </div>
        </div>
    </div>
</nav>
