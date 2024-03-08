<div class="card-container" id="list_rdv">
    <?php
        $resultat = $controleur->liste_rdv();

        if (isset ($_GET['usagerFilter']) && isset($_GET['medecinFilter'])) {
            if ($_GET['medecinFilter'] !== "") {
                $id = intval($_GET['medecinFilter']);
                if ($_GET['usagerFilter'] !== "") {
                    $id2 = intval($_GET['usagerFilter']);
                    $resultat = $controleur->getRdvByIdMedecinIdUsager($id2, $id);
                } else {
                    $resultat = $controleur->getRdvByIdMedecin($id);
                }
            } else if ($_GET['usagerFilter'] !== ""){
                $id = intval($_GET['usagerFilter']);
                $resultat = $controleur->getRdvByIdUsager($id);
            }
        }

        foreach ($resultat as $value){
            $date_rdv = $value->getDateRdv();
            $date = $value->getDateRdvString();
            $heure_debut = $value->getHeureDebut();
            $heure_debut = substr($heure_debut, 0, -3);
            $heure_fin = $value->getHeureFin();
            $heure_fin = substr($heure_fin, 0, -3);
            $nom_usager = $value->getUsager()->getNom();
            $prenom_usager = $value->getUsager()->getPrenom();
            $id_usager = $value->getUsager()->getIdUsager();
            $nom_medecin = $value->getMedecin()->getNom();
            $prenom_medecin = $value->getMedecin()->getPrenom();
            $id_medecin = $value->getMedecin()->getIdMedecin();
            $mois = $value->getMois3lettres();
            $jour = $value->getNuméroJour();
            $jour_semaine = $value->getJourSemaine();
            $annee = $value->getAnnee();

            echo "
            <div class='card'>
                <div class='col-2 text-right'>
                    <h2 class='display-4'>$jour $mois $annee</h2>
                </div>
                <div class='col-10'>
                    <ul class='list-inline'>
                        <li class='list-inline-item'><i class='fa fa-calendar-o' aria-hidden='true'></i> $jour_semaine</li>
                        <li class='list-inline-item'><i class='fa fa-clock-o' aria-hidden='true'></i> $heure_debut - $heure_fin</li>
                    </ul>
                    <h3 class='text-uppercase'><strong>Médecin : $nom_medecin $prenom_medecin</strong></h3>
                    <div>
                        <p>Patient : $nom_usager $prenom_usager</p>
                        <div class='boutons'>
                            <a href='modifier_rdv.php?usager=$id_usager&medecin=$id_medecin&date=$date_rdv&heure_debut=$heure_debut&heure_fin=$heure_fin'>
                                <img class='icone_modifier' src='img/icone_modifier.png' alt='icone modifier'/>".
                            "</a>
                            <a href='#' class='supprimerRdvBtn' data-usager='$id_usager' data-medecin='$id_medecin' data-date='$date_rdv' data-heure-debut='$heure_debut' data-heure-fin='$heure_fin'>
                                <img class='icone_supprimer' src='img/icone_supprimer.png' alt='icone supprimer'/>".
                            " </a>
                        </div>
                    </div>
                </div>
            </div>";
        }
    ?>
</div>
