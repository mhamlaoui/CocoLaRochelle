// Initialiser la carte et la centrer sur La Rochelle
var map = L.map('map').setView([46.1603, -1.1511], 13);  // Centrée sur La Rochelle

// Ajouter les tuiles OpenStreetMap France
L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    maxZoom: 18
}).addTo(map);

// Références pour les marqueurs et la ligne tracée
var markers = [];
var line = null;

// Fonction pour ajouter un marqueur avec un nom
function ajouterPoint(latitude, longitude, nomPoint) {
    var marker = L.marker([latitude, longitude]).addTo(map).bindPopup(nomPoint).openPopup();
    markers.push(marker); // Ajouter le marqueur à la liste
    return marker;
}

// Fonction pour tracer une ligne entre deux points
function tracerLigne(point1, point2) {
    if (line) {
        map.removeLayer(line); // Supprimer l'ancienne ligne
    }
    line = L.polyline([point1, point2], { color: 'blue' }).addTo(map);
}

// Réinitialiser les marqueurs et le tracé
function reinitialiserCarte() {
    // Supprimer tous les marqueurs
    markers.forEach(marker => {
        map.removeLayer(marker);
    });
    markers = []; // Réinitialiser la liste des marqueurs

    // Supprimer la ligne tracée
    if (line) {
        map.removeLayer(line);
        line = null;
    }
}

// Rechercher les deux adresses avec Nominatim API
document.getElementById('search-button').addEventListener('click', function () {
    var adresseDepart = document.getElementById('start-input').value;
    var adresseArrivee = document.getElementById('end-input').value;

    if (!adresseDepart || !adresseArrivee) {
        alert("Veuillez entrer les adresses de départ et d'arrivée.");
        return;
    }

    // Réinitialiser les éléments sur la carte
    reinitialiserCarte();

    // Fonction pour effectuer une requête Nominatim
    function chercherAdresse(adresse) {
        var url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(adresse)}`;
        return fetch(url).then(response => response.json());
    }

    // Géocoder les deux adresses
    Promise.all([chercherAdresse(adresseDepart), chercherAdresse(adresseArrivee)])
        .then(results => {
            // Vérifier si les deux adresses ont été trouvées
            var pointDepart = results[0][0];
            var pointArrivee = results[1][0];

            if (!pointDepart || !pointArrivee) {
                alert("Impossible de trouver une ou les deux adresses !");
                return;
            }

            // Récupérer les coordonnées
            var latDepart = parseFloat(pointDepart.lat);
            var lonDepart = parseFloat(pointDepart.lon);
            var latArrivee = parseFloat(pointArrivee.lat);
            var lonArrivee = parseFloat(pointArrivee.lon);

            // Ajouter les marqueurs sur la carte avec les noms "Point de départ" et "Point d'arrivée"
            ajouterPoint(latDepart, lonDepart, "Point de départ");
            ajouterPoint(latArrivee, lonArrivee, "Point d'arrivée");

            // Tracer une ligne entre les deux points
            tracerLigne([latDepart, lonDepart], [latArrivee, lonArrivee]);

            // Centrer la carte sur les deux points
            map.fitBounds([[latDepart, lonDepart], [latArrivee, lonArrivee]]);
        })
        .catch(error => {
            console.error("Erreur lors de la recherche des adresses :", error);
        });
});
 