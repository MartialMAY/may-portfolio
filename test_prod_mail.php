<?php
header('Content-Type: text/html; charset=utf-8');

// Identifiants récupérés depuis votre EmailService
$to = "martialmay10@gmail.com";
$subject = "Test Final Production - Portfolio";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: Portfolio <contact@martialmay.gt.tc>" . "\r\n";

$message = "<html><body><h1>Test de fonctionnement</h1><p>Si vous voyez ceci, le code PHP a bien envoyé le mail au serveur InfinityFree.</p></body></html>";

echo "<h2>Test d'envoi d'email sur le serveur</h2>";
echo "Destinataire : <b>$to</b><br>";

if (mail($to, $subject, $message, $headers)) {
    echo "<p style='color:green; font-weight:bold;'>✅ RÉUSSITE : Le serveur a accepté l'email.</p>";
    echo "<p>Si vous ne le recevez pas dans les 5 minutes :
    <ul>
        <li>Vérifiez vos <b>Spams / Courriers Indésirables</b>.</li>
        <li>Notez que sur InfinityFree, la distribution du premier mail peut parfois prendre <b>jusqu'à 1 heure</b>.</li>
    </ul></p>";
} else {
    echo "<p style='color:red; font-weight:bold;'>❌ ÉCHEC : Le serveur InfinityFree a refusé l'envoi.</p>";
    echo "<p>Causes possibles :
    <ul>
        <li>La fonction mail() est temporairement saturée sur l'hébergement gratuit.</li>
        <li>L'adresse d'expédition doit être créée dans votre panel InfinityFree.</li>
    </ul></p>";
}
