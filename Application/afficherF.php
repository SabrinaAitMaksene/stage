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
        <div id="titre_principal"> <H1>Afficher  les factures</H1></div>
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
          <input type="text" id="searchBar" onkeyup="search()" placeholder="Filtrer par numero de la facture">
          <input type="text" id="searchBar1" onkeyup="search1()"placeholder="Filtrer par numero du client ">
            <table id="pageTable">
                <tr class="header">
                    <th>numero du client</th>
                    <th>numero de la facture</th>
                    <th>nom de la facture</th>
                    <th>Date de la facture</th>
                    <th>Afficher </th>
                    <th>Generer</th>
                </tr>
                
                <?php
                 $sql2= "SELECT * from factures ";
                 $response= $bdd->query($sql2);
                while ($donnees = $response->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                         <td><?php echo $donnees['numeroCL']; ?></td>
                         <td><?php echo $donnees['numeroFacture']; ?></td>
                         <td><?php echo $donnees['nomFacture']; ?></td>
                         <td><?php echo $donnees['dateFacture']; ?></td>
                         <?php echo "<td>".'<a href="showF.php?id='.$donnees['idFacture'].'" id="show" class="btn"><i class="far fa-eye"></i></a></td>'?>
                         <?php echo "<td>".'<a href="facture.php?nd='.$donnees['numeroFacture'].'" id="generate" class="btn"><i class="fab fa-creative-commons-share"></i></a></td>'?>
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
                    td = tr[i].getElementsByTagName("td")[1] ;
                    if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
            function search1() {
                var input, filter, table, tr, td, i;

                input = document.getElementById("searchBar1");
                filter = input.value.toUpperCase();
                table = document.getElementById("pageTable");
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0] ;
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
	</body>
</html>