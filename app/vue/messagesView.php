<?php if (!empty($errors)) {
    echo "<div class='errorMessages'>";
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
    echo "</div>";
}
if (!empty($mess)) {
    echo "<div class='showMessages'>";
    foreach ($mess as $message) {
        echo "<p>$message</p>";
    }
    echo "</div>";
}