<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>User Registration Form</title>
    <style>
        body {
            padding: 20px;
        }
        .form-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <?php include 'navigation-bar.php'; ?>
<div class="form-container">
    <h2 class="text-center">User Registration</h2>
    <form id="registration-form">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required pattern="[A-Za-z0-9]{3,20}" title="Username must be 3-20 characters long and contain only letters and numbers.">
            <div class="invalid-feedback">Please provide a valid username (3-20 characters, letters and numbers only).</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required minlength="6" title="Password must be at least 6 characters long.">
            <div class="invalid-feedback">Password must be at least 6 characters long.</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="phone" name="phone" required pattern="^\+?[0-9]{10,15}$" title="Phone number must be between 10 to 15 digits long, and may include a leading '+'.">
            <div class="invalid-feedback">Please provide a valid phone number (10-15 digits, optional '+').</div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>
</div>

<script>
    // Form validation on submit
    document.getElementById('registration-form').addEventListener('submit', function(event) {
        // Prevent form submission if any inputs are invalid
        if (!this.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        // Add the 'was-validated' class to display validation feedback
        this.classList.add('was-validated');
    });
</script>

</body>
</html>
