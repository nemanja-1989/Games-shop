<?php
	
	$token = md5(time().microtime().uniqid());
	session_start();
	$_SESSION["token"] = $token;
?>
<html>	
	<head>
	<style>	
		
	</style>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/loginForm.css">
	</head>
	<body>
		<div id="wrapper">
			<?php require_once "inc/headerForm.php"; ?>
			<?php require_once "inc/mainFormLogin.php"; ?>
			<?php require_once "inc/footerForm.php"; ?>
		</div><!--end wrapper-->
	</body>
</html>