<?php
namespace App\Services;

class EmailService {
    private $adminEmail;
    private $fromEmail;
    private $fromName;

    public function __construct() {
        $this->adminEmail = getenv('MAIL_ADMIN') ?: "martialmay10@gmail.com";
        $this->fromEmail = getenv('MAIL_FROM') ?: "contact@martialmay.gt.tc";
        $this->fromName = getenv('MAIL_FROM_NAME') ?: "Portfolio Portfolio";
    }

    /**
     * Get shared headers for all emails.
     */
    private function getHeaders($replyTo = null) {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: " . $this->fromName . " <" . $this->fromEmail . ">" . "\r\n";
        if ($replyTo) {
            $headers .= "Reply-To: $replyTo" . "\r\n";
        }
        $headers .= "X-Mailer: PHP/" . phpversion();
        return $headers;
    }

    /**
     * Sends a professional notification to the admin when a new message is received.
     */
    public function sendAdminNotification($name, $email, $message) {
        $subject = "Nouveau Message de $name";
        $headers = $this->getHeaders($email);

        $body = "
        <html>
        <body style='font-family: Arial, sans-serif; color: #333;'>
            <div style='max-width: 600px; margin: 20px auto; border: 1px solid #eee; padding: 20px; border-radius: 10px;'>
                <h2 style='color: #2563eb; border-bottom: 2px solid #2563eb; padding-bottom: 10px;'>Nouveau message via Portfolio</h2>
                <p><strong>Nom :</strong> " . htmlspecialchars($name) . "</p>
                <p><strong>Email :</strong> " . htmlspecialchars($email) . "</p>
                <p><strong>Message :</strong></p>
                <div style='background: #f9f9f9; padding: 20px; border-left: 4px solid #2563eb; font-style: italic;'>
                    " . nl2br(htmlspecialchars($message)) . "
                </div>
                <hr style='border: 0; border-top: 1px solid #eee; margin: 20px 0;'>
                <p style='font-size: 10px; color: #999;'>Envoyé le " . date('d/m/Y à H:i') . " depuis votre Portfolio.</p>
            </div>
        </body>
        </html>";

        return mail($this->adminEmail, $subject, $body, $headers);
    }

    /**
     * Sends a reply to the user.
     */
    public function sendReply($userEmail, $subject, $replyMessage) {
        $headers = $this->getHeaders();
        $body = "
        <html>
        <body style='font-family: Arial, sans-serif; color: #333;'>
            <div style='max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #eee; border-radius: 10px;'>
                <div style='margin-bottom: 20px; line-height: 1.6;'>
                    " . nl2br(htmlspecialchars($replyMessage)) . "
                </div>
                <hr style='border: 0; border-top: 1px solid #eee; margin: 20px 0;'>
                <p style='font-size: 12px; color: #666;'>Cordialement,<br><strong>Martial MAYAMOU</strong></p>
            </div>
        </body>
        </html>";

        return mail($userEmail, "RE: " . $subject, $body, $headers);
    }
}
