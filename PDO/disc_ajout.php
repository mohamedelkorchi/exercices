
<?php
 session_start();
 if(!isset($_SESSION['user']))
  header('Location:connexion.php');

require "db.php"; 
$db = connexionBase();

var_dump($_POST);
// Récupération du titre :
if (isset($_POST['title']) && $_POST['title'] != "") {
    $Title = $_POST['title'];
}
else {
    $Title = Null;
}

// Récupération des arguments (même traitement, avec une syntaxe abrégée)
$Artist = (isset($_POST['artist']) && $_POST['artist'] != "") ? $_POST['artist'] : Null;
$Year = (isset($_POST['year']) && $_POST['year'] != "") ? $_POST['year'] : Null;
$Genre = (isset($_POST['genre']) && $_POST['genre'] != "") ? $_POST['genre'] : Null;
$Label = (isset($_POST['label']) && $_POST['label'] != "") ? $_POST['label'] : Null;
$Price = (isset($_POST['price']) && $_POST['price'] != "") ? $_POST['price'] : Null;
// $Artist_id = (isset($_POST['artist_id']) && $_POST['artist_id'] != "") ? $_POST['artist_id'] : Null;

// die;
// En cas d'erreur, on renvoie vers le formulaire
if ($Title == Null || $Artist == Null || $Year == Null || $Genre == Null || $Label == Null || $Price == Null) {
    header("Location: disc_new.php");
    exit;
}
$sizeMax = 1048576;
$fileName = basename($_FILES["imageUpload"]["name"]);
$fileType = pathinfo($fileName, PATHINFO_EXTENSION);
var_dump ($fileType);
$fileSize = $_FILES["imageUpload"]["size"];
$fileEmp = $_FILES["imageUpload"]["tmp_name"]; // Emplacement du fichier de maniere temporaire sur le serveur
var_dump($fileEmp);
$fileError = $_FILES["imageUpload"]["error"];
var_dump($fileError);
$path = dirname($_SERVER["SCRIPT_FILENAME"]) . "/jaquettes/"; // pas de document root car fichier image dans le meme fichier que le script
var_dump($path);
if (isset($_FILES["imageUpload"])) {
    if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif" && $fileType != "PNG") {
        header("Location: disc_new.php?err=image&type=extension");
        exit;
    } else if ($fileSize > $sizeMax) {
        header("Location: disc_new.php?err=image&type=taille");
        exit;
        // echo "Fichier trop grand !";
    } else {
        //Si tout est validé , envoie vers le dossier
        $result = move_uploaded_file($fileEmp, $path . $fileName);
        var_dump($result);
        echo "Upload reussi";
    }
}

// var_dump($Artist_id);
// S'il n'y a pas eu de redirection vers le formulaire (= si la vérification des données est ok) :



    // Construction de la requête INSERT sans injection SQL :
    // $requete = $db->prepare("INSERT INTO artist (artist_name) VALUES (:artist);");
    $requete = $db->prepare("INSERT INTO disc (disc_title, disc_year, disc_genre, disc_label, disc_price, artist_id, disc_picture) VALUES ( :title, :year, :genre, :label, :price, :artist, :picture)");
    // Association des valeurs aux paramètres via bindValue() :
    $requete->bindValue(":title", $Title, PDO::PARAM_STR);
    $requete->bindValue(":year", $Year, PDO::PARAM_STR);
    $requete->bindValue(":genre", $Genre, PDO::PARAM_STR);
    $requete->bindValue(":label", $Label, PDO::PARAM_STR);
    $requete->bindValue(":price", $Price, PDO::PARAM_STR);
    $requete->bindValue(":artist", $Artist, PDO::PARAM_STR);
    $requete->bindValue(":picture", $fileName, PDO::PARAM_STR);
    // Lancement de la requête :
    $requete->execute();

    // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
    $requete->closeCursor();


// Gestion des erreurs
// catch (Exception $e) {
//     var_dump($requete->queryString);
//     var_dump($requete->errorInfo());
//     echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
//     die("Fin du script (script_artist_ajout.php)");
// }

// Si OK: redirection vers la page artists.php
 header("Location: discs.php");

// Fermeture du script
exit;

?>