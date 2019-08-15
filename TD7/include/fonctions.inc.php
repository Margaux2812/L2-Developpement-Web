<?php
/*On a une première ligne de th avec écrit les nombre de 1 à la clé.
Notre deuxième ligne sera donc toujours le nombre suivant puis
on multiplie le premier terme (un ht) par la ligne du haut*/
function table($key=10){
	
	$table = "<table class=\"quotient\">\n
			<tr>\n
				<th>X</th>\n";
	
	for($x=1; $x<=$key; $x++){
	$table .= '<th>'.$x."</th>\n";
	}
	$table .= "</tr>\n";
	
	for($i=1; $i<=$key; $i++){
		
		$table .= '<tr>
			<th>'.$i."</th>\n";
			
		for($j=1; $j<=$key; $j++) {	
			$table .= '<td>' . $i*$j . "</td>";
		}
		
		$table .= "</tr>\n";
	}
	$table .= "</table>\n";
	return $table;
}

/*On remplit la premiere ligne puis a chaque fois
on va convertir notre numéro decimal à partir de 32 en ASCII.
Si c'est un chiffre, ou une lettre ils ont alors une classe spéciale.*/
function tableASCII(){
	$table = "<table>
					<tr>
						<th></th>\n"; 
		for($i=0; $i<16; $i++){
			$table .= "<th>".strtoupper(dechex($i))."</th>\n";
		}
		$table .= "</tr>\n";
		
		$varYTab=2;
		
		$varDeci=32;
		
		for($ligne=0; $ligne<6; $ligne++){
			$table .= "<tr>
					<th>".$varYTab."</th>\n";
				for($colonne=0; $colonne<16; $colonne++){
					$varASCII = chr($varDeci);
					
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
					
					//On remplace '<' par son code HTML et on l'ajoute à la case
					if($varASCII=='<'){
						$table .=  "&lt;</td>\n"; 
					}
					
					//On remplace '>' par son code HTML et on l'ajoute à la case
					elseif($varASCII=='>'){
						$table .=  "&gt;</td>\n"; 
					}	
					
					/*On remplace le caractère 'supprimer' par un string (del)
					(pour ne pas le confondre avec l'espace)*/
					elseif($varDeci=='127'){ 
						$table .=  "del</td>\n";
					}
					else{
						$table .=  $varASCII."</td>\n";
					}
					
				$varDeci++;	
				}	
				
			$table .= "</tr>\n";
			$varYTab++;
		}
	$table .= "</table>\n";
	return $table;
}

/*On crée un tableau contenant les 6 strings
que l'on va boucler, qui sont présents dans 
le nom des couleurs de la Safe Web Palette
	On va donc faire une triple boucle for, un nom de couleur 
étant sous la forme #iijjkk où (ii), (jj) et (kk) sont 
les strings du tableau. (ii) est notre première boucle,
(jj) la seconde, et (kk) la dernière
	Si j est 33, 99 ou FF on revient à la ligne*/
function safeWebPalette(){
	$palette = "<table>\n";
	
	$colorTab = array('00', '33', '66', '99', 'CC', 'FF');
	
	for($i=0; $i<6; $i++){
		for($j=0; $j<6; $j++){
			if(($j%2)==0){
				$palette .= "<tr>";			
			}
			for($k=0; $k<6; $k++){
				$color= '#'.$colorTab[$i].$colorTab[$j].$colorTab[$k];
				$palette .= "<td style=\"background-color: ".$color.";\">"
						.$color.
							"</td>\n";
			}
			if(($j%2)==1){
				$palette .= "</tr>\n";			
			}
		}	
	}
	$palette .= "</table>\n";
	return $palette;
}

/*On affiche notre numéro sous forme héxadécimale,
	puis on le passe en format décimal pour finir avec un format
	ASCII*/
function hexdecascii($num_hexa){
	$result = "<ul>\n";
	
	$result .= '<li>'.$num_hexa.' = '.hexdec($num_hexa)." = '".chr(hexdec($num_hexa))."'</li>\n";

	$result .=  "</ul>\n";
	return $result;
}

/*On a notre numéro sous format ASCII,
	puis on le passe en format décimal pour finir 
	avec la forme héxadécimale. On l'affiche en sens inverse*/
function asciidechex($val_ascii){
	$result =  "<ul>\n";
	
	$result .=  '<li>Ox'.dechex(ord($val_ascii)).' = '.ord($val_ascii)." = '".$val_ascii."'</li>\n";	
	
	$result .=  "</ul>\n";
	return $result;
}

/*On indique un nombre et on le convertit en base 2, 8,
10 et 16. Le second paramètre est par défaut l'affichage
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
?>