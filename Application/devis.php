<?php
 	try
 	{
 		$bdd = new PDO('mysql:host=localhost;dbname=sylvainard;charset=utf8', 'root','');
	 }
	 catch (Exception $e)
	 {
	 	die('erreur :'.$e->getMessage());
	 }

	  $sql="SELECT  prenom FROM proprietaire" ;
	  $response = $bdd->query( $sql);
 	  $donnees= $response->fetch();
 	  $prenom= $donnees['prenom'];
	  $sql2="SELECT  nom FROM proprietaire" ;
	  $response2 = $bdd->query( $sql2);
 		 $donnees= $response->fetch();
 		 $nom= $donnees['nom'];
	  $sql3="SELECT adresse FROM proprietaire" ;
	  $response3 = $bdd->query( $sql3);
 		 $donnees= $response->fetch();
 		 $adresse= $donnees['adresse'];
	  $sql4="SELECT  numeroFixe FROM proprietaire" ;
	  $response4 = $bdd->query( $sql4);
 		 $donnees= $response->fetch();
 		 $numeroFixe= $donnees['numeroFixe'];
	  $sql5="SELECT numeroPortable FROM proprietaire";
	  $response5 = $bdd->query( $sql5);
 		 $donnees= $response->fetch();
 		 $numeroPortable= $donnees['numeroPortable'];
	  $sql6="SELECT  adresseMail FROM proprietaire";
	  $response6 = $bdd->query( $sql6);
 		 $donnees= $response->fetch();
 		 $adresseMail= $donnees['adresseMail'];
	  $sql7="SELECT  Siret FROM proprietaire" ;
 		 $response7 = $bdd->query( $sql7);
 		 $donnees= $response->fetch();
 		 $Siret= $donnees['Siret'];
 		 echo $nom;
 ?>
<html>
 <head>
    <meta charset="utf-8">
    <title> Sylvain ARD </title>
    <link rel="stylesheet" href="devis.css">
 </head>
 <body>
 <div id ="bloc_page">
 	<div id = "devis">
 		<table>
 			<tr>
 				<th colspan="3">DEVIS</th>
 			</tr>
 			<tr>
 				<th>N° devis <php? echo "".$_GET['nd'];?></th>
 				<th>Date</th>
 				<th>Code client</th>
 			</tr>
 			<tr>
 				<td><?php echo $_GET['nd'];?></td>
 				<td>21/07/2016</td>
 				<td>CL0024</td>
 			</tr>
 		</table>
 	</div>
 	<div id="info">
	 	<div id ="infoProp" >
	 		<p>
	 			<?php echo $nom." ".$prenom?><br>
		 		Tel:echo $ -portable: 
		 		<br>
		 		Email:
		 		</br>
		 		SIRET: 
	 		</p> 
	 	</div>
	 	<div id ="client">
	 		<p>Adresse :</p>
	 	</div>
 	</div>
 	<div id = "intro">
 		<p>Mode de paiement :
 		<br>Date de validité :</p>
 	</div>
 	<div id = "contenu">
 		<table>
 			<tr>
 				<th>Référence</th>
 				<th>Description</th>
 				<th>Quantité</th>
 				<th>Prix Unitaire</th>
 				<th>Total</th>
 			</tr>
 		</table>
 	</div>
 	<div id ="bottom">
 		<div id ="cl">
 			<p>CL0016</p>
 		</div>
	 	<div id = "foot">
		 	<div id = "tva">
		 		<p>TVA non applicable, ar-293-B du CGI</p>
		 	</div>
		 	<div id = "montant">
		 		<table> 
		 			<th>Total</th>
		 			<td> 420,00 euro   </td>
		 		</table>
		 	</div>
		 	<div id ="lA">
		 		<p> Cachet et signature précédés de BON POUR ACCORD </p>
		 	</div>
		 </div>
 	</div>
 	<hr width = "90%">
 	<footer><P>Entreprise individuelle -SIREN : 800792434</P></footer>
 	</div>
 </body>
</html>