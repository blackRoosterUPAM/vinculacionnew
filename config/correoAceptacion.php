<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Cargar el archivo de autoloader de PHPMailer
require '../vendor/autoload.php';

 
   
    $destinatario = $_POST['destinatario'];
    $sede = $_POST['sede'];
    $aceptado = filter_var($_POST['aceptado'], FILTER_VALIDATE_BOOLEAN);

    
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Servidor SMTP externo (por ejemplo, Gmail)
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = 'd.hernandezj@upam.edu.mx';  // Tu dirección de correo
        $mail->Password = 'DA0402*@';        // Tu contraseña

        $mail->setFrom('d.hernandezj@upam.edu.mx', $sede);
        $mail->addAddress($destinatario);
        if ($aceptado == true) {
            # code...
            $mail->Subject = "Resultado de tu entrevista";
            $mail->Body = "Felicitaciones hemos confirmado tu aceptacion en nuestra sede";
           
        }
        else{
            $mail->Subject = "Resultado de tu entrevista";
            $mail->Body = "Agradecemos tu tiempo, pero no eres el perfil que buscamos.";           
        }
        $mail->CharSet = 'UTF-8';  // Configurar la codificación

        $mail->send();
        exit;
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }

