<?php 
// PHP ajout pdf devis 
  if($_FILES['devis']['error'] >0) 
  	{
  		$erreur ="Erreur lors du transfert";
  		echo$erreur;
	}
  else {
	 $max_filesize = 104857600;
	 if ($_FILES['devis']['size']>$max_filesize)
	 	{
	 		 $erreur ="fichier trop volumineu ";
	 		 echo$erreur;
	 	}
	 $upload_dir ="./Devis/{$_FILES['devis']['name']}";
	 $resultat = move_uploaded_file($_FILES['devis']['tmp_name'], $upload_dir);
	 if($resultat) echo"ok"; 
	 else echo"nope";
 }

?>