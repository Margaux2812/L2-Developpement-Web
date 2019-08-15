<?php 
function getDonnees($path=''){
	$donnees = array();
	try{		
		$row = 1;
		if (($handle = fopen($path."donnees_enregistrees.csv", "a+")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$row++;
				array_push($donnees, $data[0]);
			}
			fclose($handle);
		}
		return $donnees;
		
	}
	catch(Exception $e){
		return 0;
	}
}
?>