<?php include_once __DIR__ . '/headerView.php'; ?>



<h1>Bienvenue sur wolrd of force</h1>
<!-- pop-up des cookies -->
<section id="cookiePopup" class="popup">
    <div class="popupContent">
        <h2>Consentement aux cookies</h2>
        <p>Nous utilisons des cookies pour améliorer votre expérience sur notre site. En continuant à utiliser notre
            site, vous acceptez <a href="?route=mentions">notre utilisation des cookies</a>.</p>
        <form id="cookieForm" method="POST">
            <button type="submit" name="acceptCookies" id="acceptCookiesBtn">Accepter les cookies</button>
        </form>
    </div>
</section>

<!-- texte déroulant -->
<section class="position">
    <div class="starWarsIntro">

        <p class="introText">
            Il y a bien longtemps, dans une galaxie lointaine,
            très lointaine...
        </p>


        <h2 class="mainLogo">
            <img src="statics/images/logos/logowof05.png" alt="Logo world of force">
        </h2>


        <div class="mainContent">
            <div class="titleContent">
                <p class="contentHeader">World of force</p>
                <br>
                <p class="contentBody">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo
                    nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit
                    porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat
                    euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id
                    ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at
                    convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam
                    sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat
                    in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus.
                    Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus
                    pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum
                    consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi
                    vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Carousel -->

<section class="saga">
    <h2>La saga principale</h2>
<div class="carouselContainer">
    <div class="carousel">

        <div class="carouselInner">
            <img src="statics/images/upload/episodeI.jpg" alt="Star wars la menace fantome">
            <img src="statics/images/upload/episodeII.jpg" alt="Star wars l'attaque des clones">
            <img src="statics/images/upload/episodeIII.jpg" alt="star wars la revanche des siths">
            <img src="statics/images/upload/episodeIV.jpg" alt="Star wars un nouvel espoir">
            <img src="statics/images/upload/episodeV.jpg" alt="Star wars l'empire contre-attaque">
            <img src="statics/images/upload/episodeVI.jpg" alt="Star wars le retour du jedi">
            <img src="statics/images/upload/episodeVII.jpg" alt="Star wars le reveil de la force">
            <img src="statics/images/upload/episodeVIII.jpg" alt="Star wars les dernier jedi">
            <img src="statics/images/upload/episodeIX.jpg" alt="Star wars l'ascension de Skywalker">
        </div>
        <div class="controls">
            <button class="prev">précédent</button>
            <button class="next">suivant</button>
        </div>
    </div>
</div>
</section>
<!-- call to action -->
<div class='cta'>
    <a href="?route=films">
        <p class="btn">Envie de découvrir les films ?</p>
    </a>
    <a href="?route=series">
        <p class="btn">Envie de découvrir les séries ?</p>
    </a>
    <a href="?route=livres">
        <p class="btn">Envie de découvrir les livres ?</p>
    </a>
    <a href="?route=contact">
        <p class="btn">Nous contacter</p>
    </a>

</div>
<?php include_once __DIR__ . '/footerView.php'; ?>