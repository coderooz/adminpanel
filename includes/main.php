<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	include('db.conn.php');

	$UPPERLETTERS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$LOWERLETTERS = 'abcdefghijklmnopqrstuvwxyz';
	$NUMBERS = '0123456789';
	$SPEC_CHAR = '!@#$%_';
	$idgenUPPER = substr(str_shuffle($UPPERLETTERS), rand(0,9),rand(10,19)); 
	$idgenLOWER = substr(str_shuffle($LOWERLETTERS), rand(0,9),rand(10,19)); 
	$idgenNUM = substr(str_shuffle($NUMBERS), rand(0,9),rand(10,19)); 
	$idgenSP_CHR = substr(str_shuffle($SPEC_CHAR), 0,rand(1,7)); 
	$suffChar = $idgenUPPER.$idgenLOWER.$idgenNUM.$idgenSP_CHR;
	$suffCharM = substr(str_shuffle($suffChar), 0,rand(10,19)); 

	$type = $_POST['type'];
	if ($type == 'indexData') {
		
		$dataNeed = $_POST['dataNeed'];
		if ($dataNeed == 'fullAssets') {

			$sql = "SELECT id FROM `assets`";
			$results = mysqli_query($conn,$sql);
			echo mysqli_num_rows($results);

		} elseif ($dataNeed == 'fullProjects') {

			$sql = "SELECT id FROM `projects`";
			$results = mysqli_query($conn,$sql);
			echo mysqli_num_rows($results);

		} elseif ($dataNeed == 'fullScripts') {

			$sql = "SELECT id FROM `scripts`";
			$results = mysqli_query($conn,$sql);
			echo mysqli_num_rows($results);

		} elseif ($dataNeed == 'fullArticles') {
			$sql = "SELECT id FROM `texteditor`";
			$results = mysqli_query($conn,$sql);
			echo mysqli_num_rows($results);	
		}

	} elseif ($type == 'userData') {
		$userId = $_POST['userId'];
		$sql = "SELECT * FROM `user` WHERE `sessions_id`= '$userId'";
		$result = mysqli_query($conn,$sql);
		echo $result;
		if (mysqli_num_rows($result) > 0) {
			while ($rows = mysqli_fetch_assoc($result)) {
				$user_name = $rows['user_name'];
				$userImage = $rows['image'];
				if (empty($userImage)) {
					$userImage = './img/assets/unknown.jpg';
				}
				echo '<span class="mr-2 d-none d-lg-inline text-gray-600 small">'.$user_name.'</span><img class="img-profile rounded-circle" src="'.$userImage.'">';
			}
		} else {
			echo 'Error!';
		}
	} elseif ($type == 'message_alerts'){

		$messalrtFor = $_POST['messalrtFor'];

		if ($messalrtFor == 'alert') {

			$sql = "SELECT type FROM `messages` WHERE type = 'alert'";
			$results = mysqli_query($conn,$sql);
			echo mysqli_num_rows($results);

		} elseif ($messalrtFor == 'message') {

			$sql = "SELECT type FROM `messages` WHERE type = 'message'";
			$results = mysqli_query($conn,$sql);
			echo mysqli_num_rows($results);

		}
	} elseif ($type == 'message') {

		$notifcation = $_POST['notifi'];

		if ($notifcation == 'notifAlerts') {

			$response = '';
			$response .= '';
			$response .= '';

		} elseif ($notifcation == 'notifMessage') {

			$response = '';
			$response .= '';
			$response .= '';			

		} elseif ($notifcation == 'notifNon') {

			$response = '';
			$response .= '';
			$response .= '';	

		}
	} elseif($type == 'search'){

		$searchQuery = $_POST['searchText'];

		if (!empty($searchQuery)) {

			$pageData = '
		          <div class="d-sm-flex align-items-center justify-content-between mb-4">
		            <h1 class="h3 mb-0 text-gray-800">Search Results</h1>
		          </div>';

		        $sql = "SELECT * FROM `projects` WHERE name Like '$searchQuery'";
		        $results = mysqli_query($conn,$sql);
		        while ($rows = mysqli_fetch_assoc($results)) {
		        	$pageData.= $rows['name'].'<br>';
		        }

		    echo $pageData;

		}
	} elseif ($type=='scriptsData') {

		$sql = "SELECT * FROM scripts";
		$results = mysqli_query($conn , $sql);
		$script = '<table class="table table-bordered" id="dataTables" width="100%" cellspacing="0"><thead><tr><th>Scripts Name</th><th>Script Created</th><th>Type</th><th>Project Status</th><th> * </th></tr></thead><tbody>';

		if (mysqli_num_rows($results) > 0) {
			while ($rows = mysqli_fetch_assoc($results)) {
				$scriptN = $rows['name'];
				$scriptType = $rows['scriptType'];
				$script_id = $rows['script_id'];
				$createdOn = $rows['created_on'];
				$dbNeed = $rows['status'];

				if ($dbNeed == '0') {

				 	$dbNeed = '<a class="px-md-1" onclick="scriptView('.$script_id.')"><i title="View" class="fas fa-eye text-primary"></i></a><a class="px-md-1" onclick="scriptDelete('.$script_id.')"><i title="Delete" class="fas fa-trash text-danger"></i></a>';

				} elseif($dbNeed == '1'){

					$dbNeed = '<a class="px-md-1" onclick="scriptView('.$script_id.')"> <i title="View" class="fas fa-eye text-primary"></i></a><a data_id="'.$script_id.'" class="px-md-1" onclick="scriptDelete(this.data_id)"> <i title="Delete" class="fas fa-trash text-danger"></i></a>';

				}	
			
				$script .= '<tr><td><b>'. strtoupper($scriptN) .'</b></td><td>'.$createdOn.'</td><td>'.$scriptType.' Script </td><td><button class="btn btn-danger scriptBtn" onclick="scriptRun(this.id)" id="'.$script_id.'">Not Active </button></td><td><div class="btn-group" role="group" aria-label="Basic example">'.$dbNeed.'</div></td></tr>';

			}
		}

		$script .= '</tbody></table>';

		$Sql = "UPDATE `db_log` SET `sett`='0' WHERE `sett_for`='scripts'";
		mysqli_query($conn, $Sql);
		echo $script;  

	}elseif ($type=='scriptDelete') {

		$scriptid = $_POST['scriptid'];

		$sql = "SELECT * FROM `scripts` WHERE script_id = '$scriptid' AND status = '1'";
		$results = mysqli_query($conn, $sql);

		if (mysqli_num_rows($results) > 0) {
			while ($rows = mysqli_fetch_assoc($results)) {
		
				$fileLocation = '../'.$rows['file_location']; 

				if (file_exists($fileLocation)) {

					unlink($fileLocation);
					mysqli_query($conn, "UPDATE `scripts` SET `status`='0' WHERE `script_id`='$scriptid'");
					$Sql = "UPDATE `db_log` SET `sett`='1' WHERE `sett_for`='articles'";
					mysqli_query($conn, $Sql);
					echo 'File is deleted.';

				} else {

					echo 'File Is already deleted';

				}
			}
		} else {

			echo 'There is an error, File did not exists!';

		}
	} elseif($type == 'markfinish'){

		$articleId = $_POST['postId'];

		$sql = "SELECT title,uniqId WHERE FROM `texteditor` uniqId='$articleId'";
		$results = mysqli_query($conn,$sql);
		if (mysqli_num_rows($results) == '1') {
			while ($rows = mysqli_fetch_assoc($results)) {

				$title = $rows['title'];
				$sqlO = "UPDATE `texteditor` SET `status`='2' WHERE uniqId='$articleId'";
				
				if (musqli_query($conn,$sqlO)) {

					$Sql = "UPDATE `db_log` SET `sett`='1' WHERE `sett_for`='articles'";
					mysqli_query($conn, $Sql);
					echo $title.' has been marked Completed';

				}
			}
		}
	} elseif($type == 'deleteArticle'){

		$articleId = $_POST['postId'];

		$sql = "SELECT title,uniqId FROM `texteditor`  WHERE uniqId='$articleId'";
		$results = mysqli_query($conn,$sql);

		if (mysqli_num_rows($results) == '1') {
			while ($rows = mysqli_fetch_assoc($results)) {

				$title = $rows['title'];

				$sqlO = "UPDATE `texteditor` SET `status`='3' WHERE uniqId='$articleId'";
				if (musqli_query($conn,$sqlO)) {

					$Sql = "UPDATE `db_log` SET `sett`='1' WHERE `sett_for`='articles'";
					mysqli_query($conn, $Sql);
					echo $title.' has been Deleted';

				}
			}
		}
	} elseif($type == 'revertArticle'){

		$articleId = $_POST['postId'];

		$sql = "SELECT title,uniqId WHERE FROM `texteditor` uniqId='$articleId'";
		$results = mysqli_query($conn,$sql);
		if (mysqli_num_rows($results) == '1') {
			while ($rows = mysqli_fetch_assoc($results)) {

				$title = $rows['title'];
				
				$sqlO = "UPDATE `texteditor` SET `status`='1' WHERE uniqId='$articleId'";
				if (musqli_query($conn,$sqlO)) {
				
					$Sql = "UPDATE `db_log` SET `sett`='1' WHERE `sett_for`='articles'";
					mysqli_query($conn, $Sql);
					echo $title.' has been Reverted';
				
				}
			}
		}

	} elseif ($type=='scriptCleanup') {

		$sql = "SELECT * FROM `scripts`";
		$results = mysqli_query($conn,$sql);
		while ($rows = mysqli_fetch_assoc($results)) {
			
			$scriptId = $rows['script_id']; 
			$fileLocation = '../'.$rows['file_location']; 
			
			if (!file_exists($fileLocation)) {
				mysqli_query($conn,"DELETE FROM `scripts` WHERE script_id = '$scriptId'");
				$Sql = "UPDATE `db_log` SET `sett`='1' WHERE `sett_for`='scripts'";
				mysqli_query($conn, $Sql);
			
			}
		}
	} elseif ($_POST['type'] == 'project' || $_POST['type'] == 'script' ) {
		
		if ($_POST['type'] == 'project') {
			
			$projectLocation = '../projects/project/';
			$project_name = $_POST['project_name'];
			$project_Inte = $_POST['project_Inte'];
			$deadline = $_POST['deadline'];
			$desc = $_POST['desc'];
			$dir = $projectLocation.$project_name;
			
			if (!is_dir($dir)) {
				mkdir($dir);
				$indexFile = $dir.'/index.html';
				$cssFile = $dir.'/css/style.css';
				$cssFolder = $dir.'/css';
				mkdir($cssFolder);
				$cssdata = '*{margin: 0px; padding: 0px;}';
				$indexdata = "<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n<meta charset=\"utf-8\">\n<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">\n<title>Document</title>\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/style.css\">\n</head>\n<body>\n\n</body>\n</html>";
				$indexpage = file_put_contents($indexFile, $indexdata);
				$csspage = file_put_contents($cssFile, $cssdata);

				if ($indexpage) {

					$projectId = uniqid('project_',true);

					$SQL = "INSERT INTO `projects`(`project_id`,`name`,`description`,`intension`,`localtion`,`deadline`,`status`) VALUES ('$projectId','$project_name','$desc','$project_Inte','$dir','$deadline','1')"; 
		 			if(mysqli_query($conn, $SQL)){

		 				$Sql = "UPDATE `db_log` SET `sett`='1' WHERE `sett_for`='projects'";
						mysqli_query($conn, $Sql);

		 				$index = $dir.'/index.html';
		 				$css = $dir.'/css/style.css';

		 				$sql = "INSERT INTO `projects_files`(`project_id`, `file_name`, `file_location`, `status`) VALUES ('$projectId','index.html','$index','1')";
		 				mysqli_query($conn, $sql);

		 				$sql2 = "INSERT INTO `projects_files`(`project_id`, `file_name`, `file_location`, `status`) VALUES ('$projectId','style.css','$css','1')";
		 				mysqli_query($conn, $sql2);

		 				echo $project_name;

		 			}
				}
			} else {

				echo 'ERROR! - The Project <b>"'.$project_name.'"</b> Already exists!';

			}
		} elseif ($_POST['type'] == 'script') {

			$scriptPlacement = '../projects/scripts';
			$scriptLocation = 'projects/scripts';
			$script_W_Name = $_POST['scriptname'];

			$ext = explode(".", $script_W_Name);
			$ext = end($ext);
			$ext = strtolower($ext);
			$UPEXT = strtoupper($ext);

			$EXTARRAY = array("php","py",'js','json');

			if (in_array($ext, $EXTARRAY)) {

				$scriptid = str_replace(".", "", uniqid('script_',true).$suffCharM);
				$script =  $scriptPlacement.$scriptid.'.'.$ext;
				$scriptType = $UPEXT.' SCRIPT';
				$DBlocation = $scriptLocation.$scriptid.'.'.$ext;

				$data = 'This is a '.$UPEXT.' Script created on date='.date("d-m-Y").' at the time='.date("h:i:s:a"); 

				file_put_contents($script, $data);

				$SQL = "INSERT INTO `scripts`(`name`, `script_id`,`scriptName`, `scriptType`, `file_location`, `status`) VALUES ('$script_W_Name','$scriptid','$script_W_Name','$scriptType','$DBlocation','1')"; 
				$results = mysqli_query($conn,$SQL);

				if ($results) {

		        	$sql = "UPDATE `db_log` SET `sett`='1' WHERE `sett_for`='scripts'";
					mysqli_query($conn, $sql);

		        }
			}
		}
	} elseif ($type=='login') {
		$loginId = str_replace("&", '',uniqid('login_',true).'.'.$suffCharM);
		$sql = "INSERT INTO `tmpsesid`(`type`, `typeid`, `status`) VALUES ('login','$loginId',0)";
		if (mysqli_query($conn,$sql)) {
			echo $loginId;
		}
	} elseif ($type=='register') {

		$registerId = uniqid('register_',true).'.'.$suffCharM;
		$sql = "INSERT INTO `tmpsesid`(`type`, `typeid`, `status`) VALUES ('register','$registerId',0)";
		if (mysqli_query($conn,$sql)) {
			echo $registerId;
		}
	} elseif ($type=='forPwd') {
		$ForgtPwdId = uniqid('forPwd_',true).'.'.$suffCharM;
		$sql = "INSERT INTO `tmpsesid`(`type`, `typeid`, `status`) VALUES ('forgot_pwd','$ForgtPwdId',0)";
		if (mysqli_query($conn,$sql)) {
			echo $ForgtPwdId;
		}
	} elseif ($type=='registration') {
		$registrationId = $_POST['registrationId'];		
		$sql = "SELECT * FROM `tmpsesid` WHERE type='register' AND typeId ='$registrationId' AND status = '0' ";
		$results = mysqli_query($conn,$sql);
		if (mysqli_num_rows($results) > 0) {
			$userFirst = $_POST['userFirst'];
			$userLast = $_POST['userLast'];
			$userFullName = $userFirst.' '.$userLast;
			$userID = uniqid('userId',true).$suffCharM;			
			$userEmail = $_POST['userEmail'];
			$userPwd = $_POST['userpwd'];
			$reuserPwd = $_POST['userpwdRe'];
			if ( !empty($userFirst) || !empty($userLast) || !empty($userEmail) || !empty($userPwd) || !empty($reuserPwd) ) {
				if (!filter_var($userEmail,FILTER_VALIDATE_EMAIL)) {
					echo 'Email';
				} elseif (!preg_match("/^[a-zA-Z0-9]*$/", $userFirst)) {
					echo 'Invalid First Name';
				} elseif (!preg_match("/^[a-zA-Z0-9]*$/", $userLast)) {
					echo 'Invalid Last Name';
				}  elseif ($userPwd !== $reuserPwd) {
					echo 'Password Error. Password & Retype Password Field did not match';
				} else {
					$sqlM = "SELECT `user_email` FROM `user` WHERE `user_email` = '$userEmail'";
					$resultsM = mysqli_query($conn,$sqlM);
					if(!mysqli_num_rows($resultsM) > 0){
						$hashedPwd = password_hash($userPwd, PASSWORD_DEFAULT);
						$sql = "INSERT INTO `user`(`firstName`,`lastName`,`user_name`,`userId`,`user_email`,`password`) VALUES ('$userFirst','$userLast','$userFullName','$userID','$userEmail','$hashedPwd')";
						$results = mysqli_query($conn,$sql);
						if ($results) {
							echo 'Registration complete';
						} else {
							echo 'failed';
						}
					} else {
						echo 'User';
					}		
				}
			} else {echo 'Error2';}
		} else {echo 'Error1';}		
	} elseif ($type=='loginUser') {
		
		$loginId = $_POST['loginId'];
		$sql = "SELECT * FROM `tmpsesid` WHERE `type`='login' AND `typeId` ='$loginId' AND `status` = 0";
		$results = mysqli_query($conn,$sql);
		if (mysqli_num_rows($results) > 0) {	

			$username = $_POST['username'];
			$userpwd = $_POST['userpwd'];

			if ( empty($username) || empty($userpwd) ) {
				echo '<div class="alert alert-info" role="alert"><b>Warning!</b> Empty Fields Found.</div>';
			} else {				

				$sql = "SELECT * FROM `user` WHERE `user_email` = '$username'";
				$results = mysqli_query($conn,$sql);
				$resultsCheck = mysqli_num_rows($results);
				if($resultsCheck > 0 ) {
					while ($rows = mysqli_fetch_assoc($results)) {
						$pwdCheck = password_verify($userpwd, $rows['password']);
						if ($pwdCheck == false) {
							echo 'Wrong Password';
						} elseif ($pwdCheck == true) {
							$userId = $rows['userId'];
							session_start();
							$sessions_id = session_create_id(base64_encode($userId));
							$query = "UPDATE `user` SET `sessions_id`='$sessions_id' WHERE `userId`='$userId'";
							if (mysqli_query($conn,$query)){
								echo 'Success';
							} else {
								echo 'Error';
							}
						}
					}		
				} else {
					echo 'No User Found';
				}
			}
		} else {
			echo 'Error';
		}		
	} elseif ($type=='requestNewPwd') {
		// code		
	} elseif ($type=='scriptChangeStatus') {

		$sql = "SELECT sett FROM db_log WHERE sett_for = 'scriptChange'";
		$results = mysqli_query($conn,$sql);
		while ($rows = mysqli_fetch_assoc($results)) {
			echo $rows['sett'];
		}
	} elseif ($type=='alertCenter') {
		$sql = "SELECT id FROM `messages` WHERE type='alert'";
		$results = mysqli_query($conn,$sql);
		$numResults =  mysqli_num_rows($results);
		echo notiCount($numResults);
	} elseif ($type=='alertnotif') {

		$alert = '<h6 class="dropdown-header">Alerts Center</h6>';
		$sql = "SELECT * FROM `messages` WHERE type = 'alert' AND  status = '0' ORDER BY `id` DESC LIMIT 3";
		$results = mysqli_query($conn,$sql);
		if (mysqli_num_rows($results) > 0) {
			while ($rows = mysqli_fetch_assoc($results)) {
				$notifor = $rows['notifor'];
				$content = $rows['message'];
				$alertOn = $rows['timestamp'];
				if ($notifor == 'report') {
					$notifOn = '<div class="mr-3"><div class="icon-circle bg-primary"><i class="fas fa-file-alt text-white"></i></div></div>';
				} elseif ($notifor == 'money') {
					$notifOn = '<div class="mr-3"><div class="icon-circle bg-success"><i class="fas fa-donate text-white"></i></div></div>';
				} elseif ($notifor == 'alert') {
					$notifOn = '<div class="mr-3"><div class="icon-circle bg-warning"><i class="fas fa-exclamation-triangle text-white"></i></div></div>';
				}
				$alert .= '<a class="dropdown-item d-flex align-items-center" href="#">'.$notifOn.'<div><div class="small text-gray-500">'.$alertOn.'</div><span class="font-weight-bold">'.$content.'</span></div><a>';
			}
		} else{
			$alert .= '<a class="dropdown-item d-flex align-items-center"><div><span class="font-weight-bold"> Sorry,No notification recived</span></div><a>';
		}
		$alert .= '<a class="dropdown-item text-center small text-gray-500" href="messgnotif?type=alerts">Show All Alerts</a>';
		echo $alert;
		
	} elseif ($type=='messgnotif') {
		$messages = '';
		$messages .= '<h6 class="dropdown-header">Message Center</h6>';
		
		$sqlM = "SELECT * FROM `messages` WHERE type = 'message' AND status = '0' ORDER BY `id` DESC LIMIT 4";
		$results = mysqli_query($conn,$sqlM);
		if (mysqli_num_rows($results) > 0) {
			while ($rows = mysqli_fetch_assoc($results)) {

				$notifor = $rows['notifor'];
				$notiFrom = $rows['notiFrom'];
				$content = $rows['message'];
				$alertOn = $rows['timestamp'];
				
				$messages .= '<a class="dropdown-item d-flex align-items-center" href="#"><div class="dropdown-list-image mr-3">';
                    
				$sqlSenderImage = "SELECT image,user_name FROM `user` WHERE `userId` = '$notiFrom'";
				$resultsSenderImage = mysqli_query($conn,$sqlSenderImage);
				while ($rowsSenderImage = mysqli_fetch_assoc($resultsSenderImage)) {

					$Sender_Name = $rowsSenderImage['image'];
					$Sender_Image = $rowsSenderImage['user_name'];

					$messages .= '<img class="rounded-circle" src="'.$Sender_Image.'" alt="'.$Sender_Name.' Profile Pic">';

					$sqlLog = "SELECT * FROM `userlog` WHERE user_id = '$notiFrom'";
					$resultsLog = mysqli_query($conn, $sqlLog);
					while ($rowsLog = mysqli_fetch_assoc($resultsLog)) {
					 	$is_active_status =  $rowsLog['status'];
					 	if ($is_active_status ==  'active') {
					 		$messages .= '<div class="status-indicator"></div>';
					 	} elseif ($is_active_status ==  'notactive') {
					 		$messages .= '<div class="status-indicator"></div>';
					 	}
					}
					$messages .= '</div><div><div class="text-truncate">'.$content.'</div><div class="small text-gray-500">'.$Sender_Image.' · '.$alertOn.'</div></div></a>';

				}
			}
		} else {
			$messages .= '<a class="dropdown-item d-flex align-items-center"><div class="dropdown-list-image mr-3"><img class="rounded-circle" src="img/assets/unknown.jpg" alt="Unknown Sender Pic"></div><div><div class="text-truncate">Sorry, No Messages</div><div class="small text-gray-500"></div></div></a>';
		}

		$messages .= '<a class="dropdown-item text-center small text-gray-500" href="messgnotif?type=messages">Read More Messages</a>';
		echo $messages;

	} elseif($type=='messgCenter'){

		$sql = "SELECT id FROM `messages` WHERE type='message'";
		$results = mysqli_query($conn,$sql);
		$numResults =  mysqli_num_rows($results);
		echo notiCount($numResults);

	} elseif($type == 'logout'){
		session_start();
		session_unset();
		session_destroy();
		echo 'logout';
	} elseif ($type == 'textdelete') {
		$textId = $_POST['textID'];
		$sql = "DELETE FROM `texteditor` WHERE uniqId='$textId'";
		mysqli_query($conn,$sql);
		echo 'Blog/Article Deleted';
	} elseif($type = 'logBooksData'){

		$catg = $_POST['catg'];

		if ($catg == 'tabledata') {

			$sql = "SELECT * FROM `pers_log_book`";
			$results = mysqli_query($conn,$sql);
			while ($rows = mysqli_fetch_assoc($results)) {
				$log_for = $rows['logBook_name'];
				$desc = $rows['logBook_desc'];
				$log_id = $rows['log_id'];
				$status = $rows['status'];
				$created_on = $rows['created_on'];

				$dbNeed = '<a class="px-md-1" href="logbooddata?logdata='.$log_id.'"> <i title="View" class="fas fa-eye text-primary"></i> </a><a data_id='.$log_id.' class="px-md-1" onclick="logBookDelete(this.data_id)"> <i title="Delete" class="fas fa-trash text-danger"></i></a>';

				$table = '<tr><td><b>'.strtoupper($log_for).'</b></td><td>'.$desc.'</td><td>'.$created_on.'</td><td>'.$status.'</td><td>'.$dbNeed.'</td></tr>';

				echo $table;						
			}

		} elseif ($catg == 'create_logdataid') {
			
			$logdata_ID = uniqid('logEntryId_',true).$suffCharM;

			$sql = "INSERT INTO `pers_log_book` (`log_id`,`status`) VALUES ('$logdata_ID','0')";
			$results = mysqli_query($conn,$sql);
			if ($results) {
				echo $logdata_ID;
			}

		} elseif($catg == 'newlogbook'){

			$logBookId = $_POST['logbookId'];
			$userId = $_POST['userId'];
			$logName = $_POST['name'];
			$logDesc = $_POST['desc'];

			if (empty($logName)) {

				echo '<div class="alert alert-danger" role="alert"><b>Error!</b> Log-book name is empty. </div>';

			} else {

				$sqlUser = "SELECT `userId` FROM `user` WHERE `userId` = '$userId'";
				$resultsUser = mysqli_query($conn,$sqlUser);
				if (!mysqli_num_rows($resultsUser) > 0) {

					$sqlLogId = "SELECT * FROM `pers_log_book` WHERE `log_id` = '$logBookId' AND `status`='0'";
					$resultsLogId = mysqli_query($conn,$sqlLogId);
					if (mysqli_num_rows($resultsLogId) == 1) {

						$sqlnameCheck = "SELECT `logBook_name` FROM `pers_log_book` WHERE `logBook_name` = '$logName'";
						$resultsnameCheck = mysqli_query($conn,$sqlnameCheck);
						if (!mysqli_num_rows($resultsnameCheck) > 0) {		
			
							$sqlInsert = "UPDATE `pers_log_book` SET `logBook_name`='$logName',`logBook_desc`='$logDesc',`users_log`='$userId',`status`='1' WHERE `log_id`= '$logBookId'";
							$results = mysqli_query($conn,$sqlInsert);
							if ($results) {
								echo '<div class="alert alert-success" role="alert"><b>Success!</b> New Log-Book has been created.</div>';
								$sqlU = "UPDATE `db_log` SET `sett`='1' WHERE `sett_for`='pers_log_book'";
								mysqli_query($conn,$sqlU);
							} else {
								echo '<div class="alert alert-danger" role="alert"><b>Error!</b> Log-book was not created. </div>';
							}
						} else {
							echo '<div class="alert alert-info" role="alert"><b>Alert!</b> The Log-book of this name already exists!</div> ';
						}
					} else{
						echo '<div class="alert alert-info" role="alert"><b>Sorry!</b> An error was found. Please Try Again</div> ';
					}
				} else {
					echo '<div class="alert alert-warning" role="alert"><b>Warning!</b> Please login Before createng or using!</div>';
				}
			}		
		} elseif ($catg == 'logbooksdataid') {
			
			$logdata_ID = uniqid('logBookDataId_',true).$suffCharM;

			$sql = "INSERT INTO `log_content` (`log_id`,`status`) VALUES ('$logdata_ID','1')";
			$results = mysqli_query($conn,$sql);
			if ($results) {
				echo $logdata_ID;
			}
		}

	}

}

// Functions Part

function notiCount($num){
	if ($num == '0') {
		return '0';
	} elseif ($num > 0) {
		return $num;
	} elseif ($num > 3) {
		return '3+';
	}
}


mysqli_close($conn);
exit();