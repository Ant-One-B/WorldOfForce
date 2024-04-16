<?php include __DIR__ . '/headerView.php'; ?>

<h1>nous contacter</h1>

<form action="?route=contact" method="POST">
    <label for="mail">Votre email</label>
    <input type="email" id="mail" name="mail" placeholder="exemple@exemple.fr"
        value="<?php if (isset($_POST['email'])) {
            echo $_POST['email'];
        } ?>" required>
    <label for="objet">Objet</label>
    <input type="text" id="objet" name="objet" placeholder="Objet"
        value="<?php if (isset($_POST['objet'])) {
            echo $_POST['objet'];
        } ?>" required>
    <label for="message">Message</label>
    <textarea name="message" id="message" cols="30"
        rows="10"><?php if (isset($_POST['message'])) {
            echo $_POST['message'];
        } ?></textarea>
    <label for="rgpd"><a href="?route=mentions" class="rgpd">J'accepte les conditions générales d'utilisation du site
        </a>
        <input type="checkbox" id="rgpd" name="rgpd" required>
    </label>
    <input type="submit" value="envoyer" class="btn">
</form>






<?php include __DIR__ . '/footerView.php'; ?>