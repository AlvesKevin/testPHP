<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Questionnaire</title>
    <meta http-equiv="refresh" content="0; URL=https://laboiteajeu.com/" />
</head>


<?php
    /*se connecter à la base donnée*/
    require_once 'config.php';

    /*vérification de si les variables $_POST existe grace à isset([nom_du_post])*/
    if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype']))
    {
        /*empecher les utilisateurs d'envoyer du codes nuisibles*/
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);

    /* vérification de si l'utilisateur est dans la base de données*/
        $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
        /* on lance le check*/
        $check->execute(array($email));
        /* stockage des données de check dans data (on récupére la ligne Check avec fetch)*/
        $data = $check->fetch();
        /* vérifictation de si la ligne existe dans la table */
        $row = $check->rowCount();

        if ($row == 0){
            if(sterlen($pseudo) <= 100){
                if (strlen($email) <= 100){
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        if ($password == $password_retype){
                            $password = hash('sha256', $password);
                            /*stocker l'ip et l'insserer dans le BDD*/
                            $ip = $_SERVER['REMOTE_ADDR'];
                            $insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, password, ip) VALUES(:pseudo, :email, :password, :ip)');
                            $insert->execute(array(
                                'pseudo' => $pseudo,
                                'email' => $email,
                                'password' =>$password,
                                'ip' => $ip
                            ));
                            header('Location:inscription.php?reg_err=success');
                        }
                    }else header('Location: inscription.php?reg_err=email');
                }else header('Location: inscription.php?reg_err=email_length');
            }else header('Location: inscription.php?reg_err=pseudo_length');
        }else header('Location: inscription.php?reg_err=already');
    }

