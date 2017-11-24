<?php

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8' ,'root', '');

$pass_hash = hash('sha1',$_POST['pass']);
$pass_verif = hash('sha1', $_POST['pass2']);
$pseudo = $_POST['pseudo'];
$mail = $_POST['mail'];

$stmt = $bdd->prepare('INSERT INTO membre(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :mail, CURRENT_DATE())');

$stmt->bindParam('pseudo', $pseudo, PDO::PARAM_STR);
$stmt->bindParam('pass', $pass_hash, PDO::PARAM_STR);
$stmt->bindParam('mail', $mail, PDO::PARAM_STR);


if ($pass_hash == $pass_verif)
    {
    $stmt->execute();
        header('Location: index.php');
    }
    else
    {
        header('Location: index.php?motdepasse=1');
    }





