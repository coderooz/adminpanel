<?php 


spl_autoload_register(function ($class_name)
{

	include 'libraries/'.$class_name.'.php';

});

//To create Files -> fileCreater($files,$file_data)
//To create UniqIds ->  UniqidSet($IdFor)

$Core = new DbController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$type = $_POST['type'];

	if ($type == 'login') {

		
		
	} elseif ($type == 'register'){

		$Uniqid = $Core->UniqidSet('register');

		$UserData = array('type' => 'IdInsert', 'Idtype' => 'register', 'id' => $Uniqid) ;

		$Core->UserTask($UserData);

		echo $Uniqid; 


	} elseif ($type == 'loginUser'){

		$loginId = $_POST['loginId'];
		$username = $_POST['username'];
		$userpwd = $_POST['userpwd'];

		$UserData = array('type' => 'login', 'loginid' => $loginId, 'email' => $username, 'pwd' => $userpwd);

		$query = $Core->UserTask($UserData);
		
		echo $query;
		

	} elseif ($type == ''){}


}


