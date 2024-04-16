</main>
<footer>
    <nav class="menuF">
        <figure>
            <a href="?route=accueil"> <img src="statics/images/logos/logowof02.png" alt="Logo world of Force"></a>
        </figure>
        <div class="menuL">
            <ul class="menuFP">
                <li><a href="?route=mentions">mentions légales</a></li>
            </ul>
            <ul class="menuFS">
                <!-- vérification du role, si admin les archives sont visibles -->
                <?php if (isset($_SESSION["role"]) && $_SESSION["role"] === "Admin"): ?>
                    <li><a href="?route=archive">archives</a></li>
                    <li><a href="?route=users">membres</a></li>
                <?php endif; ?>
            </ul>

        </div>

    </nav>

</footer>
</body>

</html>