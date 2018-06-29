<?php
 	try
 	{
 		$bdd = new PDO('mysql:host=localhost;dbname=sylvainard;charset=utf8', 'root','');
 		$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch (Exception $e)
	{
		die('erreur :'.$e->getMessage());
	}
	 $sql="SELECT  * FROM proprietaire" ;
	 $response = $bdd->query( $sql);
 	 $donnees= $response->fetch();
 	  	 $prenom= $donnees['prenom'];
 		 $nom= $donnees['nom'];
 		 $numMaison= $donnees['numMaison'];
 		 $rue= $donnees['rue'];
 		 $ville= $donnees['ville'];
 		 $Residence= $donnees['Residence'];
 		 $numeroFixe= $donnees['numeroFixe'];
 		 $numeroPortable= $donnees['numeroPortable'];
 		 $adresseMail= $donnees['adresseMail'];
 		 $Siret= $donnees['Siret'];
 		 $response->closeCursor();	

 	 function Total($pu,$q)
 	 {
 	 	$total = $pu*$q;
 	 	return $total;
 	 }
 	 function Somme($a){
 	 	$somme = 0;
 	 	$somme = $somme+$a;
 	 	return $somme;
 	 }

 ?>