<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération et sécurisation des données
    $nom = htmlspecialchars(trim($_POST['nom']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $telephone = htmlspecialchars(trim($_POST['telephone']));
    $type_session = htmlspecialchars(trim($_POST['type_session']));
    $date = htmlspecialchars(trim($_POST['date']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!$email) {
        die("aaron.payet@yahoo.fr.");
    }

    // Préparation de l'email
    $to = "aaron.payet@yahoo.fr";
    $subject = "Nouvelle réservation de $nom";
    $body = "
Nom: $nom
Email: $email
Téléphone: $telephone
Type de session: $type_session
Date: $date
Message: $message
    ";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envoi sécurisé
    if (mail($to, $subject, $body, $headers)) {
        echo "<p>Merci $nom, votre demande a été envoyée avec succès !</p>";
    } else {
        echo "<p>Une erreur est survenue. Merci de réessayer plus tard.</p>";
    }
} else {
    echo "<p>Formulaire invalide.</p>";
}
?>