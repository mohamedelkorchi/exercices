<?php
    session_start();
    require_once 'db.php';
    $db = connexionBase();

    if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype']))
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);

        $check = $db->prepare('SELECT user_pseudo, user_email, user_password FROM user WHERE user_email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 0)
        {
            if(strlen($pseudo)<=100)
            {
                if(strlen($email)<=100)
                {
                    if(filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        if($password == $password_retype)
                        {
                            $password = hash('sha256', $password);
                            $ip = $_SERVER['REMOTE_ADDR'];

                            $insert = $db->prepare('INSERT INTO user(user_pseudo, user_email, user_password) VALUES (:pseudo, :email, :password)');
                            $insert->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
                            $insert->bindValue(':email', $email, PDO::PARAM_STR);
                            $insert->bindValue(':password', $password, PDO::PARAM_STR);
                            // $insert->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

                            $insert->execute();

                            $insert->closeCursor();

                            header('Location:connexion.php?reg_err=succes');
                        }else header('Location:inscription.php?reg_err=password');
                    }else header('Location:inscription.php?reg_err=EMAIL');
                }else header('Location:inscription.php?reg_err=email_longueur');
            }else header('Location:inscription.php?reg_err=pseudo_longueur');
        }else header('Location:inscription.php?reg_err=already');
    }




?>