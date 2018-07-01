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
		echo'client ajouté';
	}
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Ajouter un client</title>
		<link rel="stylesheet" href ="ajoutClient.css"  >
	</head>
	<body>
 <div id="bloc_page">
      <header>
        <div id="titre_principal"> <H1> Ajouter un client</H1></div>
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
			<form method ="POST" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
				</br>
				</br>
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
					<input type ="textarea" name="adresseClient" id = "adresseClient">
				</p>
				<p>
						<input type ="submit" value ="envoyer" name = "submit" id="submit">
				</p>
			</form>
		</div>
	</body>
</html>
