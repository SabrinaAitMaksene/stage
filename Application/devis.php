<?php
	require_once "html2pdf/html2pdf.class.php";
	$pdf = new HTML2PDF("p","A4","fr");
 	try
 	{
 		$bdd = new PDO('mysql:host=localhost;dbname=sylvainard;charset=utf8', 'root','');
 		$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch (Exception $e)
	{
		die('erreur :'.$e->getMessage());
	}

	 $sql="SELECT  * FROM proprietaire" ;
	 $response = $bdd->query( $sql);
 	 $donnees= $response->fetch();
 	  	 $prenom= $donnees['prenom'];
 		 $nom= $donnees['nom'];
 		 $adresse= $donnees['adresse'];
 		 $numeroFixe= $donnees['numeroFixe'];
 		 $numeroPortable= $donnees['numeroPortable'];
 		 $adresseMail= $donnees['adresseMail'];
 		 $Siret= $donnees['Siret'];
 		 $response->closeCursor();	
 	 function Total($pu,$q)
 	 {
 	 	$total = $pu*$q;
 	 	return $total;
 	 }
 	 function Somme($a){
 	 	$somme = 0;
 	 	$somme = $somme+$a;
 	 	return $somme;
 	 }

 ?>
<html>
 <head>
    <meta charset="utf-8">
    <title> Sylvain ARD </title>
    <link rel="stylesheet" href="deviss.css">
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
		 		Tel:<?php echo $numeroFixe ?>-portable: <?php echo $numeroPortable?>
		 		<br>
		 		Email:<?php echo $adresseMail?>
		 		</br>
		 		SIRET: <?php echo $Siret?>
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
 			<?php 
 				$ndv=$_GET['nd'];
 				$sql2= "SELECT * from lignedevis where idDevis= (SELECT  idDevis FROM devis where numeroDevis=$ndv)";
 				$response= $bdd->query($sql2);
 				while($donnees = $response->fetch())
 				{
 			?>
 			<tr>
 				<td><?php echo $donnees['referenceD']; ?></td>
 				<td><?php echo $donnees['descriptionD']; ?></td>
 				<td><?php echo $donnees['quantiteD']; ?></td>
 				<td><?php echo $donnees['prixUnitaireD']; ?></td>
 				<td><?php echo Total($donnees['prixUnitaireD'],$donnees['quantiteD'])?> </td>
 			</tr>
 			<?php
 				}
 				$response->closeCursor();  
 			?>
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