<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h3>Inscription</h3>

<div class="envoi">
    <form action="member_insert.php" method="POST">
        <br>
        <p><label for="">Pseudo<input type="text" name="pseudo" value=""></label></p>
        <p><label for="">Mot de passe<input type="password" name="pass" value=""></label></p>
        <p><label for="">Vérification du mot de passe<input type="password" name="pass_verif" value=""></label></p>
        <p><label for="">Adresse e-mail<input type="text" name="email" value=""></label></p>
        <br>
        <button type="submit" class="btn btn-outline-secondary">Envoyer</button>
    </form>
    <br>
</div>

<p><a href="index.php">Retour à l'accueil</a></p>

</body>
</html>
