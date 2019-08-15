<?php

/*On indique un nombre et on le convertit en base 2, 8,
10 et 16. Il ne doit pas dépasser 15.
Le second paramatre est par défaut l'affichage
en colonne*/
function converterDec($key=15, $display='c'){
	if($key<=15){	
		if($display=='l'){//En ligne
			
			//Ligne binaire
			
			$result = "<table>\n
							<tr>\n
								<th>Binaire</th>";
			for($num_dec=0; $num_dec<=$key; $num_dec++) {

				$bin = sprintf("%08d",decbin($num_dec));
				$result .= "<td>".$bin."</td>";
			}
			
			//Ligne octale
			$result .= "</tr>\n
							<tr>\n
							<th>Octal</th>";
			for($num_dec=0; $num_dec<=$key; $num_dec++) {
				$oct = sprintf("%02d",decoct($num_dec));	
				$result .= "<td>".$oct."</td>";
			}
			
			//Ligne décimale
			$result .= "</tr>\n
							<tr>\n
							<th>Décimal</th>";
			for($num_dec=0; $num_dec<=$key; $num_dec++) {
				$num_dec = sprintf("%02d",$num_dec);
				$result .= "<td>".$num_dec."</td>";
			}
			
			//Ligne hexadécimale
			$result .= "</tr>\n
							<tr>\n
							<th>Octal</th>";
			for($num_dec=0; $num_dec<=$key; $num_dec++) {
				$hex = sprintf("%02s", dechex($num_dec));
				
				$hex = strtoupper($hex);
				$result .= "<td>".$hex."</td>";
			}
			$result .= "</tr>";
		}
		else{ //En colonne
			$result = "<table>
				<tr>
					<th>Binaire</th>
					<th>Octal</th>	
					<th>Décimal</th>
					<th>Hexadécimal</th>	
				</tr>";
			
			for($num_dec=0; $num_dec<=$key; $num_dec++) {
				
				$bin = sprintf("%08d",decbin($num_dec));
				$oct = sprintf("%02d",decoct($num_dec));
				$num_dec = sprintf("%02d",$num_dec);
				$hex = sprintf("%02s", dechex($num_dec));
				
				$hex = strtoupper($hex);
				
				$result .=  "<tr>\n
							<td>".$bin."</td>
							<td>".$oct."</td>
							<td>".$num_dec."</td>
							<td>".$hex."</td>
						</tr>\n";			
			}
		}
		
		$result .=  "</table>";
	}
	else{
		$result = "Veuillez choisir un nombre plus petit";
	}
	return $result;
}

/*Pour le nombre du jour allant de 1 à 7,
	on affiche son nom*/
function tableDaysEng(){
	$days = "<table>
			<tr><th>Days</th></tr>
	";
	for ($d=1; $d<=7; $d++) {
		 $day = date('l', mktime(0,0,0,1, $d, date('Y')));
		 $days .= "<tr><td>".$day."</td></tr>";
	} 
	$days .= "</table>";
	
	return $days;
}

/*Pour le nombre du jour allant de 1 à 7,
	on affiche son nom en français grâce à un 
	tableau créé préalablement*/
function tableDaysFr(){
	$days = "<table>
			<tr><th>Jours</th></tr>
	";
	$jours = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
	
	for ($d=0; $d<7; $d++) {
		 $days .= "<tr><td>".$jours[$d]."</td></tr>";
	} 

	$days .= "</table>";
	
	return $days;
}

/*Pour le nombre du mois allant de 1 à 12,
	on affiche son nom*/
function tableMonthEng(){
	$months = "<table>
			<tr><th>Months</th></tr>
	";
	
	
	for ($m=1; $m<=12; $m++) {
		 $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
		 $months .= "<tr><td>".$month."</td></tr>";
	} 
	$months .= "</table>";
	
	return $months;
}

/*Pour le nombre du mois allant de 1 à 12,
	on affiche son nom en français grâce à un 
	tableau créé préalablement*/
function tableMonthFr(){
	$mois = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");

	$months = "<table>
			<tr><th>Mois</th></tr>
	";
	for ($m=0; $m<12; $m++) {
		 $months .= "<tr><td>".$mois[$m]."</td></tr>";
	} 
	$months .= "</table>";
	
	return $months;
}		 

/*On utilise la méthode 'parse_url' qui va retourner
	un tableau associatif contenant tous les éléments qui 
	sont présents dans l'url
On retourne la clé 'scheme' qui correspond au protocole*/
function getProtocole($url){
	
	$parsed = parse_url($url);
	
	return $parsed["scheme"];
}

/*On prend la clé 'host' et on la divise en un
	tableau d'éléments séparé préalablement par un '.'
On retourne le dernier élément du tableau qui
	correspond au TLD*/		
function getTLD($url){
	$parsed = parse_url($url);
	
	$cut = explode ('.', $parsed["host"]);
	
	$tableauAssociatif = array(
		'fr' => 'France',
		'com' => 'Domaine commercial'	,
		'org' => 'Organisations à but non commercial',
		'net' => 'Network (réseau)'
	);
	return $tableauAssociatif[$cut[2]];	
}

/*On utilise à nouveau la méthode précédente
On retourne le deuxième élément du tableau qui
	correspond à l'organisme*/
function getOrganisme($url){
	$parsed = parse_url($url);

	$cut = explode ('.', $parsed["host"]);

	return $cut[1];
}

/*On utilise à nouveau la méthode précédente
On retourne le premier élément du tableau qui
	correspond au nom de la machine*/
function getNomMachine($url){
	$parsed = parse_url($url);
	
	$cut = explode ('.', $parsed["host"]);
	
	return $cut[0];
}

/*On utilise les méthodes précédente pour avoir un tableau 
avec les informations*/
function extract_url($url){
	$URLInfo = "<table>
				<tr>
					<th>Protocole</th>
					<th>Top Level Domain (TLD)</th>
					<th>Organisme</th>
					<th>Nom de la machine</th>
				</tr>
				<tr>
				<td>".getProtocole($url)."</td>
				<td>".getTLD($url)."</td>
				<td>".getOrganisme($url)."</td>
				<td>".getNomMachine($url)."</td>
			</tr>
		</table>";
	
	return $URLInfo;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>PHP - fonctions, constantes, tableaux et constructions multifichiers</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<header>

	<div id="logo">
		<figure> <a href="https://www.u-cergy.fr/fr/index.html"><img src="../Images/logo-ucp.png" alt="Logo UCP"></a>
		<figcaption>Partenaire</figcaption>		
		</figure>
	</div>
	
	<nav id="princ">
	<ul>
		<li><a href="../index.html">Accueil</a></li>
		<li><a href="../TD5/index.php">TD 5</a></li>
		<li><a href="../TD6/index.php">TD 6</a></li>
		<li id="encours"><a href="index.php">TD 7</a></li>
		<li><a href="../TD8/index.php">TD 8</a></li>
		<li><a href="../TD9/index.php">TD 9</a></li>
		<li><a href="../TD10/index.php">TD 10</a></li>
		<li><a href="../TD11/index.php">TD 11</a></li>
		<li><a href="../TD12/index.php">TD 12</a></li>
		<li><a href="../contact.html" >Contact</a></li>
	</ul>
	</nav>
	
</header>

<nav id="intern">
	<ul>
		<li id="menu">Menu</li>
		<li id="exn2"><a href="#ex2">Exercice n°2</a></li>
		<li id="exn3"><a href="#ex3">Exercice n°3</a></li>
		<li id="exn4"><a href="#ex4">Exercice n°4</a></li>
		<li id="exn5"><a href="#ex5">Exercice n°5</a></li>
	</ul>
</nav>

<div id="contenu">
	
	<section id="titre">
		<h1>TD7 : PHP - fonctions, constantes, tableaux et constructions multifichiers</h1>
	</section>
	
	<section id="ex2">
		<h2>Exercice 2 : fonctions, constantes et constructions multifichiers</h2>
		<?php
		echo converterDec(15, 'l');
		echo converterDec();
		?>
	</section>
	
	<section id="ex3">
	
		<h2>Exercice 3 : fonctions PHP et tableaux PHP</h2>
		
		<?php
		echo"<table id=\"autour\">
		<tr>
				<td class=\"autourtd\">".tableDaysEng()."</td> 
				<td class=\"autourtd\">".tableDaysFr()."</td> 
				<td class=\"autourtd\">".tableMonthEng()."</td> 
				<td class=\"autourtd\">".tableMonthFr()."</td>
		</tr>
		</table>";
		?>
	</section>
	
	<section id="ex4">
		<h2>Exercice 4 : détecter le navigateur de l’internaute</h2>
		<p>Voir le footer</p>
	</section>
	
	<section id="ex5">
	
		<h2>Exercice 5 : fonction et tableau PHP : URL</h2>
		<?php
			$url = 'http://www.u-cergy.fr';
			echo extract_url($url);
		?>
	</section>
</div>

<footer>
	<p id="bottom"> <a href="#">Retour en haut de page</a></p>
	<?php 
		include 'include/util.inc.php'; 
		echo getDateFrOrEn()."\n".getDateFrOrEn('en');
		echo "\n<p class=\"small\">".$_SERVER['HTTP_USER_AGENT']."</p>\n";
	?>
	<p class="small">&copy; Margaux VAILLANT L2-M</p>
</footer>
</body>
</html>