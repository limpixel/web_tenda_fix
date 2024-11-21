<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailerService
{
    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        // Ambil konfigurasi dari .env
        $this->mail->isSMTP();
        $this->mail->Host       = env('MAIL_HOST', 'smtp.example.com');
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = env('MAIL_USERNAME');
        $this->mail->Password   = env('MAIL_PASSWORD');
        $this->mail->SMTPSecure = env('MAIL_ENCRYPTION', 'tls');
        $this->mail->Port       = env('MAIL_PORT', 587);       
    }

    public function sendMail($to, $subject, $body, $fromAddress = null, $fromName = null)
    {
        try {
            // Jika $fromAddress atau $fromName kosong, gunakan default dari .env
            $this->mail->setFrom(
                $fromAddress ?? env('MAIL_FROM_ADDRESS'),
                $fromName ?? env('MAIL_FROM_NAME')
            );

            $this->mail->addAddress($to);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}
