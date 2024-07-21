<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	include('db.conn.php');
	
	$UPPERLETTERS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; $LOWERLETTERS = 'abcdefghijklmnopqrstuvwxyz'; $NUMBERS = '0123456789'; $SPEC_CHAR = '!@#$%^&*'; $idgenUPPER = substr(str_shuffle($UPPERLETTERS), rand(0,9),rand(10,19)); $idgenLOWER = substr(str_shuffle($LOWERLETTERS), rand(0,9),rand(10,19)); $idgenNUM = substr(str_shuffle($NUMBERS), rand(0,9),rand(10,19)); $idgenSP_CHR = substr(str_shuffle($SPEC_CHAR), 0,rand(1,7)); $suffChar = $idgenUPPER.$idgenLOWER.$idgenNUM.$idgenSP_CHR; $suffCharM = substr(str_shuffle($suffChar), 0,rand(10,19)); $editorId = uniqid('editorId_',true).'.'.$suffCharM;

	$type = $_POST['type'];
	if ($type == 'newPost') {
		
		$sql = "INSERT INTO `texteditor`(`uniqId`) VALUES ('$editorId')";
		if (mysqli_query($conn,$sql)) {
			echo $editorId;
		}
	} elseif($type == 'articlesave'){
		$postId = $_POST['postId'];
		$title = $_POST['title'];
		$contType = $_POST['contType'];
		$tags = $_POST['tags'];
		$catg = $_POST['catg'];
		$desc = $_POST['desc'];
		$cont = $_POST['cont'];
		if (empty($title)) {
			$title = 'No data';
		}
		if (empty($tags)) {
			$tags = 'No data';
		}
		if (empty($desc)) {
			$desc = 'No data';
		}
		if (empty($cont)) {
			$cont = 'No data';
		}
		if (!empty($postId)) {
			$sqlS = "SELECT `uniqId` FROM `texteditor` WHERE `uniqId` = '$postId'";
			$results = mysqli_query($conn,$sqlS);
			if (mysqli_num_rows($results) > 0) {
				$sqlU = "UPDATE `texteditor` SET `title`='$title',`contType`='$contType',`catg`='$catg',`tags`='$tags',`description`='$desc',`content`='$cont',`status`='1' WHERE `uniqId` = '$postId'";
				if(mysqli_query($conn,$sqlU)){
					echo '<div class="alert alert-primary" role="alert"> File Saved </div>';
				} else {
					echo '<div class="alert alert-danger" role="alert"> Error Saving the File </div>';
				}
			} else {
				echo '<div class="alert alert-danger" role="alert">Post Of this id was not found </div>';
			}
		} else {
			echo '<div class="alert alert-danger" role="alert"> There is an error </div>';
		}
		
	} elseif ($type == 'older') {
		$postId = $_POST['postId'];		
		$sql = "SELECT * FROM `texteditor` WHERE `uniqId`='$postId'";
		$results = mysqli_query($conn,$sql);
		if (mysqli_num_rows($results)>0) {
			while ( $rows = mysqli_fetch_assoc($results)) {
				$postResults = '<form><div class="form-row"><label>Title</label><input type="text" class="form-control contentTitle" placeholder="Title..." value="'.$rows['title'].'"></div><div class="form-row"><div class="col-4"><label>Type</label><select id="inputState" class="form-control contentType" value="'.$rows['contType'].'"><option value="none" selected>Type</option><option value="Article">Article</option><option value="Blogs">Blogs</option></select></div><div class="col"> <label>Categoty</label><select id="inputState" class="form-control contentCatg" value="'.$rows['catg'].'"><option value="none" selected>Catg</option><option value="Entertainment">Entertainment</option><option value="Business">Business</option><option value="Politics">Politics</option></select></div><div class="col"><label>Tags</label><input type="text" class="form-control contentTags" placeholder="Tags" value="'.$rows['tags'].'"></div></div><div class="form-row"><label>Description</label><textarea class="form-control contentDesc" rows="2" placeholder="Description...">'.$rows['description'].'</textarea></div><div class="form-row"><label>Text Area</label><textarea class="form-control" id="contentData" rows="3" name="editor1">'.$rows['content'].'</textarea><script src="text_editor/ckeditor/ckeditor.js"></script><script>CKEDITOR.replace("editor1", {height: 300,filebrowserUploadUrl: "upload.php"});CKEDITOR.replace("js-my-textarea", {"extraPlugins" : "imagebrowser","imageBrowser_listUrl" : "imagesFolder/"});</script></div></form>';
				echo $postResults; 
			}
		} else { 
			echo '<h2>No Post found with this id.</h2>';
		}
	} elseif($type == "clean"){
		$sqlD = "DELETE FROM `texteditor` WHERE title = ' ' OR status = ' ' OR uniqId = ' '";
		mysqli_query($conn,$sqlD);
	} elseif ($type == "postStatusCode") {
		$statusOff = $_POST['statusOf'];
		if ($statusOff == "active") {
			$sqlStat = "SELECT `status` FROM `texteditor` WHERE status = '1'";
			$results = mysqli_query($conn, $sqlStat);
			echo mysqli_num_rows($results);
		}  elseif ($statusOff == "completed") {
			$sqlStat = "SELECT `status` FROM `texteditor` WHERE status = '2'";
			$results = mysqli_query($conn, $sqlStat);
			echo mysqli_num_rows($results);
		} elseif ($statusOff == "deleted") {
			$sqlStat = "SELECT `status` FROM `texteditor` WHERE status = '3'";
			$results = mysqli_query($conn, $sqlStat);
			echo mysqli_num_rows($results);
		}
	} elseif ($type == "artileList") {
		$sqlL = "SELECT * FROM `texteditor`";
		$results = mysqli_query($conn,$sqlL);
		if (mysqli_num_rows($results) > 0) {
			while ($rows = mysqli_fetch_assoc($results)) {
				$name = $rows['title'];
				$contType = $rows['contType'];
				$tags = $rows['tags'];
				$catg = $rows['catg'];
				$status =  $rows['status'];
				$createdon = $rows['created_on'];	
				if ($rows['status'] == '1' ) {

					$stst = 'Active';
					$starItems = '<div class="btn-group" role="group" aria-label="Basic example"><a class="px-md-1" onclick="finishTextData('.$rows['uniqId'].')"> <i title="Mark Finish" class="fas fa-check text-success"></i></a><a class="px-md-1" href="postEditor?textview='.$rows['uniqId'].'"> <i title="View" class="fas fa-eye text-primary"></i></a><a href="postEditor?texteditor='.$rows['uniqId'].'" class="px-md-1"> <i title="Write" class="fas fa-pen text-muted"></i></a><a class="px-md-1" onclick="deleteTextData('.$rows['uniqId'].')"><i title="Delete" class="fas fa-trash text-danger"></i></a></div>';

				} elseif ($rows['status'] == '3'){

					$stst = 'Deleted';
					$starItems = '<div class="btn-group" role="group" aria-label="Basic example"><a href="postEditor?textview='.$rows['uniqId'].'" class="px-md-1"> <i title="View" class="fas fa-eye text-primary"></i></a></div>';

				} elseif ($rows['status'] == '2'){

					$stst = 'Complete';
					$starItems = '<div class="btn-group" role="group" aria-label="Basic example"><a href="postEditor?textview='.$rows['uniqId'].'" class="px-md-1"> <i title="View" class="fas fa-eye text-primary"></i> </a><a class="px-md-1" onclick="editTextData('.$rows['uniqId'].')"> <i title="Rewrite" class="fas fa-pen text-muted"></i> </a><a class="px-md-1" onclick="deleteTextData('.$rows['uniqId'].')"> <i title="Delete" class="fas fa-trash text-danger"></i> </a></div>';

				} else {

					$stst = 'Error';
					$starItems = 'Error';
				}
				echo '<tr><td><b>'.strtoupper($name).'</b></td><td>'.$contType.'</td><td>'.$tags.'</td><td>'.$catg .'</td><td>'.$createdon.'</td><td>'.$stst.'</td><td class="center-align">'.$starItems.'</td></tr>';
			}
		}
	} elseif ($type == 'articleclean') {
		// $sqlARtiD = "DELETE FROM `texteditor` WHERE `title`=' '";
		// mysqli_query($conn,$sqlARtiD);
	}
}
