function initAutocomplete() {
    // Sélection des champs de saisie pour l'autocomplétion
    const inputDepart = document.getElementById('depart');
    const inputDestination = document.getElementById('destination');

    // Coordonnées approximatives de La Rochelle
    const laRochelleBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng({lat: 46.130, lng:-1.244}),  // Sud-Ouest de La Rochelle
        new google.maps.LatLng({lat:46.200, lng:-1.080})   // Nord-Est de La Rochelle
    );

    // Options pour restreindre les résultats à La Rochelle
    const options = { 
        bounds: laRochelleBounds,  // Biais géographique sur La Rochelle
        strictBounds: true,       // Force les résultats à être dans ces limites
    };

    // Appliquer l'autocomplétion Google Places aux champs de départ et destination
    if (inputDepart) {
        const autocompleteDepart = new google.maps.places.Autocomplete(inputDepart, options);
    };

    if (inputDestination) {
        const autocompleteDestination = new google.maps.places.Autocomplete(inputDestination, options);
    };
}


// Charger l'autocomplétion lors du chargement de la page
window.addEventListener('load', initAutocomplete);