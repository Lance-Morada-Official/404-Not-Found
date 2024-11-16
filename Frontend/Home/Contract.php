<!DOCTYPE html>
<html>
<head>
<title>Contract Form | 404 NOT FOUND</title>
<style>
body {
    position: absolute; 
  top: 64px; 
  left: 0px; 
  width: 1440px; 
  height: 836px; 
  background: #161530FF; 
  border-radius: 0px;
  font-family: 'Poppins', sans-serif;
}

.info {
  position: absolute;
  top: 134px;
  left: 149px;
  width: 257px;
  height: 76px;
  color: #FFFFFFFF;
  font-size: 30px;
  
}

.top {
    color: #FFFFFFFF;
}

.bottom {
    color: #00ff00;
    margin-top: 5px;
}

.profile-info {
    position: absolute; 
  top: 500px; 
  left: 49px; 
  font-size: 20px; 
  line-height: 30px; 
  font-weight: 400; 
  color: #FFFFFFFF; /* white */
}

.profile-picture {
    position: absolute; 
  top: 300px; 
  left: 151px; 
  width: 160px; 
  height: 160px; 
  font-size: 50px; 
  line-height: 150px; 
  font-weight: 400; 
  color: #FFFFFFFF; /* white */
  background: #00BDD6FF; /* primary-500 */
  opacity: 1; 
  overflow: hidden; 
  border-radius: 80px; 
  text-align: center;
}

.profile-form {
    position: absolute; 
  top: 132px; 
  left: 464px; 
  width: 916px; 
  height: 700px; 
  background: #F8F9FAFF; /* neutral-150 */
  border-radius: 8px; /* border-xl */
}

.oval{
    position: absolute;
    top: -5px;
    left: -125px;
    width: 100px;
    height: 100px;
    background: #FFFFFFFF;
    border-radius: 50%;
}

.line {
    position: absolute;
    top: 50px;
    left: 350px;
    width: 573px;
    height: 0px;
    border-width: 4px;
    border-style: solid;
    border-color: #161530FF;
    transform: rotate(0deg);
}

.text {
    position: absolute; 
  top: 50px; 
  left: 40px;
  font-size: 40px; 
  line-height: 1px; 
  font-weight: 400; 
  color: #161530FF; 
}

.text1 {
    position: absolute; 
  top: 450px; 
  left: 280px; 
  font-size: 40px; 
  line-height: 56px; 
  font-weight: 400; 
  color: #161530FF;
}

.profile-form img {
    position: absolute; 
  top: 250px; 
  left: 350px; 
  width: 200px; 
  height: 200px; 
  fill: #171A1FFF; /* neutral-900 */
}

</style>
</head>
<body>
<?php
		//require('..\..\Backend\include\session-include.php');
		//require('..\..\Backend\include\dbconnect-include.php');

?>
<div class="container">
    <div>
        <div class="info">
        <div class="oval"></div>
            <div class="top">Trading With</div>
            <div class="bottom">You are Selling</div>
        </div>
    </div>
    <div class="profile-picture">A</div>
    <div class="profile-info">
        <p>Username:</p>
        <p>User ID:</p>
        <p>Email:</p>
        <p>Phone Number:</p>
    </div>
    <div class="profile-form">
        <div class="text">Contract Form</div>
        <div class="line"></div>
        <img src="hourglass.png" alt="Loading">
        <div class="text1">Waiting for Contract...</div>
    </div>
</div>
</body>
</html>