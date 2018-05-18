<?php
 	try
 	{
 		$bdd = new PDO('mysql:host=localhost;dbname=sylvainard;charset=utf8', 'root','');
	 }
	 catch (Exception $e)
	 {
	 	die('erreur :'.$e->getMessage());
	 }
	 $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 	
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
	 	 $response = $bdd->query('SELECT idDevis FROM devis WHERE  numeroDevis ="'.$numeroDevis.'"' );
 		 $donnees= $response->fetch();
 		 global $idDevis ;
 		 $idDevis= $donnees['idDevis'];
	 		echo'devis ajouté ';
 	

 	if (isset ($_POST['envoiL']))
 	{
 		 $referenceD=$_POST['referenceD'];
 		 $descriptionD=$_POST['descriptionD'];
 		 $quantiteD=$_POST['quantiteD'];
 		 $prixUnitaireD=$_POST['prixUnitaireD'];
 		$requete = $bdd->prepare('INSERT INTO lignedevis(referenceD,descriptionD,quantiteD,prixUnitaireD,idDevis) VALUES(:referenceD, :descriptionD, :quantiteD, :prixUnitaireD, :idDevis)');
 		
 	
 		$requete->execute(array(
 		'referenceD'=>$referenceD,
 		'descriptionD'=>$descriptionD,
 		'quantiteD'=>$quantiteD,
 		'prixUnitaireD'=>$prixUnitaireD,
 		'idDevis'=>$GLOBALS['idDevis']
 		));
 		echo'ligne ajouté ';
 	}
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
		<div id = "conteneur">
			<div id ="devis">
				<form  method ="POST" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
					<p>
						<label for="numeroDevis">Numero devis </label>
						<input type ="number" min ="0" name="numeroDevis" id ="numeroDevis"required>
					</p>
					<p>
						<label for="dateDevis">Date du devis </label>
						<input type ="date"  name="dateDevis"  id ="dateDevis"required>
					</p>
					<p>
						<label for="urlDevis">Url Devis  </label>
						<input type ="url"  name="urlDevis" id="ulrDevis"required>
					</p>
					<p>
						<label for="numeroCL">Numéro client </label>
						<input type ="number" min ="0"  name="numeroCL" id ="numeroCL"required>
					</p>
					<p>
						<label for="idClient">id  client </label>
						<input type ="number" min ="0"  name="idClient" id ="idClient"required>
					</p>
					<p>
						<input type ="submit" value ="ajouter un devis" name = "submit" id="submit">
					</p>
				</form>
			</div>
			<div id ="ligneD">
				<form  method ="POST" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
					<p>
						<label for="referenceD">Reference </label>
						<input type ="text"  name ="referenceD" id ="referenceD">
					</p>
					<P>
						<label for="descriptionD">Description</label>
						<input type ="text" name = "descriptionD" id ="descriptionD">
					</P>
					<P>
						<label for="quantiteD">Quantité</label>
						<input type ="number"  min ="0"  name ="quantiteD" id ="quantiteD">
					</P>
					<P>
						<label for ="prixUnitaireD">Prix Unitaire</label> 
						<input type ="number" min ="0" name ="prixUnitaireD"  id ="prixUnitaireD"> 
					</P>
					<p>
						<input type = "submit" value="Ajouter un element " name = "envoiL" id ="envoiL">
					</p>
				</form>	
			</div>
		</div>
	</body>
</html>