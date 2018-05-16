<?php
 	try
 	{
 		$bdd = new PDO('mysql:host=localhost;dbname=sylvainard;charset=utf8', 'root','');
	 }
	 catch (Exception $e)
	 {
	 	die('erreur :'.$e->getMessage());
	 }
 	$requete = $bdd->prepare('INSERT INTO devis(numeroDevis,dateDevis,urlDevis,numeroCl,idClient) VALUES(?, ?, ?, ?, ?)');
 	$requete->execute(array($_POST['numeroDevis'],$_POST['dateDevis'],$_POST['urlDevis'],$_POST['numeroCl'],$_POST['idClient']));
 	echo'devis ajouté ';
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
				<form  method ="post" action ="remplirdevis.php">
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
						<input type ="submit" value ="ajouter un devis" >
					</p>
				</form>
			</div>
		</div>
	</body>
</html>