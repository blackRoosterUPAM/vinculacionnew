<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Cargar el archivo de autoloader de PHPMailer
require '../vendor/autoload.php';

class EmailSender {
    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com'; // Ajusta el servidor SMTP de Gmail
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'l.guadalupea@upam.edu.mx'; // Ajusta tu correo electrónico
        $this->mail->Password = 'LuisRaul03'; // Ajusta tu contraseña
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = 587;
        $this->mail->setFrom('l.guadalupea@upam.edu.mx', 'Luis Antonio'); // Ajusta tu nombre y correo electrónico
        $this->mail->addReplyTo('l.guadalupea@upam.edu.mx', 'Luis Antonio'); // Ajusta tu nombre y correo electrónico
    }

    public function enviarCorreo($destinatario, $asunto, $mensaje) {
        $this->mail->addAddress($destinatario);
        $this->mail->Subject = $asunto;
        $this->mail->Body = $mensaje;

        if ($this->mail->send()) {
            return true; // Éxito al enviar el correo
        } else {
            return false; // Error al enviar el correo
        }
    }
}