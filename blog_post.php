<?php

$titre = $_POST['titre_billet'];
$contenu =$_POST['texte_billet'];

try
{
    $bddblog = new PDO('mysql:host=localhost;dbname=bddblog;charset=utf8', 'root','');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$stmt = $bddblog->prepare('INSERT INTO billets(titre, contenu) VALUES (:titre, :contenu)'); //preparation de la requete

$stmt ->bindParam('titre', $titre, PDO::PARAM_STR );                                // lie les variable avec item bdd
$stmt ->bindParam('contenu', $contenu, PDO::PARAM_STR );

try {
    $stmt->execute();
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

header('Location: blog.php');
?>