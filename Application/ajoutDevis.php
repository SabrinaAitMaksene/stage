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

 		 $requete = $bdd->prepare('INSERT INTO devis(numeroDevis,nomDevis,dateDevis,numeroCL, idClient) VALUES(:numeroDevis, :nomDevis, :dateDevis, :numeroCL, :idClient)');
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
						<label for="nomDevis">Nom du devis </label>
						<input type ="text"  name="nomDevis"  id ="nomDevis"required>
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
						<input type ="submit" value ="ajouter un devis" name = "submit" id="submit">
					</p>
				</form>
			</div>
			<br/>
			<div id ="devisF">
				<form method="post" action="reception.php" enctype="multipart/form-data">
					 </br></br>
					 <p>
						<label for="nomDevis">Nom du devis </label>
						<input type ="text"  name="nomDevis"  id ="nomDevis"required>
					 </p> </form><br/>
					 <P><?php echo '<i class="fas fa-upload"></i>';?> 
					 <input type ="file" name ="devis" id ="devis"></p>
					 <p><input type="hidden" name="MAX_FILE_SIZE" value="1048576" /></p>
					 <p><input type="submit" value="envoyer" name="upload_submit" id="upload_submit" ></p>
				</form>	
			</div>
			<br/>
			<div id ="factureF">
				<form method="post" action="receptionF.php" enctype="multipart/form-data"> 
				     </br></br>
					 <p>
						<label for="nomFacture">Nom de la facture</label>
						<input type ="text"  name="nomFacture"  id ="nomFacture"required>
					 </p> <br/>
					 <P><?php echo '<i class="fas fa-upload"></i>';?> 
					 <input type ="file" name ="facture" id="facture"></p>
					 <p><input type="hidden" name="MAX_FILE_SIZE" value="1048576" /></p>
					 <p><input type="submit" value="envoyer" name="upload_submit" id="upload_submit" ></p>
				</form>
			</div>
	</body>
</html>