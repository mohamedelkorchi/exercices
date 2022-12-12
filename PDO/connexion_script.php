<?php
    session_start();
    require_once 'db.php';
    $db = connexionBase();

    if(isset($_POST['email']) && isset($_POST['password']))
    {
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST['password']);
        $check = $db->prepare("SELECT user_pseudo, user_email, user_password FROM user WHERE user_email = ?");
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        // var_dump($data);

        if($row == 1)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $password = hash('sha256', $password);

                if($data['user_password'] === $password)
                {
                    
                    $_SESSION['user'] = $data['user_pseudo'];
                    header('Location:discs.php');


                }else header('Location:connexion.php?login_err=password');
            }else header('Location:connexion.php?login_err=email');
        }else header('Location:connexion.php?login_err=already');
    }else header ('Location:connexion.php');

?>
    