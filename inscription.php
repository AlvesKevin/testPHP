<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Questionnaire</title>
</head>
<body>

<?php
    if (isset($_GET['reg_err'])){
        $err = htmlspecialchars($_GET['reg_err']);

        switch ($err){
            case 'success':
                ?>
                <div><strong>Succes</strong> inscription réussi</div>
                <?php
                break;

            case 'password':
                ?>
                <div><strong>Erreur</strong> mot de passe différent</div>
                <?php
                break;

            case 'email':
                ?>
                <div><strong>Erreur</strong> email incorect</div>
                <?php
                break;

            case 'email_length':
                ?>
                <div><strong>Erreur</strong> email trop long</div>
                <?php
                break;

            case 'pseudo_length':
                ?>
                <div><strong>Erreur</strong> pseudo trop long</div>
                <?php
                break;

            case 'already':
                ?>
                <div><strong>Erreur</strong> compte deja existant</div>
                <?php
                break;
        }
    }
?>
    <form method="post" action="inscription_traitement.php">
        <h1></h1>
        <input type="text" name="pseudo" placeholder="pseudo" required="required" autocomplete="off">
        <input type="email" name="email" placeholder="email" required="required" autocomplete="off">
        <input type="password" name="password" placeholder="Mot de passe" required="required" autocomplete="off">
        <input type="password" name="password_retype" placeholder="Retapez le mot de passe" required="required" autocomplete="off">
        <a href="index.php"><button type="submit">Inscription</button></a>
</body>
</html>

