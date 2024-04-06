<?php include_once __DIR__ . '/headerView.php'; ?>

<h1>Ajouter un livre</h1>

<!-- Formulaire d'ajout d'un livre -->
<form action="?route=adminlivre" method="POST" enctype="multipart/form-data">
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre" required>
    <label for="auteur">Auteur :</label>
    <input type="text" id="auteur" name="auteur" required>
    <label for="pages">Nombre de pages:</label>
    <input type="text" id="pages" name="pages" required>
    <label for="sortie">Date de sortie :</label>
    <input type="date" id="sortie" name="sortie" required>
    <label for="edition">Edition :</label>
    <input type="text" id="edition" name="edition" required>
    <label for="synopsis">Synopsis :</label>
    <textarea name="synopsis" id="synopsis" cols="30" rows="10"></textarea>
    <label for="couverture">Fichier</label>
    <input type="file" id="couverture" name="couverture">
    <input type="submit" value="ajouter" class="btn">
</form>




<?php include_once __DIR__ . '/footerView.php'; ?>