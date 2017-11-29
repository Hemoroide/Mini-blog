<?php
session_start();

$auteur = $_SESSION['pseudo'];
$commentaire = $_POST['commentaire'];
$id_billet = $_POST['id_billet'];

try {
        $dbh = new PDO('mysql:host=localhost;dbname=bddblog;charset=utf8', 'root', '');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

        $stmt = $dbh->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire) VALUES (:id_billet, :auteur, :commentaire)');

        $stmt->bindParam(':auteur', $auteur, PDO::PARAM_STR);
        $stmt->bindParam(':commentaire', $commentaire, PDO::PARAM_STR);
        $stmt->bindParam(':id_billet', $id_billet, PDO::PARAM_INT);

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }

header('Location: blog.php');

