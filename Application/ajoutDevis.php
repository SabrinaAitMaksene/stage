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
	 	 header("Location:ajoutLdevis.php?nd=".$numeroDevis);
	 }
	 	
?>

<html>
	<head>
		<meta charset="utf-8">
    	<title> Sylvain ARD </title>
    	<link rel="stylesheet" href="ajoutClient.css">
    	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	</head>
	<body>
	<div id="bloc_page">
      <header>
        <div id="titre_principal"> <H1> Ajouter un devis</H1></div>
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
			<div id ="devis">
				<form method="post" action="reception.php" enctype="multipart/form-data">
					 <?php echo '<i class="fas fa-upload"></i>';?> 
					 <input type ="file" name ="devis" id ="devis">
					 <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
					 <input type="submit" value="envoyer" name="upload_submit" id="upload_submit" >
				</form>	
			</div>
			<div id ="facture">
				<form method="post" action="receptionF.php" enctype="multipart/form-data">
					 <?php echo '<i class="fas fa-upload"></i>';?> 
					 <input type ="file" name ="facture" id="facture">
					 <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
					 <input type="submit" value="envoyer" name="upload_submit" id="upload_submit" >
				</form>
			</div>
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
						<input type ="submit" value ="ajouter un devis" name = "submit" id="submit">
					</p>
				</form>
			</div>
	</body>
</html>