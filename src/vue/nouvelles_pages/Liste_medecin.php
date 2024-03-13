<div class="box_medecin" id="list_medecin">
    <div>
        <form action="" method="GET" class="recherche">
            <input type="text" name="search" autocomplete="off" placeholder="Rechercher un médecin">
            <input type="submit" value="Rechercher">
        </form>
    </div>
    
    <?php
        require('/app/src/controleur/medecin.controleur.php');
        $controleur = new Medecin_controleur();
        $resultat = $controleur->liste_medecins();
        if (isset($_GET['search'])) {
            $recherche = strtolower($_GET['search']);
            $recherche = trim($recherche);
            $resultat = $controleur->rechercherMedecins($recherche);
        }
        foreach ($resultat as $value){
            $prenom = $value->getPrenom();
            $nom = $value->getNom();
            $idMedecin = $value->getIdMedecin();
            $civilite= $value->getCivilite();
            $class = '';
            if ($value->getCivilite() === 'M') {
                $genderIcon = 'icone_homme.png';
            } else if ($value->getCivilite() === 'F'){
                $genderIcon = 'icone_femme.png';
            } else {
                $genderIcon = 'icone_menu_usager.png';
                $class = 'autre';
            }
            echo "
            <a href='detail_medecin.php?id=$idMedecin' class = 'lien_medecin'>
                <div class='item_medecin'>
                    <img class='icone_liste_medecin $class' src='img/$genderIcon' alt='icone d'un medecin'/>
                    <div>
                        <div class='nom'>"
                            .$prenom.
                            "<br>"
                            .$nom.
                        "</div>
                        <div class='boutons'>
                            <a href='modifier_medecin.php?prenom=$prenom&nom=$nom&id=$idMedecin&civilite=$civilite'>
                                <img class='icone_modifier' src='img/icone_modifier.png' alt='icone modifier'/>
                            </a>
                            <a href='#' class='supprimerMedecinBtn' data-prenom='$prenom' data-nom='$nom' data-id='$idMedecin'>
                                <img class='icone_supprimer' src='img/icone_supprimer.png' alt='icone supprimer'/>
                            </a>
                        </div>
                    </div>
                </div>
            </a>";
        }
    ?>
</div>