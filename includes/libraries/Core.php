<?php 


class Core extends DbController
{
	
	private $queryReport = array('status' => '', 'message'=>'', 'data'=> '');

	public function UniqidSet($IdFor)
	{
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
		$UniqIdIs = uniqid($IdFor.'_',true).$suffCharM ;

		return $UniqIdIs;
	}

	public function fileCreater($files,$file_data)
	{
		if (file_exists($files)) {
			return 'file_error1';
		} else {
			file_put_contents(filename, data);
		}
	} 


	public function UserTask($UserData = array() )
	{
		$queryReport = array('status' => '', 'message'=>'', 'data'=> '');
		$type = $UserData['type'];

		if ($type == 'idInsert') {


			$idType = $UserData['Idtype'];
			$uniqId = $UserData['id'];

			$uniqid = $this->UniqidSet('login');
			$tableName = 'tmpsesid';
			$params = "(`type`, `typeid`, `status`) VALUES ('$idType','$uniqId',0)";		
			$task = $this->Insert($tableName,$params);

		} elseif ($type == 'login') {
		
		} elseif ($type == 'loginUser') {

			/*
			   To Check loginId exists  or not
			*/

			$idData = $UserData['loginid'];
			$Email = $UserData['email'];
			$password = $UserData['pwd'];

			$tableName = 'tmpsesid';
			$rowsReq = 'type,typeId,status';
			$params= "WHERE type='login' AND typeId ='$idData' AND status = '0' ";

			$loginSearch = $this->CountData($tableName, $rowsReq, $params);

			if ($loginSearch == 1) {
				
				if ( empty($username) || empty($userpwd) ) {

					$data['status'] = 'error';
					$data['message'] = '<div class="alert alert-danger" role="alert"><b>Warning!</b> Empty Fields Found.</div>';

				} else {
					
					$user_tableName = 'user';
					$user_rowsReq = 'user_email';
					$user_params = "WHERE user_email = '$Email";
					$userSearch = $this->CountData($user_tableName, $user_rowsReq, $user_params);

					if ($userSearch > 1) {
						
						$user_tableName = 'user';
						$user_rowsReq = 'user_email,password';
						$user_params = "WHERE user_email = '$Email'";
						$fetchType = 'false';

						$fetchedData = $this->Fetch($user_tableName, $user_rowsReq, $fetchType, $user_params);

						$pwdCheck = password_verify($userpwd, $fetchedData[0]['password']);
						if ($pwdCheck == false) {

							$data['status'] = 'error';
							$data['message'] = '<div class="alert alert-danger" role="alert"><b>Wrong Password</div>';

						} elseif ($pwdCheck == true) {
							session_start();
							$_SESSION['id'] = $rows['userId'];
							$data['status'] = 'success';
							$data['message'] = '<div class="alert alert-primary" role="alert"><b>Log-In Succes!</div>';
						}
						
					} else {
						$data['status'] = 'redirect';
						$data['message'] = '<div class="alert alert-info" role="alert"><b>Sorry! No User Found</div>';
					}

				}

			} else {
				$queryReport['status'] = 'error';
				$queryReport['message'] = '<div class="alert alert-info" role="alert"><b>Error!</b>Plz try again.</div>';
			}
		
		} elseif ($type == 'register') {
		
		} elseif ($type == 'registration') {
		
		} elseif ($type == 'requestNewPwd') {
		
		}


		return $queryReport;
	}


	// public function DbQueries($QueryType, $table, $query, $extraParams = '')
	// {
	// 	if ($QueryType == 'Insert') {

	// 		$insert = $this->Update($table,$query,$extraParams);
	// 		return $insert;

	// 	} elseif ($QueryType == 'Delete') {
		
	// 		$deleted = $this->Delete($table,$query);

	// 		return $deleted;

	// 	} elseif ($QueryType == 'Update') {
		
	// 		$updated = $this->Update($table,$params,$UpdateOn='');

	// 		return $updated;

	// 	} elseif ($QueryType == 'Select') {

	// 		$fetch = $this->Fetch($tableName, $tableRows, $fetchType, $quries='');
			
	// 		return $fetch;
		
	// 	} elseif ($QueryType == 'Count') {

	// 		$CountData = $this->CountData($tableName, $rowsReq, $params='');
			
	// 		return $CountData;
		
	// 	}
	// }


}