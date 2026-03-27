# EXTRAITS DE CODE — PRÉSENTATION ORAL E5
### 3 extraits courts · Focus partie admin · BTS SIO SLAM

---

## EXTRAIT 1 — Sécurité : CSRF + Auth en une seule méthode
### Fichier : `app/Core/Router.php` (lignes 26-30)

```php
// Router.php — run()

Middleware::csrf();   // Vérifie le token sur tout POST

if (strpos($path, '/admin') === 0) {
    Middleware::auth();   // Vérifie la session sur toute route /admin
}
```

```php
// Middleware.php — csrf()

$token = $_POST['csrf_token'] ?? '';

if (!Security::verifyCsrfToken($token)) {
    header('HTTP/1.0 403 Forbidden');
    exit("Erreur de sécurité : token CSRF invalide.");
}
```

---

### 🎤 Ce que tu dis au jury

> *"Ce que je veux vous montrer ici, c'est que toute la sécurité de l'administration est centralisée dans le Router — pas dans chaque contrôleur séparément.*
>
> *Il y a deux vérifications automatiques à chaque requête : d'abord le CSRF, qui protège contre les formulaires soumis depuis un site externe à mon insu. Le principe : chaque formulaire admin contient un token secret généré côté serveur. Si le token soumis ne correspond pas à celui stocké en session, la requête est bloquée immédiatement avec une erreur 403.*
>
> *Ensuite, si l'URL commence par `/admin`, on vérifie que l'utilisateur est bien connecté via sa session. Sinon, redirection vers `/login` et l'action est tracée dans les logs d'audit.*
>
> *L'avantage de cette approche : si j'ajoute une nouvelle route admin demain, elle est automatiquement protégée — je n'ai rien à écrire de plus."*

---

## EXTRAIT 2 — CRUD admin : sauvegarde des compétences BTS
### Fichier : `app/Models/BtsModel.php`

```php
// BtsModel.php — save()

public function save($data, $competence_ids = [], $sous_competence_ids = []) {

    // INSERT ou UPDATE selon la présence d'un ID
    if (!empty($data['id'])) {
        $query = "UPDATE bts_realisations SET title=:title, type=:type ... WHERE id=:id";
    } else {
        $query = "INSERT INTO bts_realisations (title, type ...) VALUES (:title, :type ...)";
    }

    $stmt = $this->conn->prepare($query);   // Requête préparée → anti-injection SQL
    $stmt->bindParam(':title', $data['title']);
    $stmt->execute();

    $id = $data['id'] ?? $this->conn->lastInsertId();

    $this->syncMatrix($id, $competence_ids);        // Sync compétences
    $this->syncMatrixSous($id, $sous_competence_ids); // Sync sous-compétences
}
```

```php
// BtsModel.php — syncMatrix() (même logique pour syncMatrixSous)

private function syncMatrix($realisation_id, $competence_ids) {

    // Étape 1 : on efface tout
    $this->conn->prepare("DELETE FROM bts_matrix WHERE realisation_id = :id")
               ->execute([':id' => $realisation_id]);

    // Étape 2 : on réinsère uniquement ce qui est coché
    foreach ($competence_ids as $comp_id) {
        $stmt = $this->conn->prepare(
            "INSERT INTO bts_matrix (realisation_id, competence_id) VALUES (?,?)"
        );
        $stmt->execute([$realisation_id, $comp_id]);
    }
}
```

---

### 🎤 Ce que tu dis au jury

> *"Voici la méthode save() du modèle BTS. C'est elle qui est appelée quand l'admin coche des compétences pour une réalisation et clique sur Enregistrer.*
>
> *Première chose : la méthode gère à la fois la création et la modification. Si un ID est présent dans les données, c'est un UPDATE. Sinon, c'est un INSERT. Un seul point d'entrée pour les deux cas.*
>
> *Ensuite, j'utilise des requêtes préparées PDO avec bindParam. Les paramètres utilisateur ne sont jamais concaténés dans la chaîne SQL — c'est la protection fondamentale contre l'injection SQL.*
>
> *Enfin, une fois la réalisation sauvegardée, j'appelle syncMatrix et syncMatrixSous. La logique est simple : je supprime toutes les liaisons existantes pour cette réalisation, puis je réinsère uniquement les cases cochées. C'est ce qu'on appelle une synchronisation par DELETE+INSERT — ça garantit que les données correspondent exactement à ce que l'admin a sélectionné, sans résidu."*

---

## EXTRAIT 3 — Upload sécurisé dans l'admin projets
### Fichier : `app/Services/UploadService.php`

```php
// UploadService.php — upload()

public function upload($file) {

    // Vérification 1 : taille (protection contre les uploads massifs)
    if ($file['size'] > $this->maxSize) {
        return ['success' => false, 'message' => 'Fichier trop lourd'];
    }

    // Vérification 2 : type MIME réel lu dans le fichier (magic bytes)
    // ⚠️ On N'utilise PAS $_FILES['type'] → falsifiable par le navigateur
    $finfo    = new \finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->file($file['tmp_name']);

    if (!in_array($mimeType, $this->allowedMimes)) {
        return ['success' => false, 'message' => 'Type de fichier non autorisé'];
    }

    // Vérification 3 : nom aléatoire (on jette le nom original)
    $filename = bin2hex(random_bytes(16)) . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);

    move_uploaded_file($file['tmp_name'], $this->targetDir . $filename);

    return ['success' => true, 'path' => $filename];
}
```

---

### 🎤 Ce que tu dis au jury

> *"L'upload de fichiers c'est l'une des failles les plus critiques en web — si un attaquant réussit à uploader un fichier PHP, il peut exécuter du code sur le serveur.*
>
> *J'ai trois protections successives. D'abord la taille : on rejette les fichiers trop lourds pour éviter les abus.*
>
> *Ensuite, le type MIME. Et là c'est important : je n'utilise pas `$_FILES['type']` qui vient du navigateur et peut être falsifié. J'utilise `finfo` qui lit les premiers octets du fichier directement — ce qu'on appelle les magic bytes. Un JPEG commence toujours par les mêmes octets, même si on renomme le fichier en `.php`. C'est la vérification fiable.*
>
> *Enfin, je génère un nom aléatoire avec `random_bytes` — on jette complètement le nom original. Ça empêche les injections par nom de fichier et les accès directs par devinette.*
>
> *Ces trois niveaux ensemble couvrent les principales attaques d'upload référencées dans l'OWASP Top 10."*

---

## CONSEIL DE PRÉSENTATION

| | À faire | À éviter |
|---|---|---|
| **Écran** | Zoom VS Code à 16-18px, thème clair | Trop de code visible en même temps |
| **Navigation** | Ouvrir les fichiers à l'avance dans des onglets | Chercher les fichiers pendant l'épreuve |
| **Démo** | Montrer l'admin en live après chaque extrait | Rester uniquement sur le code |
| **Formulation** | *"Ce que j'ai voulu résoudre ici c'est..."* | Lire le code ligne par ligne |

---

*E5 — BTS SIO SLAM · Session 2025 · Martial MAYAMOU*
