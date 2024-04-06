<?php
include __DIR__ . '/../modele/book.php';

try {
    // Vérification si la requête est de type POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifier si un fichier a été envoyé
        if (!isset($_FILES['couverture']) || !is_uploaded_file($_FILES['couverture']['tmp_name'])) {
            throw new Exception("Aucun fichier n'a été téléchargé.");
        }

        // Dossier de téléchargement
        $uploadDir = __DIR__ . '/../statics/images/upload/';

        // Nom du fichier téléchargé
        $fileName = basename($_FILES['couverture']['name']);

        // Chemin complet du fichier téléchargé
        $uploadFile = $uploadDir . $fileName;

        // Extension du fichier
        $fileExtension = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

        // Taille maximale autorisée (en octets)
        $maxFileSize = 150 * 1024; // 150 Ko

        // Types de fichiers autorisés
        $allowedFileTypes = ['jpg', 'jpeg', 'png', 'gif'];

        // Vérifier si le fichier a été téléchargé avec succès
        if ($_FILES['couverture']['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Erreur lors du téléchargement du fichier.");
        }

        // Vérifier la taille du fichier
        if ($_FILES['couverture']['size'] > $maxFileSize) {
            throw new Exception("Le fichier n'a pas une taille valide : 150ko maximum.");
        }

        // Vérifier le type de fichier
        if (!in_array($fileExtension, $allowedFileTypes)) {
            throw new Exception("Type de fichier non autorisé.");
        }

        // Vérifier si le fichier est une image réelle
        if (!getimagesize($_FILES['couverture']['tmp_name'])) {
            throw new Exception("Le fichier n'est pas une image valide.");
        }

        // Si toutes les validations sont passées avec succès, déplacer le fichier téléchargé vers le dossier de destination
        if (!move_uploaded_file($_FILES['couverture']['tmp_name'], $uploadFile)) {
            throw new Exception("Erreur lors de l'upload du fichier.");
        }

        // Récupération des données soumises via le formulaire
        $titre = htmlspecialchars($_POST['titre'] ?? '');
        $auteur = htmlspecialchars($_POST['auteur'] ?? '');
        $pages = htmlspecialchars($_POST['pages'] ?? '');
        $sortie = htmlspecialchars($_POST['sortie'] ?? '');
        $edition = htmlspecialchars($_POST['edition'] ?? '');
        $synopsis = htmlspecialchars($_POST['synopsis'] ?? '');

        // Vérification des saisies du formulaire
        if (preg_match("/[<>{}[\]\/\\\\]/", $titre)) {
            throw new Exception("Titre invalide. Le titre ne doit pas contenir les caractères suivants : < > { } [ ] / \\");
        }
        if (preg_match("/[<>{[\]}/\\\\]/", $auteur)) {
            throw new Exception("Erreur : auteur invalide. L'acteur ne doit pas contenir les caractères suivants : < > { } [ ] / \\");
        }
        if (!preg_match("/^[0-9 ]{2,50}$/", $pages)) {
            throw new Exception("Nombres de pages invalide.");
        }
        if (preg_match("/[<>{[\]}/\\\\]/", $edition)) {
            throw new Exception("Erreur : éditeur invalide. L'éditeur ne doit pas contenir les caractères suivants : < > { } [ ] / \\");
        }
        if (!preg_match("/^[a-zA-Z0-9\s',;.?!():\-–_°#]{10,25000}$/u", $synopsis)) {
            throw new Exception("Erreur : synopsis invalide. Le synopsis ne doit contenir que des lettres, des chiffres, des espaces et les ponctuations suivantes : ', ; . ? ! ( ) - – _ ° #, et avoir une longueur entre 10 et 25000 caractères.");
        }

        // Ajout du livre avec les données validées
        addBook($titre, $auteur, $pages, $edition, $sortie, $synopsis, 'statics/images/upload/' . $fileName);
    }
} catch (Exception $e) {
    // Capturer l'exception et afficher le message d'erreur
    addError($e->getMessage());
}

include __DIR__ . '/../vue/adminLivre.php';