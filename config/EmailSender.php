<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Cargar el archivo de autoloader de PHPMailer
require 'vendor/autoload.php';

class EmailSender
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com'; // Ajusta el servidor SMTP de Gmail
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'l.guadalupea@upam.edu.mx'; // Ajusta tu correo electrónico
        $this->mail->Password = 'LuisAntonio';
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = 587;
        $this->mail->setFrom('l.guadalupea@upam.edu.mx', 'Pruebas'); // Ajusta tu nombre y correo electrónico
        $this->mail->addReplyTo('l.guadalupea@upam.edu.mx', 'Pruebas'); // Ajusta tu nombre y correo electrónico
    }

    public function enviarCorreoUsuario($correo, $nombre, $password)
    {
        $asunto = "Información de cuenta";
        $mensaje = "Hola $nombre,\n\nTu cuenta ha sido creada con éxito.\n\nTu Usuario es: $correo\nTu Contraseña es: $password\n";

        $this->mail->addAddress($correo);
        $this->mail->Subject = $asunto;
        $this->mail->Body = $mensaje;
        echo json_encode(["message" => "Estamos en enviarCorreoUsuario."]);
        try {
            if ($this->mail->send()) {

                echo json_encode(["message" => "Correo enviado."]);
                return true; // Éxito al enviar el correo
            } else {

                echo json_encode(["message" => "Correo no enviado."]);
                return false; // Error al enviar el correo
            }
        } catch (Exception $e) {
            // Manejo de excepciones
            echo 'Error al enviar el correo: ' . $this->mail->ErrorInfo;
            return false;
        }
    }
}