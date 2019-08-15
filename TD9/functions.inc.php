<?php
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

function getMonth($month = null, $year = null){
	
	if(!isset($year)){
		$year = idate('Y');
	}

	if(!isset($month)){
		$month = idate('m');
	}

	if(($month>=1) && ($month<=12) && (is_int($month))){
		
		if((strlen( (string) $year)==4)&& (is_int($year))){
			
			$mois = array("", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
			
			$result = "<table id='month'>
						<tr>
							<th colspan = \"7\" class=\"month\">".$mois[$month]."</th>
						</tr>
						<tr class=\"days\">
							<th>Lun</th>
							<th>Mard</th>
							<th>Mer</th>
							<th>Jeu</th>
							<th>Ven</th>
							<th class=\"weekend\">Sam</th>
							<th class=\"weekend\">Dim</th>
						</tr>";
			
			$num_prem_jour_semaine = date('N', mktime(0,0,0,$month, 1, $year));
			$num_Der_Jour = date('j', mktime(0,0,0,$month+1, 0, $year));
			$numJour = 1;
			$jour_en_cours = date('j');
			$annee_en_cours = date('Y');
			$mois_en_cours = date('n');
			
			/*Première ligne avec cases blanches*/
			$result .="<tr>\n";
			for($colonne = 1; $colonne <=7 ; $colonne ++){
				if($num_prem_jour_semaine==$colonne){
					if(($num_prem_jour_semaine==$jour_en_cours) && ($month == $mois_en_cours) && ($year == $annee_en_cours)){
						$result .= "<td class=\"jourJ\">";
					}
					elseif(($colonne ==6) || ($colonne ==7)){
						$result .= "<td class=\"weekend\">";
					}
					else{
						$result .= "<td>";
					}
					$result .= $numJour."</td>";
					$numJour++;
					$num_prem_jour_semaine++;
				}
				else{
					$result .= "<td class=\"empty\"></td>\n";
				}
			}
			
			$result.="</tr>\n";
			
			while($numJour <= $num_Der_Jour){
				$result .= "<tr>\n";
				for($colonne =1; $colonne<= 7; $colonne ++){
					if($numJour<=$num_Der_Jour){
						if(($numJour==$jour_en_cours) && ($month == $mois_en_cours) && ($year == $annee_en_cours)){
							$result .= "<td class=\"jourJ\">";
						}
						elseif(($colonne ==6) || ($colonne ==7)){
							$result .= "<td class=\"weekend\">";
						}
						else{
							$result .= "<td>";
						}
						$result .= $numJour."</td>\n";
						$numJour++;
					}
					else{
						/*Finir avec des cases blanches*/
						$result .= "<td class=\"empty\"></td>";
					}
				}
				$result .= "</tr>\n";
			}
			
			$result .="</table>\n";
		}
		else{
			$result = "L'année demandée est incorrecte. Veuillez saisir
		un nombre entier au format 'AAAA'";
		}
	}
	else{
		$result = "Le mois demandé est incorrect. Veuillez saisir
		un nombre entier compris entre 1 et 12";
	}
	
	return $result;
}

function calendar($year = null, $colonne_demande = 4){
	if(!isset($year)){
		$year = date('Y');
		$month = date('n');
		/*On affiche les trois mois*/
		$result = "<table id=\"calendar\">
						<tr>
							<td>";
							
		if(($month-1)>0){		
			$result.= getMonth($month-1);
		}
		else{
			$result.= getMonth('12', $year-1);
		}
		
		$result .= "</td>
					<td>".getMonth()."</td>
					<td>";
					
		if(($month+1)<12){		
			$result.= getMonth($month+1);
		}
		else{
			$result.= getMonth('1', $year+1);
		}
		
		$result .= "</td>
			</tr>
		</table>";
	}	
	elseif((strlen( (string) $year)==4)&& (is_int($year))){
		/*Format d'année valide*/
		$month = 1;
		
		$result = "<table id=\"calendar\">
						<tr>
							<th id=\"year\" colspan = \"".$colonne_demande."\">".$year."</th>
						</tr>";
		while($month<13){
			$colonne_width = (1/$colonne_demande)*100;
			$result.= "<tr>";
			for($colonne=1; $colonne <= $colonne_demande; $colonne++){
				if($month<13){
					$result .= "<td style=\" width: ".$colonne_width."%;\">".getMonth($month, $year)."</td>";
					$month++;
				}
				else{
					$result .= "<td></td>";
				}
			}	
			$result .="</tr>";
		}
		
		$result .= "</table>";
	}
	else{
		$result = "L'année demandée est incorrecte. Veuillez saisir
		un nombre entier au format 'AAAA'";
	}
	
	return $result;
}
?>