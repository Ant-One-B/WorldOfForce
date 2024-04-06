<?php
include __DIR__ . '/../modele/movie.php';

try {
    // Vérification si la requête est de type POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifier si un fichier a été envoyé
        if (!isset($_FILES['affiche']) || !is_uploaded_file($_FILES['affiche']['tmp_name'])) {
            throw new Exception("Aucun fichier n'a été téléchargé.");
        }

        // Dossier de téléchargement
        $uploadDir = __DIR__ . '/../statics/images/upload/';

        // Nom du fichier téléchargé
        $fileName = basename($_FILES['affiche']['name']);

        // Chemin complet du fichier téléchargé
        $uploadFile = $uploadDir . $fileName;

        // Extension du fichier
        $fileExtension = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

        // Taille maximale autorisée (en octets)
        $maxFileSize = 150 * 1024; // 150 Ko


        // Types de fichiers autorisés
        $allowedFileTypes = ['jpg', 'jpeg', 'png', 'gif'];

        // Vérifier si le fichier a été téléchargé avec succès
        if ($_FILES['affiche']['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Erreur lors du téléchargement du fichier.");
        }

        // Vérifier la taille du fichier
        if ($_FILES['affiche']['size'] > $maxFileSize) {
            throw new Exception("Le fichier n'a pas une taille valide : 150ko maximum.");
        }

        // Vérifier le type de fichier
        if (!in_array($fileExtension, $allowedFileTypes)) {
            throw new Exception("Type de fichier non autorisé.");
        }

        // Vérifier si le fichier est une image réelle
        if (!getimagesize($_FILES['affiche']['tmp_name'])) {
            throw new Exception("Le fichier n'est pas une image valide.");
        }

        // Si toutes les validations sont passées avec succès, déplacer le fichier téléchargé vers le dossier de destination
        if (!move_uploaded_file($_FILES['affiche']['tmp_name'], $uploadFile)) {
            throw new Exception("Erreur lors de l'upload du fichier.");
        }

        // Récupération des données soumises via le formulaire
        $titre = htmlspecialchars($_POST['titre'] ?? '');
        $acteur = htmlspecialchars($_POST['acteur'] ?? '');
        $tmdb = htmlspecialchars($_POST['tmdb'] ?? '');

        // Vérification des saisies du formulaire
        if (preg_match("/[<>{}[\]\/\\\\]/", $titre)) {
            throw new Exception("Titre invalide. Le titre ne doit pas contenir les caractères suivants : < > { } [ ] / \\");
        }
        if (preg_match("/^[^0-9><{\[\]}\//]+$/", $acteur)) {
            throw new Exception("Acteur invalide. L'acteur ne doit pas contenir de chiffres ou les caractères spéciaux suivants : ><{[\]}/.");
        }
        if (!preg_match("/^[0-9 ]{2,50}$/", $tmdb)) {
            throw new Exception("Référence tmdb invalide. La référence doit être un nombre");
        }

        // Ajout du film avec les données validées
        addMovie($titre, $acteur, $tmdb, 'statics/images/upload/' . $fileName);
    }
} catch (Exception $e) {
    // Capturer l'exception et afficher le message d'erreur
    addError($e->getMessage());
}

include __DIR__ . '/../vue/adminFilm.php';