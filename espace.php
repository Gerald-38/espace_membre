<?php 
session_start();
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

<h3>Mon espace</h3>

<?php
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) 
{
    echo 'Bonjour ' . $_SESSION['pseudo'];
}
else
{
    echo 'Vous êtes déconnecté pour accéder à votre espace membre, <a href="connexion.php">Connectez vous ici</a>';
}
?>

<p><a href="index.php">Retour à l'accueil</a></p>

</body>
</html>

    