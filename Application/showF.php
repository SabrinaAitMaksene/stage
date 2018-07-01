<?php

try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=sylvainard;charset=utf8', 'root','');
    $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }
  catch (Exception $e)
  {
    die('erreur :'.$e->getMessage());
  }
  $id = $_GET['id'];
 ?>
<html>
	<head>
		<meta charset="utf-8">
    	<title> Sylvain ARD </title>
    	<link rel="stylesheet" href="ajoutClient.css">
      <link rel="stylesheet" href="global.css">
	</head>
	<body>
		<div id="bloc_page">
      <header>
        <div id="titre_principal"> <H1>Contenu de la facture </H1></div>
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
    
          <div class="searchTable">
            <table id="pageTable">
                <tr class="header">
                    <th>Reference</th>
                    <th>Description</th>
                    <th>Quantité </th>
                    <th>Prix Unitaire</th>
                </tr>
                
                <?php
                 $sql2= "SELECT * from lignefacture where idFacture= $id ";
                 $response= $bdd->query($sql2);
                while ($donnees = $response->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                         <td><?php echo $donnees['referenceF']; ?></td>
                         <td><?php echo $donnees['descriptionF']; ?></td>
                         <td><?php echo $donnees['quantiteF']; ?></td>
                         <td><?php echo $donnees['prixUnitaireF']; ?></td>
                       </tr>
                <?php
                }
                $response->closeCursor();
                ?>
            </table>
          </div>
	</body>
</html>