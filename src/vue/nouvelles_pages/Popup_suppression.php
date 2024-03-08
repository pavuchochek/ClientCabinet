<?php
    //à définir :
    // $page = page où se trouve le popup (medecin ou usager ou rdv)
    // $id = id de l'usager ou du médecin
    // $text = texte à afficher dans le popup
    // $lien = lien vers le traitement de suppression

echo '
    <div class="popup" id="popup_suppression_'.$page.'">
        <p id="titre2">'.$text.'</p>
        <div class="boutons_Popup">
            <input type="button" value="Annuler" id="Bouton_popup_annuler">
            <a href="'.$lien.'">
                <input type="button" value="Oui">
            </a>
        </div>
    </div>'
    ;

?>