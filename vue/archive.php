<?php include __DIR__ . '/headerView.php'; ?>

<h1>Archive des messages</h1>

<?php
// Utilisation d'un foreach pour afficher tout les messages, chaque message sera dans une div différente ayant la même classe.
if ($messages && count($messages) > 0) {
    foreach ($messages as $message) {
        $formatted_date = date('d/m/Y', strtotime($message['dateF']));

        echo "<div class='archive'> ";
        echo "<p><strong>Date :</strong> " . $formatted_date . "</p>";
        echo "<p><strong>Expéditeur :</strong> " . $message['mailF'] . "</p>";
        echo "<p><strong>Objet :</strong> " . $message['objetF'] . "</p>";
        echo "<p><strong>Message :</strong> " . $message['messageF'] . "</p>";
        echo "</div>";
    }
} else {
    echo "<div class='archive'> ";
    echo "<p>Aucun message à afficher.</p>";
    echo "</div>";
}
?>

<?php include __DIR__ . '/footerView.php'; ?>