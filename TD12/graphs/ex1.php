<?php
require_once ('../jpgraph/src/jpgraph.php');
require_once ('../jpgraph/src/jpgraph_bar.php');
include('../functions.inc.php');


header('Content-Type: image/svg+xml');
/*On récupère les informations*/
$donnees = getDonnees('../');
$y=0;
	
$image = "<svg class=\"chart\" width=\"420\" height=\"150\" aria-labelledby=\"title desc\" role=\"img\">
	<title id=\"title\">Avec la balise &lt;svg&gt;</title>";

for($i=0; $i<count($donnees); $i++){
			
	$image .= "<g class=\"bar\">
				<rect width='".$donnees[$i]*10;
$image  .= "' height=\"19\" y=\"".$y."\"></rect>
			</g>";
			
	$y += 20;
}
			
$image .= '</svg>';

echo $image;
?>