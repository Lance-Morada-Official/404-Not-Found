<!DOCTTYPE html>
<html>
<head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #161530;
}
.container {
    background-color: #fff;
    padding: 5%;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    width: 61%;
    margin: 5%;
}
.fade-in-top {
    opacity: 0;
    transform: translateY(-20px);
    animation: fadeInTop 1s forwards; 
    animation-delay: var(--animation-delay); 
}
@keyframes fadeInTop {
    to {
        opacity: 1; 
        transform: translateY(0);
    }
}
p {
	text-align: center;
	font-size: 40px;
	color: green;
}
</style>

<script type="text/javascript">
        // JavaScript redirect after 5 seconds
        setTimeout(function() {
            window.location.href = 'wallet.php';
        }, 2000); // 5000ms = 5 seconds
</script>

</head>
<body>
<div class="container mt-5">
	<div class="mb-3 fade-in-top">
		<p> Amount Added </p>
	</div>
</div>
</body>
</html>