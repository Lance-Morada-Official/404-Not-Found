<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["imgUpload"]["name"]);
$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$filetemp = $_FILES["imgUpload"]["tmp_name"];
$allowedExtensions = array("png","jpg","jpeg","gif");

if(in_array($filetype,$allowedExtensions)){
  if(file_exists($target_file)){
    echo "<script>
          alert('File already exists');
          window.location = 'upload.php';
          </script>";
  }else{
    move_uploaded_file($filetemp,$target_file);
	echo "<h1>Validation</h1>";
	//show a preview of the uploaded image
	echo '<img src="'.$target_file.'" width="50%"/><br><br>';
	//display the checksum for validation
	echo 'File checksum: '.hash_file('sha256',$target_file).'<br><br>';
	echo "<p>Please save the checksum value and compare it to the downloaded file to verify its integrity.</p><br><br>";
    echo "<h3>File upload successful!</h3>";
  }
}else{
  echo "<script>
        alert('File is not aceptable');
        window.location = upload.php';
        </script>";
}
?>