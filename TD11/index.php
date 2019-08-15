<?php	
include('functions.inc.php');

/*-------------FEUILLES DE STYLES ALTERNATIVES-------------*/	

	/* définition des différents styles */

	$styles = array(
	'rouge' => 'Dégradé Chaud',
	'bleu' => 'Dégradé Froid',
	);
	
	/* si le formulaire de changement de style est rempli avec une valeur correcte */
	if(isset($_GET['style']) && array_key_exists($_GET['style'], $styles)) {
		$style_to_use = $_GET['style'];
		setcookie('style_to_use', $style_to_use, time()+60, '/Dev_Web/TD11/', '', false, true);
	}
	/* sinon, on prend la valeur du cookie s'il existe */
	elseif(isset($_COOKIE['style_to_use'])) {
		$style_to_use = $_COOKIE['style_to_use'];
	}
	/* sinon, la valeur par défaut */
	else {
		$style_to_use = 'rouge';
	}
	

	
if(!empty($_POST["connexion"])) {
	/* Regarder s'il y a tous les champs */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$erreur = "Tous les champs sont requis";
		break;
		}
	}
	
	if(!isset($erreur)){
		if(dontmatch($_POST['login'], $_POST['pass'])){
			$erreur = 'Login ou mot de passe incorrect';
		}else{
			
			$infos = recuperer(htmlspecialchars($_POST['login']));
			
			session_start();
			
			$_SESSION['login'] = $infos['login'];
			$_SESSION['name'] = $infos['name'];
			$_SESSION['forname'] = $infos['forname'];
			
			header("Location: page.php");
		}
	}
		
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Cookies, sessions, redirections & upload</title>
	
	<?php
	/* affichage de la feuille de style à utiliser */
	echo '<link rel="stylesheet" type="text/css" href="styles/'.$style_to_use.'.css" title="'.$styles[$style_to_use].'" />';
	 
	/* affichage des feuilles de style alternatives */
	foreach($styles as $key => $value) {
			if($key !== $style_to_use) {
					echo '<link rel="alternate stylesheet" type="text/css" href="styles/'.$key.'.css" title="'.$value.'" />'."\n";
			}
	}
	?>
</head>
<body>
	<?php
		include('header.inc.php');
	?>
	
<nav id="intern">
	<ul>
		<li id="menu">Menu</li>
		<li id="exn1"><a href="#ex1">Exercice n°1</a></li>
		<li id="exn2"><a href="#ex2">Exercice n°2</a></li>
		<li id="exn3"><a href="#ex3">Exercice n°3</a></li>
	</ul>
</nav>
	

<div id="contenu">
	
	<section id="titre">
		<h1>TD11 : cookies, sessions, redirections & upload</h1>
	</section>
	
	<section id="ex1">
		<h2>Exercice 1 : cookie</h2>
		
		<p>Reprendre l'exercice permettant le choix de la charte graphique en mettant en place un cookie
		afin de permettre une mémorisation du choix de la charte graphique (celle-ci étant conservée sur les
		pages du site et lors d'une visite ultérieure depuis le même navigateur).
		Si la valeur du cookie est erronée, supprimez-le.
		</p>
			<ul>
				<li><a href="index.php?style=rouge">Changer la couleur de la page en couleurs chaudes</a></li>
				<li><a href="index.php?style=bleu">Changer la couleur de la page en couleurs froides</a></li>
			</ul>
		
	</section>
	
	<section id="ex2">
	
		<h2>Exercice 2 : session</h2>
		
		
		<p>Il a été créé un fichier CSV contenant les identifiants, mots de passe cryptés, prénoms et noms des
		utilisateurs autorisés à se connecter au site.
		Vérifiez si le votre est valide !
		</p>
		
		<div id='conteneur_form'>
			<form method="post" action='index.php#ex3' id="login_form">
					<table>
						<tr>
							<td class='labels'> <label for="login">Login</label> </td>
							<td class='labels'> <label for="pass">Mot de passe</label> </td>
							<td></td>
						</tr>
						<tr>
							<td><input type="text" name="login" id="login" size="15"/></td>
							<td><input type="password" name="pass" id="pass" size="15"/></td>
							<td class='button'><input type="submit" name="connexion" value="Connexion"/></td>
						</tr>
						<?php if(!empty($erreur)) {?>
						<tr class="erreur">
							<td colspan='3'><?php echo $erreur;	?></td>
						</tr>
						<?php }?>
					</table>
			</form>
		</div>
		
		<div id='login_working'>
			<p id='note'>PS: Voici un login et un mot de passe étant autorisés :<br>
			Login: shawking (il n'est pas sensible à la casse)<br>
			Mot de passe: Physics<br>
			&#9786;
			</p>
		</div>
	</section>
	
	<section id="ex3">
		<h2>Exercice 3 : redirection HTML, coté client.</h2>
		
		<a href='redirection.html'>Page de redirection en HTML</a>
	
	</section>
	
	<section id="ex5">
	
		<h2>Exercice 5 : upload d’une image depuis le navigateur vers le serveur.</h2>
		
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
		     <label for="image">Image (JPG, PNG ou GIF | max. 150 Ko) :</label>
		     <input type="hidden" name="MAX_FILE_SIZE" value="153600" />
		     <input type="file" name="image" id="image" />
		     <input type="submit" name="submit" value="Envoyer" />
		</form>
		
		<?php 
			if(isset($_POST['submit'])){
				if(!empty($_FILES['image']['tmp_name'])){
					$isimage = getimagesize($_FILES["image"]["tmp_name"]);
				    if($isimage !== false) {
				        if ($_FILES["image"]["size"] > 153600) {
							    echo "<p>Selectionnez une image moins volumineuse.</p>";
						}else{
							/*On télécharge l'image*/
							
							upload($_FILES['image']);
							
							echo'<p>Votre image a bien été téléchargée</p>';
						}		
				    } else {
				        echo "<p>Vous devez joindre une image.</p>";
				    }	
				}else{
					echo "<p>Selectionnez une image moins volumineuse.</p>";
				}		
			}
		
		
		?>

		
	</section>
	
</div>

<?php
		include('../TD8/footer.inc.php');
	?>
</body>
</html>