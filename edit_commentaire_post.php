<?php
session_start();


try {
    $dbh = new PDO('mysql:host=localhost;dbname=bddblog;charset=utf8', 'root', '');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

    $id_commentaire = $_POST['id_billet'];
    $newCommentaire = $_POST['new_commentaire'];


    if (!empty($newCommentaire)) {                                                  //modification commentaire

                $stmt = $dbh->prepare('UPDATE commentaires SET commentaire=:commentaire WHERE id=:id');

                $stmt->bindParam('commentaire', $newCommentaire, PDO::PARAM_STR);
                $stmt->bindParam('id', $id_commentaire, PDO::PARAM_INT);

                $stmt->execute();

                var_dump($newCommentaire);
        }

   header('Location: blog.php');

