# CocoLaRochelle

**CocoLaRochelle** est une plateforme de covoiturage locale conçue spécifiquement pour les habitants de La Rochelle. Le projet vise à offrir une solution économique, écologique et communautaire pour les déplacements urbains et régionaux.

---

## Fonctionnalités principales

- **Recherche de trajets** : Trouvez rapidement des trajets en covoiturage en fonction de votre point de départ, de votre destination et de la date.
- **Publication de trajets** : Proposez vos trajets pour aider les autres et réduire vos coûts de déplacement.
- **Profil utilisateur** : Gérez vos informations, modifiez votre mot de passe et consultez vos trajets publiés.
- **Sécurité renforcée** :
  - Avis et évaluations pour assurer la confiance entre utilisateurs.
  - Messagerie intégrée pour faciliter la communication.
- **Communauté locale** : Connectez-vous avec les habitants de La Rochelle partageant les mêmes trajets.

---

## Installation et configuration

### Prérequis

- **PHP** >= 7.4.
- **Composer** (gestionnaire de dépendances PHP).
- Serveur web.
- Une base de données PostgreSQL.

### Étapes d'installation

1. **Cloner le projet** :

   ```
   git clone https://gitlab.com/covoituragelarochelle.git
   cd covoituragelarochelle
   ```

2. **Installer les dépendances** :

   ```
   composer install
   ```

3. **Configurer les variables d'environnement** :

   - Dupliquez le fichier `.env.example` et renommez-le `.env`.
   - Renseignez les valeurs de configuration, par exemple :
     ```
     DB_CONNECTION=pgsql
     DB_HOST=localhost
     DB_NAME=covoiturage
     DB_USER=root
     DB_PASSWORD=your_password
     GOOGLE_MAPS_API_KEY=your_api_key
     FONTAWESOME_TOKEN=your_fontawesome_token
     ```

4. **Initialiser la base de données** :

   - Importez le fichier `config/database.sql` dans votre base de données MySQL pour créer les tables nécessaires.

5. **Lancer le projet en local** (serveur PHP intégré) :

   ```
   php -S localhost:8000 -t public
   ```

6. **Accéder au projet** :

   - Ouvrez votre navigateur et rendez-vous sur [http://localhost:8000](http://localhost:8000).

---

## Dépendances

Voici les bibliothèques utilisées dans ce projet :

- [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv) : Gestion des variables d'environnement.
- [steampixel/simple-php-router](https://github.com/steampixel/simplePHPRouter) : Routeur léger et flexible.
- [Leaflet.js](https://leafletjs.com/) : Affichage de cartes interactives.
- [FontAwesome](https://fontawesome.com/) : Icônes pour améliorer l'interface utilisateur. (nécessite un token spécifique).
- [Google Places API](https://developers.google.com/maps/documentation/places/web-service/overview) : Autocomplétion des adresses pour les formulaires.

---

## Architecture du projet

### Structure des dossiers

- **`controleurs/`** : Contient les fichiers des contrôleurs pour gérer les requêtes et la logique applicative.
- **`modèles/`** : Contient les fichiers des modèles pour interagir avec la base de données.
- **`vues/`** : Contient les fichiers HTML et PHP pour les interfaces utilisateur.
- **`public/`** : Contient les fichiers accessibles publiquement, comme les CSS, JS et les images.
- **`config/`** : Contient les fichiers de configuration de l'application.
- **`routes/`** : Contient le fichiers de définition des routes pour l'application.

### Chargement automatique PSR-4

Le projet utilise **PSR-4** pour le chargement automatique des classes, configuré dans `composer.json`. Cette approche permet une organisation claire des fichiers et une inclusion automatique en fonction des namespaces

---

## Technologies utilisées

### Frontend

- **HTML5** et **CSS3** : Utilisés pour la structure et le style des pages web.
- **Responsive design** : Mise en page adaptative via le fichier `responsive.css`.
- **Leaflet.js** : Gestion des cartes interactives pour afficher les trajets.
- **FontAwesome** : Utilisé pour inclure des icônes modernes et intuitives.
- **Google Places API** : Fournit l'autocomplétion des adresses dans les formulaires.

### Backend

- **PHP** 7.4+.
- Routage via **Simple PHP Router**.
- Gestion des sessions pour l'authentification.

### Base de données

- **PostgreSQL** : Modèle relationnel pour gérer les utilisateurs, trajets, etc.

---

## Fonctionnement du routeur

Le projet utilise [Simple PHP Router](https://github.com/steampixel/simplePHPRouter) pour définir les routes. Voici quelques exemples :

- `/` : Page d'accueil.
- `/recherche-trajets` : Recherche de trajets (formulaire en POST).
- `/publier-trajet` : Publication d'un trajet.
- `/compte` : Gestion du compte utilisateur.

---

## Licence

Ce projet est sous licence **MIT**. Vous êtes libre de l'utiliser, le modifier et le distribuer.

---

## Contact

Pour toute question ou suggestion, veuillez contacter :

**Pirate Roberts**  
Email : [pirate.roberts@example.com](mailto:pirate.roberts@example.com)

