<?php 
    $titre = 'Médecins';
    $css = ['CSSmedecins.css'];
    include 'common/head.php';
?>
<body>
    <div class="body">
        <div class="boutons_modif" id="afficherFormulaire">
            <a href = "index.php?etat=medecin&etat_medecin=ajouter"><input id="boutonAfficher" type="button" value="Ajouter médecin"></a>
        </div>
        <?php include 'nouvelles_pages/Liste_medecin.php'; ?>
    </div>
</body>
