<?php 
include __DIR__ . '/../modele/movie.php';
include __DIR__ . '/../modele/comment.php';

try {
    if (isset($_GET['ref'])) {
        $ref_tmdb = $_GET['ref'];
        // Récupérer les détails du film en fonction de la référence TMDB
        $movie = getMovieDetails($ref_tmdb);
        if (!$movie) {
            throw new Exception("Film non trouvé");
        }
    } else {
        throw new Exception("Film non trouvé");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['commentId'])) {
        $commentId = intval($_POST['commentId']);
        // Appeler la fonction pour supprimer le commentaire
        if (deleteMovieComment($commentId)) {
            addMessage('Commentaire supprimé !');
            // Suppression réussie, aucune action supplémentaire nécessaire
        } else {
            throw new Exception("Une erreur s'est produite lors de la suppression du commentaire.");
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['filmId'], $_POST['userId'], $_POST['message'])) {
            $filmId = intval($_POST['filmId']); 
            $userId = intval($_POST['userId']);
            // Utiliser htmlspecialchars pour sécuriser le message 
            $message = htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8');

            // Ajouter un commentaire et vérifier si l'opération a réussi
            if (!addMovieComment($filmId, $userId, $message)) {
                throw new Exception("Une erreur s'est produite lors de l'ajout du commentaire.");
            }else {
                addMessage('Commentaire posté !');
            }
        } else {
            throw new Exception("Veuillez entrer un message.");
        }
    }
} catch (Exception $e) {
    addError($e->getMessage());
}

include __DIR__ . '/../vue/singleMovie.php';

