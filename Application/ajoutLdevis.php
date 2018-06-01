<?php
 	try
 	{
 		$bdd = new PDO('mysql:host=localhost;dbname=sylvainard;charset=utf8', 'root','');
	 }
	 catch (Exception $e)
	 {
	 	die('erreur :'.$e->getMessage());
	 }
 	$ndevis= $_GET['nd'];
 	if (isset ($_POST['envoiL']))
 	{
 		 $sql="SELECT idDevis FROM devis WHERE  numeroDevis = $ndevis";
 		 $response = $bdd->query( $sql);
 		 $donnees= $response->fetch();
 		 $idDevis= $donnees['idDevis'];
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
 		 'idDevis'=>$idDevis
 		 ));
 		 echo'ligne ajouté ';
 	}
 	if(isset($_POST['generer']))
 	{
 		header("Location:devis.php?nd=".$ndevis);
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
			<form  method ="POST" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?nd=".$_GET['nd'];?>">
				<p>

					<label for="reference">Reference </label>
					<input type ="text"  id ="referenceD" name="referenceD">
				</p>
				<P>
					<label for="descrip">Description</label>
					<input type ="text"  id ="descriptionD" name="descriptionD">
				</P>
				<P>
					<label for="quantite">Quantité</label>
					<input type ="number"  min ="0" id ="quantiteD" name="quantiteD">
				</P>
				<P>
					<label for ="pu">Prix Unitaire</label> 
					<input type ="number" min ="0"   id ="prixUnitaireD" name="prixUnitaireD"> 
				</P>
				<p>
					<input type = "submit" value="Ajouter un element " id ="envoiL" name="envoiL">
				</p>
			</form>	
			<form  method ="POST" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?nd=".$_GET['nd'];?>">
			 	<p>
					<input type ="submit" value ="generer" name = "generer" id="generer">
				</p>
			</form>
		</div>
	</body>
</html>
