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

 		 $requete = $bdd->prepare('INSERT INTO factures(idClient,numeroCL,numeroFacture,nomFacture,dateFacture,idDevis,numeroD) VALUES(:idClient, :numeroCL, :numeroFacture, :nomFacture, :dateFacture, :idDevis, :numeroD)');
 		 $numeroCL=$_POST['numeroCL'];
 		 $numeroFacture=$_POST['numeroFacture'];
 		 $nomFacture=$_POST['nomFacture'];
 		 $dateFacture=$_POST['dateFacture'];
 		 $numeroD=$_POST['numeroD'];
 	
 		 $sql2= "SELECT  idClient from client where numero= $numeroCL ";
         $response= $bdd->query($sql2);
         $donnees= $response->fetch();
         $idClient=$donnees['idClient'];

          $sql3= "SELECT  idDevis from devis where numeroDevis= $numeroD ";
         $response= $bdd->query($sql3);
         $donnees= $response->fetch();
         $idDevis=$donnees['idDevis'];

 	
	 	 $requete->execute(array(
	 		'idClient'=>$idClient,
	 		'numeroCL'=>$numeroCL,
	 		'numeroFacture'=>$numeroFacture,
	 		'nomFacture'=>$nomFacture,
	 		'dateFacture'=>$dateFacture,
	 		'idDevis'=>$idDevis,
	 		'numeroD'=>$numeroD
	 	 ));
	 	 header("Location:ajoutLfacture.php?nd=".$numeroFacture);
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
        <div id="titre_principal"> <H1> Ajouter une facture</H1></div>
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
						<label for="numeroFacture">Numero de la facture </label>
						<input type ="number" min ="0" name="numeroFacture" id ="numeroFacture"required>
					</p>
					<p>
						<label for="nomFacture">Nom de la facture</label>
						<input type ="text"  name="nomFacture"  id ="nomFacture"required>
					</p>
					<p>
						<label for="dateFacture">Date de la facture</label>
						<input type ="date"  name="dateFacture"  id ="dateFacture"required>
					</p>
	
					<p>
						<label for="numeroD">Numéro du devis  </label>
						<select name="numeroD" id ="numeroD" size="1"required>
							
							<?php
				                 $sql2= "SELECT * from devis ";
				                 $response= $bdd->query($sql2);
				                 while ($donnees = $response->fetch(PDO::FETCH_ASSOC)) { 
			                ?>
			                 <option><?php echo $donnees['numeroDevis']; ?></option>
			                <?php
				                }
				                $response->closeCursor();
			                ?>
						</select>
					</p>
					<p>
						<input type ="submit" value ="ajouter une facture" name = "submit" id="submit">
					</p>
				</form>
			</div>
			<br/>
			<div id ="factureF">
				<form method="post" action="receptionF.php" enctype="multipart/form-data"> 
				     </br></br>
					 <P><?php echo '<i class="fas fa-upload"></i>';?> 
					 <input type ="file" name ="facture" id="facture"></p>
					 <p><input type="hidden" name="MAX_FILE_SIZE" value="1048576" /></p>
					 <p><input type="submit" value="envoyer" name="upload_submit" id="upload_submit" ></p>
				</form>
			</div>
	</body>
</html>