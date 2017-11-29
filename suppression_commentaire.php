<?php

session_start();


try {
    $dbh = new PDO('mysql:host=localhost;dbname=bddblog;charset=utf8', 'root', '');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

?>

    <h1><center>SUPPRESSION DU COMMENTAIRE</center></h1>

    Voulez-vous vraiment supprimer ce commentaire ?<br><br>
    <form action="suppression_commentaire_post.php" method="get">
        <input type="submit" value="SUPPRIMER LE COMMENTAIRE">
        <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
    </form>

    <form action="blog.php">
        <input type="submit" value="RETOUR A LA PAGE PRECEDENTE">
    </form>



