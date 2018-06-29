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
 		 echo'ligne ajoutée ';
 	}
?>
<html>
	<head>
		<meta charset="utf-8">
    	<title> Sylvain ARD </title>
    	<link rel="stylesheet" href="ajoutClient.css">
	</head>
	<body>
		<div id="bloc_page">
      <header>
        <div id="titre_principal"> <H1> Remplir le devis </H1></div>
      </header>
    </div>
    <br><br><br>
    <ul id="menu">
      <center>
        <li><a href="inde.php">Accueil </a></li>
		<li><a href="ajoutClient.php">Ajouter un client</a></li>
		<li><a href="ajoutDevis.php">Ajouter un devis</a></li>
		<li><a href="afficherD.php">afficher la liste des devis </a></li>
		<li><a href="editP.php">propriétaire </a></li>
      </center>
    </ul>
    <br><br><br>
		<div id ="formulaire">
			<form  method ="POST" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?nd=".$_GET['nd'];?>">
				<br><br>
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
		</div>
	</body>
</html>
