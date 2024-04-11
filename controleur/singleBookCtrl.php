<?php
include __DIR__ . '/../modele/book.php';
include __DIR__ . '/../modele/comment.php';

try {
    if (isset($_GET['id'])) {
        $idLivre = $_GET['id'];
        // Récupérer les détails du livre spécifique à partir de l'ID
        $book = getBookDetails($idLivre);
        if (!$book) {
            throw new Exception("Livre non trouvé");
        }
    } else {
        throw new Exception("Livre non trouvé");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['commentId'])) {
        $commentId = intval($_POST['commentId']);
        // Appeler la fonction pour supprimer le commentaire
        if (deleteBookComment($commentId)) {
            // Suppression réussie, aucune action supplémentaire nécessaire
        } else {
            throw new Exception("Une erreur s'est produite lors de la suppression du commentaire.");
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['livreId'], $_POST['userId'], $_POST['message'])) {
            $livreId = intval($_POST['livreId']);
            $userId = intval($_POST['userId']);
            // Utiliser htmlspecialchars pour sécuriser le message
            $message = htmlspecialchars($_POST['message']);

            // Ajoutez un commentaire et vérifiez si l'opération a réussi
            if (!addBookComment($livreId, $userId, $message)) {
                throw new Exception("Une erreur s'est produite lors de l'ajout du commentaire.");
            }
        } else {
            throw new Exception("Veuillez entrer un message.");
        }
    }
} catch (Exception $e) {
    addError($e->getMessage());
}

include __DIR__ . '/../vue/singleBook.php';
