<?php 
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=sylvainard;charset=utf8', 'root','');
	}
	catch(Exception $e)
	{
		die('erreur :' .$e->getMessage());
	}
	$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	if(isset($_POST['submit']))
	{
		
		$numero=$_POST['numero'];
		$nomClient=$_POST['nomClient'];
		$prenomClient=$_POST['prenomClient'];
		$adresseClient=$_POST['adresseClient'];

		$requete = $bdd->prepare('INSERT INTO client(numero,nomClient,prenomClient,adresseClient) VALUES(:numero, :nomClient, :prenomClient, :adresseClient)');
		$requete ->execute(array(
			'numero'=>$numero,
			'nomClient'=>$nomClient,
			'prenomClient'=>$prenomClient,
			'adresseClient'=>$adresseClient
		 ));

	}
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Ajouter un client</title>
		<link rel="stylesheet" href ="remplirdevis.css"  >
	</head>
	<body>
		<div id ="ajoutcl">
			<form method ="POST" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
				<p>
					<label for ="numero">Numero client</label>
					<input type ="number" min = "0"  name="numero" id = "numero">
				</p>
				<p>
					<label for ="nomClient">Nom client</label>
					<input type ="text"  name="nomClient" id = "nomClient">
				</p>
				<p>
					<label for ="prenomClient">Prenom client</label>
					<input type ="text" name="prenomClient" id = "prenomClient">
				</p>
				<p>
					<label for ="adresseClient">Adresse du client</label>
					<input type ="text" name="adresseClient" id = "adresseClient">
				</p>
				<p>
						<input type ="submit" value ="envoyer" name = "submit" id="submit">
				</p>
			</form>
		</div>
	</body>
</html>
