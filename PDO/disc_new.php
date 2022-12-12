<?php
     session_start();
     if(!isset($_SESSION['user']))
      header('Location:connexion.php');

    // on importe le contenu du fichier "db.php"
    include "db.php";
    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();
    //var_dump($db);
    // on lance une requête pour chercher toutes les fiches d'artistes
    $requete = $db->query("SELECT * FROM artist");
    // on récupère tous les résultats trouvés dans une variable
   // $id = $_GET["id"];
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    // on clôt la requête en BDD
    $requete->closeCursor();
   // var_dump($tableau);
   //$cd = 0;

?>






<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>PDO - Ajout</title>
</head>
<body>
<div class="container-fluid col-10">
    <h1>Ajouter un vinyle</h1>

    <!--  -->

    <form action ="disc_ajout.php" method="post" enctype="multipart/form-data" >

        <div class='shadow-lg p-2 mb-2 bg-body rounded'>
                <label for="title">Title </label><br>
                <input class='form-control' type="text" name="title" id="title"  placeholder="Enter title" >
                <br><br>
        </div>

        <div class='shadow p-2 mb-2 bg-body rounded'>
                <label for="artist">Artist </label><br>
                <select class='form-control' name="artist" id="artist">
                <?php foreach($tableau as $disc):?>    
                <option name="artist_id" value="<?php echo $disc->artist_id ?>"> <?= $disc->artist_name ?>  </option>
                <?php endforeach ?>
                </select>
                <br><br>
        </div>

        <div class='shadow p-2 mb-2 bg-body rounded'>
                <label for="year">Year </label><br>
                <input class='form-control' type="text" name="year" id="year" placeholder="Enter year">
                <br><br>
        </div>

        <div class='shadow p-2 mb-2 bg-body rounded'>
                <label for="genre">Genre </label><br>
                <input class='form-control' type="text" name="genre" id="genre" placeholder="Enter genre (Rock, Pop, PROG ...)">
                <br><br>
        </div>

        <div class='shadow p-2 mb-2 bg-body rounded'>
                <label for="label">Label </label><br>
                <input class='form-control' type="text" name="label" id="label" placeholder="Enter label (EMI, Warner, PolyGram, Univers sale ...)" >
                <br><br>
        </div>

        <div class='shadow-lg p-2 mb-2 bg-body rounded'>
                <label for="price">Price </label><br>
                <input class='form-control' type="text" name="price" id="price" >
                <br><br>
        </div>     
          
                <label for="choisirImage">Picture</label><br>
                <input name="imageUpload" type="file" value="Choisir un fichier" />
                <?php if (isset($_GET["err"]) && $_GET["err"]=="image") { 
                    switch ($_GET["type"]) {
                        case "extension" :
                            ?> <small>Extension non autorisée !</small> <?php ; break;

                        case "taille" :
                            ?> <small>Fichier trop grand !</small> <?php ; break;
                        default :
                        ?> <small>Fichier non conforme !</small> <?php ; break;
                    }
                } ?>

                <!-- <input type="text" name="dossier" > -->
                <br><br>
                <input class="btn btn-primary" type="submit" value="Ajouter">
                <!-- <input class="btn btn-primary" type="button" value="Retour" > -->
                <a href="discs.php" type="button" class="btn btn-primary">Retour</a>
    </form>
</div>

</body>
</html>