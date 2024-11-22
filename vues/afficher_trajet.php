<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de recherche</title>

    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/responsive.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <h1>Résultats de recherche</h1>
    <?php if (!empty($trajets)): ?>
        <ul>
            <?php foreach ($trajets as $trajet): ?>
                <li>
                    <strong>Départ :</strong> <?= htmlspecialchars($trajet['depart']) ?><br>
                    <strong>Arrivée :</strong> <?= htmlspecialchars($trajet['destination']) ?><br>
                    <strong>Date :</strong> <?= htmlspecialchars($trajet['date_trajet']) ?><br>
                    <strong>Passagers :</strong> <?= htmlspecialchars($trajet['nombre_passagers']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun trajet trouvé pour ces critères.</p>
    <?php endif; ?>
    <?php include 'footer.php'; ?>
</body>
</html>