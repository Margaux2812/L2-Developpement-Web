<?php 
function exists($login_recherche){
	try{
		$row = 1;
		if (($handle = fopen("logins_autorises.csv", "a+")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				/*Tant qu'on arrive pas à la fin, si on trouve le login recherché, alors on retourne 1*/
				$num = count($data);
				$row++;
				
				if($data[0]==strtoupper($login_recherche)){
					return TRUE;
					break;
				}
			}
			fclose($handle);
		}
		
	}
	catch(Exception $e){
		return "Erreur";
	}
}

function dontmatch($login, $pass){

/*On verifie que l'identifiant existe (on ne fais pas attention à la casse)*/
	if(exists(strtoupper($login))){
		try{	
			/*On parcourt le fichier .csv pour trouver l'identifiant et stocker le mdp trouvé*/
			$row = 1;
			if (($handle = fopen("logins_autorises.csv", "a+")) !== FALSE) {
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$num = count($data);
					$row++;
					if($data[0]==strtoupper($login)){
						$mdp_trouve = $data[3];
						break;
					}
				}
				fclose($handle);
			}
			
			/*password_verify nous dira si les mots de passe hachés correspondent
			donc comme la fonction s'appelle dontmatch, on envoie la negation*/
			return !$isPasswordCorrect = password_verify($pass, $mdp_trouve);
			
		}
		catch(Exception $e){
			return "Erreur";
		}
	}
	else{
		return TRUE;
	}
}

function recuperer($login_recherche){
	try{		
		$row = 1;
		if (($handle = fopen("logins_autorises.csv", "a+")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
				$row++;
				
				/*Si on a trouvé l'dentifiant on recupere toutes ses informations*/
				if($data[0]==strtoupper($login_recherche)){
					$name = $data[1];
					$forname = $data[2];
					break;
				}
			}
			fclose($handle);
		}
				$infos = array(
					'login' => $login_recherche,
					'name' => $name,
					'forname' => $forname
					);
					
				return $infos;
		
	}
	catch(Exception $e){
		return 0;
	}
}

function resize($img){
	$dimensions = getimagesize($img);

	$ratio_w = $dimensions[0] / 110; // 110 est la largeur maximale et 142 la hauteur maximale
	$ratio_h = $dimensions[1] / 142;

	if ($ratio_w > $ratio_h)
	{
		$newh = round($dimensions[1] / $ratio_w);
		$neww = 110;
	}
	else
	{
		$neww = round($dimensions[0]/ $ratio_h);
		$newh = 142;
	}
	 $new_dimensions = array(
		'width' => $neww,
		'height' =>$newh
	 );
	 
	 return $new_dimensions;
}

function upload($newfile){
	
	/*On prend le nom de la photo pour recuperer son extension*/

	$infosfichier = pathinfo(htmlspecialchars($newfile['name']));
	$extension_upload = $infosfichier['extension'];
	
	$img_path = 'images/'.htmlspecialchars($newfile['name']);
	
	/*On crée une nouvelle image où nous allons copier notre image redimensionnée*/
	$uploadedfile  = $newfile['tmp_name'];
	if($extension_upload=="jpg" || $extension_upload=="jpeg" ){
		$src = imagecreatefromjpeg($uploadedfile);
	}else if($extension_upload=="png"){
		$src = imagecreatefrompng($uploadedfile);
	}else {
		$src = imagecreatefromgif($uploadedfile);
	}
	
	/*On prend nos deux dimensions (déprat, arrivée)*/
	list($width,$height)=getimagesize($uploadedfile);
	$new_dimensions = resize($uploadedfile);
	$tmp=imagecreatetruecolor($new_dimensions['width'],$new_dimensions['height']);
	imagecopyresampled($tmp,$src,0,0,0,0,$new_dimensions['width'],$new_dimensions['height'], $width,$height);
	imagejpeg($tmp,$img_path,100);
	
	imagedestroy($src);
	imagedestroy($tmp);
}
?>