# Guide de Test - Emails de Rappel (5 minutes)

## ✅ Corrections Apportées

Le problème venait de la façon dont le délai était défini. J'ai corrigé :
- ❌ **Avant** : `$this->delay()` dans le constructeur (ne fonctionnait pas)
- ✅ **Après** : `->delay()` lors du dispatch (fonctionne correctement)

## 🧪 Comment Tester

### Étape 1 : Vérifier que le worker tourne
```bash
# Le worker doit être actif
php artisan queue:work --verbose
```

### Étape 2 : Envoyer un message de test
1. Connectez-vous en tant que **client**
2. Allez dans la messagerie
3. Envoyez un message au vendeur
4. **NE PAS** ouvrir la conversation côté vendeur

### Étape 3 : Vérifier que le job est programmé
Dans un nouveau terminal :
```bash
php artisan tinker --execute="DB::table('jobs')->select('id', 'queue', 'available_at')->get()->each(function(\$job) { echo 'Job ID: ' . \$job->id . ' | Disponible à: ' . date('Y-m-d H:i:s', \$job->available_at) . PHP_EOL; });"
```

Vous devriez voir un job avec une date `available_at` dans ~5 minutes.

### Étape 4 : Suivre les logs en temps réel
```bash
# Dans un nouveau terminal
Get-Content storage\logs\laravel.log -Wait -Tail 20
```

Vous verrez :
1. **Immédiatement** : `ChatBox: Programmation email de rappel`
2. **Après 5 minutes** : 
   - `SendUnreadMessageEmailJob: Démarrage`
   - `SendUnreadMessageEmailJob: Envoi de l'email`
   - Le contenu HTML de l'email

### Étape 5 : Vérifier l'email dans les logs
Après 5 minutes, cherchez dans `storage/logs/laravel.log` :
```
Subject: 💬 Vous avez un message non lu de [Nom Client]
```

## 🔍 Dépannage

### Le job n'apparaît pas dans la table `jobs`
**Problème** : Le job n'est pas créé
**Solution** : Vérifiez les logs pour voir si `ChatBox: Programmation email de rappel` apparaît

### Le job est dans la table mais ne s'exécute jamais
**Problème** : Le worker ne traite pas les jobs
**Solution** : 
1. Redémarrez le worker : `Ctrl+C` puis `php artisan queue:work --verbose`
2. Vérifiez que `QUEUE_CONNECTION=database` dans `.env`

### Le job s'exécute mais pas d'email
**Problème** : Le message a été lu entre-temps
**Vérification** : Regardez les logs pour `Message déjà lu, pas d'email envoyé`

### Tester avec un délai plus court (1 minute)
Pour tester plus rapidement, modifiez temporairement :

**Dans `ChatBox.php` et `VendorChatBox.php`** :
```php
->delay(now()->addMinutes(1))  // Au lieu de 5
```

**Dans les logs** :
```php
'scheduled_for' => now()->addMinutes(1)->toDateTimeString(),
```

## 📊 Commandes Utiles

```bash
# Voir tous les jobs en attente
php artisan queue:monitor

# Voir le contenu de la table jobs
php artisan tinker --execute="DB::table('jobs')->get()"

# Vider tous les jobs (pour recommencer les tests)
php artisan queue:flush

# Voir les jobs échoués
php artisan queue:failed

# Forcer l'exécution immédiate de tous les jobs (pour tester)
php artisan queue:work --once
```

## 🎯 Résultat Attendu

Après 5 minutes (si le message n'a pas été lu) :

**Dans les logs** :
```
[2026-02-02 17:50:00] local.INFO: ChatBox: Programmation email de rappel {"message_id":123,"recipient_id":1,"scheduled_for":"2026-02-02 17:55:00"}
...
[2026-02-02 17:55:00] local.INFO: SendUnreadMessageEmailJob: Démarrage {"message_id":123,"recipient_id":1}
[2026-02-02 17:55:00] local.INFO: SendUnreadMessageEmailJob: Envoi de l'email {"message_id":123,"recipient_email":"vendeur@example.com"}
[2026-02-02 17:55:00] local.INFO: SendUnreadMessageEmailJob: Email envoyé avec succès
```

**Email (dans les logs)** :
```
Subject: 💬 Vous avez un message non lu de [Prénom Nom]
Bonjour [Prénom],
Vous avez reçu un message il y a 5 minutes que vous n'avez pas encore lu.
...
```
