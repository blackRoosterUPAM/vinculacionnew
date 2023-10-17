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
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Servidor SMTP externo (por ejemplo, Gmail)
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = 'd.hernandezj@upam.edu.mx';  // Tu dirección de correo
        $mail->Password = '';        // Tu contraseña

        $mail->setFrom('d.hernandezj@upam.edu.mx', 'SEDE');
        $mail->addAddress($destinatario);
        $mail->Subject = $asunto;
        if ($rechazado) {
            $mail->Subject = "Respuesta a tu postulación";
            $mail->Body = "Fuiste rechazado por bot, cuenta comprada, manco de hijo de postulación";
        } else {
            $mail->Body = $mensaje . "\n" . ' ubicados en: ' . $direccion . "\n" . "con entrevistador: " . $entrevistador . "\n" . " numero de contacto: " . $telefono;
        }

        $mail->CharSet = 'UTF-8';  // Configurar la codificación

        $mail->send();
        exit;
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}
