<?php
 if (isset($_POST['envoiD']))
 {
 	$numD= htmlentities(trim($_POST['numD']));
 	$dateD = htmlentities(trim($_POST['dateD']));
 	$url = htmlentities(trim($_POST['url']));
 	$NC = htmlentities(trim($_POST['NC']));
 	if ($numD&&$dateD&&$url&&$NC)
 	{
 		$connect=mysql_connect('localhost','root','') or die('error');
 		mysql_select_db('sylvainard');
 		$query = mysql_query("INSERT INTO devis VALUES('',$numD,$dateD,'$url',$NC) ");
 		die("Devis créé, <a href ='ajoutLigne.php' >veuillez ajouter des lignes </a> ");
 	}else echo"veuillez renseigner tous les champs"; 
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
		<div id = "conteneur">
			<div id ="devis">
				<form  method ="POST" action ="remplirdevis.php">
					<p>
						<label for="numD">Numero devis </label>
						<input type ="number" min ="0" name="numD">
					</p>
					<p>
						<label for="dateD">Date du devis </label>
						<input type ="date"  name="dateD">
					</p>
					<p>
						<label for="url">Url Devis  </label>
						<input type ="url"  name="url">
					</p>
					<p>
						<label for="NC">Numéro client </label>
						<input type ="number" min ="0"  name="NC">
					</p>
					<p>
						<input type ="submit" value ="ajouter un devis" name ="envoiD">
					</p>
				</form>
			</div>
		</div>
	</body>
</html>