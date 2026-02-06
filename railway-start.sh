#!/bin/bash

echo "=========================================="
echo "🚀 DÉMARRAGE EASYORDER SUR RAILWAY"
echo "=========================================="
echo ""

# Afficher les informations de debug
echo "📊 Informations système :"
echo "  - PORT: ${PORT}"
echo "  - APP_ENV: ${APP_ENV}"
echo "  - DB_CONNECTION: ${DB_CONNECTION}"
echo ""

# Attendre que MySQL soit prêt
echo "⏳ Attente de la base de données MySQL (15 secondes)..."
sleep 15

# Test de connexion à la DB
echo "🔍 Test de connexion à la base de données..."
php artisan db:show 2>&1 || echo "⚠️ Connexion DB échouée (normal au premier lancement)"
echo ""

# Exécuter les migrations
echo "📊 Exécution des migrations de base de données..."
php artisan migrate --force --no-interaction
echo ""

# Nettoyage du cache
echo "🧹 Nettoyage du cache existant..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
echo ""

# Optimisations
echo "⚡ Génération des caches d'optimisation..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
echo ""

# Lien de stockage
echo "🔗 Création du lien de stockage symbolique..."
php artisan storage:link --force || echo "⚠️ Lien déjà existant"
echo ""

# Démarrage du serveur
echo "=========================================="
echo "✅ DÉMARRAGE DU SERVEUR LARAVEL"
echo "=========================================="
echo "  - Hôte: 0.0.0.0"
echo "  - Port: ${PORT}"
echo "  - URL: https://easyorder-p.up.railway.app"
echo ""

# Démarrer le serveur (exec remplace le processus shell)
exec php artisan serve --host=0.0.0.0 --port=${PORT} --no-reload