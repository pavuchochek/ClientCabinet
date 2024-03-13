<?php

if (isset($_GET['etat'])) {
    $etat = $_GET['etat'];
} else {
    $etat = 'accueil';
}

$etat_medecin = null; // liste, detail, modifier, ajouter, (supprimer?)
$etat_usager = null;
$etat_rdv = null;

switch ($etat) {
    case 'medecin':
        include 'medecin.php';
        break;
    case 'usager':
        include 'usager.php';
        break;
    case 'rdv':
        include 'rdv.php';
        break;
    case 'statistiques':
        include 'statistiques.php';
        break;
    case 'accueil':
        include 'accueil.php';
        break;
    default:
        include '404.php';
        break;
}

?>

