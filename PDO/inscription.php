<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <title>Inscription</title>
</head>
<body>
<div class='login-form'>
<?php
    if(isset($_GET['reg_err']))
    {
        $err = htmlspecialchars($_GET['reg_err']);

        switch($err)
        {
            case'succes':
                ?>
                <div class='alert alert-success'>
                    <strong>Felicitation</strong> vous etes inscris :)
                </div>
                <?php
                break;

                case'password':
                    ?>
                    <div class='alert alert-danger'>
                        <strong>Erreur</strong> mot de passe different
                    </div>
                    <?php
                    break;

                    case'EMAIL':
                        ?>
                        <div class='alert alert-danger'>
                            <strong>Erreur</strong> email non valide
                        </div>
                        <?php
                        break;

                        case'email_longueur':
                            ?>
                            <div class='alert alert-danger'>
                                <strong>Erreur</strong> email trop long
                            </div>
                            <?php
                            break;

                            case'pseudo_longueur':
                                ?>
                                <div class='alert alert-danger'>
                                    <strong>Erreur</strong> pseudo trop long
                                </div>
                                <?php
                                break;

                                case'already':
                                    ?>
                                    <div class='alert alert-danger'>
                                        <strong>Erreur</strong> vous avez deja un compte
                                    </div>
                                    <?php
                                    break;
                
        }
        
    }
?>
    <form action="inscription_script.php" method='post'>
        <h2 class='text-center' >Inscription</h2>
        <div class='form-group' >
            <input type="text" name='pseudo' class='form-control' placeholder='Pseudo' required='required' autocomplete='off'>
        </div>
        <div class='form-group' >
            <input type="text" name='email' class='form-control' placeholder='Email' required='required' autocomplete='off'>
        </div>
        <div class='form-group' >
            <input type="password" name='password' class='form-control' placeholder='Mot de passe' required='required' autocomplete='off'>
        </div>
        <div class='form-group' >
            <input type="password" name='password_retype' class='form-control' placeholder='retapez à nouveau le mot de passe' required='required' autocomplete='off'>
        </div>
        <div class='form-group'>
            <button type='submit' class='btn btn-primary btn-block'>Inscription</button>
        </div>
    </form>



</div>
</body>
</html>