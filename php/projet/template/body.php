<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projet</title>
</head>

<body>
<?php require('header.php'); ?>

<main>
    <?php
    if (!empty($nomDuFichier)) {
        require($nomDuFichier);

        if (!empty($resultat)) {
            ?>
            <div class="resultat">
                <?= $resultat ?>
            </div>
            <?php
        }
    }
    ?>
</main>


<?php require('footer.php'); ?>
</body>
</html>
