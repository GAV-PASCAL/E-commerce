# Guide de Test - Système de Gestion des Fiches de Commande

## 🧪 Tests à Effectuer

### Prérequis
1. Avoir un compte vendeur (admin)
2. Avoir au moins un compte client avec un email valide
3. Avoir des produits dans la base de données

---

## Test 1️⃣ : Création d'une Fiche de Commande (Vendeur)

### Étapes :
1. **Connexion en tant que vendeur**
   - URL : `/login`
   - Utilisez vos identifiants admin

2. **Accéder à la liste des commandes**
   - URL : `/admin/commandes/liste`
   - Vérifier que la page s'affiche correctement
   - Cliquer sur "+ Nouvelle Commande"

3. **Sélectionner les produits**
   - URL : `/admin/commandes/create`
   - ✅ Cocher au moins 2 produits
   - ✅ Remplir le prix unitaire pour chaque produit sélectionné
   - ✅ Remplir la quantité pour chaque produit sélectionné
   - ✅ Tester la recherche de produits
   - ✅ Vérifier que le bouton "Continuer" est désactivé si aucun produit n'est sélectionné
   - Cliquer sur "Continuer vers le formulaire client"

4. **Renseigner les informations du client**
   - URL : `/admin/commandes/client-form`
   - ✅ Vérifier que le résumé des produits s'affiche
   - ✅ Vérifier que le montant total est correct
   - ✅ Saisir l'email d'un client existant
   - ✅ Vérifier la date (par défaut = aujourd'hui)
   - Cliquer sur "Créer la fiche de commande"

5. **Vérifier la création**
   - ✅ Redirection vers `/admin/commandes/liste`
   - ✅ Message de succès avec le numéro de fiche
   - ✅ La nouvelle commande apparaît dans la liste
   - ✅ Statut = "En attente" (badge jaune)

### Résultat Attendu :
- ✅ Commande créée avec succès
- ✅ Numéro de fiche généré (ex: CMD-2026-0001)
- ✅ Montant total calculé correctement
- ✅ Statut = "en_attente"

---

## Test 2️⃣ : Voir les Détails d'une Commande (Vendeur)

### Étapes :
1. Dans la liste des commandes (`/admin/commandes/liste`)
2. Cliquer sur "Voir" pour une commande
3. URL : `/admin/commandes/{id}`

### Vérifications :
- ✅ Numéro de fiche affiché
- ✅ Date de commande affichée
- ✅ Informations du client (nom, prénom, email)
- ✅ Statut avec badge coloré
- ✅ Liste des produits avec prix et quantités
- ✅ Montant total correct
- ✅ Bouton "Télécharger PDF" présent
- ✅ Bouton "Retour" fonctionne

---

## Test 3️⃣ : Télécharger le PDF (Vendeur)

### Étapes :
1. Dans les détails d'une commande
2. Cliquer sur "📄 Télécharger PDF"

### Vérifications :
- ✅ Le PDF se télécharge
- ✅ Nom du fichier : `commande-CMD-2026-XXXX.pdf`
- ✅ Le PDF contient toutes les informations
- ✅ Design professionnel
- ✅ Badge de statut visible

---

## Test 4️⃣ : Modifier une Commande (Vendeur)

### Étapes :
1. Dans la liste des commandes
2. Cliquer sur "Modifier" pour une commande
3. URL : `/admin/commandes/{id}/edit`

### Vérifications :
- ✅ Informations du client affichées (non modifiables)
- ✅ Date de commande pré-remplie
- ✅ Produits de la commande pré-cochés
- ✅ Prix et quantités pré-remplis
- ✅ Possibilité d'ajouter/retirer des produits
- ✅ Possibilité de modifier prix et quantités
- ✅ Bouton "Mettre à jour la commande"

### Actions :
1. Modifier la quantité d'un produit
2. Cliquer sur "Mettre à jour la commande"

### Résultat Attendu :
- ✅ Message de succès
- ✅ Montant total recalculé
- ✅ Modifications visibles dans la liste

---

## Test 5️⃣ : Supprimer une Commande (Vendeur)

### Étapes :
1. Dans la liste des commandes
2. Cliquer sur "Supprimer" pour une commande
3. Confirmer la suppression

### Vérifications :
- ✅ Popup de confirmation
- ✅ Message de succès après suppression
- ✅ Commande disparue de la liste

---

## Test 6️⃣ : Voir ses Commandes (Client)

### Étapes :
1. **Déconnexion du compte vendeur**
2. **Connexion avec le compte client** (celui utilisé lors de la création)
   - URL : `/login`

3. **Accéder aux commandes**
   - URL : `/client/commandes`

### Vérifications :
- ✅ Liste des commandes du client affichée
- ✅ Numéro de fiche visible
- ✅ Date de commande visible
- ✅ Montant total visible
- ✅ Statut "En attente de validation" (badge jaune)
- ✅ Bouton "Voir la fiche" présent
- ✅ Bouton "✓ Accepter la commande" présent

---

## Test 7️⃣ : Voir les Détails d'une Commande (Client)

### Étapes :
1. Dans la liste des commandes client
2. Cliquer sur "Voir la fiche"
3. URL : `/client/commandes/{id}`

### Vérifications :
- ✅ Numéro de fiche affiché
- ✅ Ses coordonnées affichées (nom, prénom, email)
- ✅ Liste des produits commandés
- ✅ Prix et quantités corrects
- ✅ Montant total correct
- ✅ Section "⚠️ Action requise" visible (si en attente)
- ✅ Bouton "✓ Accepter cette commande" présent
- ✅ Bouton "📄 Télécharger PDF" présent

---

## Test 8️⃣ : Valider une Commande (Client)

### Étapes :
1. Dans les détails d'une commande en attente
2. Cliquer sur "✓ Accepter cette commande"
3. Confirmer l'action

### Vérifications :
- ✅ Popup de confirmation
- ✅ Message de succès
- ✅ Statut change à "Validée" (badge vert)
- ✅ Section "✓ Commande validée" s'affiche
- ✅ Bouton "Accepter" disparaît
- ✅ Date de validation affichée

---

## Test 9️⃣ : Vérifier la Mise à Jour Côté Vendeur

### Étapes :
1. **Retour au compte vendeur**
2. Accéder à `/admin/commandes/liste`

### Vérifications :
- ✅ Le statut de la commande validée par le client est maintenant "Validée" (badge vert)
- ✅ La mise à jour est instantanée

---

## Test 🔟 : Télécharger le PDF (Client)

### Étapes :
1. Connexion en tant que client
2. Accéder aux détails d'une commande
3. Cliquer sur "📄 Télécharger PDF"

### Vérifications :
- ✅ Le PDF se télécharge
- ✅ Contenu identique à celui du vendeur
- ✅ Toutes les informations présentes

---

## 🐛 Tests d'Erreur

### Test E1 : Email Client Invalide
1. Créer une commande
2. Saisir un email qui n'existe pas dans la base
3. **Résultat attendu** : Message d'erreur "Aucun client trouvé avec cet email"

### Test E2 : Aucun Produit Sélectionné
1. Accéder à `/admin/commandes/create`
2. Ne cocher aucun produit
3. **Résultat attendu** : Bouton "Continuer" désactivé

### Test E3 : Prix ou Quantité Manquant
1. Cocher un produit
2. Ne pas remplir le prix ou la quantité
3. Essayer de soumettre
4. **Résultat attendu** : Alert JavaScript "Veuillez renseigner un prix/quantité valide"

### Test E4 : Accès Non Autorisé
1. En tant que client, essayer d'accéder à `/admin/commandes/create`
2. **Résultat attendu** : Redirection ou erreur 403

### Test E5 : Valider une Commande Déjà Validée
1. Essayer de valider une commande déjà validée
2. **Résultat attendu** : Message "Cette commande ne peut plus être validée"

---

## ✅ Checklist Complète

- [ ] Test 1 : Création de commande (vendeur)
- [ ] Test 2 : Voir détails (vendeur)
- [ ] Test 3 : Télécharger PDF (vendeur)
- [ ] Test 4 : Modifier commande (vendeur)
- [ ] Test 5 : Supprimer commande (vendeur)
- [ ] Test 6 : Voir commandes (client)
- [ ] Test 7 : Voir détails (client)
- [ ] Test 8 : Valider commande (client)
- [ ] Test 9 : Vérifier mise à jour (vendeur)
- [ ] Test 10 : Télécharger PDF (client)
- [ ] Test E1 : Email invalide
- [ ] Test E2 : Aucun produit
- [ ] Test E3 : Prix/quantité manquant
- [ ] Test E4 : Accès non autorisé
- [ ] Test E5 : Double validation

---

## 📊 Données de Test Suggérées

### Produits à Sélectionner :
- Produit 1 : Prix = 5000 FCFA, Quantité = 2 → Total = 10000 FCFA
- Produit 2 : Prix = 3500 FCFA, Quantité = 3 → Total = 10500 FCFA
- **Montant Total Attendu** : 20500 FCFA

### Comptes Nécessaires :
1. **Vendeur** : Compte avec `role = 'admin'`
2. **Client** : Compte avec `role = 'client'` et email valide

---

## 🚀 Commandes Utiles pour le Débogage

```bash
# Voir les logs Laravel
php artisan pail

# Vider le cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Voir les routes
php artisan route:list --name=commandes

# Accéder à Tinker pour vérifier les données
php artisan tinker
>>> App\Models\Commande::all();
>>> App\Models\Commande::with('produits')->first();
```

---

**Bon test ! 🎉**
