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

            $mail->setFrom('l.guadalupea@upam.edu.mx', ' VALIDACION DE DOCUMENTACION ');
            $mail->addAddress($correoDestinatario);
            $mail->addReplyTo('l.guadalupea@upam.edu.mx', 'CARACTER URGENTE'); // Ajusta tu nombre y correo electrónico
            $mail->Subject = 'Documento invalido';
            $mail->Body = 'Hola que tal, adjunto este correo para informarte que el documento ' .$tipoD. ' no es valido, para resolver tus dudas, acude con tu PTC';
            $mail->CharSet = 'UTF-8';  // Configurar la codificación

            $mail->send();
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
        }
    }

?>