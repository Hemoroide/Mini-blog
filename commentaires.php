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
        <title>COMMENTAIRES</title>
        <link rel="stylesheet" href="commentaires.css">
    </head>

<body>

    <h1>SECTION COMMENTAIRES</h1>

        <form action="commentaires_post.php" method="post">

    Veuillez saisir votre commentaire : <input type ="text" name="commentaire"><br><br><br>

            <input type="hidden" name="id_billet" value="<?php echo $_GET['id']?>">

    <INPUT TYPE="submit" NAME="validation" VALUE="VALIDER LE COMMENTAIRE">

        </form>


</body>

</html>