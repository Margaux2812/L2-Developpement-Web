<?php
function getDateFrOrEn($lang='fr'){
	if($lang=='en'){
		//C'est la valeur par défaut
		
		echo "<p id=\"small\">".date("l, F j, Y")."</p>";
	}
	else{
		//On définit les informations de localisation
		setlocale(LC_TIME, 'fr_FR'); //Sous Linux
		setlocale(LC_TIME, "french"); //Sous Windows
		$day = ucfirst(strftime("%A"));
		$month = ucfirst(strftime("%B"));
		echo "<p id=\"small\">".$day.' '.strftime("%d").' '.$month.' '.strftime("%Y")."</p>";
	}
}
?>