<?php
	session_start();
	
	if(!isset($_SESSION['login'])){
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Cookies, sessions, redirections & upload</title>
	
	<link rel="stylesheet" type="text/css" href="stylepage.css" title="Page" />

</head>
<body>
	<h4>Bienvenue <?php echo $_SESSION['forname'].' '.$_SESSION['name'];?> !</h4>
	
	<p>Avez-vous oublié votre login ? Alors cliquez <a href='page2.php'>ici</a></p>
</body>
</head>