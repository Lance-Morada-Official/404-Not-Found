<?php
?>
<h1>Sign Up</h1>

<form action="includes/verify-signup-include.php" method="post">
    <input type="text" placeholder="Username" name = "uname" required>
    <input type="text" placeholder="First Name" name = "fname" required>
    <input type="text" placeholder="Last Name" name = "lname" required>
    <input type="password" placeholder="Password" name = "password" required>
    <input type="date" name = "birthdate" required>
    <input type="text" placeholder="Email" name = "email" required>
    <input type="text" placeholder="Phone Number" name = "phonenum" required>
    <input type="submit" value = "Signup" required>
</form>