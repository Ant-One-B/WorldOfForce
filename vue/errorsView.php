

<?php if (!empty($errors)) {
    echo "<div class='errorMessages'>";
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
    echo "</div>";
}