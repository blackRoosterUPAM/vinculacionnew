<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

     function enviarCorreo($correoDestinatario, $contrasena, $tipoD) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Servidor SMTP externo (por ejemplo, Gmail)
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = 'l.guadalupea@upam.edu.mx';
            $mail->Password = 'LuisAntonio';
            //$mail->Username = 'e.velazquezl@upam.edu.mx';  // Tu dirección de correo
            //$mail->Password = 'antonio123';        // Tu contraseña

            $mail->setFrom('l.guadalupea@upam.edu.mx', ' DATOS DE ACCESO ');
            $mail->addAddress($correoDestinatario);
            $mail->addReplyTo('l.guadalupea@upam.edu.mx', 'Prueba Omitir'); // Ajusta tu nombre y correo electrónico
            $mail->Subject = 'Documento invalido';
            $mail->Body = 'Hola que tal, adjunto este correo para informar que el documento ' .$tipoD. ' no es valido, para resolver tus dudas, acude a Vinculación';
            $mail->CharSet = 'UTF-8';  // Configurar la codificación

            $mail->send();
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
        }
    }

?>