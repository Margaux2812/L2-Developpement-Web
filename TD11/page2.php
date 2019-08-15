<?php
	session_start();
	
	if(!isset($_SESSION['login'])){
		header('Location: index.php');
	}
	
	if(!empty($_POST["logout"])) {
		session_destroy();
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
	<h4>Votre login est <?php echo $_SESSION['login'];?> !</h4>
	
	<p>Pour vous déconnecter cliquez ci-desssous</p>
	<form method="post" action='page2.php'>
		<input type="submit" name="logout" id="logout" value="Déconnexion" />
	</form>
</body>
</head>