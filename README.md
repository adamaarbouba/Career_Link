# 🚀 CareerLink - Plateforme de Recrutement

## 📋 Description
**CareerLink** est une plateforme de mise en relation entre candidats et recruteurs. Basée sur le noyau *SecureCore*, cette application étend l'architecture MVC pour inclure le **Repository Pattern**, garantissant une séparation stricte entre la logique métier et l'accès aux données.

---

## 🎯 Objectifs Pédagogiques
- **Architecture MVC :** Séparation claire (Modèle - Vue - Contrôleur).
- **Repository Pattern :** Isolation des requêtes SQL (PDO) hors des contrôleurs.
- **Sécurité :** Protection XSS, Injection SQL, et hachage des mots de passe.
- **Fonctionnalités Avancées :** AJAX, Upload de fichiers, et Soft Deletes.

---

## 👥 Rôles & Permissions

| Rôle | Permissions |
|------|-------------|
| 👤 **Candidat** | Recherche d'offres (AJAX), Candidature, Upload de CV, Espace personnel |
| 💼 **Recruteur** | Création d'offres, Gestion des candidatures reçues, Dashboard entreprise |
| 🛡️ **Admin** | Gestion des catégories/tags, Archivage des offres (Soft Delete), Statistiques |

> 🔒 **Note :** Chaque rôle possède ses propres routes et un accès cloisonné via Middleware.

---

## ⚙️ Fonctionnalités Clés

### 🏗️ Core (Hérité de SecureCore)
- **Authentification :** Login, Register, Logout sécurisé.
- **Sécurité :** Hashage (password_hash), Validation CSRF basique.
- **Routing :** Système de routes dynamiques avec protection par rôle.

### 💼 Module Offres (Nouveau)
- **Gestion des Jobs :** CRUD complet pour les recruteurs.
- **Catégories & Tags :** Association Many-to-Many.
- **Soft Delete :** Les admins peuvent archiver une offre sans la supprimer de la BDD.

### ⚡ Expérience Utilisateur
- **Recherche AJAX :** Filtrage instantané des offres sans rechargement.
- **Upload CV :** Gestion sécurisée des fichiers PDF via `UploadService`.

---

## 🏗️ Architecture du Projet

Le projet suit une structure MVC stricte enrichie par des **Repositories** et des **Services**.

```text
careerlink/
├── src/
│   ├── Config/                # Connexion BDD (Singleton)
│   ├── Controllers/           # Logique de contrôle (Orchestration)
│   ├── Middleware/            # Vérification des rôles (Auth)
│   ├── Models/                # Entités (Objets simples, sans SQL)
│   ├── Repositories/          # 📍 Logique d'accès aux données (SQL ici)
│   ├── Services/              # Logique métier complexe (Upload, Hash, Session)
│   ├── Router/                # Gestion des URL
│   └── Views/                 # Templates HTML
│   |    ├── admin/
│   |    ├── recruiter/        # (Anciennement company)
│   |    ├── candidate/
│   |    └── layout/
|   ├── public/
│       ├── assets/            # CSS, JS, Images
│       └── uploads/           # CV Uploads
├── composer.json              # Autoloading
└── README.md