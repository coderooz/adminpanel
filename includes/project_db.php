<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	include('db.conn.php');
	$dataNeed = $_POST['projectContent'];
	if ($dataNeed == 'table') {
		$sqlProject = "SELECT * FROM `projects`";
		$results = mysqli_query($conn,$sqlProject);
		if (mysqli_num_rows($results) > 0 ) {
			while ($rows = mysqli_fetch_assoc($results)) {
				$name = $rows['name'];
				$deadline = $rows['deadline'];
				$intension = $rows['intension'];
				$createdon = $rows['createdon'];
				if ($rows['status'] === '1' ) {
					$stst = 'Active';
					$starItems = '<div class="btn-group" role="group" aria-label="Basic example">
				              <a href="#" class="px-md-1"> <i title="Database" class="fas fa-table text-warning"></i> </a>
				              <a href="#" class="px-md-1"> <i title="Mark Finish" class="fas fa-check text-success"></i> </a>
				              <a href="#" class="px-md-1"> <i title="View" class="fas fa-eye text-primary"></i> </a>
				              <a href="#" class="px-md-1"> <i title="Delete" class="fas fa-trash text-danger"></i> </a>
				              <a href="#" class="px-md-1"> <i title="Edit" class="fas fa-code text-muted"></i> </a>
				            </div>';
				} elseif ($rows['status'] === '0'){
					$stst = 'Deleted';
					$starItems = '<div class="btn-group" role="group" aria-label="Basic example">
				              <a href="#" class="px-md-1"> <i title="Database" class="fas fa-table text-warning"></i> </a>
				              <a href="#" class="px-md-1"> <i title="Mark Finish" class="fas fa-check text-success"></i> </a>
				              <a href="#" class="px-md-1"> <i title="View" class="fas fa-eye text-primary"></i> </a>
				              <a href="#" class="px-md-1"> <i title="Delete" class="fas fa-trash text-danger"></i> </a>
				              <a href="#" class="px-md-1"> <i title="Edit" class="fas fa-code text-muted"></i> </a>
				            </div>';
				} elseif ($rows['status'] === '2'){
					$stst = 'Complete';
					$starItems = '<div class="btn-group" role="group" aria-label="Basic example">
				              <a href="#" class="px-md-1"> <i title="Database" class="fas fa-table text-warning"></i> </a>
				              <a href="#" class="px-md-1"> <i title="View" class="fas fa-eye text-primary"></i> </a>
				              <a href="#" class="px-md-1"> <i title="Delete" class="fas fa-trash text-danger"></i> </a>
				              <a href="#" class="px-md-1"> <i title="Edit" class="fas fa-code text-muted"></i> </a>
				            </div>';
				} else {
					$stst = 'Error';
					$starItems = 'Error';
				}
				echo '<tr>
				          <td><b>'.strtoupper($name).'</b></td>
				          <td>'.$intension.'</td>
				          <td>'.$createdon.'</td>
				          <td>'.$deadline.'</td>
				          <td>'.$stst.'</td>
				          <td>'.$starItems.'</td>
				        </tr>';

			}
		}
	} elseif ($dataNeed == 'active') {
		$sqlProject = "SELECT status FROM `projects` WHERE status = '1'";
		$results = mysqli_query($conn,$sqlProject);
		$resNum = mysqli_num_rows($results);
		echo $resNum;
	} elseif ($dataNeed == 'delete' ) {
		$sqlProject = "SELECT status FROM `projects` WHERE status = '0'";
		$results = mysqli_query($conn,$sqlProject);
		$resNum = mysqli_num_rows($results);
		echo $resNum;
	} elseif ($dataNeed == 'complete' ) {
		$sqlProject = "SELECT status FROM `projects` WHERE status = '2'";
		$results = mysqli_query($conn,$sqlProject);
		$resNum = mysqli_num_rows($results);
		echo $resNum;
	}
} else {
	header("Location: ../500");
	exit();
}

