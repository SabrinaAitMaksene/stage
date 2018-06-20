<?php
require_once '../data/pdo/database.php';

session_start();

if(isset($_GET['id'])) $_SESSION['recupID'] = $_GET['id'];

$bdd = new database();
$bdd->connexion();

if(isset($_POST['form_editPage'])) {

    $selectTitre = $bdd->getBdd()->prepare($bdd->selectTitrebyId());
    $arrayId = array (
        'id' => $_SESSION['recupID']
    );
    $selectTitre->execute($arrayId);

    $isTaken = false;
    while ($data = $selectTitre->fetch(PDO::FETCH_ASSOC)) {
        if(trim($data['pg_titre']) == trim($_POST['titre'])) {
            $isTaken = true;
            $errorTitre = "Erreur : Titre déjà existant, veuillez choisir un autre titre...";
            $_SESSION['recupDesc'] = $_POST['desc'];
            $_SESSION['recupCont'] = $_POST['cont'];
            $_SESSION['recupMenu'] = $_POST['posMenu'];
            $_SESSION['recupSmenu'] = $_POST['posSmenu'];
        }
    }
    $selectTitre->closeCursor();

    if($isTaken == false) {

        $titre = $_POST['titre'];

        //Description de la page
        if($_POST['desc'] != '' && !empty($_POST['desc'])) $desc = $_POST['desc'];
        else $desc = NULL;

        $contenu = $_POST['cont'];
        $posMenu = $_POST['posMenu'];
        $posSmenu = $_POST['posSmenu'];

        $update = $bdd->getBdd()->prepare($bdd->updatePage()); 
        $array = array (
            'titre' => $titre,
            'desc' => $desc,
            'cont' => $contenu,
            'menu' => $posMenu,
            'Smenu' => $posSmenu,
            'id' => $_SESSION['recupID']
        );
        $update->execute($array);
        $update->closeCursor();

        $success = "Succés : votre page a bien été mise à jour !";
    }
}


$select = $bdd->getBdd()->prepare($bdd->selectPagebyId());
$array = array (
    'id' => $_SESSION['recupID']
);
$select->execute($array);
$data = $select->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Edition de page</title>
        <link rel="stylesheet" type="text/css" href="../data/css/accueil.css"/>
        <link rel="stylesheet" type="text/css" href="../data/css/sidenavMenu.css"/>
        <link rel="stylesheet" type="text/css" href="../data/css/form.css"/>
        <link rel="stylesheet" type="text/css" href="../data/css/error.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    </head>
    <body>
        <div id="admin">Bonjour Administrateur !</div>
        <h1 id="title">Edition <br/> de page</h1> 
        <div id="nav" class="sidenav">
            <a href="../index.php" id="accueil">Accueil</a>
            <a href="../gestionPages/allPages.php" id="page">Pages</a>
            <a href="../gestionImages/allImgs.php" id="img">Images</a>
            <a href="../gestionDocs/allDocs.php" id="doc">Documents</a>
            <a href="../gestionInfos/changeInfos.php" id="info">Infos Site</a>
        </div>

        <?php
            if (isset($isTaken) && $isTaken == true) {
                echo "<div class=\"alert\">", "\n";
                    echo "\t\t<span class=\"closebtn\">&times;</span>", "\n";
                    echo "\t\t", $errorTitre, "<br/>", "\n";     
                echo "</div>", "\n";
            }
            
            if (isset($success)) {
                echo "<div class=\"success\">", "\n";
                    echo "\t\t<span class=\"closebtn\">&times;</span>", "\n";
                    echo "\t\t", $success, "<br/>", "\n";     
                echo "</div>", "\n";
            }
        ?>

        <div class="form">
            <h1>Edition<span>Modifiez les champs que vous voulez... </span></h1>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="section"><span>1</span>Informations page</div>
                <fieldset>
                    <label for="titre">Titre (max: 50 carac.)
                        <input type="text" name="titre" maxlength="50" required
                            <?php
                                echo "value='".$data['pg_titre']."'";
                            ?>
                        /> 
                    </label>

                    <label for="desc"> Description (max: 255 carac.)
                        <input type="text" name="desc" maxlength="255" 
                            <?php 
                                if(isset($isTaken) && $isTaken == true) 
                                    echo "value='".$_SESSION['recupDesc']."'";
                                else 
                                    echo "value='".$data['pg_desc']."'";
                            ?>
                        />
                    </label>     
                </fieldset>

                <div class="section"><span>2</span>Contenu de la page</div>
                <fieldset>
                    <label for="cont">Contenu
                        <textarea name="cont" required> 
                            <?php 
                                if(isset($isTaken) && $isTaken == true) 
                                    echo $_SESSION['recupCont'];
                                else 
                                    echo $data['pg_cont'];
                            ?>
                        </textarea>
                    </label>
                </fieldset>

                <div class="section"><span>3</span>Emplacement sur menu</div>
                <fieldset>
                    <label for="posMenu">Position menu
                        <input type="number" name="posMenu" step="1" min="0" max="9" placeholder="Entre 1 et 9 (0 si non repertoriée)" required
                            <?php 
                                if(isset($isTaken) && $isTaken == true) 
                                    echo "value='".$_SESSION['recupMenu']."'";
                                else 
                                    echo "value='".$data['pg_menu']."'";
                            ?>
                        /> 
                    </label>

                    <label for="posSMenu">Position sous-menu
                        <input type="number" name="posSmenu" step="1" min="0" max="9" placeholder="Entre 1 et 9 (0 si non repertoriée)" required
                            <?php 
                                if(isset($isTaken) && $isTaken == true) 
                                    echo "value='".$_SESSION['recupSmenu']."'";
                                else 
                                    echo "value='".$data['pg_Smenu']."'";
                            ?>
                        />
                    </label>     
                </fieldset>
                
                <input id="btn" type="submit" name="form_editPage" value="Confirmer"/>
            </form>
        </div>

        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ 
            selector:'textarea',
            branding: false,
            language_url: '../data/tinymce/fr_FR.js',
        });
        </script>
    </body>
</html>

<?php $select->closeCursor(); ?>