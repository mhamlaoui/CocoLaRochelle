<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Trajets - CocoLaRochelle</title>
    <link rel="icon" href="public/COCO.png" type="image/png"> 
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/afficher_trajet.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <script src="public/js/menu.js" defer></script>
    <script src="https://kit.fontawesome.com/<?=$_ENV['FONTAWESOME_TOKEN']?>.js" crossorigin="anonymous"></script>
    <script src="public/js/afficher_trajet.js" defer></script>
</head>
<body>
    <?php include 'header.php'; ?>
<main>
    <?= isset($message) ? "<p class='notification__message'>$message</p>" : '' ?>
    <h2 class="titre">Mes trajets publiés</h2>
<?php if (!empty($trajetsPublier)): ?>
    <?php foreach ($trajetsPublier as $trajet): ?>
        <section class="trajet-card">
            <header class="trajet-header">
                <i class="fas fa-car-side"></i><?= date('d/m/Y', strtotime($trajet['date_trajet'])) ?>. <?= $trajet['voiture'] ?> · <?= $trajet['nombre_passagers'] ?> places restantes
            </header>
            <article class="trajet-info">
                <time class="trajet-hour" datetime="<?= $trajet['heure_depart'] ?>"><?= date("H:i", strtotime($trajet['heure_depart'])) ?></time>
                <address class="trajet-location" data-id-trajet="<?= $trajet['id_trajet'] ?>" data-type="start"><?= $trajet['depart'] ?></address>
                <address class="trajet-location" data-id-trajet="<?= $trajet['id_trajet'] ?>" data-type="end"><?= $trajet['destination'] ?></address>
            </article>
            <footer class="trajet-footer">
                <span class="conducteur">
                    <i class="fas fa-user"></i> Conducteur : <?= $trajet['nom_conducteur']?>
                </span>
                <span>
                    <button class="tajet-btn" data-id-trajet="<?= $trajet['id_trajet'] ?>">Voir le trajet</button>
                </span>
            </footer>
        </section>
    <?php endforeach; ?>
<?php else: ?>
    <p class="trajetNULL">Aucun trajet publié.</p>
<?php endif; ?>

<h2 class="titre">Mes trajets réservés</h2>
<?php if (!empty($trajetsReserver)): ?>
    <?php foreach ($trajetsReserver as $trajet): ?>
        <section class="trajet-card">
            <header class="trajet-header">
                <i class="fas fa-car-side"></i><?= date('d/m/Y', strtotime($trajet['date_trajet'])) ?>. <?= $trajet['voiture'] ?> · <?= $trajet['nombre_passagers'] ?> places restantes
            </header>
            <article class="trajet-info">
                <time class="trajet-hour" datetime="<?= $trajet['heure_depart'] ?>"><?= date("H:i", strtotime($trajet['heure_depart'])) ?></time>
                <address class="trajet-location" data-id-trajet="<?= $trajet['id_trajet'] ?>" data-type="start"><?= $trajet['depart'] ?></address>
                <address class="trajet-location" data-id-trajet="<?= $trajet['id_trajet'] ?>" data-type="end"><?= $trajet['destination'] ?></address>
            </article>
            <footer class="trajet-footer">
                <span class="conducteur">
                    <i class="fas fa-user"></i> Conducteur : <?= $trajet['nom_conducteur']?>
                </span>
                <span>
                    <a href="vos-trajets?action=annuler_reservation&id_trajet=<?= $trajet['id_trajet'] ?>" class="annuler-btn">Annuler la réservation</a>
                    <button class="tajet-btn" data-id-trajet="<?= $trajet['id_trajet'] ?>">Voir le trajet</button>
                </span>
            </footer>
        </section>
    <?php endforeach; ?>
    <?php else: ?>
    <p class="trajetNULL">Aucun trajet réservé.</p>
    <?php endif; ?>
    </main>
    <section id="map" style="width: 100%; height: 400px;"></section>

    <?php include 'footer.php'; ?>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</body>
</html>
