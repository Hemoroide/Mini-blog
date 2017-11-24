<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Titre de ma page</title>
</head>

<body>

Salut <?php echo $_SESSION['pseudo']; ?> !

</body>
