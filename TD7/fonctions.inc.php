<?php

function table($key=10){
	
	/*On ouvre un tableau et on ajoute le caractère 'X'
	dans la premiere case car on veut faire un tableau
	à double entrée*/
	echo"<table class=\"quotient\">\n
			<tr>\n
				<th>X</th>\n";
	
	/*Pour x allant de 1 à la valeur demandée, on écrit
	la première ligne de th*/
	for($x=1; $x<=$key; $x++){
	echo'<th>'.$x."</th>\n";
	}
	
	//On ferme notre ligne
	echo"</tr>\n";
	
	
	/*i représente la coordonnée de la ligne*/
	for($i=1; $i<=$key; $i++){
		
		//On ouvre une ligne et écrit le numéro de ligne associé
		echo'<tr>
			<th>'.$i."</th>\n";
			
		/*j représente la coordonnée de la colonne*/
		for($j=1; $j<=$key; $j++) {	
			/*On écrit dans une nouvelle case le 
			résultat de la multiplication de i par j*/
			echo'<td>' . $i*$j . "</td>";
		}
		
		//On ferme la ligne
		echo"</tr>\n";
	}
	//On ferme notre tableau
	echo"</table>\n";
}

function tableASCII(){
	//On ouvre le tableau et on laisse la première case vide
	echo"<table>
					<tr>
						<th></th>\n"; 
		/*On fait une itération pour que chaque th ait les valeurs 
		héxadécimal correspondant aux nombres décimaux de 0 à 15
		On met les futures lettres en majuscules */
		for($i=0; $i<16; $i++){
			echo"<th>".strtoupper(dechex($i))."</th>\n";
		}
		//On ferme notre premiere ligne
		echo"</tr>\n";
		
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
			echo"<tr>
					<th>".$varYTab."</th>\n";
				/*j représente le nombre de case par colonne restant
				après la case ayant notre th (16) dans notre ligne*/
				for($j=0; $j<16; $j++){
				
				/*On prend notre valeur décimale et on la
				convertit en valeur ASCII*/
				$varASCII = chr($varDeci);
					
				//On fait un if-else pour nommer les différentes classes
				
					if(ctype_digit($varASCII)){ //Si la valeur est un numéro
						echo"<td class=\"digit\">";
					}
					elseif(ctype_upper($varASCII)){ //Si la valeur est une majuscule
						echo"<td class=\"upper\">";
					}
					elseif(ctype_lower($varASCII)){ //Si la valeur est une minuscule
						echo"<td class=\"lower\">";
					}
					else{
						echo"<td>";		//Sinon on ne fait rien de spécial		
					}
					
				// On fait un if-else pour les caracteres speciaux	<, >, et supprimer		
					
					//On remplace '<' par son code HTML et on l'ajoute à la case
					if($varASCII=='<'){
						echo "&lt;</td>\n"; 
					}
					
					//On remplace '>' par son code HTML et on l'ajoute à la case
					elseif($varASCII=='>'){
						echo "&gt;</td>\n"; 
					}	
					
					/*On remplace le caractère 'supprimer' par un string (del)
					(pour ne pas le confondre avec l'espace) et on l'ajoute à la case*/
					elseif($varDeci=='127'){ 
						echo "del</td>\n";
					}
					
					//sinon on l'ajoute juste à la case, que l'on ferme donc
					else{
						echo $varASCII."</td>\n";
					}
					
					//On a mit des \n pour la lisibilité du texte en HTML
				
				/*On itère la variable décimale afin qu'à la prochaine case
				ce soit la prochaine valeur*/
				$varDeci++;	
				}	
				
			//On ferme notre ligne une fois qu'on y a mis 16 caractères
			echo"</tr>\n";
			
			/*On itère notre variable YTab pour que le prochain th 
			en début de ligne soit la valeur suivante*/
			$varYTab++;
		}
		
	//On ferme notre tableau
	echo"</table>\n";
}

function safeWebPalette(){
	//On ouvre notre tableau
	echo"<table>\n";
	
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
				echo"<tr>";			
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
				echo"<td style=\"background-color: ".$color.";\">"
						.$color.
							"</td>\n";
			}
			
			/*Si (jj) est égale à '33', '99' ou 'FF', alors on revient à la
			ligne, c'est-à-dire qu'on en ferme une. Ca se passe quand j=1, j=3 
			et j=5 ce qui correspond à j%2=1.*/
			if(($j%2)==1){
				echo"</tr>\n";			
			}
		}	
	}
	
	//On ferme notre tableau
	echo"</table>\n";
}

function hexdecascii($num_hexa){
	//On ouvre notre liste
	echo "<ul>\n";
	
	/*On affiche notre numéro sous forme héxadécimale,
	puis on le passe en format décimal pour finir avec un format
	ASCII*/
	echo '<li>'.$num_hexa.' = '.hexdec($num_hexa)." = '".chr(hexdec($num_hexa))."'</li>\n";
	
	//On ferme notre liste
	echo "</ul>\n";
}
function asciidechex($val_ascii){
	//On ouvre notre liste
	echo "<ul>\n";
	
	/*On a notre numéro sous format ASCII,
	puis on le passe en format décimal pour finir 
	avec la forme héxadécimale. On l'affiche en sens inverse*/
	echo '<li>Ox'.dechex(ord($val_ascii)).' = '.ord($val_ascii)." = '".$val_ascii."'</li>\n";	
	
	//On ferme notre liste
	echo "</ul>\n";
}

function converterDec($key=20){
	if($key<=20){	
		echo"<table>
			<tr>
				<th>Binaire</th>
				<th>Octal</th>	
				<th>Décimal</th>
				<th>Hexadécimal</th>	
			</tr>";
		
		/*Pour une variable allant de 0 à la valeur décimale demandée*/
		for($num_dec=0; $num_dec<=$key; $num_dec++) {
			
			/*On convertit notre nombre décimal
			en base binaire et on fait en sorte qu'il y
			ait 8 chiffres*/
			$bin = sprintf("%08d",decbin($num_dec));
			
			/*On convertit notre nombre décimal
			en base octale et on fait en sorte qu'il y
			ait 2 chiffres*/
			$oct = sprintf("%02d",decoct($num_dec));
			
			/*On fait en sorte qu'il y ait 2 chiffres
			à notre nombre décimal*/
			$num_dec = sprintf("%02d",$num_dec);
			
			/*On convertit notre nombre décimal
			en base héxadécimale et on fait en sorte qu'il y
			ait 2 strings*/
			$hex = sprintf("%02s", dechex($num_dec));
			//On met les lettres en majuscules
			$hex = strtoupper($hex);
			
			//On affiche toutes ces valeurs dans une ligne à 4 cases
			echo "<tr>\n
						<td>".$bin."</td>
						<td>".$oct."</td>
						<td>".$num_dec."</td>
						<td>".$hex."</td>
					</tr>\n";			
		}
		echo "</table>";
	}
	else{
		echo"Veuillez choisir un nombre plus petit";
	}
}

?>