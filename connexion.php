<?php
session_start();

// Verification de la demande de connexion automatique et redirection si nécessaire
if (isset($_COOKIE['pseudo']) AND isset($_COOKIE['pass']))
    {
        header('Location: espace.php');
    }
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h3>Connexion</h3>

<div class="envoi">
    <form action="member_connect.php" method="POST">
        <br>
        <p><label for="pseudo">Pseudo<input type="text" name="pseudo" value=""<?php /*echo $valueNickname; */ ?>></label></p>
        <p><label for="pass">Mot de passe<input type="password" name="pass" value=""<?php /*echo $valueNickname; */ ?>></label></p>
        <br>
        <p><label for="remember">Connexion automatique<input type="checkbox" name="remember"></label></p>
        <br>
        <button type="submit" class="btn btn-outline-secondary">Envoyer</button>
    </form>
    <br>
</div>

<br>
<a href="index.php">Retour à l'accueil</a>
</body>
</html>