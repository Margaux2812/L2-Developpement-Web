<?php
	if(isset($_POST['convert'])){
		$ex1 = strtoupper(htmlspecialchars($_POST['input']));
	}
	if(isset($_POST['converthex'])){
		$ex2 = dechex(htmlspecialchars((int)$_POST['deci']));
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Convertisseur</title>
	<link rel="stylesheet" type="text/css" href="../TD12/style.css"/>
	
</head>
<body>
<?php 
if(isset($ex1)){
?>
<h2><?php echo $ex1; ?></h2>
<?php
}
?>
<?php 
if(isset($ex2)){
?>
<h2><?php echo $ex2; ?></h2>
<?php
}
?>
</body>
</html>