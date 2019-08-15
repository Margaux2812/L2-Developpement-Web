<?php
/*Si la langue est 'en', on n'a rien à faire car
la fonction date() est déjà par défaut en anglais
Si la langue est 'fr' on définit un tableau avec 
les mois en français et les jours en français et on prend
le résultat de date qui nous indique le numéro du jour ou 
du mois*/
function getDateFrOrEn($lang='fr'){
	if($lang=='en'){
		
		echo "<p class=\"small\">".date("l, F j, Y")."</p>";
	}
	else{
		$jours = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");		
		$mois = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
				
		$day = $jours[date('N')-1];
		$month = $mois[date('n')-1];
		echo "<p class=\"small\">".$day.' '.date("j").' '.$month.' '.date("Y")."</p>";
	}
}
?>