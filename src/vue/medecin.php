<!DOCTYPE html>
<html lang="fr">
    <?php
        $titre = 'Médecins';
        $css = ['medecin.css'];
        include 'common/head.php';
        include 'pages/header.php';

        if ($etat_medecin == 'detail') {
            include 'pages/detail_medecin.php';
        } else {
            if ($etat_medecin == 'modifier') {
                include 'pages/modifier_medecin.php';
            } else {
                include 'pages/medecins.php';
            }
        }
    include 'pages/footer.php'; ?>

</html>

