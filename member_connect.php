<?php
    session_start();
    $pseudo = $_POST['pseudo'];
    $pass = $_POST['pass']; 
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Espace Membre</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<html>
<body>

<?php
    try
    {
        $bdd = new PDO('mysql:host=mysql-gnavarette.alwaysdata.net;dbname=gnavarette_bd;charset=utf8', '191463_gn', 'gn021975', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    //  Récupération de l'utilisateur et de son pass hashé
    $req = $bdd->prepare('SELECT id, pass FROM membres WHERE pseudo = :pseudo');
    $req->execute(array(
        'pseudo' => $pseudo));
    $resultat = $req->fetch();

    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);
    if (!$resultat)
    {
        echo 'Mauvais identifiant ou mot de passe !' . '<p><a href="connexion.php">Réessayer</a></p>';
    }
    else
    {
        if ($isPasswordCorrect) {
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['pseudo'] = $pseudo;
            echo 'Vous êtes connecté !';
        }
        else {
            echo 'Mauvais identifiant ou mot de passe !'. '<p><a href="connexion.php">Réessayer</a></p>';
        }
    }

//Création d'un cookie pour stocker les données pour connexion automatique
if (isset($_POST['remember']))
{
    setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
    setcookie('pass', $_POST['pass'], time() + 365*24*3600, null, null, false, true);
}
?>

<br>
<br>
<p><a href="index.php">Retour à l'accueil</a></p>
</body>
</html>
