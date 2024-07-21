<?php 

// if (($_SERVER['REQUEST_METHOD'] === 'POST')) {
// 	# code...
// }
if (isset($_POST['create_project'])||isset($_POST['create_script'])) {
	if (isset($_POST['create_project'])) {

		$projectLocation = '../projects/project/';
		$projectName = $_POST['project_name'];
		$projectInt = $_POST['project_Inte'];
		$projectDesc = $_POST['project_deln'];
		$direc = $projectLocation . $projectName;
		if (!is_dir($direc)) {

				mkdir($direc);

				$css_dir = $direc.'/css';

				$file = $direc.'/index.html';

				mkdir($css_dir);

				$cssFile = $css_dir.'/style.css';

				$cssdata = '*{
	margin: 0px;
	padding: 0px;
}';

				$indexdata = '<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

</body>
</html>';
				file_put_contents($file, $indexdata);
				file_put_contents($cssFile, $cssdata);
			}
	
	} elseif (isset($_POST['create_script'])) {
		$scriptLocation = '../projects/script/';
		$scriptName = $_POST['script_name'];
	}
}