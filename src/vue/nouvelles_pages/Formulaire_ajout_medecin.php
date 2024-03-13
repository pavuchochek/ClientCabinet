<div id="formulaire" class="formulaire">
    <form id="medecinForm" method="post" action="traitements/traitement_ajout_medecin.php" onsubmit="return Valide()">
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" autocomplete="off">

        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" autocomplete="off">

        <label for="civilite">Civilité:</label>
        <select id="civilite" name="civilite">
            <option value="M">Monsieur</option>
            <option value="F">Madame</option>
            <option value="A">Autre</option>
        </select>

        <input type="submit" id="bouton_valider" value="Ajouter">
    </form>
</div>
Tkt ça marche faut juste enlever le display:none dans le css