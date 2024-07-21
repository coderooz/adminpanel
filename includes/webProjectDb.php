<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	include('db.conn.php');
	$type = $_POST['type'];
	if ($type == 'websiteStatus') {
		$StatusNeed = $_POST['StatusNeed'];
		if ($StatusNeed == 'active') {
			$sql = "SELECT status FROM `webprojects` WHERE `status` = '1'";
			$results = mysqli_query($conn, $sql);
			echo mysqli_num_rows($results);
		} elseif ($StatusNeed == 'complete') {
			$sql = "SELECT status FROM `webprojects` WHERE `status` = '2'";
			$results = mysqli_query($conn, $sql);
			echo mysqli_num_rows($results);
		} elseif ($StatusNeed == 'deleted') {
			$sql = "SELECT status FROM `webprojects` WHERE `status` = '3'";
			$results = mysqli_query($conn, $sql);
			echo mysqli_num_rows($results);
		}
	} elseif ($type == 'websiteDbTable') {
		$sql = "SELECT * FROM `webprojects`";
		$results = mysqli_query($conn, $sql);
		if (mysqli_num_rows($results) > 0) {
			while ($rows = mysqli_fetch_assoc($results)) {
				$name = $rows['project_name'];
				$status =  $rows['status'];
				$createdon = $rows['timestamp']; 	
				if ($rows['status'] === '1' ) {

					$stst = 'Active';
					$starItems = '<div class="btn-group" role="group" aria-label="Basic example">
				              <a href="#" class="px-md-1"> <i title="Mark Finish" class="fas fa-check text-success"></i> </a>
				              <a href="#" class="px-md-1"> <i title="View" class="fas fa-eye text-primary"></i> </a>
				              <a href="#" class="px-md-1"> <i title="Delete" class="fas fa-trash text-danger"></i> </a>
				            </div>';

				} elseif ($rows['status'] === '3'){

					$stst = 'Deleted';
					$starItems = '<div class="btn-group" role="group" aria-label="Basic example">
				              <a href="#" class="px-md-1"> <i title="View" class="fas fa-eye text-primary"></i> </a>
				            </div>';

				} elseif ($rows['status'] === '2'){

					$stst = 'Complete';
					$starItems = '<div class="btn-group" role="group" aria-label="Basic example">
				              <a href="#" class="px-md-1"> <i title="View" class="fas fa-eye text-primary"></i> </a>
				              <a href="#" class="px-md-1"> <i title="Edit" class="fas fa-code text-muted"></i> </a>
				              <a href="#" class="px-md-1"> <i title="Delete" class="fas fa-trash text-danger"></i> </a>
				            </div>';

				} else {

					$stst = 'Error';
					$starItems = 'Error';
				}
				echo '<tr>
				          <td><b>'.strtoupper($name).'</b></td>
				          <td>'.$createdon.'</td>
				          <td>'.$stst.'</td>
				          <td>'.$starItems.'</td>
				        </tr>';
			} 	
		}
	}
}