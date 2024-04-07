<?php
include __DIR__ . '/dbConnect.php';

// Enregistrer un utilisateur dans la base de donnée
function createUser($pseudo, $mail, $password)
{
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }
    try {

        // Hasher le mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Préparer la requête SQL pour insérer un nouvel utilisateur
        $request = 'INSERT INTO utilisateur (pseudoU, mailU, mdpU) VALUES (:pseudo, :mail, :password)';
        $statement = $conn->prepare($request);
        $statement->execute(['pseudo' => $pseudo, 'mail' => $mail, 'password' => $hashedPassword]);
    } catch (PDOException $e) {
        addError("Erreur !: " . $e->getMessage());
    }
    // Vérifier si l'insertion a réussi
    return $statement->rowCount() === 1;
}


// Récupérer les infos d'un utilisateur grace à son pseudo
function getUserByPseudo($pseudo)
{

    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }
    try {
        $req = $conn->prepare("select * from utilisateur where pseudoU=:pseudo");
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        addError("Erreur !: " . $e->getMessage());
    }
    return $resultat;
}

// Permettre à l'utilisateur de mettre à jour son profil grace à son pseudo
function updateUserInfo($pseudo, $region, $description)
{
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }
    try {
        $req = $conn->prepare("UPDATE utilisateur SET region = :region, description = :description WHERE pseudoU = :pseudo");
        $req->bindValue(':region', $region, PDO::PARAM_STR);
        $req->bindValue(':description', $description, PDO::PARAM_STR);
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $success = $req->execute();

        return $success;
    } catch (PDOException $e) {
        addError("Erreur de base de donnée, veuillez réessayer ultérieurement.");
        return false;
    }
}

function deleteUser($pseudo)
{
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }
    try {
        $req = $conn->prepare("DELETE FROM utilisateur WHERE pseudoU = :pseudo");
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $success = $req->execute();

        return $success;
    } catch (PDOException $e) {
        addError("Erreur de base de donnée, veuillez réessayer ultérieurement.");
        return false;
    }
}


function getUsersWithRoles() {
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }

    try {
        $query = "SELECT id_utilisateur, pseudoU, mailU, role FROM utilisateur";
        $statement = $conn->query($query);
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $users;
    } catch (PDOException $e) {
        addError("Erreur de base de données : " . $e->getMessage());
        return false;
    }
}


function updateUserRole($userId, $newRole) {
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }

    try {
        // Vérifier si le nouveau rôle est valide (peut-être à faire dans le contrôleur)
        if (!in_array($newRole, ['Membre', 'Admin'])) {
            throw new Exception("Le nouveau rôle spécifié n'est pas valide.");
        }

        // Préparer et exécuter la requête de mise à jour du rôle de l'utilisateur
        $query = "UPDATE utilisateur SET role = :new_role WHERE id_utilisateur = :user_id";
        $statement = $conn->prepare($query);
        $statement->bindParam(':new_role', $newRole, PDO::PARAM_STR);
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $success = $statement->execute();

        // Retourner true si la mise à jour a réussi, sinon false
        return $success;
    } catch (PDOException $e) {
        addError("Erreur de base de données : " . $e->getMessage());
        return false;
    } catch (Exception $e) {
        addError($e->getMessage());
        return false;
    }
}