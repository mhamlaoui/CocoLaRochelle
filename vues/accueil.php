<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CocoLaRochelle</title>
    <link rel="icon" href="public/COCO.png" type="image/png"> 
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/accueil.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <script src="public/js/autocomplete.js" defer></script>
    <script src="public/js/menu.js" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?=$_ENV['GOOGLE_MAPS_API_KEY']?>&libraries=places" 
    async defer></script>
    <script src="https://kit.fontawesome.com/<?=$_ENV['FONTAWESOME_TOKEN']?>.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require 'header.php'; ?>

    <main class="principale">
    <h1 class="principale__tritre">La Rochelle à quelques pas</h1>
    <form class="formulaire-recherche" action="/recherche-trajets" method="POST">
      <label>
          <input type="text" id="depart" placeholder="Adresse de départ" name="depart" required>
      </label>
      <label>
          <input type="text" id="destination" name="arrivee" placeholder="Adresse d'arrivée" required>
      </label>

      <!-- Champ pour choisir une date -->
      <label for="date">
          <i class="fa-regular fa-calendar-days"></i>
          Date
          <input type="date" id="date">
      </label>

      <!-- Sélection du nombre de passagers -->
      <label for="passagers">
          <i class="fa-solid fa-user"></i>
          Passagers
          <select id="passagers">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
          </select>
      </label>

      <!-- Bouton pour soumettre le formulaire -->
      <button type="submit" class="bouton-recherche">
        <i class="fa-solid fa-magnifying-glass"></i>
        Rechercher
      </button>
    </form>
  </main>

  <!-- Section explicative sur les avantages de CoCoLaRochelle -->
  <aside>
    <section class="section-explications">
      <!-- Bloc explicatif : Pourquoi choisir CoCoLaRochelle -->
      <article class="explication">
        <h2 class="explication__titre">Pourquoi CocoLaRochelle ? <i class="fa-solid fa-leaf green-icon"></i></h2> 
        <ul class="explication__liste">
          <li class="explication__element"><strong class="explication__element--gras">Économique</strong> : Réduisez vos frais de transport.</li>
          <li class="explication__element"><strong class="explication__element--gras">Écologique</strong> : Diminuez votre empreinte carbone.</li>
          <li class="explication__element"><strong class="explication__element--gras">Local</strong> : Une application pensée pour La Rochelle.</li>
        </ul>
      </article>

      <!-- Bloc explicatif : Sécurité -->
      <article class="explication">
        <h2 class="explication__titre">Sécurité <i class="fa-regular fa-square-check cyan-icon"></i></h2>
        <ul class="explication__liste">
          <li class="explication__element"><strong class="explication__element--gras">Avis et évaluations</strong> : Notez et consultez les retours.</li>
          <li class="explication__element"><strong class="explication__element--gras">Messagerie intégrée</strong> : Communiquez directement.</li>
        </ul>
      </article>

      <!-- Bloc explicatif : Communauté -->
      <article class="explication">
        <h2 class="explication__titre">Communauté <i class="fa-solid fa-users"></i></h2>
        <ul class="explication__liste">
          <li class="explication__element"><strong class="explication__element--gras">Un réseau local</strong> : Rejoignez des habitants partageant leurs trajets.</li>
          <li class="explication__element"><strong class="explication__element--gras">Partage d’expériences</strong> : Échangez conseils et moments conviviaux.</li>
        </ul>
      </article>
    </section>
  </aside>

    <?php require 'footer.php'; ?>
</body>
</html>
