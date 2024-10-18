<?php
    require_once('..\..\Backend\include\session-include.php');
    require_once('..\..\Backend\include\dbconnect-include.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="friends.css"/>
    <link rel="stylesheet" href="..\Navigation\navigation_bar.css">
    <title>Friends</title>
</head>
<body class="vh-100 overflow-hidden">
    <?php 
	include '..\..\Frontend\Navigation\navigation_bar.php';
    //get a list of the user's friends
    $sql = "Select * from _friendsystem where BINARY Muser_id = '$_SESSION['userid']' OR BINARY Fuser_id = '$_SESSION['userid']'";
	$result = $connect->query($sql);
    if ($result->num_rows > 0) {
        ?>
        <h1>Friends</h1><br>
        <hr><br>
        <h2>Search Results:</h2><br>
        <?php
        while($row = mysqli_fetch_assoc($result)){
            //if the column refers to the current user's id, select the other column
            if($row['Muser_id'] == $_SESSION['userid']){
                ?>
                <div>
                    <h3><?php $row['Fuser_id'] ?>;</h3>
                </div>
                <?php
            }else {
                ?>
                <div>
                    <h3><?php $row['Muser_id'] ?>;</h3>
                </div>
                <?php
            }
        }
    }else {
        echo "0 results";
    }
	//*		
	$connect->close();//*/
	?>   
</body>
</html>
