<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";
    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();
    //var_dump($db);
    // on lance une requête pour chercher toutes les fiches d'artistes
    $requete = $db->query("SELECT * FROM disc join artist on disc.artist_id = artist.artist_id ");
    // on récupère tous les résultats trouvés dans une variable
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    // on clôt la requête en BDD
    $requete->closeCursor();
   // var_dump($tableau);
   $cd = 0;
 
   session_start();
   if(!isset($_SESSION['user']))
    {
       header('Location:connexion.php');
    }

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>PDO - Liste</title>
</head>
<body>
<div class="container-fluid">
    <div class="row col-lg-12">
                <div class="listeDesDisques text-start col-lg-8"> 
                <?php foreach ($tableau as $disc): $cd++; ?> <?php endforeach; ?>
                    <h1>Liste des disques (<?php echo $cd?>)</h1>
                </div>
                <div class='col-lg-1 mt-2 pl-3 ml-3'>
                    <a href='deconnexion.php' class='btn btn-danger'>Exit</a>
                </div>
                <div class="col-lg-2 mt-2 ">    
                <form action ="disc_new.php" method="post">
                    <input class="btn btn-primary  " type="submit" value="Ajouter">
                </div>
            


            
            <?php if (isset($_GET["erreur"]) && $_GET["erreur"]=="vide") { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>erreur</strong> pas d'ID.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            <?php } ?>    
            <?php foreach ($tableau as $disc): ?>
        <div class=" card border-3 mb-1 col-lg-5  " style="width:40% ">
            
                    <div class=" row col-">
                            <img src="jaquettes/<?= $disc->disc_picture?>" class="col-6 max-width:10% ">

                        <div class="card-body col-6">
                            <h3><?= $disc ->disc_title ?></h3>
                        
                    
                            <p class="card-subtitle  text-left mt-2 col-"><b>Artist name : </b>  <?= $disc->artist_name ?></p>
                            <p class="card-subtitle  text-left mt-2 col-"><b>Label : </b><?= $disc ->disc_label ?> </p>
                            <p class="card-subtitle text-left mt-2 col-"><b>Year : </b> <?= $disc ->disc_year ?> </p>
                            <p class="card-subtitle text-left mt-2 mb-5  col-"><b> Genre : </b><?= $disc->disc_genre ?> </p>
                            <a href="disc_detail.php?id=<?= $disc->disc_id ?>"> <button type="button" class="btn btn-primary mt-5 col-">Détail</button></a>
                                        
                    
                        </div>
                    </div>      
                </div>   
        <?php endforeach; ?>     
    </div>
</div>    
</body>
</html>