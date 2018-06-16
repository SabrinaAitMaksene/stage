<!DOCTYPE html>
<?php
try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=sylvainard;charset=utf8', 'root','');
  }
  catch(Exception $e)
  {
    die('erreur :' .$e->getMessage());
  }
  $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>
<html>
  <head>
    <meta charset="utf-8">
    <title> Sylvain ARD </title>
    <link rel="stylesheet" href="designApp.css">
  </head>
  
  <body>
    <div id="bloc_page">
      <header>
        <div id="titre_principal"> <H1> Sylvain ARD </H1></div>
      </header>
    </div>
    <br><br><br>
    <ul id="menu">
      <center>
       <li><a href="inde.php">Accueil </a></li>
        <li><a href="ajoutClient.php">Ajouter un client</a></li>
        <li><a href="ajoutDevis.php">Ajouter un devis</a></li>
        <li><a href="afficherD.php">afficher la liste des devis </a></li>
        
      </center>
    </ul>
    <br><br><br>
    <div id = "contenu">
    <table>
      <tr>
        <th>Nom</th>
        <th>Prenom</th>
      </tr>
      <?php 
        $sql2= "SELECT * from client ";
        $response= $bdd->query($sql2);
        while($donnees = $response->fetch())
        {
      ?>
      <tr>
        <td><?php echo $donnees['nomClient']; ?></td>
        <td><?php echo $donnees['prenomClient']; ?></td>
      </tr>
      <?php
        }
        $response->closeCursor();  
      ?>
    </table>
  </div>
 </body>
</html>   