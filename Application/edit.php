<?php
 	session_start();
	if(isset($_GET['id'])) $_SESSION['recupID'] = $_GET['id'];
	try
 	{
 		$bdd = new PDO('mysql:host=localhost;dbname=sylvainard;charset=utf8', 'root','');
	 }
	 catch (Exception $e)
	 {
	 	die('erreur :'.$e->getMessage());
	 }

 	if (isset ($_POST['submit']))
 	{

	 $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 		 $sql ="UPDATE devis SET
 		 	 numeroDevis = :numeroDevis,
 		 	 nomDevis = :nomDevis,
 		 	 dateDevis = :dateDevis,
 		   	 numeroCL = :numeroCL,
 		     idClient = :idClient
 		     where idDevis= :id ";
 		 $requete = $bdd->prepare($sql);
 		 $numeroDevis=$_POST['numeroDevis'];
 		 $nomDevis=$_POST['nomDevis'];
 		 $dateDevis=$_POST['dateDevis'];
 		 $numeroCL=$_POST['numeroCL'];
 		  $sql2= "SELECT  idClient from client where numero= $numeroCL ";
         $response= $bdd->query($sql2);
         $donnees= $response->fetch();
         $idClient=$donnees['idClient'];

 	
	 	 $requete->execute(array(
	 		'numeroDevis'=>$numeroDevis,
	 		'nomDevis'=>$nomDevis,
	 		'dateDevis'=>$dateDevis,
	 		'numeroCL'=>$numeroCL,
	 		'idClient'=>$idClient,
	 		'id' => $_SESSION['recupID']
	 	 ));
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
				<form  method ="POST" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
					</br></br>
					<p>
						<label for="numeroDevis">Numero devis </label>
						<input type ="number" min ="0" name="numeroDevis" id ="numeroDevis"required>
					</p>
					<p>
						<label for="nomDevis">Nom du  devis </label>
						<input type ="text" name="nomDevis" id ="nomDevis"required>
					</p>
					<p>
						<label for="dateDevis">Date du devis </label>
						<input type ="date"  name="dateDevis"  id ="dateDevis"required>
					</p>
					<p>
						<label for="numeroCL">Numéro client </label>
						<select name="numeroCL" id ="numeroCL" size="1"required>
							
							<?php
				                 $sql2= "SELECT * from client ";
				                 $response= $bdd->query($sql2);
				                 while ($donnees = $response->fetch(PDO::FETCH_ASSOC)) { 
			                ?>
			                 <option><?php echo $donnees['numero']; ?></option>
			                <?php
				                }
				                $response->closeCursor();
			                ?>
						</select>
					</p>
					<p>
						<input type ="submit" value ="modifier" name = "submit" id="submit">
					</p>

				</form>
			</div>
	</body>
</html>