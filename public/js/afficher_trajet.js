
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
function scrollToMap() {
    const mapSection = document.getElementById('map');
    if (mapSection) {
        mapSection.scrollIntoView({ behavior: 'smooth' });
    }
}
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
document.querySelectorAll('.tajet-btn').forEach(function (button) {
    button.addEventListener('click', function () {
    var trajetId = this.getAttribute('data-id-trajet');

    console.log("ID du trajet:", trajetId);
    // Récupérer les adresses pour ce trajet spécifique
    var adresseDepart = document.querySelector(`[data-id-trajet="${trajetId}"][data-type="start"]`).textContent;
    var adresseArrivee = document.querySelector(`[data-id-trajet="${trajetId}"][data-type="end"]`).textContent;

    console.log(adresseArrivee)
    console.log(adresseDepart)
    
    // Vérifier si l'adresse commence par un chiffre
    if (isNaN(adresseDepart[0])) {
        adresseDepart = adresseDepart.split(',')[0]; 
    } 
    if (isNaN(adresseArrivee[0])) {
        adresseArrivee = adresseArrivee.split(',')[0];
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
    scrollToMap();
    });
});
 