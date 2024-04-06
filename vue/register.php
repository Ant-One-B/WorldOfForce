<?php include_once __DIR__ . "/headerView.php"; ?>

<h1>Inscription</h1>
<!-- formualire d'inscription -->
<form action="?route=inscription" method="post">
    <label for="pseudo">Pseudo :</label>
    <input type="text" id="pseudo" name="pseudo" required>
    <label for="mail">Adresse email :</label>
    <input type="email" id="mail" name="mail" required>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>
    <label for="rgpd"><a href="?route=mentions" class="rgpd">J'accepte les conditions générales d'utilisation du
            site</a>
        <input type="checkbox" id="rgpd" name="rgpd" required>
        <input type="submit" value="S'inscrire" class="btn">
</form>

<?php include_once __DIR__ . '/footerView.php'; ?>