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
  echo $id;
  $sql = "  DELETE from lignedevis where idLdevis = :id";
  $requete = $bdd ->prepare($sql);
  $array = array(
  	'id'=> $id
  	);
  $requete->execute($array);
  $requete->closeCursor();
   header("Location: ./afficherD.php");

?>
