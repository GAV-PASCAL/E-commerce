# 🔍 Guide de Débogage - Bouton Envoyer Inerte (Admin)

## 🎯 Problème
Le bouton "Envoyer" ne fonctionne pas dans la conversation côté admin.

## ✅ Corrections Déjà Appliquées

### 1. **Suppression de l'attribut `disabled` problématique**
**Avant** :
```blade
<button type="submit" class="chat-send-btn" {{ empty($newMessage) ? 'disabled' : '' }}>
```

**Après** :
```blade
<button type="submit" class="chat-send-btn" wire:loading.attr="disabled">
```

**Raison** : La syntaxe `{{ empty($newMessage) ? 'disabled' : '' }}` ne fonctionne pas avec les propriétés Livewire.

### 2. **Ajout de feedback visuel avec wire:loading**
```blade
<button type="submit" class="chat-send-btn" wire:loading.attr="disabled">
    <i class='bx bx-send' wire:loading.remove></i>
    <i class='bx bx-loader-alt bx-spin' wire:loading></i>
    <span wire:loading.remove>Envoyer</span>
    <span wire:loading>Envoi...</span>
</button>
```

### 3. **Ajout de logs pour le débogage**
- Logs PHP dans `VendorChatBox::sendMessage()`
- Logs JavaScript dans la console du navigateur

---

## 🧪 Étapes de Débogage

### Étape 1 : Ouvrir la Console du Navigateur

1. **Ouvrez la page** `/admin/messages`
2. **Appuyez sur F12** pour ouvrir les outils de développement
3. **Allez dans l'onglet "Console"**
4. **Sélectionnez une conversation**

**Vous devriez voir** :
```
VendorChatBox: Livewire initialized
```

### Étape 2 : Taper un Message

1. **Tapez quelque chose** dans l'input
2. **Vérifiez** que vous pouvez taper normalement

**Si vous ne pouvez pas taper** :
- ❌ L'input est bloqué
- 🔍 Vérifiez qu'il n'y a pas de `wire:ignore` sur l'input

### Étape 3 : Cliquer sur Envoyer

1. **Cliquez sur le bouton "Envoyer"**

**Dans la console, vous devriez voir** :
```
VendorChatBox: Form submitted { newMessage: "votre message" }
VendorChatBox: Livewire updated
VendorChatBox: Message sent event received
```

**Si vous ne voyez RIEN** :
- ❌ Le formulaire n'est pas soumis
- 🔍 Problème avec `wire:submit.prevent`

**Si vous voyez "Form submitted" mais pas "Livewire updated"** :
- ❌ La méthode PHP n'est pas appelée
- 🔍 Vérifiez les erreurs dans la console

### Étape 4 : Vérifier les Logs Laravel

1. **Ouvrez le fichier** `storage/logs/laravel.log`
2. **Cherchez** les logs récents

**Vous devriez voir** :
```
[2025-12-25 00:39:00] local.INFO: VendorChatBox::sendMessage appelée {"conversationId":1,"newMessage":"test","user_id":1}
[2025-12-25 00:39:00] local.INFO: Message créé {"message_id":42}
[2025-12-25 00:39:00] local.INFO: Message envoyé avec succès
```

**Si vous ne voyez PAS ces logs** :
- ❌ La méthode PHP n'est jamais appelée
- 🔍 Problème de routing Livewire

---

## 🔧 Solutions Possibles

### Problème 1 : Erreur JavaScript dans la Console

**Symptôme** : Messages d'erreur rouges dans la console

**Solutions** :
```bash
# Vider le cache du navigateur
Ctrl + Shift + Delete

# Recompiler les assets
npm run dev
```

### Problème 2 : Erreur "Method sendMessage not found"

**Symptôme** : Erreur 500 ou message d'erreur Livewire

**Solution** : Vérifier que la méthode existe dans `VendorChatBox.php`
```php
public function sendMessage()
{
    // ...
}
```

### Problème 3 : Validation échoue silencieusement

**Symptôme** : Rien ne se passe, pas d'erreur

**Solution** : Vérifier les erreurs de validation
```blade
@error('newMessage')
    <span class="error-message">{{ $message }}</span>
@enderror
```

### Problème 4 : Le composant ne se charge pas

**Symptôme** : La page est vide ou erreur Livewire

**Solution** :
```bash
# Vider le cache Livewire
php artisan livewire:delete-uploaded-files
php artisan view:clear
php artisan cache:clear
```

### Problème 5 : Conflit avec un autre composant

**Symptôme** : Comportement erratique

**Solution** : Vérifier qu'il n'y a pas de `wire:id` en double
```blade
<!-- Chaque composant doit avoir un wire:key unique -->
@livewire('vendor-chat-box', ['conversationId' => $id], key('chat-'.$id))
```

---

## 📋 Checklist de Vérification

### Frontend (Blade)
- [ ] Le formulaire a `wire:submit.prevent="sendMessage"`
- [ ] L'input a `wire:model="newMessage"`
- [ ] Le bouton a `type="submit"`
- [ ] Pas de `wire:ignore` sur l'input
- [ ] Le composant a un seul élément racine

### Backend (PHP)
- [ ] La méthode `sendMessage()` existe
- [ ] La méthode est `public`
- [ ] La validation est correcte
- [ ] `$newMessage` est une propriété publique
- [ ] Le composant étend `Component`

### Livewire
- [ ] Livewire est bien installé
- [ ] Les assets Livewire sont chargés
- [ ] Pas d'erreur dans la console
- [ ] Le composant est bien monté

---

## 🚀 Test Rapide

Essayez ce test simple :

1. **Ouvrez** `/admin/messages`
2. **Ouvrez la console** (F12)
3. **Sélectionnez une conversation**
4. **Tapez** "test" dans l'input
5. **Cliquez** sur "Envoyer"
6. **Vérifiez** :
   - ✅ Console : "Form submitted"
   - ✅ Console : "Livewire updated"
   - ✅ Le message apparaît dans la liste
   - ✅ L'input est vidé
   - ✅ Le bouton montre "Envoi..." pendant l'envoi

---

## 📞 Si Rien ne Fonctionne

### Option 1 : Vérifier la version de Livewire

```bash
composer show livewire/livewire
```

**Version recommandée** : 3.x

### Option 2 : Réinstaller Livewire

```bash
composer remove livewire/livewire
composer require livewire/livewire
php artisan livewire:publish --config
```

### Option 3 : Vérifier les layouts

Le layout doit inclure les directives Livewire :
```blade
<head>
    @livewireStyles
</head>
<body>
    {{ $slot }}
    @livewireScripts
</body>
```

---

## 🎯 Prochaines Étapes

1. **Suivez les étapes de débogage** ci-dessus
2. **Notez les messages** dans la console et les logs
3. **Partagez les erreurs** que vous voyez
4. **Testez** avec un message simple comme "test"

---

## 📝 Informations à Fournir

Si le problème persiste, fournissez :

1. **Messages de la console** (F12 → Console)
2. **Dernières lignes** de `storage/logs/laravel.log`
3. **Erreurs** éventuelles affichées
4. **Comportement observé** :
   - Le bouton est-il cliquable ?
   - Change-t-il d'apparence au clic ?
   - Y a-t-il un loader ?
   - L'input se vide-t-il ?
