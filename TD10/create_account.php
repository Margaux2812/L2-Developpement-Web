<?php
include('util.inc.php');

if(!empty($_POST["inscription"])) {
	
	/* Regarder s'il y a tous les champs */
		foreach($_POST as $key=>$value) {
			if(empty($_POST[$key])) {
			$error = "Tous les champs sont requis";
			break;
			}
		}
	
	
	/*On cherche notre numero etudiant dans le fichier csv*/
	
	if(!isset($error)){
		if(exists($_POST['login']) == 1){
			$error = 'Vous êtes déjà enregistré dans notre base de données';
		}
		else{ /*L'utilisateur est nouveau*/
		
			/*On crypte le mot de passe */
			$mdp_hash = password_hash(htmlspecialchars($_POST['mdp']), PASSWORD_DEFAULT);
			$name = ucfirst(htmlspecialchars($_POST['name']));
			$forname = ucfirst(htmlspecialchars($_POST['forname']));
		
			$donnees=array( array(
				htmlspecialchars(strtoupper($_POST['login'])),
				$name,
				$forname,
				$mdp_hash
				
				)
			);
			
			$fp = fopen('logins.csv', 'a+');
			foreach($donnees as $fields){
				fputcsv($fp, $fields);
			}
			
			fclose($fp);
		
			$error = "";
			$compte_validé = "Votre compte a été créé ! Vous pouvez maintenant vous connecter";	
			unset($_POST);
		}
	}
	
	
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Créer un compte</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<div id="inscription">
			<h2>Créer un compte</h2>
			
			<h3>Pour s'inscrire, rien de plus simple ! Munissez vous de votre N° Etudiant et le tour est joué !<h3>
			
			<form method="post" action="" enctype="multipart/form-data">
				<table>
				<?php if(!empty($compte_validé)) { ?>
					
					<div class="success"><?php if(isset($compte_validé)) echo $compte_validé; ?></div>
				<?php } ?>
				
				<?php if(!empty($error)) { ?>	
								
					<div class="error"><?php if(isset($error)) echo $error; ?></div>
				<?php } ?>
				
					<tr>
						<td><input type="text" name="login" <?php if(isset($_POST['login'])){ 
																			echo 'value="'.$_POST['login'].'"'; 
																			}else{
																			echo 'placeholder="Login"'; }?> /></td>
					</tr>
					<tr>
						<td><input type="text" name="name" <?php if(isset($_POST['name'])){ 
																			echo 'value="'.$_POST['name'].'"'; 
																			}else{
																			echo 'placeholder="Nom"';}?> /></td>
					</tr>
					<tr>
						<td><input type="text" name="forname" <?php if(isset($_POST['forname'])){ 
																			echo 'value="'.$_POST['forname'].'"'; 
																			}else{
																			echo 'placeholder="Prénom"';}?> /></td>
					</tr>
					<tr>
						<td><input type="password" name="mdp" placeholder="Mot de passe"/></td>
					</tr>
					<tr>
						<td><input type="submit" name="inscription" value="Créer un compte" /></td>
					</tr>
				</table>
			</form>

		</div>