<?php include __DIR__ . "/headerView.php"; ?>

<h1>Inscription</h1>
<!-- formualire d'inscription -->
<form action="?route=inscription" method="post">
    <label for="pseudo">Pseudo :</label>
    <input type="text" id="pseudo" name="pseudo" placeholder="3 caractéres, lettres et chiffres uniquement" value="<?php if (isset($_POST['pseudo'])) {
        echo $_POST['pseudo'];
    } ?>"
        required>
    <label for="mail">Adresse email :</label>
    <input type="email" id="mail" name="mail" value="<?php if (isset($_POST['mail'])) {
        echo $_POST['mail'];
    } ?>" required>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password"
        placeholder="1 majuscule, 1 minuscule, 1 caractère spécial parmis : @$!%*?& et 1 chiffre taille min:8" required>
    <label for="rgpd"><a href="?route=mentions" class="rgpd">J'accepte les conditions générales d'utilisation du
            site</a>
        <input type="checkbox" id="rgpd" name="rgpd" required>
        <input type="submit" value="S'inscrire" class="btn">
</form>

<?php include __DIR__ . '/footerView.php'; ?>