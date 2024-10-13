<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | 404 NOT FOUND</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./style_register.css">
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
    
    <script>
        
        function handleSubmit(event) {
            event.preventDefault(); // Prevent default form submission
            
            // Get form data
            const accountForm = document.getElementById('account-form');
            const cardForm = document.getElementById('card-form');

            // Validate account form
            if (!accountForm.checkValidity()) {
                accountForm.classList.add('was-validated'); // Add validation classes
                return; // Stop submission if the form is invalid
            }

            // Validate card form
            if (!cardForm.checkValidity()) {
                cardForm.classList.add('was-validated'); // Add validation classes
                return; // Stop submission if the form is invalid
            }

            // Check if passwords match
            const password = accountForm.querySelector('#password').value;
            const confirmPassword = accountForm.querySelector('#confirm-password').value;
            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                accountForm.querySelector('#confirm-password').classList.add('is-invalid');
                return; // Stop submission if passwords do not match
            }

            // Validate phone number if provided
            const phoneInput = accountForm.querySelector('#phone').value;
            if (phoneInput && !/([0-9]{11}|\+[0-9]{12})$/.test(phoneInput)) {
                alert("Please enter a valid phone number.");
                accountForm.querySelector('#phone').classList.add('is-invalid');
                return; // Stop submission if phone number is invalid
            }

            const accountData = new FormData(accountForm);
            const cardData = new FormData(cardForm);
            // di q lam ano nangyayari d2 alaws me mysql
            // Send data to server
            fetch('/api/account', {
                method: 'POST',
                body: accountData,
            })
            .then(response => response.json())
            .then(data => {
                console.log('Account Data Submitted:', data);
                // Now submit the card data
                return fetch('/api/card', {
                    method: 'POST',
                    body: cardData,
                });
            })
            .then(response => response.json())
            .then(data => {
                console.log('Card Data Submitted:', data);
                // Handle successful submission
                alert('Registration Successful!');
            })
            .catch(error => {
                console.error('Error:', error);
                // Handle error
                alert('There was an error during submission.');
            });
        }

        window.addEventListener('load', function() {
            const elements = document.querySelectorAll('.fade-in-top');
            elements.forEach((element, index) => {
                const delay = index * 0.1; 
                element.style.setProperty('--animation-delay', `${delay}s`);
                element.classList.add('fade-in-top');
            });

            // Trigger the fade-in effect for the horizontal lines
            const lines = document.querySelectorAll('.horizontal-line');
            lines.forEach(line => {
                line.classList.add('fade-in-top'); 
            });
        });
    </script>
</head>
<body>
    <div class="container mt-5">
        <!-- Account Details Form -->
        <div class="col-md-12">
            <div class="header-container">
                <h3 class="text-left mb-0">Account Details</h3>
                <div class="horizontal-line"></div>
            </div>
            <form id="account-form" class="needs-validation" novalidate>
                <div class="mb-3 fade-in-top">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" minlength="4" maxlength="20" pattern="^[a-zA-Z0-9]+$" required>
                    <div class="invalid-feedback">Please enter a username (4-20 characters, letters and numbers only).</div>
                </div>
                <div class="mb-3 fade-in-top">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" minlength="8" required>
                    <div class="invalid-feedback">Please enter a password (at least 8 characters).</div>
                </div>
                <div class="mb-3 fade-in-top">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm password" required>
                    <div class="invalid-feedback">Please confirm your password.</div>
                </div>
                <div class="mb-3 fade-in-top">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                    <div class="invalid-feedback">Please enter a valid email address.</div>
                </div>
                <div class="mb-3 fade-in-top">
    <label for="phone" class="form-label">Phone Number (Optional)</label>
    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" 
           pattern="^([0-9]{11}|\+[0-9]{12})$" title="Please enter a valid phone number (e.g., 09271409407 or +639271409407)">
    <div class="invalid-feedback">Please enter a valid phone number (optional, e.g., 09271409407 or +639271409407).</div>
</div>

            </form>
        </div>

        <!-- Card Details Form -->
        <div class="col-md-12 mt-4">
            <div class="header-container">
                <h3 class="text-left mb-0">Connect Card to Wallet</h3>
                <div class="horizontal-line"></div>
            </div>
            <form id="card-form" class="needs-validation" novalidate>
            <div class="mb-3 fade-in-top">
                  <label for="cardholder-name" class="form-label">Cardholder Name</label>
                 <input type="text" class="form-control" id="cardholder-name" name="cardholder-name" placeholder="Enter cardholder name" required 
                pattern="^[A-Za-z\s]+$" title="Please enter a valid cardholder name (letters and spaces only, no numbers or symbols)">
            <div class="invalid-feedback">Please enter a valid cardholder name (letters and spaces only).</div>
        </div>

                <div class="mb-3 fade-in-top">
                    <label for="card-number" class="form-label">Card Number</label>
                    <input type="text" class="form-control" id="card-number" name="card-number" placeholder="Enter card number" pattern="^\d{13,19}$" required>
                    <div class="invalid-feedback">Please enter a valid card number (13 to 19 digits).</div>
                </div>
                <div class="card-details-row d-flex justify-content-between mb-3">
                    <div class="w-50 me-2 fade-in-top">
                        <label for="expiration-date" class="form-label">Expiration Date</label>
                        <input type="text" class="form-control" id="expiration-date" name="expiration-date" placeholder="MM/YY" pattern="^(0[1-9]|1[0-2])\/([0-9]{2})$" required>
                        <div class="invalid-feedback">Please enter a valid expiration date (MM/YY).</div>
                    </div>
                    <div class="w-50 fade-in-top">
                        <label for="cvv" class="form-label">CVV</label>
                        <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV" pattern="^\d{3,4}$" required>
                        <div class="invalid-feedback">Please enter a valid CVV (3 or 4 digits).</div>
                    </div>
                </div>
            </form>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="button" class="btn btn-primary w-auto" onclick="handleSubmit(event)">Confirm</button>
        </div>
    </div>
</body>
</html>
