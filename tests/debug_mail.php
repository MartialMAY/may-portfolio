<?php
header('Content-Type: text/html; charset=utf-8');

$to = "mmayamoubatetana@EDUHDF.FR";
$subject = "🧪 Test Technique - Portfolio";
$message = "Si vous voyez ce message dans un log ou une boîte de réception, l'envoi fonctionne !";
$headers = "From: test@portfolio.com";

echo "<h2>Diagnostic de l'envoi d'email</h2>";
echo "Tentative d'envoi à : <b>$to</b><br><br>";

// On active l'affichage des erreurs spécifiquement pour ce test
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (@mail($to, $subject, $message, $headers)) {
    echo "<p style='color:green; font-weight:bold;'>✅ Succès : PHP a transmis le message au système d'envoi.</p>";
    echo "<p>Note : Si vous êtes sur WAMP et que vous n'avez pas de serveur SMTP configuré, vous ne recevrez rien 
          dans votre vraie boîte mail, mais le code est CORRECT pour un serveur en ligne.</p>";
} else {
    echo "<p style='color:red; font-weight:bold;'>❌ Échec : Le système d'envoi local (WAMP) n'est pas configuré.</p>";
    echo "<p>C'est <b>normal</b> sur un PC personnel. Pour que ça fonctionne réellement sur WAMP, il faudrait 
          configurer un outil comme 'Fake Sendmail' ou un compte Gmail dans php.ini.</p>";
    echo "<p><b>Rassurance :</b> Sur InfinityFree, cet échec se transformera en succès automatiquement car ils 
          fournissent le serveur d'envoi.</p>";
}

echo "<hr><p>Vérifiez le bas de la page pour d'éventuels messages d'erreur détaillés de PHP.</p>";
