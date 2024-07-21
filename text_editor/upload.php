<?php

include ('../includes/dbconn.php');
$file = $_FILES['upload'];
$name = $_FILES['upload']['name'];
$tmp = $_FILES['upload']['tmp_name'];
$size = $_FILES['upload']['size'];
$error = $_FILES['upload']['error'];

$type = $_FILES['upload']['type'];

$fileExt = explode('.', $name);

$fileActualExt = strtolower(end($fileExt));
$fileActualExtUpper = strtoupper($fileActualExt);

$allowed = array('jpg','jpeg','png');

if (in_array( $fileActualExt, $allowed )) {

	$img_id = uniqid('img_',true);
	$fileNameNew = $img_id . ".".$fileActualExt;
	$folderLocation = 'uploads/images/';
	$fileDestination = '../'.$folderLocation.$fileNameNew;
	$file_location = $folderLocation.$fileNameNew;

	move_uploaded_file($tmp, $fileDestination);

	$sql = "INSERT INTO `assets`(`asset_id`, `name`, `asset_name`, `location`, `type`, `cont_type`,`size`,`ext`,`status`) VALUES ('$img_id','$name','$fileNameNew','$file_location','$type','IMAGE','$size','$fileActualExtUpper','1')";
	mysqli_query($conn ,$sql);

	$function_number = $_GET['CKEditorFuncNum'];

	$url = 'uploads/images/' . $fileNameNew;
	$message = '';

	echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
} else{			
	echo "file_upload_not_allowed";
}