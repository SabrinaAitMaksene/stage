<?php
 	try
 	{
 		$bdd = new PDO('mysql:host=localhost;dbname=sylvainard;charset=utf8', 'root','');
	 }
	 catch (Exception $e)
	 {
	 	die('erreur :'.$e->getMessage());
	 }
 	
 	if (isset ($_POST['submit']))
 	{
 		 $requete = $bdd->prepare('INSERT INTO devis(numeroDevis,dateDevis,urlDevis,numeroCL,idClient) VALUES(:numeroDevis, :dateDevis, :urlDevis, :numeroCL, :idClient)');
 		 $numeroDevis=$_POST['numeroDevis'];
 		 $dateDevis=$_POST['dateDevis'];
 		 $urlDevis=$_POST['urlDevis'];
 		 $numeroCL=$_POST['numeroCL'];
 		 $idClient=$_POST['idClient'];
 	
 		$requete->execute(array(
 		'numeroDevis'=>$numeroDevis,
 		'dateDevis'=>$dateDevis,
 		'urlDevis'=>$urlDevis,
 		'numeroCL'=>$numeroCL,
 		'idClient'=>$idClient
 		));
 		echo'devis ajouté ';
 	}	
?>
<html>
	<head>
		<meta charset="utf-8">
    	<title> Sylvain ARD </title>
    	<link rel="stylesheet" href="remplirdevis.css">
	</head>
	<body>
		<h2>Remplir le devis </h2>
		<div id ="ligneD">
			<form  method ="POST" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
				<p>
					<label for="reference">Reference </label>
					<input type ="text"  id ="reference">
				</p>
				<P>
					<label for="descrip">Description</label>
					<input type ="text"  id ="descrip">
				</P>
				<P>
					<label for="quantite">Quantité</label>
					<input type ="number"  min ="0" id ="quantite">
				</P>
				<P>
					<label for ="pu">Prix Unitaire</label> 
					<input type ="number" min ="0"   id ="pu"> 
				</P>
				<p>
					<input type = "submit" value="Ajouter un element " id ="envoiL">
				</p>
			</form>	
		</div>
	</body>
</html>
