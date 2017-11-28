<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8' ,'root', '');

?>

<!DOCTYPE html>
<html>
<head>
    <title>CONNEXION</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="connexion.css">
</head>

<body>

    <h1>CONNECTEZ-VOUS</h1>

    <div>
        <form method="post" action="connexion.php">
        Pseudo : <input type="text" name="pseudo"><br>
        Mot de Passe : <input type="password" name="pass"><br>
        <input type="submit" value="VALIDER">
        </form>
    </div>

    <?php

    if (isset($_POST['pass']) && isset($_POST['pseudo'])) {
        $pass_hash = hash('sha1', $_POST['pass']);
        $pseudo = $_POST['pseudo'];

        $req = $bdd -> prepare('SELECT id FROM membre WHERE pseudo = :pseudo AND pass = :pass');
        $req->execute(array(
             'pseudo' => $pseudo,
             'pass'=> $pass_hash
        ));

        $resultat = $req->fetch();

        if (!$resultat || empty($pseudo)) {
                echo 'Mauvais identifiant ou mot de passe !';
            } else {
                $_SESSION['pseudo'] = $pseudo;
                header("Location: blog.php");
            }
    }
    ?>

</body>

</html>