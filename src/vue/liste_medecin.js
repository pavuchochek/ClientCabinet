// L'URL de base de l'API
const baseUrl = 'http://localhost:80/v1/medecins.php';
const resource = ''
const token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dpbiI6InNlY3JldGFpcmUxIiwiZXhwIjoxNzEwNDA1NDI2fQ.y0rOnKGTUS6DBZHWZM1q7z-0bsLzXFkbxPylm-ZUzrQ';

// Méthode pour effectuer un appel API GET pour récupérer toutes les phrases
function getAllPhrases() {
    fetch(`${baseUrl}${resource}`, {
        headers: {Authorization: `Bearer ${token}`}
      })
    .then(data => {
        console.log(data);
    })
    // Affichage d'un message dans une boîte de dialogue pour l'exemple
    
}

document.getElementById('getAllPhrases').addEventListener('click', getAllPhrases);