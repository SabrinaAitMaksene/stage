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
  $sql = "  DELETE from devis where idDevis = :id";
  $requete = $bdd ->prepare($sql);
  $array = array(
  	'id'=> $id
  	);
  $requete->execute($array);
  $requete->closeCursor();
   header("Location: ./afficherD.php");

?>
