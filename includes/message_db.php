<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	include('db.conn.php');

	$type = $_POST['type'];

	if ($type == 'messages'){

		$message1 = 'all';
		$message2 = 'message';
		$message3 = 'notification';

		$pageData = '<div class="d-sm-flex align-items-center justify-content-between mb-4"><h1 class="h3 mb-0 text-gray-800">Message & Notification</h1><div class="dropdown no-arrow mb-4"><button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Content</button><div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" id="messnotiAll" onclick="notifiMessgPage('.$message1.')" >All</a><a  onclick="notifiMessgPage('.$message2.')" class="dropdown-item" id="messAll">Messages</a><a class="dropdown-item" onclick="notifiMessgPage('.$message3.')" id="notiAll">Notifications</a></div></div></div>';

		$noti = $_POST['notifi'];
		if ($noti == 'notifAlerts') {
			
		} elseif ($noti == 'notifMessage'){
			
		}	elseif($noti == 'notifNon') {

			$pageData .= '<div class="row"><div class="col-xl-3 col-md-6 mb-4"><div class="card border-left-primary shadow h-100 py-2"><div class="card-body"><div class="row no-gutters align-items-center"><div class="col mr-2"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Alerts</div><div class="h5 mb-0 font-weight-bold text-gray-800" id="alertNo">';

	        $sql = "SELECT id FROM `messages` WHERE type='alert'";
			$results = mysqli_query($conn,$sql);
			$pageData .= mysqli_num_rows($results); 

	        $pageData .='</div>
		        </div>
		        <div class="col-auto">
		        	<i class="fas fa-bell fa-2x text-gray-300"></i>
		        </div>
		    </div>
	    </div>
	</div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
	<div class="card border-left-success shadow h-100 py-2"><div class="card-body">
		<div class="row no-gutters align-items-center">
			<div class="col mr-2"><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Messages</div>
				<div class="h5 mb-0 font-weight-bold text-gray-800" id="messageNo">';

	      	$sql = "SELECT id FROM `messages` WHERE type='message'";
			$results = mysqli_query($conn,$sql);
			$pageData .= mysqli_num_rows($results);
	        $pageData .='</div>
	        		</div>
	        		<div class="col-auto">
	        			<i class="fas fa-envelope fa-2x text-gray-300"></i>
	        		</div>
	        	</div>
	    	</div>
		</div>
	</div>
</div>';
	    
		}
		echo $pageData;	
	} elseif($type == 'messagesCheck'){
		$check = $_POST['checkfor'];
		if ($noti == 'notifAlerts') {
			$sql = "SELECT * FROM `db_log` WHERE sett_for = 'alerts' AND sett= '1' ";
			$results = mysqli_query($conn,$sql);
			if (mysqli_num_rows($results) == 1) {
				echo 'True';
				$sqlU = "UPDATE `db_log` SET `sett`='1' WHERE `sett_for`='alerts'"; 
				mysqli_query($conn,$sqlU);
			}
			
		} elseif ($noti == 'notifMessage'){

			$sql = "SELECT * FROM `db_log` WHERE sett_for = 'message' AND sett= '1' ";
			$results = mysqli_query($conn,$sql);
			if (mysqli_num_rows($results) == 1) {
				echo 'True';
				$sqlU = "UPDATE `db_log` SET `sett`='1' WHERE `sett_for`='message'"; 
				mysqli_query($conn,$sqlU);
			}
			
		}	elseif($noti == 'notifNon') {

			$sql = "SELECT * FROM `db_log` WHERE sett_for = 'alerts' OR sett_for = 'message' AND sett= '1' ";
			$results = mysqli_query($conn,$sql);
			if (mysqli_num_rows($results) == 1) {
				echo 'True';
				$sqlU = "UPDATE `db_log` SET `sett`='1' WHERE `sett_for`='alerts' AND sett_for = 'message'"; 
				mysqli_query($conn,$sqlU);
			}

		}
	} elseif ($type == 'messageBodyReplace') {
		$bodyFro = $_POST['bodyfor'];

	}	

} else {
	header("Location: ../404");
}
exit();