<?php
$userPseudo = $_POST['pseudo'];
$userPassword = $_POST['pass'];
$userPasswordVerif = $_POST['pass_verif'];
$userPassword = $_POST['email'];
?>

<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<html>
    <body>

    <?php

    // Connection à la base
    try
    {
        $bdd = new PDO('mysql:host=mysql-gnavarette.alwaysdata.net;dbname=gnavarette_bd;charset=utf8', '191463_gn', 'gn021975', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    // Vérification de la saisie de tous les champs
    if($_POST['pseudo']!==''AND $_POST['pass']!==''AND $_POST['pass_verif']!==''AND $_POST['email']!=='')
    {
        // Vérification de la disponibilité du pseudo      
        $req = $bdd->prepare('SELECT COUNT(*) FROM membres WHERE pseudo = :pseudo');
              $req->execute([':pseudo' => $_POST['pseudo']]);
              $res = $req->fetch();

        if ($res[0] != 0) // existe déjà
        {
            echo 'Ce pseudo est déja utilisé, merci d\'en choisir un autre ' . '<a href="inscription.php">Réessayez</a>';
        } else         
        { 
            // Vérification du mot de passe
            if ($_POST['pass']!== $_POST['pass_verif'])
            {
                echo 'la vérification du mot de passe est incorrecte ';
                echo '<a href="inscription.php">Réessayez</a>';
            }
            else
            {
                $_POST['email'] = htmlspecialchars($_POST['email']); // On rend inoffensives les balises HTML que le visiteur a pu entrer
                          
                // Vérification de la validité de l'adresse mail
                if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
                {            
                    // Hachage du mot de passe
                    $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

                    // Insertion
                    $req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
                    $req->execute(array(
                        'pseudo' => $_POST['pseudo'],
                        'pass' => $pass_hache,
                        'email' => $_POST['email']));
                    echo '
                        <h3>Félicitations votre espace est bien créé !</h3>
                        <ul>
                            <li><a href="connexion.php">Connectez vous maintenant</a></li>
                            <li><a href="index.php">Retour à l\'accueil</a></li>
                        </ul>';
                }
                else
                {
                    echo '<p>' . 'L\'adresse ' . '<em id="errorMail">' . $_POST['email'] . '</em>' . ' n\'est pas valide, recommencez !' . '</p>';
                    echo '<a href="inscription.php">Retour</a>';
                }
            }
        }
    }        
    else
    {
        echo '<p>' . 'Saisie incomplète. Veuillez recommencer en précisant toutes les données' . '</p>';
        echo '<a href="inscription.php">Retour</a>';
    }
?>
</html>












