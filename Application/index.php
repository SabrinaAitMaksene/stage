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
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
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
          <input type="text" id="searchBar" onkeyup="search() " placeholder="filtrer par nom">
            <table id="pageTable">
                <tr class="header">
                    <th >Nom du client</th>
                    <th >Prenom du client</th>
                     <th >Numéro du client</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
                
                <?php
                 $sql2= "SELECT * from client ";
                 $response= $bdd->query($sql2);
                while ($donnees = $response->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                         <td><?php echo $donnees['nomClient']; ?></td>
                         <td><?php echo $donnees['prenomClient']; ?></td>
                          <td><?php echo $donnees['numero']; ?></td>
                         <?php echo "<td>".'<a href="editC.php?id='.$donnees['idClient'].'" id="edit" class="btn"><i class="fas fa-pencil-alt"></i></a></td>'?>
                         <?php echo "<td>".'<a href="delete.php?id='.$donnees['idClient'].'" id="del" class="btn"><i class="fas fa-trash"></i></a></td>'?>
                       </tr>
                <?php
                }
                $response->closeCursor();
                ?>
            </table>
          </div>
  <script>
            function search() {
                var input, filter, table, tr, td, i;

                input = document.getElementById("searchBar");
                filter = input.value.toUpperCase();
                table = document.getElementById("pageTable");
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
  </div>
 </body>
</html>   