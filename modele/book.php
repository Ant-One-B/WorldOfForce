<?php 
include __DIR__ . "/dbConnect.php";

// ajouter un livre
function addBook($titre, $auteur, $pages, $edition, $sortie, $synopsis, $couverture) {
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }

    try {
        // préparation de la requête
        $request = 'INSERT INTO livre (titreL, auteurL, nbrPagesL, editionL, sortieL, synopsisL, couvertureL) VALUES (:titreL, :auteurL, :nbrPagesL, :editionL, :sortieL, :synopsisL, :couvertureL)';
        $statement = $conn->prepare($request);
        $statement->execute(['titreL' => $titre, 'auteurL' => $auteur, 'nbrPagesL' => $pages, 'editionL' => $edition, 'sortieL' => $sortie, 'synopsisL' => $synopsis, 'couvertureL' => $couverture]);

        // Récupérer l'ID du livre inséré
        $id_livre = $conn->lastInsertId();

        // Mettre à jour la colonne idS avec la même valeur que id_livre
        $updateRequest = 'UPDATE livre SET idS = :id_livre WHERE id_livre = :id_livre';
        $updateStatement = $conn->prepare($updateRequest);
        $updateStatement->execute(['id_livre' => $id_livre]);

        return true;
    } catch (PDOException $e) {
        addError("Erreur de base de données : " . $e->getMessage());
        return false;
    }
}
   
// Fonction pour récupérer tous les livres de la base de données
function getAllBooksCover() {
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }
    try {
        // récupération de l'id, du titre et de la couverture des livres
        $query = "SELECT id_livre, titreL, couvertureL FROM livre";
        $statement = $conn->prepare($query);
        $statement->execute();
        // rangé sous forme de tableau
        $books = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $books;
    } catch (PDOException $e) {
        addError("Erreur de base de données : " . $e->getMessage());
        return false;
    }
}


// Fonction de récupération de tout les détails de livre
function getBookDetails($id_livre) {
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }
    try {
        //on récupére tout depuis la base de donné
        $query = "SELECT * FROM livre WHERE id_livre = :id";
        $statement = $conn->prepare($query);
        $statement->execute(['id' => $id_livre]);
        // rangé sous forme de tableau
        $book = $statement->fetch(PDO::FETCH_ASSOC);
        return $book;
    } catch (PDOException $e) {
        addError("Erreur de base de données : " . $e->getMessage());
        return false;
    }
}