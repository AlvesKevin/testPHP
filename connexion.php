<?php
    session_start();
    require_once 'config.php';
    if (isset($_POST['email']) && isset($_POST['password']))
    {
        /*empecher les utilisateurs d'envoyer du codes nuisibles*/
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        /* vérification de si l'utilisateur est dans la base de données*/
        $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
        /* on lance le check*/
        $check->execute(array($email));
        /* stockage des données de check dans data (on récupére la ligne Check avec fetch)*/
        $data = $check->fetch();
        /* vérifictation de si la ligne existe dans la table */
        $row = $check->rowCount();


        /* si la ligne existe alors l'urtilisateur existe */
        if($row == 1){
            /*vérification de l'email*/
            if (filter_var($email, FILTER_VALIDATE_EMAIL)){

                /*hachage du mot de passe via un algo*/
                $password = hash('sha256', $password);

                /*vérification du mot de passe*/
                if ($data['password'] === $password){

                    /*redirection vers la page de connexion réussi*/
                    $_SESSION['user'] = $data['pseudo'];
                    header('Location:landing.php');

                }else header('Location:index.php?login_err=password');/*si password pas valide renvoit d'erreur*/
            }else header('Location:index.php?login_err=mail');/*si mail pas valide renvoie d'erreur*/
        }else header('Location:index.php?login_err=already');/*si l'utilisateur n'existe pas on renvoit une erreur*/
    } else header('Location:index.php');

