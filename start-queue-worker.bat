@echo off
echo ========================================
echo   Demarrage du Worker de Queues Laravel
echo ========================================
echo.
echo Ce worker traite les jobs en arriere-plan,
echo notamment les emails de rappel pour les messages non lus.
echo.
echo Appuyez sur Ctrl+C pour arreter le worker.
echo.
echo ========================================
echo.

php artisan queue:work --verbose
