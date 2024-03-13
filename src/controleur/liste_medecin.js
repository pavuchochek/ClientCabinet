// L'URL de base de l'API
const baseUrl = 'localhost/v1/medecins.php';
const resource = ''

// Méthode pour effectuer un appel API GET pour récupérer toutes les phrases
function getAllPhrases() {
    fetch(`${baseUrl}${resource}`)
    .then(response => response.json()) // Convertir la réponse en JSON
    .then(data => {
        console.log(data);
        displayInfoResponse(document.getElementById('infoGetAllPhrases'),data);
        displayData(data.data);; //Afficher en console les données récupérées
    })
    // Affichage d'un message dans une boîte de dialogue pour l'exemple
    alert('J\'affiche les informations de la réponse HTTP dans la zone en dessous du bouton \n et toutes les phrases dans la zone en bas de page');
}