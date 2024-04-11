<?php include __DIR__ . '/headerView.php'; ?>


<form action="?route=modifierprofil" method="post">
    <label for="region">Région :</label>
    <input type="text" id="region" name="region" value="<?= $util['region'] ?>">
    <label for="description">Description :</label>
    <textarea id="description" name="description"><?= $util['description'] ?></textarea>
    <button type="submit" class="btn">Mettre à jour</button>
</form>

<?php include __DIR__ . '/footerView.php'; ?>