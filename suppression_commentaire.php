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

    <input type="hidden" name="id_billet" value="<?php echo $_GET['id']?>">

<?php

    $id_commentaire = $_GET['id'];

    $stmt = $dbh->prepare('DELETE FROM commentaires WHERE id=:id');

                $stmt->bindParam('id', $id_commentaire, PDO::PARAM_INT);

                $stmt->execute();

header('Location: blog.php');

?>