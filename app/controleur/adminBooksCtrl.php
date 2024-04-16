<?php
include __DIR__ . '/../modele/book.php';
// page inexistante pour les non administrateur
if (!isset($_SESSION['role']) || (isset($_SESSION['role']) && $_SESSION['role'] === 'Membre')) {
    include __DIR__ . "/../vue/404.php";
    exit;
}

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
        $allowedFileTypes = ['jpg', 'jpeg', 'png', 'webp'];

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
        $titre = htmlspecialchars($_POST['titre'] ?? '', ENT_QUOTES, 'UTF-8');
        $auteur = htmlspecialchars($_POST['auteur'] ?? '', ENT_QUOTES, 'UTF-8');
        $pages = htmlspecialchars($_POST['pages'] ?? '', ENT_QUOTES, 'UTF-8');
        $sortie = htmlspecialchars($_POST['sortie'] ?? '', ENT_QUOTES, 'UTF-8');
        $edition = htmlspecialchars($_POST['edition'] ?? '', ENT_QUOTES, 'UTF-8');
        $synopsis = htmlspecialchars($_POST['synopsis'] ?? '', ENT_QUOTES, 'UTF-8');

        // Vérification des saisies du formulaire

        if (!preg_match("/^[0-9 ]{2,50}$/", $pages)) {
            throw new Exception("Nombres de pages invalide. Entrez un nombre");
        }
        // Ajout du livre avec les données validées

        if (addBook($titre, $auteur, $pages, $edition, $sortie, $synopsis, 'statics/images/upload/' . $fileName)) {
            header('Location: ?route=adminlivre');
            addMessage('livre ajouté !');
            exit;
        } else {
            throw new Exception("Erreur lors de l'ajout du livre.");
        }
    }
} catch (Exception $e) {
    // Capturer l'exception et afficher le message d'erreur
    addError($e->getMessage());
}

include __DIR__ . '/../vue/adminLivre.php';