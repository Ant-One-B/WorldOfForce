<?php include __DIR__ . '/headerView.php'; ?>

<h1>Ajouter un livre</h1>

<!-- Formulaire d'ajout d'un livre -->
<form action="?route=adminlivre" method="POST" enctype="multipart/form-data">
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre" value= "<?php if (isset($_POST['titre'])){echo $_POST['titre'];}?>" required>
    <label for="auteur">Auteur :</label>
    <input type="text" id="auteur" name="auteur" value= "<?php if (isset($_POST['auteur'])){echo $_POST['auteur'];}?>" required>
    <label for="pages">Nombre de pages:</label>
    <input type="text" id="pages" name="pages" value= "<?php if (isset($_POST['pages'])){echo $_POST['pages'];}?>" required>
    <label for="sortie">Date de sortie :</label>
    <input type="date" id="sortie" name="sortie" value= "<?php if (isset($_POST['sortie'])){echo $_POST['sortie'];}?>" required>
    <label for="edition">Edition :</label>
    <input type="text" id="edition" name="edition" value= "<?php if (isset($_POST['edition'])){echo $_POST['edition'];}?>" required>
    <label for="synopsis">Synopsis :</label>
    <textarea name="synopsis" id="synopsis" cols="30" rows="10"><?php if (isset($_POST['synopsis'])){echo $_POST['synopsis'];}?></textarea>
    <label for="couverture">Fichier (Dimensions recommandées 300 x 450 )</label>
    <input type="file" id="couverture" name="couverture">
    <input type="submit" value="ajouter" class="btn">
</form>




<?php include __DIR__ . '/footerView.php'; ?>