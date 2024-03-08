<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Médecins - Cabinet Médical</title>
        <link rel="stylesheet" href="css/CSSmedecins.css">
        <link rel="stylesheet" href="css/CSSheader.css">
        <link rel="stylesheet" href="css/CSSfooter.css">
        <link rel="icon" href="img/logo.png">
    </head>

    <?php include 'pages/header.php'; ?>

    <?php
        if ($etat_medecin == 'detail') {
            include 'pages/detail_medecin.php';
        } else {
            if ($etat_medecin == 'modifier') {
                include 'pages/modifier_medecin.php';
            } else {
                include 'pages/medecins.php';
            }
        }
    ?>

    <?php include 'pages/footer.php'; ?>
</html>

