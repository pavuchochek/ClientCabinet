<div class="box_usagers" id="list_usagers">              
    <?php
        
        if ($resultat == null) {
            echo "<div class='item_usager vide'>
                <div>
                    <h3>Aucun patient</h3>
                </div>
            </div>";
        } else {
            foreach ($resultat as $value){
                $prenom = $value->getPrenom();
                $nom = $value->getNom();
                $id = $value->getIdUsager();
                $num = $value->getNsecuriteSociale();
                if ($value->getCivilite() === 'M') {
                    $genderIcon = 'icone_homme_usager.png';
                } else if ($value->getCivilite() === 'F'){
                    $genderIcon = 'icone_femme_usager.png';
                } else {
                    $genderIcon = 'icone_autre.png';
                }
                echo "
                <a href='detail_usager.php?id=$id' class = 'lien_usager'>".
                    "<div class='item_usager'>
                        <img class='icone_liste_usager' src='img/$genderIcon' alt='icone d'un usager'/>
                        <div>
                            <div class='nom'><p>"
                                .$prenom . "<br>"
                                .$nom.
                            "</p></div>
                            <div class='boutonsusager'>
                                <a href='modifier_usager.php?id=$id'>
                                    <img class='icone_modifier' src='img/icone_modifier.png' alt='icone modifier'/>".
                                "</a>
                                <a href='#' class='supprimerusagerBtn' data-prenom='$prenom' data-nom='$nom' data-id='$id' data-idMedecin='$idmedecin'>
                                    <img class='icone_supprimer' src='img/icone_supprimer.png' alt='icone supprimer'/>".
                                " </a>
                            </div>
                        </div>
                    </div>
                </a>";
            }
        }
    ?>
</div>