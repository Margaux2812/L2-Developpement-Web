<?php
include('functions.inc.php');

function chmodTD9($oct){
	$chmod =array('---', '--x', '-w-', '-wx-', 'r--', 'r-x', 'rw-', 'rwx');
	$digit = str_split($oct);
	
	if(($digit[0]<8) &&($digit[0]>-1) && ($digit[1]<8) &&($digit[1]>-1) && ($digit[2]<8) &&($digit[2]>-1)){
	$first = $chmod[$digit[0]];
	$second = $chmod[$digit[1]];
	$third = $chmod[$digit[2]];
	
	$result = $first." ".$second." ".$third;
	}
	return $result;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Formulaires HTML et PHP</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	
</head>
<body>
	<?php
		include('header.inc.php');
	?>

<nav id="intern">
	<ul>
		<li id="menu">Menu</li>
		<li id="exn1"><a href="#ex1">Exercice n°1</a></li>
		<li id="exn3"><a href="#ex3">Exercice n°3</a></li>
		<li id="exn4"><a href="#ex4">Exercice n°4</a></li>
		<li id="exn5"><a href="#ex5">Exercice n°5</a></li>
		<li id="exn6"><a href="#ex6">Exercice n°6</a></li>
		<li id="exn7"><a href="#ex7">Exercice n°7</a></li>
	</ul>
</nav>

<div id="contenu">
	
	<section id="titre">
		<h1>TD9 : formulaires HTML et PHP</h1>
	</section>
	
	<section id="ex1">

		<h2>Exercice 1 : test de la méthode get et Exercice 2 : test des méthodes get et post</h2>
		
		<p>Convertisseur d'une expression en minuscules à ue expression en majuscules</p>
	
		<form method="post" action='traitement.php'>
				<table>
					<tr>
						<td> <label for="input">Votre chaine de caractère</label> </td>
						<td></td>
					</tr>
					<tr>
						<td><input type="text" name="input" id="input" size="15"/></td>
						<td><input type="submit" name="convert" value="Convertir"/></td>
					</tr>
					<tr>
						<td> <label for="input">Votre valeur numérique décimale</label> </td>
						<td></td>
					</tr>
					<tr>
						<td><input type="text" name="deci" id="deci" size="15"/></td>
						<td><input type="submit" name="converthex" value="Convertir"/></td>
					</tr>
				</table>
		</form>

	</section>
	
	<section id="ex3">
	
		<h2>Exercice 3 : formulaire de saisie d'URL</h2>
		
		<form method="post" action='index.php#ex3'>
				<table>
					<tr>
						<td> <label for="input">Votre URL</label> </td>
						<td></td>
					</tr>
					<tr>
						<td><input type="text" name="url" id="url" size="25"/></td>
						<td><input type="submit" name="info" value="Extraire"/></td>
					</tr>
				</table>
		</form>
		
		<?php
		if(isset($_POST['info'])){
			/*Si c'est une url*/
			if (filter_var($_POST['url'], FILTER_VALIDATE_URL)) {
				echo extract_url($_POST['url']);
			}else{
				echo '<div class=\'error\'><p>Vous devez renseigner une url !</p></div>';
			}
		}
		?>
	</section>
	
	<section id="ex4">
	
		<h2>Exercice 4 : formulaire avec liste d'options</h2>
		
		<form method="post" action='index.php#ex4'>
				<p>
				   <label for="number">Choisissez un nombre pour obtenir sa table de multiplication :</label>
				   <select name="number" id="number">
				   <?php
					for($i = 2; $i<17; $i++){
						echo'<option value="'.$i.'">'.$i.'</option>';
					}
				   ?>
				   </select>
				   <input type="submit" name="multiplicationtable" value="Calculer"/>
			   </p>
		</form>
		
		<?php
			if(isset($_POST['multiplicationtable'])){
				echo table((int)$_POST['number']);
			}
		?>

	</section>
	
	<section id="ex5">
	
		<h2>Exercice 5 : formulaire avec cases à cocher</h2>
		
		<form method="post" action='index.php#ex5'>
			<table id='chmodtable'>
				<tr>
					<td></td>
					<th class='bordered'>r</th>
					<th class='bordered'>w</th>
					<th class='bordered'>x</th>
					<th class='bordered'>Valeur octale</th>
				</tr>
				<tr>
					<th class='bordered'>user</th>
					<td class='bordered'><input type="checkbox" name="ur" id="ur" /></td>
					<td class='bordered'><input type="checkbox" name="uw" id="uw" /></td>
					<td class='bordered'><input type="checkbox" name="ux" id="ux" /></td>
					<td class='bordered'>
					<?php
					if(isset($_POST['chmod'])){
						$oct=0;
						if(isset($_POST['ur'])){
							$oct += 4;
						}
						if(isset($_POST['uw'])){
							$oct += 2;
						}
						if(isset($_POST['ux'])){
							$oct += 1;
						}
						
						echo $oct;
					}
					?>
					</td>
				</tr>
				<tr>
					<th class='bordered'>group</th>
					<td class='bordered'><input type="checkbox" name="gr" id="gr" /></td>
					<td class='bordered'><input type="checkbox" name="gw" id="gw" /></td>
					<td class='bordered'><input type="checkbox" name="gx" id="gx" /></td>
					<td class='bordered'><?php
					/*Si on a cliqué sur le bouton*/
					if(isset($_POST['chmod'])){
						$oct=0;
						/*r correspond à ajouter 4 au chiffre en valeur octale*/
						if(isset($_POST['gr'])){
							$oct += 4;
						}
						/*w correspond à ajouter 2 au chiffre en valeur octale*/
						if(isset($_POST['gw'])){
							$oct += 2;
						}
						/*x correspond à ajouter 1 au chiffre en valeur octale*/
						if(isset($_POST['gx'])){
							$oct += 1;
						}
						
						echo $oct;
					}
					?></td>
				</tr>
				<tr>
					<th class='bordered'>others</th>
					<td class='bordered'><input type="checkbox" name="or" id="or" /></td>
					<td class='bordered'><input type="checkbox" name="ow" id="ow" /></td>
					<td class='bordered'><input type="checkbox" name="ox" id="ox" /></td>
					<td class='bordered'><?php
					if(isset($_POST['chmod'])){
						$oct=0;
						if(isset($_POST['or'])){
							$oct += 4;
						}
						if(isset($_POST['ow'])){
							$oct += 2;
						}
						if(isset($_POST['ox'])){
							$oct += 1;
						}
						
						echo $oct;
					}
					?></td>
				</tr>
				<tr>
					<td colspan='5' id='result'><input type="submit" name="chmod" value="Calculer"/></td>
				</tr>
			</table>
		</form>
	</section>
	
	<section id="ex6">
	
		<h2>Exercice 6 : formulaire généré par des boucles PHP avec liste d'options</h2>
		
		<p>Choisissez un mois et une année. Si vous ne renseignez qu'une année, elle sera alors affichée en entier</p>
		
		<form method="post" action="index.php#ex6">
			<table id='formtable'>
				<tr>
					<td><label for="months">Mois</label></td>
					<td><label for="year">Année</label></td>
				</tr>
				<tr>
				   <td><select name="month" id="months">
						<option disabled selected value> -- Mois -- </option>
						<option value="1">Janvier</option>
						<option value="2">Février</option>
						<option value="3">Mars</option>
						<option value="4">Avril</option>
						<option value="5">Mai</option>
						<option value="6">Juin</option>
						<option value="7">Juillet</option>
					   <option value="8">Août</option>
					   <option value="9">Septembre</option>
					   <option value="10">Octobre</option>
					   <option value="11">Novembre</option>
					   <option value="12">Décembre</option>
				   </select></td>
				   <td><select name="year" id="year">
				   <option disabled selected value> -- Année -- </option>
					<?php
					for($y = 2000; $y<=2030; $y++){
						echo'<option value="'.$y.'">'.$y.'</option>';
					}
					?>
				   </select></td>
				</tr>
				<tr>
					<td colspan='2' id='button'><input type="submit" name="calendar" value="Avoir le calendrier"/></td>
				</tr>
		   </table>
		</form>
		<?php
			if(!empty($_POST['calendar'])){
				if(isset($_POST['month']) && isset($_POST['year'])){
					echo getMonth((int)$_POST['month'], (int)$_POST['year']);
				}elseif(isset($_POST['year'])){
					echo calendar((int)$_POST['year']);
				}else{
					echo '<div class=\'error\'><p>Vous devez renseigner un mois et une année ou au moins une année</p></div>';
				}
			}
		?>
	</section>
	
	<section id="ex7">
	<h2>Exercice 7 : formulaire avec bouton radio</h2>
		<form method="post" action="index.php#ex7">
			<table>
				<tr>
					<td colspan='2'>Valeur octale</td>
				</tr>
				<tr>
					<td colspan='2'><input type="text" name="input2" id="input2" size="15"/></td>
				</tr>
				<tr>
					<td><input type="radio" name="type" value="file" id="file" /> <label for="file">Fichier</label></td>
					<td><input type="radio" name="type" value="directory" id="directory" /> <label for="directory">Répertoire</label></td>
				</tr>
				<tr>
					<td colspan='2'><input type="submit" name="ex7" value="Convertir"/></td>
				</tr>
			</table>
		</form>
		
		<?php
		if(isset($_POST['ex7'])){
			foreach($_POST as $key=>$value){
				if(empty($_POST[$key])){
				$ex7 = "Remplissez tous les champs";	
				}
			}
			
			if(!isset($ex7)){
				
				/*Si le chiffre est valide, est un chiffre chmod*/
				if(preg_match('![0-7]{3}!', $_POST['input2'])){
					$access = chmodTD9($_POST['input2']);
					
					if(isset($_POST['type'])){
						if($_POST['type']=='file'){
							$result=	"f/-";
						}elseif($_POST['type']=='directory'){				
							$result= "d/-";
						}
					}
					
					$ex7=$result.' '.$access;
					
				}else{
					$ex7="Vous devez saisir un nombre à trois chiffres compris entre 1 et 7";				
				}			
			}	
		}
		
		if(isset($ex7)){
			echo '<p>'.$ex7.'</p>' ;		
		}
	?>
	</section>
</div>

<?php
		require('../TD8/footer.inc.php');
	?>
</body>
</html>