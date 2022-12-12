<?php
     session_start();
     if(!isset($_SESSION['user']))
      header('Location:connexion.php');

// On charge l'enregistrement correspondant à l'ID passé en paramètre :
    require "db.php";
     $db = connexionBase();
    $id = $_GET['id'];
   
    $requete = $db->prepare("SELECT * FROM artist JOIN disc on disc.artist_id = artist.artist_id WHERE disc_id=?");
    $requete->execute(array($id));
    $myArtist = $requete->fetch(PDO::FETCH_OBJ);
    // var_dump($myArtist);
 
    $requete->closeCursor();
      $requete2 = $db->query("SELECT * FROM artist");

      $tableau = $requete2->fetchAll(); 
       $requete2->closeCursor(); 
    //    var_dump($requete2);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Ajout</title>
</head>

<body>

    <div class='container-fluid col-10'>

        <h1>Modifier un vinyle</h1>

        <br>
        <br>

        <form action="disc_form.php" method="post" enctype="multipart/form-data">
            <label for="title">Title</label><br>
            <input class='form-control' type="text" name="title" id="title" value="<?= $myArtist->disc_title?>">
            <br>
            <label for="year">Year</label><br>
            <input class='form-control' type="text" name="year" id="year" "  value=" <?=$myArtist->disc_year?>">
            <br>
            <label for="label">Label</label><br>
            <input class='form-control' type="text" name="label" id="label" value="<?=$myArtist->disc_label?>">
            <br>
            <label for="artist">Artist </label><br>
            <!-- <option>Choose artist </option> -->
            <select class='form-control' name="artist" id="artist">
                <?php foreach ($tableau as $a ){
                       echo '<option name="artist" value="'.$a["artist_id"].'">'.$a["artist_name"].'</option>';
                   };?>
            </select>
            <input class='form-control' id="prodId" name="id" type="hidden" value="<?php echo $myArtist -> disc_id ?>">
            <br>
            <label for="genre">Genre</label><br>
            <input class='form-control' type="text" name="genre" id="genre" value="<?=$myArtist->disc_genre?>">
            <br>
            <label for="price">Price</label><br>
            <input class='form-control' type="text" name="price" id="price" value="<?=$myArtist->disc_price ?>">
            <br>
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
            <br>
            <img src="jaquettes/<?= $myArtist-> disc_picture; ?>" width="20%" height="20%"
                alt="<?= $myArtist-> disc_picture;?>" title=" <?= $myArtist->disc_title; ?>"><br>
            <br>


            <button class="btn btn-primary" id="modifButton" type="submit">Modifier</button>
            <a href="disc_detail.php" type="button" class="btn btn-primary">Retour</a>
        </form>
    </div>

</body>

</html>