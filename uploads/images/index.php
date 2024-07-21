<?php include '../dbconn.php';
error_reporting(0);
 ?>
 <html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<base>
		<link rel="stylesheet" href="browser.css">
	</head>
		<body>
			<div>
				<div>
					<h1>Upload Or Select</h1>
					<?php if (isset($_GET['status'])) {
						if ($_GET['status'] == "success") {
							echo "<p>Uploading Successfull :)</p>";
						} elseif ($_GET['status'] == "file_too_big") {
							echo "<p>Uploading Failed :( <br> File is too big!</p>";
						} elseif ($_GET['status'] == "uploaderror") {
							echo "<p>Uploading Failed :( <br> There is an error in file!</p>";
						} elseif ($_GET['status'] == "file_upload_not_allowed") {
							echo "<p>Uploading Failed :( <br> File not supported! </p>";		
						}
					} ?>
					<form action="fileupload.php" method="POST" enctype="multipart/form-data" >
						<label>Select Images</label>
						<input type="file" name="upload" multiple="">
						<input type="submit" name="upload-submit">
					</form>
				</div>
				<div>
					<?php 		
					$sql = "SELECT * FROM `images` WHERE userid = 1";
					$results = mysqli_query($conn, $sql);
					$resultChecks = mysqli_num_rows($results);	                                        	
			    	if ($resultChecks > 0) {
			    		while ( $row = mysqli_fetch_assoc($results) ) {   		
			    		$images = $row['images'];
			    		
			    			echo '<a href="javascript://" class="thumbnail js-image-link" data-url="imagesFolder/'.$images.'"><img src="'.$images.'"></a>';

			    		}
			    	} 
					 ?>
				</div>
			</div>
		</body>

	<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="browser.js"></script>	
<script type="text/javascript">
	/*var CKEditorFuncNum ="<?php echo $_REQUEST['CKEditorFuncNum']; ?>";
	var url = "http://<?php echo $_SERVER['SERVER_NAME']; ?>/ckeditor/imageFolder";
	function selectImages(imgName) {
		url += imgName;
		window.opener.CKEDITOR.tools.callFunction(CKEditorFuncNum, url);
		window.close();
	}*/
	CkEditorImageBrowser.init();
</script>





