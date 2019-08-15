<?php
function helloToKey($key){
	//On met notre oucle dans une liste
	$result = "<ul>\n";
	//On répète le message autant de fois que demandé
	for($num_message = 1; $num_message <= $key; $num_message++){
		//On l'affiche dans un <li>
		$result .= '<li> Hello numéro ' . $num_message . "</li>\n";		
	}	
	//On ferme notre liste
	$result .= "</ul>\n";	
	
	return $result;
}

function getDateFr() {
	//On retourne l'heure
	return date("H:i");
}

function decToHex($key){
	/*On ouvre un tableau et on écrit les th
	présents sur la première ligne*/
	$result = "<table>\n
			<tr>\n
				<th>Décimal</th>\n
				<th>Héxadécimal avec dechex()</th>\n
				<th>Héxadécimal avec printf()</th>\n
			</tr>\n";
	
	/*On décide qu'il y aura autant de ligne que demandé*/
	for($numero_decimal = 0; $numero_decimal <= $key; $numero_decimal++) {
		
		//On ouvre donc une ligne et on y écrit la valeur du numéro décimal
		$result .='
			<tr>
				<td>' . $numero_decimal ."</td>";
				
		/*Si le numéro décimal est supérieur à 9, 
		alors les caractères héxadécimaux changent*/
		if($numero_decimal > 9) {
			
			/*On affiche donc dans une première case le numéro décimal
			en numéro héxadécimal avec dechex et on met la lettre en majuscule*/
			$result .= '<td>' . strtoupper(dechex($numero_decimal)) ."</td>";
			
			/*Avec la méthode printf, on fait un switch case selon les valeurs
			du numéro décimal*/
			switch($numero_decimal) {
				case 10: $result .='<td>';
					$result .= sprintf('A');
					$result .= "</td>";
					break;
				case 11: $result .='<td>';
					$result .= sprintf('B');
					$result .="</td>";
					break;
				case 12: $result .='<td>';
					$result .= sprintf('C');
					$result .="</td>";
					break;
				case 13: $result .='<td>';
					$result .= sprintf('D');
					$result .="</td>";
					break;
				case 14: $result .='<td>';
					$result .= sprintf('E');
					$result .="</td>";
					break;
				case 15: $result .='<td>';
					$result .= sprintf('F');
					$result .="</td>";
					break;
			}
			//On ferme notre ligne
			$result .="</tr>\n";
		}
		
		/*Si le numéro décimal est inférieur à 9
		alors c'est le même donc on l'écrit dans deux cases
		et on ferme notre ligne*/
		else{
			$result .='<td>' . $numero_decimal ."</td>
				<td>";
			$result .= sprintf("%d", $numero_decimal);
			$result .= "</td>
			</tr>\n";
		}
	}
	
	//On ferme notre tableau
	$result .= "</table>\n";
	
	return $result;
}

function table($key=10){
	
	/*On ouvre un tableau et on ajoute le caractère 'X'
	dans la premiere case car on veut faire un tableau
	à double entrée*/
	$table = "<table class=\"quotient\">\n
			<tr>\n
				<th>X</th>\n";
	
	/*Pour x allant de 1 à la valeur demandée, on écrit
	la première ligne de th*/
	for($x=1; $x<=$key; $x++){
	$table .= '<th>'.$x."</th>\n";
	}
	
	//On ferme notre ligne
	$table .= "</tr>\n";
	
	
	/*i représente la coordonnée de la ligne*/
	for($i=1; $i<=$key; $i++){
		
		//On ouvre une ligne et écrit le numéro de ligne associé
		$table .= '<tr>
			<th>'.$i."</th>\n";
			
		/*j représente la coordonnée de la colonne*/
		for($j=1; $j<=$key; $j++) {	
			/*On écrit dans une nouvelle case le 
			résultat de la multiplication de i par j*/
			$table .= '<td>' . $i*$j . "</td>";
		}
		
		//On ferme la ligne
		$table .= "</tr>\n";
	}
	//On ferme notre tableau
	$table .= "</table>\n";
	return $table;
}

function hexdecascii($num_hexa){
	//On ouvre notre liste
	$result = "<ul>\n";
	
	/*On affiche notre numéro sous forme héxadécimale,
	puis on le passe en format décimal pour finir avec un format
	ASCII*/
	$result .= '<li>'.$num_hexa.' = '.hexdec($num_hexa)." = '".chr(hexdec($num_hexa))."'</li>\n";
	
	//On ferme notre liste
	$result .= "</ul>\n";
	
	return $result;
}
function asciidechex($val_ascii){
	//On ouvre notre liste
	$result = "<ul>\n";
	
	/*On a notre numéro sous format ASCII,
	puis on le passe en format décimal pour finir 
	avec la forme héxadécimale. On l'affiche en sens inverse*/
	$result .= '<li>Ox'.dechex(ord($val_ascii)).' = '.ord($val_ascii)." = '".$val_ascii."'</li>\n";	
	
	//On ferme notre liste
	$result .= "</ul>\n";
	
	return $result;
}

/*On indique un nombre et on le convertit en base 2, 8,
10 et 16. Le second paramatre est par défaut l'affichage
en colonne*/
function converterDec($key=20, $display='c'){
	if($key<=20){	
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

function printTD5(){
	
	$TD5 = helloToKey(10);
	
	$TD5 .= getDateFr();
	
	$TD5 .= decToHex(15);
	
	$TD5 .= table();
	
	return $TD5;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP - Introduction</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
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
		<li id="encours"><a href="index.php">TD 5</a></li>
		<li><a href="../TD6/index.php">TD 6</a></li>
		<li><a href="../TD7/index.php">TD 7</a></li>
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
		<li id="exn0"><a href="#Ex0">Exercice n°0</a></li>
		<li id="exn1"><a href="#Ex1">Exercice n°1</a></li>
		<li id="exn2"><a href="#Ex2">Exercice n°2</a></li>
		<li id="exn3"><a href="#Ex3">Exercice n°3</a></li>
		<li id="exn4"><a href="#Ex4">Exercice n°4</a></li>
		<li id="exn5"><a href="#Ex5">Exercice n°5</a></li>
		<li id="exn6"><a href="#Ex6">Exercice n°6</a></li>
</nav>

<div id="contenu">
	<section id="titre">
	<h1>TD5 : PHP - introduction</h1>
	</section>
	<section id="Ex0">
		<h2>Exercice n°0 : test</h2>
		<a href="info.php">Ensemble des informations relatives au PHP utilisé</a>
	</section>

	<section id="Ex1">
		<h2>Exercice n°1 : boucles</h2>
		<?php
		echo helloToKey(20);
		?>
	</section>
	
	<section id="Ex2">
	<h2>Exercice n°2 : fonction prédéfinie</h2>
		<?php
		echo '<p class="date">Il est actuellement';
		echo getDateFr();
		echo '</p>';	
		?>
	</section>
	
	<section id="Ex3">
	<h2>Exercice n°3 : fonctions prédéfinies et boucles</h2>	
		<?php
		echo decToHex(15);
		?>
	</section>
	
	<section id="Ex4">
	<h2>Exercice n°4 : boucles PHP + tableau HTML (table / tr / th / td)</h2>
	<p>Ci-contre la table de multiplication (10 x 10)</p>
	<?php
	echo table();
	?>	
	</section>
	
	<section id="Ex5">
	<h2>Exercice n°5 : conversions ASCII</h2>
	<h3>Manière n°1 :</h3>
	<p>Je vais d'un numéro hexadécimal à un numéro décimal pour enfin avoir le caractère ASCII.</p>
	<?php
	echo hexdecascii('Ox41');
	echo hexdecascii('Ox2B');
	?>
	<h3>Manière n°2 :</h3>	
	<p>Je vais d'un caractère ASCII vers un numéro décimal pour finir avec un numéro héxadécimal.</p>
	<?php
	echo asciidechex('A');
	echo asciidechex('+');	
	?>	
	
	</section>

	<section id="Ex6">
	<h2>Exercice n°6 : boucles PHP, fonctions prédéfinies et tableau HTML</h2>
	<p>Voici tous les nombres de 0 à 17 en bases 2, 8, 10, 16 (binaire, octal, décimal, hexadécimal).</p>
	
	<?php 
	echo converterDec(17);	
	?>	
	</section>

</div>

<footer>
<p><a href="#">Retour en haut de page</a></p>
<p>&copy; Margaux VAILLANT L2-M</p>
</footer>
</body>
</html>