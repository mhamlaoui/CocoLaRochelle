const menuIcon = document.getElementById('menu-icon');
const menuConnexion = document.getElementById('menu-connexion');

// Fonction pour basculer l'affichage du menu
menuIcon.addEventListener('click', () => {
  menuConnexion.classList.toggle('active'); // Afficher ou cacher le menu
});