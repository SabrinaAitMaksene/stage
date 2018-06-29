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
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	</head>
	<body>
		<div id="bloc_page">
      <header>
        <div id="titre_principal"> <H1>Contenu du devis </H1></div>
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
    
          <div class="searchTable">
            <table id="pageTable">
                <tr class="header">
                    <th>Reference</th>
                    <th>Description</th>
                    <th>Quantité </th>
                    <th>Prix Unitaire</th>
                    <th>Supprimer</th>
                </tr>
                
                <?php
                 $sql2= "SELECT * from lignedevis where idDevis= $id ";
                 $response= $bdd->query($sql2);
                while ($donnees = $response->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                         <td><?php echo $donnees['referenceD']; ?></td>
                         <td><?php echo $donnees['descriptionD']; ?></td>
                         <td><?php echo $donnees['quantiteD']; ?></td>
                         <td><?php echo $donnees['prixUnitaireD']; ?></td>
                         <?php echo "<td>".'<a href="deleteL.php?id='.$donnees['idLdevis'].'" id="del" class="btn"><i class="fas fa-trash"></i></a></td>'?>
                       </tr>
                <?php
                }
                $response->closeCursor();
                ?>
            </table>
          </div>
	</body>
</html>