<?php
require_once '../data/pdo/database.php';

$bdd = new database();
$bdd->connexion();

$select = $bdd->getBdd()->query($bdd->selectAllPages());
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Vue globale des pages</title>
        <link rel="stylesheet" type="text/css" href="../data/css/accueil.css"/>
        <link rel="stylesheet" type="text/css" href="../data/css/sidenavMenu.css"/>
        <link rel="stylesheet" type="text/css" href="./css/global.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    </head>
    <body>
        <div id="admin">Bonjour Administrateur !</div>
        <h1 id="title">Vue globale <br/> des pages</h1> 
        <div id="nav" class="sidenav">
            <a href="../index.php" id="accueil">Accueil</a>
            <a href="../gestionImages/allImg.php" id="img">Images</a>
            <a href="../gestionDocs/allDoc.php" id="doc">Documents</a>
            <a href="../gestionInfos/changeInfos.php" id="info">Infos Site</a>
        </div>


        <a href="addPage.php" id="add" class="btn"><i class="far fa-plus-square"> Ajouter</i></a>

        <div class="searchTable">
            <input type="text" id="searchBar" onkeyup="search()" placeholder="Filtrer par titre...">
            
            <table id="pageTable">
                <tr class="header">
                    <th style="width: 40%;">Titre</th>
                    <th style="width: 60%;">Description</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
                
                <?php
                while ($data = $select->fetch(PDO::FETCH_ASSOC)) {
                    echo "\t\t\t\t"."<tr>"."\n";
                    echo "\t\t\t\t\t"."<td>".$data['pg_titre']."</td>"."\n";
                    echo "\t\t\t\t\t"."<td>".$data['pg_desc']."</td>"."\n";
                    echo "\t\t\t\t\t"."<td>".'<a href="editPage.php?id='.$data['pg_id'].'" id="edit" class="btn"><i class="far fa-edit"></i></a></td>'."\n";
                    echo "\t\t\t\t\t"."<td>".'<a href="delPage.php?id='.$data['pg_id'].'" id="del" class="btn"><i class="fas fa-trash-alt"></i></a></td>'."\n";
                    echo "\t\t\t\t"."</tr>"."\n";
                }
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
        <script>
            var close = document.getElementsByClassName("closebtn");
            var i;

            for (i = 0; i < close.length; i++) {
                // Lorsque que qqn clique sur le bouton de fermeture
                close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                }
            }
        </script>

    <?php $select->closeCursor(); ?>
    </body>
</html>