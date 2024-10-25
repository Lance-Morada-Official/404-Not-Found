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

.profile-form input[type="text"] {
    position: relative;
    top: 120px;
    left: 350px;
    width: 200px;
    padding: 8px;
    border-radius: 4px;
    font-size: 16px;
}

.profile-form input[type="date"] {
  width: 200px;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  box-sizing: border-box;
  background-color: #5d57d9;
  position: relative;
  top: 120px;
  left: 100px;
}

.duration {
    position: absolute; 
  top: 100px; 
  left: 100px;
  font-size: 20px; 
  line-height: 1px; 
  font-weight: 400; 
  color: black; 
}

.payment {
    position: absolute; 
  top: 100px; 
  left: 555px;
  font-size: 20px; 
  line-height: 1px; 
  font-weight: 400; 
  color: black; 
}

.balance {
    position: absolute; 
  top: 130px; 
  left: 800px;
  font-size: 20px; 
  line-height: 1px; 
  font-weight: 400; 
  color: gray; 
}

.property {
    position: absolute; 
  top: 185px; 
  left: 100px;
  font-size: 20px; 
  line-height: 1px; 
  font-weight: 400; 
  color: black; 
}

textarea{
    position: absolute;
    top: 200px;
    left: 100px;
    width: 650px; 
  height: 100px; 
  resize: none;
  padding-left: 16px; 
  padding-right: 16px;  
  font-size: 16px; 
  line-height: 26px; 
  font-weight: 400; 
  background: #FFFFFFFF; /* white */
  border-radius: 4px; /* border-m */
  border-width: 1px; 
  border-color: #BCC1CAFF; /* neutral-400 */
  border-style: solid; 
  outline: none; 

}

.details {
    position: absolute; 
  top: 330px; 
  left: 100px;
  font-size: 20px; 
  line-height: 1px; 
  font-weight: 400; 
  color: black; 
}

.copymy-text,
#textarea{
    position: absolute;
    top: 350px;
    left: 100px;
    width: 650px; 
  height: 100px; 
  resize: none;
  padding-left: 16px; 
  padding-right: 16px;  
  font-size: 16px; 
  line-height: 26px; 
  font-weight: 400; 
  background: #FFFFFFFF; /* white */
  border-radius: 4px; /* border-m */
  border-width: 1px; 
  border-color: #BCC1CAFF; /* neutral-400 */
  border-style: solid; 
  outline: none; 
}

.notes {
    position: absolute; 
  top: 480px; 
  left: 100px;
  font-size: 20px; 
  line-height: 1px; 
  font-weight: 400; 
  color: black; 
}

.copy-my-text,
#textarea{
    position: absolute;
    top: 500px;
    left: 100px;
    width: 650px; 
  height: 100px; 
  resize: none;
  padding-left: 16px; 
  padding-right: 16px;  
  font-size: 16px; 
  line-height: 26px; 
  font-weight: 400; 
  background: #FFFFFFFF; /* white */
  border-radius: 4px; /* border-m */
  border-width: 1px; 
  border-color: #BCC1CAFF; /* neutral-400 */
  border-style: solid; 
  outline: none; 
}

p [id="result"] {
    width: 100%;
    text-align: right;
    margin-top: 15px;
    color: #737373;
}

.countings {
    width: 100%;
    text-align: right;
    margin-top: 15%;
}

.btn {
    position: absolute;
    top: 620px;
    left: 720px;
    font-size: 15px;
    font-weight: bold;
    background: #5d57d9;
    width: 100px;
    padding: 20px;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
    color: #FFFFFFFF;
    border-radius: 5px;
    cursor: pointer;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    -webkit-transition-duration: 0.3s;
    transition-duration: 0.3s;
    -webkit-transition-property: box-shadow, transform;
    transition-property: box-shadow, transform;
}

.btn:hover, .btn:focus, .btn:active {
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}

</style>
<?php
require('..\..\Backend\include\dbconnect-include.php');

$connect->close();
?>
</head>
<body>
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
        <div class="duration">Project Duration</div>
        <input type="date">
        <div class="payment">Payment</div>
        <input type="text" value="$0.00">
        <div class="balance">Balance</div>
        <div class="property">Intellectual Property</div>
        <textarea id="my-text" rows="5" placeholder="Type something here.."></textarea>
        <p id="result"></p>
        <div class="details">Project Details</div>
        <textarea class="copymy-text" rows="5" placeholder="Type something here.."></textarea>
        <p id="result"></p>
        <div class="notes">Notes</div>
        <textarea class="copy-my-text" rows="5" placeholder="Type something here.."></textarea>
        <p id="result"></p>
        <a href="#"class="btn">Submit</a>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>