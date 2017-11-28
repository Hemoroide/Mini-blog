<?php

try
{
    $bddblog = new PDO('mysql:host=localhost;dbname=bddblog;charset=utf8', 'root','');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>EDIT COMMENTAIRES</title>
    <link rel="stylesheet" href="commentaires.css">
</head>

<body>

    <h1>MODIFICATION DU COMMENTAIRE</h1>

        <form method="post" action="edit_commentaire_post.php">
            Veuillez saisir votre nouveau commentaire : <input type ="text" name="new_commentaire"><br><br><br>
            <INPUT TYPE="submit" id="validation" VALUE="VALIDER LA MODIFICATION">
            <input type="hidden" name="id_billet" value="<?php echo $_GET['id']?>">
        </form>

</body>

</html>