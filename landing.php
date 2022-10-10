<?php
    session_start();
    if (!isset($_SESSION['user']))
        header('Location:index.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Questionnaire</title>
</head>
<body>
    <h1>Bonjour <?php echo $_SESSION['user']; ?></h1>
    <a href="deconnexion.php">Déconnexion</a>
</body>
