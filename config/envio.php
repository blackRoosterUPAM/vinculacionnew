<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Cargar el archivo de autoloader de PHPMailer
require '../vendor/autoload.php';

$rechazado = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['boton_enviar'])) {
        $rechazado = true;
        // El botón "Enviar" se ha presionado
        // Realiza la acción que desees aquí
    }
    if (isset($_POST['boton_enviar'])) {
        $rechazado = true;
        // El botón "Enviar" se ha presionado
        // Realiza la acción que desees aquí
    }

   echo '<script type="text/javascript>console.log('.$rechazado.' )</script>';
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];
    $fecha = $_POST['fecha'];
    $entrevistador = $_POST['entrevistador'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $destinatario = $_POST['destinatario'];
    $sede = $_POST['sede'];
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
        $mail->Subject = $asunto;
        if ($rechazado) {
            $mail->Subject = "Respuesta a tu postulación";
            $mail->Body = "Lo sentimos, agradecemos tu tiempo, pero no eres el perfil que buscamos.";
        } else {
            $mail->Body = $mensaje . "\n" . ' Ubicados en: ' . $direccion . "\n" . "Con entrevistador: " . $entrevistador . "\n" . " Número de contacto: " . $telefono. "\n" . "El día con hora: " . $fecha;
        }

        $mail->CharSet = 'UTF-8';  // Configurar la codificación

        $mail->send();
        exit;
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}
