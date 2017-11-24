<?php

if (isset($_GET['motdepasse'])) {
    $erreur = 'Les deux mot de passe ne sont pas identiques';
}
else {
    $erreur='';
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>INSCRIPTION</title>
        <link rel="stylesheet" href="index.css">
    </head>

<body>

    <div><h1>INSCRIPTION ESPACE MEMBRE</h1></div>

    <div class="questionnaire">

        <form method="post" action="nouvel_utilisateur.php">
            Selectionnez un pseudo : <input type = "text" name="pseudo"><br>
            Selectionnez un mot de passe : <input type = "password" name="pass"> <?php echo $erreur?><br>
            Confirmation du mot de passe : <input type = "password" name="pass2"><br>
            Veuillez saisir votre adresse mail : <input type = "text" name="mail"><br>
            <input type="submit" value="VALIDER">
        </form>

    </div>

    <div><a href="connexion.php">Déjà inscrit? Cliquez ici pour vous connecter</a> </div>

<body>

</html>