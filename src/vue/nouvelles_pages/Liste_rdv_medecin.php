<div class="rdv_medecin">
    <div class = "titre2">
        <h1>Liste des rendez-vous</h1>

        <div class="boutons_ajout boutons_ajout_rdv" id="afficherFormulaireRdv">
            <a href="rdv.php?idmedecin=<?php echo $idmedecin; ?>">
                <input type="button" value="Ajouter un rendez-vous">
            </a>
        </div>
    </div>
    
    <div class="box_rdv">
        <?php
            $resultat = $controleur->getListeRdv($idmedecin);
            if ($resultat == null) {
                echo "<div>
                    <div>
                        <h3>Aucun rdv</h3>
                    </div>
                </div>";
            } else {
                foreach ($resultat as $value){
                    $heure = $value->getHeureDebut();
                    $heure = substr($heure, 0, -3);
                    $date = $value->getDateRdvString();
                    $nom_usager = $value->getUsager()->getNom();
                    $prenom_usager = $value->getUsager()->getPrenom();
                    $id_usager = $value->getUsager()->getIdUsager();
                    $heure_fin = $value->getHeureFin();
                    $heure_debut = $value->getHeureDebut();
                    $date_rdv = $value->getDateRdv();
                    echo "
                    <div class='rdv'>
                        <div>
                            <div class='rdvinfo'>
                                <h3>$date :</h3>
                                <p>$heure</p>
                            </div>
                            <p>Patient : $nom_usager $prenom_usager</p>
                        </div>
                        <div class='boutonsrdv'>
                            <a href='modifier_rdv.php?usager=$id_usager&medecin=$idmedecin&date=$date_rdv&heure_debut=$heure_debut&heure_fin=$heure_fin'>
                                <img class='icone_modifier' src='img/icone_modifier.png' alt='icone modifier'/>".
                            "</a>
                            <a href='#' class='supprimerRdvBtn' data-usager='$id_usager' data-medecin='$idmedecin' data-date='$date_rdv' data-heure-debut='$heure_debut' data-heure-fin='$heure_fin'>
                                <img class='icone_supprimer' src='img/icone_supprimer.png' alt='icone supprimer'/>".
                            " </a>
                        </div>
                    </div>";
                }
            }
        ?>
    </div>
</div>