<?php
 	session_start();
	if(isset($_GET['id'])) $_SESSION['recupID'] = $_GET['id'];

 	if (isset ($_POST['submit']))
 	{
 		try
 	{
 		$bdd = new PDO('mysql:host=localhost;dbname=sylvainard;charset=utf8', 'root','');
	 }
	 catch (Exception $e)
	 {
	 	die('erreur :'.$e->getMessage());
	 }
	 $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 		 $sql ="UPDATE devis SET
 		 	 numeroDevis = :numeroDevis,
 		 	 dateDevis = :dateDevis,
 		   	 numeroCL = :numeroCL,
 		     idClient = :idClient
 		     where idDevis= :id ";
 		 $requete = $bdd->prepare($sql);
 		 $numeroDevis=$_POST['numeroDevis'];
 		 $dateDevis=$_POST['dateDevis'];
 		 $numeroCL=$_POST['numeroCL'];
 		 $idClient=$_POST['idClient'];

 	
	 	 $requete->execute(array(
	 		'numeroDevis'=>$numeroDevis,
	 		'dateDevis'=>$dateDevis,
	 		'numeroCL'=>$numeroCL,
	 		'idClient'=>$idClient,
	 		'id' => $_SESSION['recupID']
	 	 ));
	 	 echo "Devis modifié";
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
        <div id="titre_principal"> <H1> Modifier le devis</H1></div>
      </header>
    </div>
    <br><br><br>
		
			<ul id="menu">
		      <center>
		        <li><a href="inde.php">Accueil </a></li>
		        <li><a href="ajoutClient.php">Ajouter un client</a></li>
		        <li><a href="ajoutDevis.php">Ajouter un devis</a></li>
		        <li><a href="afficherD.php">afficher la liste des devis </a></li>
		      </center>
   			 </ul>
   			 <br><br><br>
			<div id ="formulaire">
				<form  method ="POST" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
					</br></br>
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
						<input type ="submit" value ="modifier" name = "submit" id="submit">
					</p>
				</form>
			</div>
	</body>
</html>