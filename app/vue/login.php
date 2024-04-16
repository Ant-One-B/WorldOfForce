<?php include __DIR__ . '/headerView.php'; ?>


<h1>Connexion</h1>
<!-- formulaire de connexion -->
<form action="?route=connexion" method="post">
    <label for="pseudo">Pseudo :</label>
    <input type="text" id="pseudo" name="pseudo" required>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>
    <input type="submit" value="Se connecter" class="btn">
</form>

<div id="connect">
    <a href="?route=inscription" class="btn"> pas encore de compte ?</a>
</div>

<?php include __DIR__ . '/footerView.php'; ?>