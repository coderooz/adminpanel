<?php

include '../dbconn.php'; 

$file = $_FILES['upload'];

$name = $_FILES['upload']['name'];
$tmp = $_FILES['upload']['tmp_name'];
$size = $_FILES['upload']['size'];
$error = $_FILES['upload']['error'];
$type = $_FILES['upload']['type'];

$fileExt = explode('.', $name);

$fileActualExt = strtolower(end($fileExt));

//5edd9bf5e7dcb8.50342877.jpg

$allowed = array('jpg','jpeg','png');

if (in_array( $fileActualExt, $allowed )) {
	if ($error === 0) {
		if ($size < 1048576000) {
			$fileNameNew = uniqid('',true) . ".".$fileActualExt;
			$fileDestination = $fileNameNew;		

			move_uploaded_file($tmp, $fileDestination);

			$sql = "INSERT INTO `images`(`userid`, `images`) VALUES (1,'$fileNameNew')";
			mysqli_query($conn ,$sql);
			
			header("Location: index.php?status=success");
				exit();

		} else {					
			header("Location: index.php?status=file_too_big");
			exit();
		}
	}else{				
		header("Location: index.php?status=uploaderror");
		exit();
		
	}
} else{			
	header("Location: index.php?status=file_upload_not_allowed");
	exit();
	
}