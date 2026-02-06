#!/bin/bash

echo "=========================================="
echo "🚀 DÉMARRAGE EASYORDER"
echo "=========================================="
echo ""

echo "📊 Informations :"
echo "  - PORT: ${PORT}"
echo "  - APP_ENV: ${APP_ENV}"
echo ""

# Attendre MySQL
echo "⏳ Attente de MySQL (20 secondes)..."
sleep 20

# Migrations
echo "📊 Migrations..."
php artisan migrate --force --no-interaction

# Nettoyage et cache
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link --force

echo ""
echo "✅ Serveur Laravel sur 0.0.0.0:${PORT}"
echo ""

# Démarrer avec php artisan serve
exec php artisan serve --host=0.0.0.0 --port=${PORT} --no-reload