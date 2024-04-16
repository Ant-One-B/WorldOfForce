<?php
include __DIR__ . '/../modele/show.php';
include __DIR__ . '/../modele/comment.php';

try {
    if (isset($_GET['ref'])) {
        $refTmdb = $_GET['ref'];
        // Récupérer les détails du film spécifique à partir de la ref_tmdb
        $show = getShowDetails($refTmdb);
        if (!$show) {
            throw new Exception('Série non trouvée');
        }
    } else {
        throw new Exception('Série non trouvée');
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['commentId'])) {
        $commentId = intval($_POST['commentId']);
        // Appeler la fonction pour supprimer le commentaire
        if (deleteShowComment($commentId)) {
            addMessage('Commentaire supprimé !');
            // Suppression réussie, aucune action supplémentaire nécessaire
        } else {
            throw new Exception("Une erreur s'est produite lors de la suppression du commentaire.");
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['serieId'], $_POST['userId'], $_POST['message'])) {
            $serieId = intval($_POST['serieId']);
            $userId = intval($_POST['userId']);
            // Utiliser htmlspecialchars pour sécuriser le message 
            $message = htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8');

            // Ajoutez un commentaire et vérifiez si l'opération a réussi
            if (!addShowComment($serieId, $userId, $message)) {
                throw new Exception("Une erreur s'est produite lors de l'ajout du commentaire.");
            } else {
                addMessage('Commentaire posté !');
            }
        } else {
            throw new Exception("Veuillez entrer un message.");
        }
    }
} catch (Exception $e) {
    addError($e->getMessage());
}

include __DIR__ . '/../vue/singleShow.php';