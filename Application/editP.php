<?php
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
 		 $sql ="UPDATE proprietaire SET
 		 	 prenom = :prenom,
 		 	 nom = :nom,
 		   	 numMaison = :numMaison,
 		     Residence = :Residence,
 		     rue = :rue,
 		     ville = :ville,
 		     numeroFixe = :numeroFixe,
 		     numeroPortable = :numeroPortable,
 		     adresseMail = :adresseMail,
 		     Siret = :Siret

 		     ";
 		 $requete = $bdd->prepare($sql);
 		 $prenom=$_POST['prenom'];
 		 $nom=$_POST['nom'];
 		 $numMaison=$_POST['numMaison'];
 		 $Residence=$_POST['Residence'];
 		 $rue=$_POST['rue'];
 		 $ville=$_POST['ville'];
 		 $numeroFixe=$_POST['numeroFixe'];
 		 $numeroPortable=$_POST['numeroPortable'];
 		 $adresseMail=$_POST['adresseMail'];
 		 $Siret=$_POST['Siret'];

 	
	 	 $requete->execute(array(
	 		'prenom'=>$prenom,
	 		'nom'=>$nom,
	 		'numMaison'=>$numMaison,
	 		'Residence'=>$Residence,
	 		'rue'=>$rue,
	 		'ville'=>$ville,
	 		'numeroFixe'=>$numeroFixe,
	 		'numeroPortable'=>$numeroPortable,
	 		'adresseMail'=>$adresseMail,
	 		'Siret'=>$Siret

	 		
	 	 ));
	 }
	
	 	
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ajouter un client</title>
		<link rel="stylesheet" href ="prop.css"  >
	</head>
	<body>
 <div id="bloc_page">
      <header>
        <div id="titre_principal"> <H1> Modifier le propriétaire </H1></div>
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
					<label for ="prenom">Prenom</label>
					<input type ="text"  name="prenom" id = "prenom">
				</p>
				<p>
					<label for ="nom">Nom</label>
					<input type ="text"  name="nom" id = "nom">
				</p>
				<p>
					<label for ="numMaison">Numero de maison </label>
					<input type ="text"  name="numMaison" id = "numMaison">
				</p>
				<p>
					<label for ="Residence">Résidence</label>
					<input type ="text"  name="Residence" id = "Residence">
				</p>
				<p>
					<label for ="rue">Rue </label>
					<input type ="text"  name="rue" id = "rue">
				</p>
				<p>
					<label for ="ville">Ville</label>
					<input type ="text"  name="ville" id = "ville">
				</p>
				<p>
					<label for ="numeroFixe">Numero fixe </label>
					<input type ="text"  name="numeroFixe" id = "numeroFixe">
				</p>
				<p>
					<label for ="numeroPortable">Numéro portable</label>
					<input type ="text"  name="numeroPortable" id = "numeroPortable">
				</p>
				<p>
					<label for ="adresseMail">Adresse mail</label>
					<input type ="text"  name="adresseMail" id = "adresseMail">
				</p>
				<p>
					<label for ="Siret">Siret</label>
					<input type ="text"  name="Siret" id = "Siret">
				</p>
				<p>
						<input type ="submit" value ="envoyer" name = "submit" id="submit">
				</p>
			</form>
		</div>
	</body>
</html>