<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Médecin - Cabinet Médical</title>
        <link rel="stylesheet" href="css/CSSdetail_medecin.css">
        <link rel="stylesheet" href="css/CSSheader.css">
        <link rel="stylesheet" href="css/CSSfooter.css">
        <link rel="icon" href="img/logo.png">
    </head>

    <?php include '../includes/header.php'; ?>

    <body>
        <h1 class="titre">Médecin :
            <?php
            require('/app/src/controleur/medecin.controleur.php');
            $controleur = new Medecin_controleur();
            $idmedecin = $_GET['id'];
            $prenom = $controleur->getMedecinById($idmedecin)->getPrenom();
            $nom = $controleur->getMedecinById($idmedecin)->getNom();
            echo $prenom . " " . $nom; ?>
        </h1>
        <div class="body">
            <?php include '../nouvelles_pages/Liste_rdv_medecin.php'; ?>
            <div class="partie_usagers">
                <div class = "titre2">
                    <h1>Liste des patients</h1>
                    <form method="post" action="traitements/traitement_assigner_usager.php" id="form_usager">
                        <input type="hidden" name="medecinReferent" value="<?php echo $idmedecin; ?>">
                        <select name="idUsager" id="combo_box">
                            <?php
                            $resultat = $controleur->getListeUsagersMedecin($idmedecin);
                            $usagers = $controleur->listeUsagersNonReferents($idmedecin);
                            if ($usagers == null) {
                                echo "<option value=''>Aucun patient</option>";
                            } else {
                                foreach ($usagers as $value) {
                                    $prenom = $value->getPrenom();
                                    $nom = $value->getNom();
                                    $id = $value->getIdUsager();
                                    $num = $value->getNsecuriteSociale();
                                    echo "<option value='$id'>$prenom $nom ($num)</option>";
                                }
                            }
                            ?>
                        </select>
                        <div class="bouton_assigner">
                            <input type="submit" value="Assigner un usager" class="boutons_ajout boutons_ajout_usager" id="assignerUsager">
                        </div>
                    </form>

                    <div class="boutons_ajout boutons_ajout_usager" onclick="afficherComboBox()">
                        <input type="button" id="afficherFormulaireUsager">
                    </div>

                </div>

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
            </div>
            <div class="popup" id="popupusager">
                <p id="popupusagerNom"> </p>
                <div class="boutons_Popup">
                    <input type="button" value="Annuler" id="Bouton_popup_annuler">
                    <a href='#' id = 'suppr'>
                        <input type='button' value='Supprimer'>
                    </a>
                    <a href='#' id = 'enleveMed'>
                        <input type='button' value='Enlever médecin'>
                    </a>
                </div>
            </div>
            <div class="popup" id="popupRdv">
                <p id="popupRdvNom"> </p>
                <div class="boutons_Popup">
                    <input type="button" value="Annuler" id="Bouton_popup_annuler_rdv">
                    <a href='#'>
                        <input type='button' value='Oui'>
                    </a>
                </div>
            </div>
        </div>
    </body>
    
    <?php include '../includes/footer.php'; ?>

    <script>
        var form_usager = document.getElementById('form_usager');
        form_usager.style.display = 'none';
        document.getElementById('afficherFormulaireUsager').value = 'Assigner un usager';
        function afficherComboBox() {
            var form_usager = document.getElementById('form_usager');
            if (form_usager.style.display === 'none') {
                form_usager.style.display = 'block';
                document.getElementById('afficherFormulaireUsager').value = 'Cacher la sélection';
            } else {
                form_usager.style.display = 'none';
                document.getElementById('afficherFormulaireUsager').value = 'Assigner un usager';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var popupUsager = document.getElementById('popupusager');
            popupUsager.style.display = 'none';

            var supprimerBtns = document.getElementsByClassName('supprimerusagerBtn');

            for (var i = 0; i < supprimerBtns.length; i++) {
                supprimerBtns[i].addEventListener('click', function(event) {
                    event.preventDefault();
                    var prenom = this.getAttribute('data-prenom');
                    var nom = this.getAttribute('data-nom');

                    var nomprenom = document.getElementById('popupusagerNom');
                    nomprenom.innerHTML = "Voulez-vous supprimer le patient " + prenom + ' ' + nom + " <br>ou lui enlever le médecin référent?";
                    popupUsager.style.display = 'block';
                    document.getElementById('Bouton_popup_annuler').setAttribute('data-prenom', prenom);
                    document.getElementById('Bouton_popup_annuler').setAttribute('data-nom', nom);
                    document.querySelector('#popupusager .boutons_Popup a#suppr').setAttribute('href', 'traitements/traitement_supprimer_usager.php?id='+this.getAttribute('data-id'));
                    document.querySelector('#popupusager .boutons_Popup a#enleveMed').setAttribute('href', 'traitements/traitement_enlever_medecin_usager.php?id='+this.getAttribute('data-id')+'&idMedecin='+this.getAttribute('data-idMedecin'));
                });
            }

            document.getElementById('Bouton_popup_annuler').addEventListener('click', function() {
                popupUsager.style.display = 'none';
                var prenom = this.getAttribute('data-prenom');
                var nom = this.getAttribute('data-nom');
            });
            
        });
        document.addEventListener('DOMContentLoaded', function() {
            var formulaireVisible = false;
            var popupRdv = document.getElementById('popupRdv');
            popupRdv.style.display = 'none';

            var supprimerBtns = document.getElementsByClassName('supprimerRdvBtn');
            for (var i = 0; i < supprimerBtns.length; i++) {
                supprimerBtns[i].addEventListener('click', function(event) {
                    event.preventDefault();
                    var idUsager = this.getAttribute('data-usager');
                    var idMedecin = this.getAttribute('data-medecin');
                    var date = this.getAttribute('data-date');
                    var heureDebut = this.getAttribute('data-heure-debut');
                    var heureFin = this.getAttribute('data-heure-fin');

                    var nomprenom = document.getElementById('popupRdvNom');
                    nomprenom.innerHTML = "Voulez-vous supprimer le rendez-vous du " + date + ' de ' + heureDebut + ' à ' + heureFin + " ?";
                    popupRdv.style.display = 'block';
                    document.querySelector('#popupRdv .boutons_Popup a').setAttribute('href', 'traitements/traitement_supprimer_rdv.php?idusager='+this.getAttribute('data-usager')+'&idmedecin='+this.getAttribute('data-medecin')+'&date='+this.getAttribute('data-date')+'&heureDebut='+this.getAttribute('data-heure-debut')+'&heureFin='+this.getAttribute('data-heure-fin'));
                });
            }
            document.getElementById('Bouton_popup_annuler_rdv').addEventListener('click', function() {
                popupRdv.style.display = 'none';
            });
        });
    </script>
</html>