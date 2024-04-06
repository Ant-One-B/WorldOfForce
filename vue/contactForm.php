<?php include_once __DIR__ . '/headerView.php'; ?>

<h1>nous contacter</h1>

<form action="?route=contact" method="POST">
    <label for="mail">Votre email</label>
    <input type="email" id="mail" name="mail" placeholder="exemple@exemple.fr" required>
    <label for="objet">objet</label>
    <input type="text" id="objet" name="objet" placeholder="Objet" required>
    <label for="message">Message</label>
    <textarea name="message" id="message" cols="30" rows="10"></textarea>
    <label for="rgpd"><a href="?route=mentions" class="rgpd">J'accepte les conditions générales d'utilisation du site
        </a>
        <input type="checkbox" id="rgpd" name="rgpd" required>
    </label>
    <input type="submit" value="envoyer" class="btn">
</form>






<?php include_once __DIR__ . '/footerView.php'; ?>