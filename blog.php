<?php
   session_start();

    $erreur=false;
try
{
    $bddblog = new PDO('mysql:host=localhost;dbname=bddblog;charset=utf8', 'root', '');
}
catch (Exception $e)
{
     $erreur=true;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MINI-BLOG</title>
        <link rel="stylesheet" href="blog.css"/>
    </head>

<body>

    <div><h1>BIENVENUE SUR LE MINI-BLOG, <?php echo $_SESSION['pseudo']; ?></h1></div>

<?php
    if ($erreur) {
?>
        Erreur connexion base de données
<?php
    }
    else {
?>

        <form action="blog_post.php" method="post">

            Veuillez saisir le titre du billet : <input type ="text" name="titre_billet"><br><br>
            Veuillez saisir le texte de votre billet : <textarea cols="40" rows="10" name="texte_billet"></textarea><br><br>
            <INPUT TYPE="submit" NAME="validation" VALUE="VALIDER">

        </form>

<?php
    }

$billets = $bddblog-> query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y %H:%m:%s") AS date_creation FROM billets ORDER BY ID DESC ');

     while ($billet=$billets->fetch())
    {
       echo '<div class="titre">'.htmlspecialchars($billet['titre']). '</div>';
       echo '<div class="contenu">'.htmlspecialchars($billet['contenu']).'</div>';
       echo '<div class="timestamp">'.'Billet écrit le '.htmlspecialchars($billet['date_creation']).'</div><br>';
       echo '<div class="commentaire" >'.'<a href="commentaires.php?id='.$billet['id'].'">Commentaires<a>'.'</div><br>';

        $commentaires = $bddblog-> prepare('SELECT id, id_billet, auteur, commentaire, DATE_FORMAT(date_commentaire, "%d/%m/%Y %H:%m:%s") AS date_creation FROM commentaires WHERE id_billet=:billet  ORDER BY ID DESC ');
        $commentaires -> bindParam('billet', $billet['id'], PDO::PARAM_STR );
        $commentaires -> execute();

        while ($commentaire = $commentaires->fetch()) {

            echo '<div class="affichagecommentaire">'.htmlspecialchars($commentaire['auteur']).' a dit : '.htmlspecialchars($commentaire['commentaire']).'</div><br><br>';
        }
    }

$billets->closeCursor();

?>

    </body>
</html>
