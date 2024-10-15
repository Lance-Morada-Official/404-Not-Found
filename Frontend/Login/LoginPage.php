<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Login | 404 NOT FOUND</title>
<script type="text/javascript">
        // Check for URL query parameters to show alerts
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('error')) {
                const errorType = urlParams.get('error');
                if (errorType === 'account_not_found') {
                    alert('Account not found. Please try again.');
                } else if (errorType === 'invalid_password') {
                    alert('Invalid password. Please try again.');
                }
            }
        };
</script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Left side: Login functionality -->
            <div class="col-md-6 login-left">
                <div class="login-header">
                    <header>Login</header>
                </div>
				
                <div class="input-box">
				<form action="..\..\Backend\Login\VerifyLogin.php" method="post" target="_self">
                    <input type="username" class="form-control input-field" placeholder="Username" autocomplete="off" required name="username">
                </div>
                <div class="input-box">
                    <input type="password" class="form-control input-field" placeholder="Password" autocomplete="off" required name="password">
                </div>
                <div class="forgot">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="check">
                        <label class="form-check-label" for="check">Remember me</label>
                    </div>
                    <a href="#">Forgot Password?</a>
                </div>
                <div class="input-submit">
                    <button class="submit-btn" id="submit" name="submit">Login</button>
                </form>
				</div>

                <div class="sign-up-link">
                    <p>Don't have an account? <a href="../../Frontend/Signup/SignUpPage.php">Sign Up</a></p>
                </div>
            </div>

            <!-- Right side: Slogan -->
            <div class="col-md-6 slogan-right">
                <h1>Trade Fraud-Free.</h1>
                <h1>Trade Worry-Free.</h1>
                <h1>Trade Confidently.</h1>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
