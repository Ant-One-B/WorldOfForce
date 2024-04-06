<?php include_once __DIR__ . '/headerView.php'; 
?>

<h1>Ajouter un film</h1>

<!-- formulaire d'ajout d'un film -->
<form action="?route=adminfilm" method="POST" enctype="multipart/form-data">
    <label for="titre">Titre : </label>
    <input type="text" id="titre" name="titre" required>
    <label for="acteur">Acteurs : </label>
    <textarea name="acteur" id="acteur" cols="30" rows="10"></textarea>
    <label for="tmdb">Id Tmdb : </label>
    <input type="text" id="tmdb" name="tmdb" required>
    <label for="affiche">Fichier</label>
    <input type="file" id="affiche" name="affiche">
    <input type="submit" value="ajouter" class="btn">
</form>




<?php include_once __DIR__ . '/footerView.php'; ?>