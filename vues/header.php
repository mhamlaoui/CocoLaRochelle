<header class="entete">
    <!-- Section gauche : Logo et titre -->
    <a href="/" class="entete__lien-titre">
      <img src="../public/CoCo.png" alt="Logo CoCo" class="entete__logo">
      <h1 class="entete__titre">CocoLaRochelle</h1>
    </a>
  
    <!-- Section centre : Navigation -->
    <nav class="entete__navigation">
      <ul class="entete__liste">
        <li class="entete__item">
          <a href="/publier-trajet" class="entete__lien">Publier un trajet</a>
        </li>
        <li class="entete__item">
          <a href="/vos-trajets" class="entete__lien">Vos trajets</a>
        </li>
      </ul>
    </nav>
  
    <!-- Icône de menu (Font Awesome) -->
    <a class="menu-icon" id="menu-icon">
      <i class="fas fa-bars"></i> 
    </a>
  
    <!-- Menu déroulant -->
    <ul class="menu-connexion" id="menu-connexion">
      <?php if (isset($_SESSION['id_utilisateur'])): ?>
        <li><a href="/compte">Compte</a></li>
      <?php else: ?>
        <li><a href="/connexion">Se connecter</a></li>
        <li><a href="/inscription">Inscription</a></li>
      <?php endif; ?>
    </ul>
  </header>
