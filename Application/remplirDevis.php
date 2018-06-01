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
 		 $requete = $bdd->prepare('INSERT INTO devis(numeroDevis,dateDevis,numeroCL,idClient) VALUES(:numeroDevis, :dateDevis, :numeroCL, :idClient)');
 		 $numeroDevis=$_POST['numeroDevis'];
 		 $dateDevis=$_POST['dateDevis'];
 		 $numeroCL=$_POST['numeroCL'];
 		 $idClient=$_POST['idClient'];

 	
	 	 $requete->execute(array(
	 		'numeroDevis'=>$numeroDevis,
	 		'dateDevis'=>$dateDevis,
	 		'numeroCL'=>$numeroCL,
	 		'idClient'=>$idClient
	 	 ));
	 	 header("Location:ajoutLdevis.php?nd=".$numeroDevis."ncl=".$numeroCL);
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
	</body>
</html>