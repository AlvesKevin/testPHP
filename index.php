<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Questionnaire</title>
</head>
<body>

<?php
    if (isset($_GET['login_err'])){
        $err = htmlspecialchars($_GET['login_err']);

        switch ($err){
            case 'password':
            ?>
                <div><strong>Erreur</strong> mot de passe incorect</div>
            <?php
            break;

            case 'email':
            ?>
                <div><strong>Erreur</strong> email incorect</div>
            <?php
            break;

            case 'already':
            ?>
                <div><strong>Erreur</strong> compte non existant</div>
            <?php
            break;
        }
    }
?>
    <form method="post" action="connexion.php">
        <h1></h1>
        <input type="email" name="email" placeholder="email" required="required" autocomplete="off">
        <input type="password" name="password" placeholder="Mot de passe" required="required" autocomplete="off">
        <button type="submit">Connexion</button>
        <a href="inscription.php"> Pas de compte ? Inscrivez vous !</a>
</body>
</html>
