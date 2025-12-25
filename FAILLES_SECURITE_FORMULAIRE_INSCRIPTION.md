# 🔐 Analyse des Failles de Sécurité - Formulaire d'Inscription

## ⚠️ FAILLES CRITIQUES

### 1. **ABSENCE DE TOKEN CSRF** ❌ CRITIQUE
**Fichier** : `resources/views/auth/register.blade.php` (ligne 35)

**Problème** :
```blade
<form class="inscription" method="POST" action="{{ route('register.post') }}">
    <!-- Pas de @csrf ! -->
```

**Impact** :
- Vulnérable aux attaques **Cross-Site Request Forgery (CSRF)**
- Un attaquant peut créer des comptes à l'insu des utilisateurs
- Peut être utilisé pour du spam ou des attaques automatisées

**Solution** :
```blade
<form class="inscription" method="POST" action="{{ route('register.post') }}">
    @csrf
    <!-- reste du formulaire -->
```

---

### 2. **MOT DE PASSE NON HASHÉ** ❌ CRITIQUE
**Fichier** : `app/Http/Controllers/AuthController.php` (ligne 61)

**Problème** :
```php
$user = User::create([
    'nom' => $data['nom'],
    'prenom' => $data['prenom'],
    'email' => $data['email'],
    'password' => $data['password'],  // ❌ Stocké en clair !
    'role_id' => $roleAcheteur->id,
]);
```

**Impact** :
- **EXTRÊMEMENT DANGEREUX** : Les mots de passe sont stockés en clair dans la base de données
- En cas de fuite de données, tous les mots de passe sont compromis
- Violation du RGPD et des bonnes pratiques de sécurité
- Responsabilité légale en cas de piratage

**Solution** :
```php
use Illuminate\Support\Facades\Hash;

$user = User::create([
    'nom' => $data['nom'],
    'prenom' => $data['prenom'],
    'email' => $data['email'],
    'password' => Hash::make($data['password']),  // ✅ Hashé avec bcrypt
    'role_id' => $roleAcheteur->id,
]);
```

**Alternative** : Utiliser un mutateur dans le modèle User :
```php
// Dans app/Models/User.php
protected function setPasswordAttribute($value)
{
    $this->attributes['password'] = Hash::make($value);
}
```

---

## ⚠️ FAILLES IMPORTANTES

### 3. **Pas de Rate Limiting** ⚠️ IMPORTANT

**Problème** :
- Aucune limitation du nombre de tentatives d'inscription
- Vulnérable aux attaques par force brute et au spam

**Impact** :
- Création massive de comptes automatisée
- Saturation de la base de données
- Envoi de spam via les comptes créés

**Solution** :
```php
// Dans routes/web.php
Route::post('/register', [AuthController::class, 'register'])
    ->middleware('throttle:5,1')  // 5 tentatives par minute
    ->name('register.post');
```

---

### 4. **Pas de Vérification d'Email** ⚠️ IMPORTANT

**Problème** :
- Les utilisateurs peuvent s'inscrire avec n'importe quel email sans vérification
- Pas de confirmation que l'email appartient bien à l'utilisateur

**Impact** :
- Comptes créés avec des emails invalides ou usurpés
- Impossible de récupérer le compte en cas d'oubli de mot de passe
- Utilisation d'emails temporaires pour du spam

**Solution** :
```php
// 1. Implémenter MustVerifyEmail dans User.php
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    // ...
}

// 2. Ajouter le middleware dans routes/web.php
Route::middleware(['auth', 'verified'])->group(function () {
    // Routes protégées
});

// 3. Envoyer l'email de vérification après inscription
$user->sendEmailVerificationNotification();
```

---

### 5. **Validation Faible du Mot de Passe** ⚠️ MOYEN

**Problème actuel** :
```php
'password' => ['required', 'string', 'min:8', 'confirmed'],
```

**Faiblesses** :
- Pas de vérification de complexité
- Accepte "12345678" comme mot de passe valide
- Pas de vérification contre les mots de passe courants

**Solution** :
```php
use Illuminate\Validation\Rules\Password;

'password' => [
    'required',
    'confirmed',
    Password::min(8)
        ->letters()      // Au moins une lettre
        ->mixedCase()    // Majuscules et minuscules
        ->numbers()      // Au moins un chiffre
        ->symbols()      // Au moins un symbole
        ->uncompromised() // Pas dans les bases de mots de passe compromis
],
```

---

### 6. **Pas de Sanitisation des Entrées** ⚠️ MOYEN

**Problème** :
- Les champs `nom` et `prenom` acceptent n'importe quel caractère
- Risque d'injection de caractères spéciaux

**Solution** :
```php
'nom' => ['required', 'string', 'max:255', 'regex:/^[a-zA-ZÀ-ÿ\s\-\']+$/'],
'prenom' => ['required', 'string', 'max:255', 'regex:/^[a-zA-ZÀ-ÿ\s\-\']+$/'],
```

---

### 7. **Messages d'Erreur Trop Détaillés** ⚠️ FAIBLE

**Problème** :
```php
'email' => ['required', 'email', 'unique:users,email'],
```

**Impact** :
- Un attaquant peut vérifier si un email existe dans la base
- Énumération des utilisateurs

**Solution** :
- Utiliser des messages génériques
- Implémenter un système de vérification par email

---

### 8. **Pas de Protection Honeypot** ⚠️ FAIBLE

**Problème** :
- Aucune protection contre les bots d'inscription automatique

**Solution** :
```blade
<!-- Champ caché pour piéger les bots -->
<input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off">
```

```php
// Dans le contrôleur
if ($request->filled('website')) {
    // C'est probablement un bot
    return back()->withErrors(['email' => 'Erreur lors de l\'inscription.']);
}
```

---

### 9. **Pas de Logging des Inscriptions** ⚠️ FAIBLE

**Problème** :
- Aucun log des tentatives d'inscription
- Difficile de détecter les activités suspectes

**Solution** :
```php
use Illuminate\Support\Facades\Log;

Log::info('Nouvelle inscription', [
    'email' => $data['email'],
    'ip' => $request->ip(),
    'user_agent' => $request->userAgent(),
]);
```

---

### 10. **Pas de Validation Côté Client** ℹ️ AMÉLIORATION UX

**Problème** :
- Toute la validation se fait côté serveur
- Mauvaise expérience utilisateur

**Solution** :
```blade
<input 
    id="password" 
    type="password" 
    name="password" 
    class="formulaire_input" 
    required 
    minlength="8"
    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
    title="Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre"
>
```

---

## 📊 RÉCAPITULATIF DES RISQUES

| Faille | Sévérité | Priorité | Difficulté |
|--------|----------|----------|------------|
| Mot de passe non hashé | 🔴 CRITIQUE | P0 | Facile |
| Absence de CSRF | 🔴 CRITIQUE | P0 | Très facile |
| Pas de rate limiting | 🟠 IMPORTANT | P1 | Facile |
| Pas de vérification email | 🟠 IMPORTANT | P1 | Moyen |
| Validation mot de passe faible | 🟡 MOYEN | P2 | Facile |
| Pas de sanitisation | 🟡 MOYEN | P2 | Facile |
| Messages d'erreur détaillés | 🟢 FAIBLE | P3 | Facile |
| Pas de honeypot | 🟢 FAIBLE | P3 | Facile |
| Pas de logging | 🟢 FAIBLE | P3 | Facile |
| Validation côté client | ℹ️ UX | P4 | Facile |

---

## ✅ PLAN D'ACTION RECOMMANDÉ

### Phase 1 : URGENT (À faire immédiatement)
1. ✅ Ajouter `@csrf` dans le formulaire
2. ✅ Hasher les mots de passe avec `Hash::make()`
3. ✅ Tester que la connexion fonctionne toujours

### Phase 2 : IMPORTANT (Cette semaine)
4. ✅ Ajouter le rate limiting
5. ✅ Implémenter la vérification d'email
6. ✅ Renforcer la validation des mots de passe

### Phase 3 : AMÉLIORATIONS (Ce mois-ci)
7. ✅ Ajouter la sanitisation des champs
8. ✅ Implémenter le honeypot
9. ✅ Ajouter le logging
10. ✅ Améliorer la validation côté client

---

## 🔧 CODE CORRIGÉ COMPLET

Voir les fichiers de correction séparés pour l'implémentation complète.
