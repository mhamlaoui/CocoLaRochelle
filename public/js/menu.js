const iconeMenu = document.getElementById("menu-icon");
const menuConnexion = document.getElementById("menu-connexion");
const listeNavigation = document.querySelector(".entete__liste");

// Fonction pour mettre à jour le menu en fonction de la taille de l'écran
function miseAJourMenu() {
  const petitEcran = window.innerWidth <= 1024;
  console.log(window.innerWidth)

  // Sélectionner les liens de la navigation
  const liensNavigation = [...listeNavigation.querySelectorAll(".entete__item")]; // Convertir NodeList en tableau
  const liensMenuConnexion = [...menuConnexion.querySelectorAll(".entete__item")]; // Liens dans le menu déroulant

  // Si l'écran est petit (moins de 960px), déplacer les liens dans le menu déroulant
  if (petitEcran) {
    liensNavigation.forEach((lien) => {
      if (!menuConnexion.contains(lien)) {
        console.log("Déplacement du lien dans le menu déroulant:", lien);
        menuConnexion.appendChild(lien);
      }
    });
  } else {
    // Si l'écran est grand (plus de 960px), réintégrer les liens dans la barre de navigation
    liensMenuConnexion.forEach((lien) => {
      if (!listeNavigation.contains(lien)) {
        console.log("Réintégration du lien dans la navigation:", lien);
        menuConnexion.removeChild(lien);
        listeNavigation.appendChild(lien);
      }
    });

    if (menuConnexion.classList.contains("active")) {
      console.log("Fermeture du menu");
      menuConnexion.classList.remove("active");
    }
  }
}

// Écouter les changements de taille de la fenêtre
window.addEventListener("resize", miseAJourMenu);

miseAJourMenu();

iconeMenu.addEventListener("click", function () {
  menuConnexion.classList.toggle("active");
});
