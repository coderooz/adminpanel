<!DOCTYPE html>
<?php session_start();
  $sessionId = session_id();
  // echo $sessionId;
if (empty($sessionId)) {
  header("Location: ./login");
  exit();

}
?><html lang="en">
<head>
  <meta charset="utf-8">
  <base href="../adminpanel/">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/favicon-2.png" type="image/x-icon">
  <title>Project Management</title>
  <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="./css/font_family_Nunito_200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i.css" rel="stylesheet">
  <link href="./css/sb-admin-2.min.css" rel="stylesheet">
  <script src="./vendor/jquery/jquery.min.js"></script>
  <link href="./css/dataTables.css" rel="stylesheet">
  <script src="./js/dataTables.js"></script>
</head>
<?php 
  include('includes/db.conn.php');
?>
<body id="page-top">
  <div id="wrapper"><?php echo '<input type="hidden" id="userUniqId" value="'.$sessionId.'">';  ?>