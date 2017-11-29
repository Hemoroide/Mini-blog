<?php

try
{
    $bddblog = new PDO('mysql:host=localhost;dbname=bddblog;charset=utf8', 'root','');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
    $idCommentaire = $_GET['id'];
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

<?php

        $stmt = $bddblog->prepare("SELECT commentaire FROM commentaires WHERE id=:idCommentaire");

        $stmt->bindParam(':idCommentaire', $idCommentaire, PDO::PARAM_STR);

        $stmt->execute();

        $result = $stmt->fetch();

?>

            Veuillez saisir votre nouveau commentaire : <input autofocus type ="text" name="new_commentaire" value="<?php echo $result['commentaire']?>" ><br><br><br>
            <INPUT TYPE="submit" id="validation" VALUE="VALIDER LA MODIFICATION">
            <input type="hidden" name="id_billet" value="<?php echo $idCommentaire?>">

        </form>

</body>

</html>