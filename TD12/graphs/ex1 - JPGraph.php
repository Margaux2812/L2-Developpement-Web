<?php
require_once ('../jpgraph/src/jpgraph.php');
require_once ('../jpgraph/src/jpgraph_bar.php');

function getDonnees(){
	$donnees = array();
	try{		
		$row = 1;
		if (($handle = fopen("../donnees_enregistrees.csv", "a+")) !== FALSE) {
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

/*On récupère les informations*/
$donnees = getDonnees();
	
$graph = new Graph(500,200); 
$graph->SetScale("intlin");
$graph->SetShadow();

$barre = new BarPlot($donnees);

$graph->Add($barre);

$barre->SetFillColor("#00b33c");
$barre->SetColor("#00b33c");
 
// Display the graph
$graph->Stroke();
?>