<?php
session_start();

try {
    $dbh = new PDO('mysql:host=localhost;dbname=bddblog;charset=utf8', 'root', '');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idCommentaire = $_GET['id'];

$stmt = $dbh->prepare('DELETE FROM commentaires WHERE id=:idCommentaire');

$stmt->bindParam(':idCommentaire', $idCommentaire, PDO::PARAM_INT);

$stmt->execute();

header('Location: blog.php');