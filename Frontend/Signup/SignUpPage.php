<?php 
require('..\..\Backend\Signup\VerifySignUp.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | 404 NOT FOUND</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style_signup.css">
    <style>
        .fade-in {
            opacity: 0; 
            animation: fadeIn 0.5s forwards; 
        }
        @keyframes fadeIn {
            from {
                opacity: 0; 
            }
            to {
                opacity: 1; 
            }
        }
    </style>
	<?php 
		if($username_error != null){
			?><style>.username-error{display: block; color:red}</style> <?php
		}
		if($finame_error != null){
			?><style>.firstname-error{display: block; color:red}</style> <?php
		}
		if($laname_error != null){
			?><style>.lastname-error{display: block; color:red}</style> <?php
		}
		if($password_error != null){
			?><style>.password-error{display: block; color:red}</style> <?php
		}
		if($confirm_password_error != null){
			?><style>.confirm-password-error{display: block; color:red}</style> <?php
		}
		if($email_error != null){
			?><style>.email-error{display: block; color:red}</style> <?php
		}
		if($phone_error != null){
			?><style>.phone-error{display: block; color:red}</style> <?php
		}
	?>
</head>
<body>
    <div class="container mt-5">
        <!-- Account Details Form -->
        <div class="col-md-12">
            <div class="header-container">
                <h3 class="text-left mb-0">Account Details</h3>
                <div class="horizontal-line"></div>
            </div>
            <form method="post" action="SignUpPage.php" >
                <div class="mb-3 fade-in-top">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" value="<?php echo $username ?>" >
				<p class="error username-error">
					<?php echo $username_error ?>
				</p>
				</div>

                <div class="mb-3 fade-in-top">
                    <label for="username" class="form-label">Firstname</label>
                    <input type="text" class="form-control" id="firstname" name="fname" placeholder="Enter username" value="<?php echo $firstname ?>" >
				<p class="error firstname-error">
					<?php echo $finame_error ?>
				</p>
				</div>
				
                <div class="mb-3 fade-in-top">
                    <label for="username" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lname" placeholder="Enter username" value="<?php echo $lastname ?>" >
				<p class="error lastname-error">
					<?php echo $laname_error ?>
				</p>
				</div>

                <div class="mb-3 fade-in-top">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" value="<?php echo $password ?>">
                <p class="error password-error">
					<?php echo $password_error ?>
				</p>
				</div>
				
                <div class="mb-3 fade-in-top">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password"  value="<?php echo $confirm_password ?>">
                <p class="error confirm-password-error">
					<?php echo $confirm_password_error?>
				</p>
				</div>
				
                <div class="mb-3 fade-in-top">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"  value="<?php echo $email ?>">
				<p class="error email-error">
				<?php echo $email_error ?>
				</p>
                </div>
                <div class="mb-3 fade-in-top">
				<label for="phone" class="form-label">Phone Number</label>
				<input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Enter phone number" value="<?php echo $phone_number ?>" >
				<p class="error phone-error">
				<?php echo $phone_error ?>
				</p>
				</div>
		</div>
        <div class="d-flex justify-content-end mt-4">
            <button class="btn btn-primary w-auto" type="submit" name="confirm">Confirm</button>
        </div>
		</form>
    </div>
</body>
</html>
