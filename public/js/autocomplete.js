// Fonction pour initialiser l'autocomplétion Google Places
function initAutocomplete() {
    // Sélection des champs de saisie pour l'autocomplétion
    const inputDepart = document.getElementById('depart');
    const inputDestination = document.getElementById('destination');
    
    // Appliquer l'autocomplétion Google Places aux champs de départ et destination
    if (inputDepart) {
        new google.maps.places.Autocomplete(inputDepart);
    }
    if (inputDestination) {
        new google.maps.places.Autocomplete(inputDestination);
    }
}

// Charger l'autocomplétion lors du chargement de la page
window.addEventListener('load', initAutocomplete);