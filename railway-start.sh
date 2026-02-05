#!/bin/bash

echo "🚀 Démarrage de l'application Laravel sur Railway..."

# Attendre que MySQL soit prêt
echo "⏳ Attente de la base de données MySQL..."
sleep 5

# Migrations
echo "📊 Exécution des migrations..."
php artisan migrate --force --no-interaction || echo "⚠️ Migrations échouées ou déjà exécutées"

# Optimisations
echo "⚡ Génération du cache..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Lien de stockage
echo "🔗 Création du lien de stockage..."
php artisan storage:link --force || echo "⚠️ Lien de stockage déjà créé"

# Démarrer le serveur
echo "✅ Démarrage du serveur sur le port ${PORT:-8000}..."
php artisan serve --host=0.0.0.0 --port=${PORT:-8000}