<?php

include('functions.php');
	
/*-------------LANGUES ALTERNATIVES-------------*/
	
	/*Création d'un array des langues disponibles*/
	$langues = array(
	'fr' => 'Français',
	'en' => 'English',
	);
	if(isSet($_GET['lang']) && array_key_exists($_GET['lang'], $langues)){
		$langUsed = $_GET['lang'];
	}
	elseif(isSet($_COOKIE['lang'])){
		$langUsed = $_COOKIE['lang'];
	}
	else{
		$langUsed = 'fr';
	}

	switch ($langUsed) {
	  case 'en':
	  $lang_file = 'lang.en.php';
	  break;

	  case 'fr':
	  $lang_file = 'lang.fr.php';
	  break;

	  default:
	  $lang_file = 'lang.fr.php';

	}

	include_once 'languages/'.$lang_file;
	
/*-------------FEUILLES DE STYLES ALTERNATIVES-------------*/	

	/* définition des différents styles et changement des noms des styles selon les langues*/
	if($langUsed == 'en'){ 
		$styles = array(
		'rouge' => 'Hot Color Gradient',
		'bleu' => 'Cold Color Gradient',
		);	
	}
	else{
		$styles = array(
		'rouge' => 'Dégradé Chaud',
		'bleu' => 'Dégradé Froid',
		);
	}
	/* si le formulaire de changement de style est rempli avec une valeur correcte */
	if(isset($_GET['style']) && array_key_exists($_GET['style'], $styles)) {
			$style_to_use = $_GET['style'];
	}
	/* sinon, on prend la valeur du cookie s'il existe */
	elseif(isset($_COOKIE['style_to_use'])) {
			$style_to_use = $_COOKIE['style_to_use'];
	}
	/* sinon, la valeur par défaut */
	else {
			$style_to_use = 'rouge';
	}
	
	/* si le formulaire est rempli avec une valeur correcte, on envoie un cookie pour se souvenir du choix du visiteur */
	if(isset($_GET['style']) && array_key_exists($_GET['style'], $styles)) {
        setcookie('style_to_use', $_GET['style'], time() + 60);
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $lang['PAGE_TITLE']; ?></title>
	
	<?php
	/* affichage de la feuille de style à utiliser */
	echo '<link rel="stylesheet" type="text/css" href="styles/'.$style_to_use.'.css" title="'.$styles[$style_to_use]."\" />\n";
	 
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
		<li id="exn1"><a href="#ex1"><?php echo $lang['ex1']; ?></a></li>
		<li id="exn2"><a href="#ex2"><?php echo $lang['ex2']; ?></a></li>
		<li id="exn3"><a href="#ex3"><?php echo $lang['ex3']; ?></a></li>
		<li id="exn4"><a href="#ex4"><?php echo $lang['ex4']; ?></a></li>
		<li id="exn5"><a href="#ex5"><?php echo $lang['ex5']; ?></a></li>
	</ul>
</nav>

<div id="contenu">
	
	<section id="titre">
		<h1><?php echo $lang['H1']; ?></h1>
	</section>
	
	<section id="ex1">
		<h2><?php echo $lang['H2ex1']; ?></h2>
		
	<?php
	echo printTD5();
	?>		
		
	</section>
	
	<section id="ex2">
		<h2><?php echo $lang['H2ex2']; ?></h2>
	
	<p><?php echo $lang['ex2p']; ?></p>

	<ul>
		<li><?php if($langUsed == 'en'){ 
					echo chmodTD8_en('400');
				}else {
					echo chmodTD8('400');
				}?></li>
		<li><?php if($langUsed == 'en'){ 
					echo chmodTD8_en('640');
				}else {
					echo chmodTD8('640');
				}?></li>
		<li><?php if($langUsed == 'en'){ 
					echo chmodTD8_en('755');
				}else {
					echo chmodTD8('755');
				}?></li>
	</ul>
	</section>
	
	<section id="ex3">
	
		<h2><?php echo $lang['H2ex3']; ?></h2>
		<p><?php echo $lang['ex3p1']; ?></p>
			<ul>
				<li><a href="index.php?style=rouge"><?php echo $lang['ex3li1']; ?></a></li>
				<li><a href="index.php?style=bleu"><?php echo $lang['ex3li2']; ?></a></li>
			</ul>
			
		<p><?php echo $lang['ex3p2']; ?></p>
		<form action="index.php" method="get">
			<p>
				<select name="style">
					<?php
					foreach($styles as $key => $value) {
							if($key !== $style_to_use) { // feuilles de style alternatives
									echo '<option value="'.$key.'">'.$value.'</option>'."\n";
							}
							else { // feuille de style à utiliser
									echo '<option value="'.$style_to_use.'" selected="selected">'.$styles[$style_to_use].'</option>'."\n";
							}
					}
					?>
				</select>
				<input type="submit" value="<?php echo $lang['ex3sent']; ?>" />
			</p>
		</form>
		
		<p><?php echo $lang['ex3p3']; ?></p>
		
		<table>
			<tr>
				<td><a href="index.php?style=bleu&lang=en"><img src="Images/en_blue.png" alt="En_Blue"></a></td>
				<td><a href="index.php?style=rouge&lang=en"><img src="Images/en_red.png" alt="En_Red"></a></td>
			</tr>
			<tr>
				<td><a href="index.php?style=bleu&lang=fr"><img src="Images/fr_blue.png" alt="Fr_Blue"></a></td>
				<td><a href="index.php?style=rouge&lang=fr"><img src="Images/fr_red.png" alt="Fr_Red"></a></td>
			</tr>
			
		</table>
		
		<p style="font-size: 15px; font-style: italic;">To change only language to english, please choose on the top menu. / Pour seulement traduire la page vers une autre langue, merci de choisir dans le menu du haut.</p>

		
	</section>
	
	<section id="ex4">
		<h2><?php echo $lang['H2ex4']; ?></h2>
		<?php if($langUsed == 'en'){ 
					echo getMonth_en();
				}else {
					echo getMonth();
				}?>
	</section>
	
	<section id="ex5">
	
		<h2><?php echo $lang['H2ex5']; ?></h2>
		
		<?php if($langUsed == 'en'){ 
					echo calendar_en();
				}else {
					echo calendar();
				}?>
	</section>
</div>

<?php
		include('footer.inc.php');
	?>
</body>
</html>