<?php 
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		include('db.conn.php');
		$content = $_POST['content'];
		if ( $content == 'image') {
			$sql_files = "SELECT type FROM `assets` WHERE `type` = 'IMAGE'";
			$results = mysqli_query($conn,$sql_files);
			$numImg = mysqli_num_rows($results);
			echo $numImg;

		} elseif ( $content == 'videos' ) {
			$sql_files = "SELECT type FROM `assets` WHERE `type` = 'VIDEOS'";
			$results = mysqli_query($conn,$sql_files);
			$numVid = mysqli_num_rows($results);
			echo $numVid;
		} elseif ( $content == 'icons' ) {
			$sql_files = "SELECT type FROM `assets` WHERE `type` = 'ICON'";
			$results = mysqli_query($conn,$sql_files);
			$numIcon = mysqli_num_rows($results);
			echo $numIcon;
		} elseif ( $content == 'imgResponse' ) {
			$sql_files = "SELECT asset_name,asset_location FROM `assets` WHERE `status` = '1'";
			$results = mysqli_query($conn,$sql_files);
			while ($rows = mysqli_fetch_assoc($results)) {
				$fileName = $rows['asset_name'];
				$Location = $rows['asset_location'];
				echo '<div class="img"><img src="'.$Location.'" alt="'.$fileName.'"></div>
				';
			}
		}
		
	} else {
	    header("Location: ../500");
	    exit();
	}
// echo 'done';