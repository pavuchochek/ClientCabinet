<?php

$etat = null;

$etat_medecin = null;
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
    default:
        include 'accueil.php';
        break;
}

?>

