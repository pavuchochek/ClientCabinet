

const baseUrl = 'http://localhost:81/test.php';

const resource = '' 
const token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dpbiI6InNlY3JldGFpcmUxIiwiZXhwIjoxNzEwNDEwMjU4fQ.9i4OGSGS_0EI8YEPLgcaEuCJJKMvG8sfebfP0yXouD4';

// Méthode pour effectuer un appel API GET pour récupérer toutes les phrases
function getAllPhrases() {

    fetch(`${baseUrl}${resource}`)
    .then(data => {
        console.log(data);
    })
    // Affichage d'un message dans une boîte de dialogue pour l'exemple
    
}

document.getElementById('getAllPhrases').addEventListener('click', getAllPhrases);