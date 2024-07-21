<?php 

$Server_Host = "localhost";
$Server_User = "root";
$Server_Pwd = "";
$Server_db = "adminpanel";

$conn = mysqli_connect($Server_Host,$Server_User,$Server_Pwd,$Server_db);

if (!$conn) {
	$error = 'Database Not Connected_'.mysqli_connect_errno();
	$error = urlencode($error);
	header("Location: 500?error=$error");
	exit();
}