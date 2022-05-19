# La boutique françaisetest

Projet test symfony 6.0

Site e-commerce avec panel de connexion/user/admin/produit/categories/panier

### Il y a 2 étapes importantes:
- ⚠️ Etapes pour lancer le projet symfony ⚠️
- 📶 Etapes pour créer et/ou migrer la base de données 📶
---
## ⚠️ Etapes pour lancer le projet symfony ⚠️

Le projet pourra uniquement marcher après ces manipulations!

- Configurer le fichier .env pour notre mysql local, ajouter cette ligne :

```bash
  DATABASE_URL="mysql://root:@127.0.0.1:3306/laboutiquefrancaise?serverVersion=5.7&charset=utf8mb4"
```
---
- Ensuite faire un require du composer:
```bash
  composer require symfony/webpack-encore-bundle
```
---
- Installer node.js (si ce n'est pas fait).
---
- Installer npm dans la racine du projet:
```bash
  npm install
```
---
- Exécuter le npm de bootstrap:
```bash
  npm i bootstrap
```
---
- Aller dans le fichier webpack.config.js, commenter la ligne où se trouve : 
```bash
  .enableStimulusBridge('./assets/controllers.json')
```
---
- Faire:
```bash
  npm run dev
```
---
- Supprimer les fichiers :
```bash
  /assets/bootstrap.js
  /assets/controllers.json
  /assets/controllers
```
---
- Créer les dossier :
 ```bash
  - /assets/js/app.js
  - /assets/css/app.scss
```
---
- Dans le fichier 'app.scss' importer bootstrap:
```bash
  @import "~bootstrap/scss/bootstrap";
```
---
- Dans le fichier 'app.js' ajouter:
```bash
  import '../css/app.scss';
```
---
- Dans le fichier 'webpack.config.js' décommenter la ligne:
```bash
  .enableSassLoader()
```
---
- Exécuter : 
```bash
  npm install sass-loader@^12.0.0 sass --save-dev
```
- Puis:
```bash
  npm run dev
```
---
## 📶 Etapes pour créer et/ou migrer la base de données 📶
---
- Créer la base de données (si ce n'est pas fait):
```bash
  symfony console doctrine:database:create
```
---
- Préparer la migration:
```bash
  symfony console make:migration
```
---
- Faire la migration dans la base de données:
```bash
  symfony console doctrine:migrations:migrate
```
---
## Authors

- [@zozo404](https://github.com/zozo404)
