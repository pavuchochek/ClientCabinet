<!DOCTYPE html>
<html lang="fr">
    <?php
        $titre = 'Médecins';
        $css = ['medecin.css'];
        include 'common/head.php';
        include 'pages/header.php';

        switch ($etat_medecin) {
            case 'detail':
                include 'pages/detail_medecin.php';
                break;
            case 'modifier':
                include 'pages/modifier_medecin.php';
                break;
            default:
                include 'pages/medecins.php';
                break;
        }
        
        include 'pages/footer.php';
    ?>

</html>

