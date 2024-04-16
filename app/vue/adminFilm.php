<?php include __DIR__ . '/headerView.php'; 
?>

<h1>Ajouter un film</h1>

<!-- formulaire d'ajout d'un film -->
<form action="?route=adminfilm" method="POST" enctype="multipart/form-data">
    <label for="titre">Titre : </label>
    <input type="text" id="titre" name="titre" value= "<?php if (isset($_POST['titre'])){echo $_POST['titre'];}?>" required>
    <label for="acteur">Acteurs : </label>
    <textarea name="acteur" id="acteur" cols="30" rows="10"><?php if (isset($_POST['acteur'])){echo $_POST['acteur'];}?></textarea>
    <label for="tmdb">Id Tmdb : </label>
    <input type="text" id="tmdb" name="tmdb" placeholder="A récuperer sur le site TMDB" value= "<?php if (isset($_POST['tmdb'])){echo $_POST['tmdb'];}?>" required>
    <label for="affiche">Fichier (Dimensions recommandées 300 x 450 )</label>
    <input type="file" id="affiche" name="affiche">
    <input type="submit" value="ajouter" class="btn">
</form>




<?php include __DIR__ . '/footerView.php'; ?>