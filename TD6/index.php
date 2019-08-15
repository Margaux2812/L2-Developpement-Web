<?php
function tableASCII(){
	//On ouvre le tableau et on laisse la première case vide
	$table = "<table>
					<tr>
						<th></th>\n"; 
		/*On fait une itération pour que chaque th ait les valeurs 
		héxadécimal correspondant aux nombres décimaux de 0 à 15
		On met les futures lettres en majuscules */
		for($i=0; $i<16; $i++){
			$table .= "<th>".strtoupper(dechex($i))."</th>\n";
		}
		//On ferme notre premiere ligne
		$table .= "</tr>\n";
		
		/*On initialise une variable varYTab qui correspond
		à nos futurs th de la colonne de gauche*/
		$varYTab=2;
		
		/*On initialise notre variable décimal nous permettant
		une itération à partir du nombre décimal 32*/
		$varDeci=32;
		
		
		//i est la variable représentant le nombre de lignes restant à avoir (6)
		for($i=0; $i<6; $i++){
			/*On ouvre donc une ligne et on met dans la premiere
			case un th avec la variable de 2 à 7 associée*/
			$table .= "<tr>
					<th>".$varYTab."</th>\n";
				/*j représente le nombre de case par colonne restant
				après la case ayant notre th (16) dans notre ligne*/
				for($j=0; $j<16; $j++){
				
				/*On prend notre valeur décimale et on la
				convertit en valeur ASCII*/
				$varASCII = chr($varDeci);
					
				//On fait un if-else pour nommer les différentes classes
				
					if(ctype_digit($varASCII)){ //Si la valeur est un numéro
						$table .= "<td class=\"digit\">";
					}
					elseif(ctype_upper($varASCII)){ //Si la valeur est une majuscule
						$table .= "<td class=\"upper\">";
					}
					elseif(ctype_lower($varASCII)){ //Si la valeur est une minuscule
						$table .= "<td class=\"lower\">";
					}
					else{
						$table .= "<td>";		//Sinon on ne fait rien de spécial		
					}
					
				// On fait un if-else pour les caracteres speciaux	<, >, et supprimer		
					
					//On remplace '<' par son code HTML et on l'ajoute à la case
					if($varASCII=='<'){
						$table .=  "&lt;</td>\n"; 
					}
					
					//On remplace '>' par son code HTML et on l'ajoute à la case
					elseif($varASCII=='>'){
						$table .=  "&gt;</td>\n"; 
					}	
					
					/*On remplace le caractère 'supprimer' par un string (del)
					(pour ne pas le confondre avec l'espace) et on l'ajoute à la case*/
					elseif($varDeci=='127'){ 
						$table .=  "del</td>\n";
					}
					
					//sinon on l'ajoute juste à la case, que l'on ferme donc
					else{
						$table .=  $varASCII."</td>\n";
					}
					
					//On a mit des \n pour la lisibilité du texte en HTML
				
				/*On itère la variable décimale afin qu'à la prochaine case
				ce soit la prochaine valeur*/
				$varDeci++;	
				}	
				
			//On ferme notre ligne une fois qu'on y a mis 16 caractères
			$table .= "</tr>\n";
			
			/*On itère notre variable YTab pour que le prochain th 
			en début de ligne soit la valeur suivante*/
			$varYTab++;
		}
		
	//On ferme notre tableau
	$table .= "</table>\n";
	return $table;
}

function safeWebPalette(){
	//On ouvre notre tableau
	$palette = "<table>\n";
	
	/*On crée un tableau contenant les 6 strings
	que l'on va boucler, qui sont présents dans 
	le nom des couleurs de la Safe Web Palette*/
	$colorTab = array('00', '33', '66', '99', 'CC', 'FF');
	
	/*On va donc faire une triple boucle for, un nom de couleur 
	étant sous la forme #iijjkk où (ii), (jj) et (kk) sont 
	les strings du tableau. (ii) est notre première boucle,
	(jj) la seconde, et (kk) la dernière*/
	
	/*(ii) représente donc la première boucle, allant de '00' à 'FF'
	ce qui correspond au rang i de notre tableau. i varie donc de 0 à 5*/
	for($i=0; $i<6; $i++){
		
		/*De même pour (jj), notre seconde boucle correspondant au rang j du tableau*/
		for($j=0; $j<6; $j++){
			
			/*Si (jj) est égale à '00', '66' ou 'CC', alors on commence une
			nouvelle ligne. C'est-à-dire quand j=0, j=2 et j=4 ce qui correspond
			à j%2=0.*/
			if(($j%2)==0){
				$palette .= "<tr>";			
			}
			
			/*Notre troisième boucle for pour la derniere boucle (kk)
			correspondant donc aux valeurs du tableau au rang k*/
			for($k=0; $k<6; $k++){
				
				/*On met une variable $color qui va prendre le nom
				de la couleur, c'est-à-dire de la forme '#' suivit de 
				nos cases de tableau*/
				$color= '#'.$colorTab[$i].$colorTab[$j].$colorTab[$k];
				
				/*Notre td va avoir une couleur de fond de la couleur de
				notre couleur puis on écrit son nom dans la case et on la ferme*/
				$palette .= "<td style=\"background-color: ".$color.";\">"
						.$color.
							"</td>\n";
			}
			
			/*Si (jj) est égale à '33', '99' ou 'FF', alors on revient à la
			ligne, c'est-à-dire qu'on en ferme une. Ca se passe quand j=1, j=3 
			et j=5 ce qui correspond à j%2=1.*/
			if(($j%2)==1){
				$palette .= "</tr>\n";			
			}
		}	
	}
	
	//On ferme notre tableau
	$palette .= "</table>\n";
	return $palette;
}
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>PHP - tests et boucles</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<style>
	td.digit{
		background-color: #d1e0e0;
		font-weight: bold;
		color: red;		
	}
	td.upper{
		background-color: #d1e0e0;
		font-weight: bold;
		color: #00e600;		
	}
	td.lower{
		background-color: #d1e0e0;
		font-weight: bold;
		color: blue;		
	}
	</style>
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
		<li id="encours"><a href="index.php">TD 6</a></li>
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
		<li id="exn1"><a href="#ex1">Exercice n°1</a></li>
		<li id="exn2"><a href="#ex2">Exercice n°2</a></li>
	</ul>
</nav>

<div id="contenu">
	
	<section id="titre">
		<h1>TD6 : PHP - tests et boucles</h1>
	</section>
	
	<section id="ex1">
		<h2>Exercice n°1 : boucles, tests et styles internes</h2>
		
		<p>Dans table ASCII on a mis en valeur grâce à 3 couleurs différentes les chiffres,
		les majuscules et les minuscules. Les autres caractères sont sur le fond par défaut et on se limite
		aux 128 premiers caractères (de 0 à 127), sauf les 32 premiers (de 0 à 31)).
		Les styles spécifiques sont placés dans une feuille de styles interne (balise &lt;style&gt; dans la
		zone &lt;head&gt; de la page HTML).</p>
	
		<?php
		echo tableASCII();
		?>
		
		<p class="comment">Illustration 1 : table ASCII</p>
	</section>
	
	<section id="ex2">
	
		<h2>Exercice n°2 : boucles, tests et styles locaux</h2>
		
		<p>Voici la palette web "sécurisée" (Safe Web Palette) de 216 couleurs.</p>
		
		<?php
		echo safeWebPalette();
		?>
		
		<p class="comment">Illustration 2 : palette web</p>
	</section>
</div>

<footer>
	<p> <a href="#">Retour en haut de page</a></p>
	<p>&copy; Margaux VAILLANT L2-M</p>
</footer>
</body>
</html>