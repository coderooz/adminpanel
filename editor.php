<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
	
	if ( isset($_POST['create_project'])|| isset($_POST['create_script'])) {
		if (isset($_POST['create_project'])) {
			$projectName = $_POST['project_name'];
			$projectInt = $_POST['project_Inte'];
			$Deadline = $_POST['project_deln'];
			$project_desc = $_POST['project_desc'];
			$dataURI = 'type=project&project_name='.$projectName.'&project_Inte='.$projectInt.'&deadline='.$Deadline.'&desc='.$project_desc;
		}elseif (isset($_POST['create_script'])) {
			$scriptLocation = 'projects/script/';
			$scriptName = $_POST['script_name'];
			$dataURI = 'type=script&scriptname='.$scriptName;
		}
		echo '<input type="hidden" name="dataUrI" id="datauris" value="'.$dataURI.'">';
	}
	
?>

	<link rel="stylesheet" href="./style.css">
	<input type="hidden" id="projectPath" value="C:/xampp/htdocs/test files/coderTest/">
	<div class="section3">
		<div class="editorbody editorInput">
			<div id="dragbar"></div>
			<div id="editor"></div>
		</div>
		
		<div class="editorOutput editorbody" id="outputBody">
			<iframe id="windowPreview" frameborder="0"></iframe>
		</div>
	</div>
	<script src="js/main.js"></script>
 	<script type="text/javascript">$(document).ready(function(){editor()});</script>
<?php
  include('includes/script.php');
  include('includes/footer.php');
?>