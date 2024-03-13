<!DOCTYPE html>
<html lang="fr">
    <?php
        $titre = 'Médecins';
        $css = ['medecin.css'];
        include 'common/head.php';
        include 'common/header.php';

        if (isset($_GET['etat_medecin'])) {
            $etat_medecin = $_GET['etat_medecin'];
        } else {
            $etat_medecin = 'liste';
        }

        switch ($etat_medecin) {
            case 'detail':
                include 'pages/detail_medecin.php';
                break;
            case 'modifier':
                include 'pages/modifier_medecin.php';
                break;
            case 'ajouter':
                include 'pages/ajouter_medecin.php';
                break;
            case 'liste':
                include 'pages/medecins.php';
                break;
            default:
                include '404.php';
                break;
        }
        
        include 'common/footer.php';
    ?>

</html>

