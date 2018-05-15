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
					<label for="numD">Numero devis :</label>
					<input type ="number" id="numD">
					</p>
					<p>
					<label for="dateD">Date du devis :</label>
					<input type ="date" id="dateD">
					</p>
					<p>
					<label for="url">Url Devis : </label>
					<input type ="url" id="url">
					</p>
					<p>
					<label for="NC">Numéro client :</label>
					<input type ="number" id="NC">
					</p>
				</form>
			</div>
			<div id ="ligneD">
				<form method="POST" action ="remplisDevis.php">
					<p>
						<label for="reference">Reference </label>
						<input type ="text"  id ="reference">
					</p>
					<P>
						<label for="descrip">Description</label>
						<input type ="number"  id ="descrip">
					</P>
					<P>
						<label for="quantite">Quantité</label>
						<input type ="number"  id ="quantite">
					</P>
					<P>
						<label for ="pu">Prix Unitaire</label> 
						<input type ="text"  id ="pu"> 
					</P>
				</form>
			</div>
		</div>
	</body>
</html>