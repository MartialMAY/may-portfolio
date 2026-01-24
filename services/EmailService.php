<?php
namespace Services;

class EmailService {
    private $adminEmail = "martialmay10@gmail.com";

    /**
     * Sends a professional notification to the admin when a new message is received.
     */
    public function sendAdminNotification($name, $email, $message) {
        $subject = "Nouveau Message: $name";
        
        // Format ultra-simplifié pour InfinityFree
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: Portfolio <contact@martialmay.gt.tc>" . "\r\n";
        $headers .= "Reply-To: $email" . "\r\n";

        $body = "
        <html>
        <body style='font-family: Arial, sans-serif;'>
            <h2 style='color: #2563eb;'>Nouveau message de : $name</h2>
            <p><strong>Email :</strong> $email</p>
            <p><strong>Message :</strong></p>
            <div style='background: #f4f4f4; padding: 15px; border-left: 4px solid #2563eb;'>
                " . nl2br(htmlspecialchars($message)) . "
            </div>
        </body>
        </html>";

        return mail($this->adminEmail, $subject, $body, $headers);
    }

    public function sendReply($userEmail, $subject, $replyMessage) {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: Martial MAYAMOU <contact@martialmay.gt.tc>" . "\r\n";

        $body = "<html><body>" . nl2br(htmlspecialchars($replyMessage)) . "</body></html>";

        return mail($userEmail, "RE: " . $subject, $body, $headers);
    }
}
