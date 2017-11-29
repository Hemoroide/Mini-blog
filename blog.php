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

    <div><h1>BIENVENUE SUR LE MINI-BLOG, <?php echo $_SESSION['pseudo']; ?></h1>
    <div class="deconnexion"><a href="deconnexion.php">déconnexion</a></div></div>


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
            Veuillez saisir le texte de votre billet : <textarea cols="30" rows="8" name="texte_billet"></textarea><br><br>
            <INPUT TYPE="submit" NAME="validation" VALUE="VALIDER">

        </form>

<?php
    }

$billets = $bddblog-> query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y %H:%m:%s") AS date_creation FROM billets ORDER BY ID DESC ');

     while ($billet=$billets->fetch())                                                              //affichage des billets
    {
       echo '' . '<br>';
       echo '<div class="titre">'.htmlspecialchars($billet['titre']). '</div>';
       echo '<div class="contenu">'.htmlspecialchars($billet['contenu']).'</div>';
       echo '<div class="timestamp">'.'Billet écrit le '.htmlspecialchars($billet['date_creation']).'</div><br>';
       echo '<div class="commentaire" >'.'<a href="commentaires.php?id='.$billet['id'].'">Commentaires<a>'.'</div><br>';

        $commentaires = $bddblog-> prepare('SELECT id, id_billet, auteur, commentaire, DATE_FORMAT(date_commentaire, "%d/%m/%Y %H:%m:%s") AS date_creation FROM commentaires WHERE id_billet=:billet  ORDER BY ID DESC ');
        $commentaires -> bindParam('billet', $billet['id'], PDO::PARAM_STR );
        $commentaires -> execute();

        while ($commentaire = $commentaires->fetch()) {                             //Affiche les commentaires

            echo '<div class="affichagecommentaire">'.htmlspecialchars($commentaire['auteur']).' a dit : '.htmlspecialchars($commentaire['commentaire']).'</div>';
            if ($commentaire['auteur'] == $_SESSION['pseudo']) {
                echo '<div class ="edit_commentaire">' . '<a href = "edit_commentaire.php?id='.$commentaire['id'].'&type=validation">edit </a>' . '</div>';
                echo '<div class ="supprimer">' . '<a href = "suppression_commentaire?id='.$commentaire['id'].'&type=suppression">supprimer</a>' . '</div><br>';
            }
        }
    }

$billets->closeCursor();

?>

    </body>
</html>
