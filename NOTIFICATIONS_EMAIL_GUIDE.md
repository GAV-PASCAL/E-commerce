# Configuration du Système de Notifications par Email

## Vue d'ensemble

Le système envoie automatiquement un email de rappel si un message reste non lu pendant **5 minutes**.

## Comment ça fonctionne

1. **Quand un message est envoyé** :
   - Une notification instantanée est envoyée (broadcast + database)
   - Un job est programmé pour s'exécuter dans 5 minutes

2. **Après 5 minutes** :
   - Le job vérifie si le message est toujours non lu
   - Si OUI → Un email est envoyé au destinataire
   - Si NON (déjà lu) → Aucun email n'est envoyé

## Démarrage du Worker de Queues

Pour que les emails de rappel fonctionnent, vous devez démarrer le worker de queues Laravel.

### En développement

Ouvrez un nouveau terminal et exécutez :

```bash
php artisan queue:work
```

**Important** : Laissez ce terminal ouvert pendant que vous développez. Le worker traite les jobs en arrière-plan.

### En production

Utilisez un gestionnaire de processus comme **Supervisor** pour que le worker redémarre automatiquement en cas d'erreur.

Configuration Supervisor exemple (`/etc/supervisor/conf.d/laravel-worker.conf`) :

```ini
[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /path/to/your/project/artisan queue:work --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www-data
numprocs=1
redirect_stderr=true
stdout_logfile=/path/to/your/project/storage/logs/worker.log
stopwaitsecs=3600
```

## Configuration Email

### Développement (Logs)

Actuellement configuré dans `.env` :
```
MAIL_MAILER=log
```

Les emails sont enregistrés dans `storage/logs/laravel.log` au lieu d'être envoyés.

### Production (SMTP)

Pour envoyer de vrais emails, modifiez `.env` :

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=votre-email@gmail.com
MAIL_PASSWORD=votre-mot-de-passe-app
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=votre-email@gmail.com
MAIL_FROM_NAME="Poto - E-commerce"
```

**Note** : Pour Gmail, utilisez un "Mot de passe d'application" au lieu de votre mot de passe normal.

## Test du Système

1. **Démarrez le worker** :
   ```bash
   php artisan queue:work
   ```

2. **Envoyez un message** depuis le chat (client → vendeur ou vendeur → client)

3. **Vérifiez les jobs** :
   ```bash
   php artisan queue:monitor
   ```

4. **Attendez 5 minutes** sans lire le message

5. **Vérifiez les logs** :
   ```bash
   tail -f storage/logs/laravel.log
   ```

Vous devriez voir l'email de rappel dans les logs.

## Commandes Utiles

```bash
# Voir les jobs en attente
php artisan queue:monitor

# Vider la queue (supprimer tous les jobs)
php artisan queue:flush

# Relancer les jobs échoués
php artisan queue:retry all

# Voir les jobs échoués
php artisan queue:failed
```

## Dépannage

### Le worker ne démarre pas
- Vérifiez que la table `jobs` existe : `php artisan migrate`
- Vérifiez `.env` : `QUEUE_CONNECTION=database`

### Les emails ne sont pas envoyés
- Vérifiez que le worker est en cours d'exécution
- Vérifiez les logs : `storage/logs/laravel.log`
- Vérifiez la configuration SMTP dans `.env`

### Les jobs ne s'exécutent pas après 5 minutes
- Redémarrez le worker : `Ctrl+C` puis `php artisan queue:work`
- Vérifiez l'heure du serveur : `php -r "echo date('Y-m-d H:i:s');"`
