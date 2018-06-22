<?php
//PHP ajout pdf facture
 if($_FILES['facture']['error'] >0) 
  	{
  		$erreur ="Erreur lors du transfert";
  		echo$erreur;
	}
  else {
	 $max_filesize = 104857600;
	 if ($_FILES['facture']['size']>$max_filesize)
	 	{
	 		 $erreur ="fichier trop volumineu ";
	 		 echo$erreur;
	 	}
	 $upload_dir ="./Facture/{$_FILES['facture']['name']}";
	 $resultat = move_uploaded_file($_FILES['facture']['tmp_name'], $upload_dir);
	 if($resultat) echo"ok"; 
	 else echo"nope";
 }
?>