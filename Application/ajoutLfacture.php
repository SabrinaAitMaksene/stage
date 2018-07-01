<?php
 	try
 	{
 		$bdd = new PDO('mysql:host=localhost;dbname=sylvainard;charset=utf8', 'root','');
	 }
	 catch (Exception $e)
	 {
	 	die('erreur :'.$e->getMessage());
	 }
 	$nfacture= $_GET['nd'];
 	if (isset ($_POST['envoiL']))
 	{
 		 $sql="SELECT idFacture FROM factures WHERE  numeroFacture = $nfacture";
 		 $response = $bdd->query( $sql);
 		 $donnees= $response->fetch();
 		 $idFacture= $donnees['idFacture'];
 		 $referenceF=$_POST['referenceF'];
 		 $descriptionF=$_POST['descriptionF'];
 		 $quantiteF=$_POST['quantiteF'];
 		 $prixUnitaireF=$_POST['prixUnitaireF'];

 		 $requete = $bdd->prepare('INSERT INTO lignefacture(referenceF,descriptionF,quantiteF,prixUnitaireF,idFacture) VALUES(:referenceF, :descriptionF, :quantiteF, :prixUnitaireF, :idFacture)');
 		
 		 $requete->execute(array(
 		 'referenceF'=>$referenceF,
 		 'descriptionF'=>$descriptionF,
 		 'quantiteF'=>$quantiteF,
 		 'prixUnitaireF'=>$prixUnitaireF,
 		 'idFacture'=>$idFacture
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
        <li><a href="index.php">Accueil </a></li>
        <li><a href="ajoutClient.php">Ajouter un client</a></li>
        <li><a href="ajoutDevis.php">Ajouter un devis</a></li>
        <li><a href="afficherD.php">afficher les devis </a></li>
        <li><a href="ajoutF.php">Ajouter une facture</a></li>
        <li><a href="afficherF.php">afficher les factures </a></li>
        <li><a href="editP.php">propriétaire </a></li>

      </center>
    </ul>
    <br><br><br>
		<div id ="formulaire">
			<form  method ="POST" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?nd=".$_GET['nd'];?>">
				<br><br>
				<p>

					<label for="reference">Reference </label>
					<input type ="text"  id ="referenceF" name="referenceF">
				</p>
				<P>
					<label for="descrip">Description</label>
					<input type ="text"  id ="descriptionF" name="descriptionF">
				</P>
				<P>
					<label for="quantite">Quantité</label>
					<input type ="number"  min ="0" id ="quantiteF" name="quantiteF">
				</P>
				<P>
					<label for ="pu">Prix Unitaire</label> 
					<input type ="number" min ="0"   id ="prixUnitaireF" name="prixUnitaireF"> 
				</P>
				<p>
					<input type = "submit" value="Ajouter un element " id ="envoiL" name="envoiL">
				</p>
			</form>	
		</div>
	</body>
</html>
