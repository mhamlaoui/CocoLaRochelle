<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de recherche</title>

    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/afficher_trajet.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="public/js/autocomplete.js" defer></script>
    <script src="public/js/menu.js" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSbbhf3uE49J5vqiClmNzkVjmEe7bMous&libraries=places" 
    async defer></script>
    <script src="https://kit.fontawesome.com/3615041e3d.js" crossorigin="anonymous"></script>
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" defer></script>
</head>
<body>
<?php require 'header.php'; ?>
<main class="principale">
    <form class="formulaire-recherche" method="POST">
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

<h1>Résultats de recherche</h1>

<?php if (!empty($trajets)): ?>
    <?php foreach ($trajets as $trajet): ?>
        <section class="trajet-card">
            <header class="trajet-header">
                <i class="fas fa-car-side"></i><?=$trajet['date_trajet'] ?>. <?= $trajet['voiture'] ?> · <?= $trajet['nombre_passagers'] ?> places restantes
            </header>
            <article class="trajet-info">
                <time class="trajet-hour" datetime="<?=$trajet['heure_depart'] ?>"><?= $trajet['heure_depart']?></time>
                <address class="trajet-location"><?= $trajet['depart'] ?></address>
                <time class="trajet-hour" datetime="<?= $trajet['heure_arrivee'] ?>"><?= $trajet['heure_arrivee'] ?></time>
                <address class="trajet-location"><?= $trajet['destination'] ?></address>
            </article>
            <footer class="trajet-footer">
                <span class="conducteur">
                    <i class="fas fa-user"></i> Conducteur : <?= htmlspecialchars($trajet['nom_conducteur']) ?>
                </span>
                <span>
                    <button class="reserver-btn">Réserver</button>
                    <button class="tajet-btn">Voir le trajet</button>
                </span>
            </footer>
        </section>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun trajet trouvé pour ces critères.</p>
<?php endif; ?>

<?php require 'footer.php'; ?>
</body>
</html>