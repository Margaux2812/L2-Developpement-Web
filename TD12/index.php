<?php	
include('functions.inc.php');

if(isset($_POST['donnee'])){
	
	$donnees=array( array($_POST['donnee_saisie']));
			
	$fp = fopen('donnees_enregistrees.csv', 'a+');
	foreach($donnees as $fields){
		fputcsv($fp, $fields);
	}
		
	fclose($fp);
		
	$donnee_validee = "Votre donnée a été ajoutée !";	
	unset($_POST);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Images</title>
	
<link rel="stylesheet" type="text/css" href="styles/style.css" />

</head>
<body>
	<?php
		include('header.inc.php');
	?>
	
<nav id="intern">
	<ul>
		<li id="menu">Menu</li>
		<li id="exn1"><a href="#ex1">Exercice n°1</a></li>
		<li id="exn2"><a href="#ex2">Exercice n°2</a></li>
		<li id="exn3"><a href="#ex3">Exercice n°3</a></li>
		<li id="exn4"><a href="#ex3">Exercice n°4</a></li>
	</ul>
</nav>
	

<div id="contenu">
	
	<section id="titre">
		<h1>TD12 : images</h1>
	</section>
	
	<section id="ex1">
		<h2>Exercice 1 : Images SVG</h2>
		
		<form method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
			<p>Saisissez des valeurs et celles-ci seront ajoutés au barre-graphe !</p>
			<input type='number' name='donnee_saisie' id='donnee_saisie' />
			<input type='submit' name='donnee' value='Ajouter' id='donnee' />
		</form>
		<?php 
			if(!empty($donnee_validee)){
				echo '<p>'.$donnee_validee.'</p>';
			}
		?>
		
		<figure>
			<img src='graphs/ex1 - JPGraph.php' alt='Exercice 1' />
			<figcaption>Graphique des données saisies avec JPGraph</figcaption>
		</figure>
		
		<p>Avec la balise &lt;svg&gt;</p>
		<svg class="chart" width="420" height="150" aria-labelledby="title desc" role="img">
			<title id="title">Avec la balise &lt;svg&gt;</title>
			<?php
			$donnees = getDonnees();
			$y=0;
			for($i=0; $i<count($donnees); $i++){
			?>
			<g class="bar">
				<rect width='<?php echo $donnees[$i]*10; ?>' height='19' y='<?php echo $y ;?>'></rect>
			</g>
			<?php
			$y += 20;
			}
			?>
		</svg>
			
	</section>
	
	<section id="ex2">
	
		<h2>Exercice 2 : script php de génération d'image PNG</h2>
		
		<figure>
			<img src='graphs/ex2.php' alt='Exercice 2' />
			<figcaption>Graphique des données saisies</figcaption>
		</figure>
		
	</section>
	
	<section id="ex3">
		<h2>Exercice 3 : image PNG avec data et base64</h2>
		
	
	</section>
	
	<section id="ex4">
	
		<h2>Exercice 4 : bibliothèque graphique PHP</h2>
		
		
	</section>
	
</div>

<?php
		include('../TD8/footer.inc.php');
	?>
</body>
</html>