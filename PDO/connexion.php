<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <title>Connexion</title>
</head>
<body>
<div class='container-fluid col-12'>
<?php 
    if(isset($_GET['login_err']))
    {
        $err = htmlspecialchars($_GET['login_err']);

        switch($err)
        {
            case 'password':
            ?>
            <div class='alert alert-danger'>
                <strong>Erreur</strong> mot de passe incorrect
            </div>
            <?php
            break;

            case 'email':
            ?>
            <div class='alert alert-danger'>
                <strong>Erreur</strong> email incorrect
            </div>
            <?php
            break;

            case 'already':
            ?>
            <div class='alert alert-danger'>
                <strong>Erreur</strong> compte non existant
            </div>
            <?php
            break;

        }
    }
?>    
<div class='card border-0 mb-1 col-lg-12 align-items-center mt-5' style='width 40%'>
    <form action="connexion_script.php" method='post'>
            <h2 class='text-center' >Connexion</h2>
            <div class='form-group' >
                <input type="text" name='email' class='form-control' placeholder='Email' required='required' autocomplete='off'>
            </div>
            <div class='form-group' >
                <input type="password" name='password' class='form-control' placeholder='Mot de passe' required='required' autocomplete='off'>
            </div>
            <div class='form-group'>
                <button type='submit' class='btn btn-primary btn-block'>Connexion</button>
            </div>
            <div class='form-group'>
                        <a href='inscription.php' class='btn btn-danger btn-block'>Inscription</a>
            </div>
    </form>
</div>
</div>
</body>
</html>