<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Cargar el archivo de autoloader de PHPMailer
require '../vendor/autoload.php';


//Datos para todos los posibles correos
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
$fecha = $_POST['fecha'];
$entrevistador = $_POST['entrevistador'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$destinatario = $_POST['destinatario'];
$sede = $_POST['sede'];
//datos del alumno
$alumno = $_POST['alumno'];
$matricula = $_POST['matricula'];
$respuestaSede = $_POST['respuestaSede'];
$tipoCorreo = $_POST['tipoCorreo'];

//Una variable para enviar correo
$mail = new PHPMailer(true);


try {
    //Creacion de correo
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Servidor SMTP externo (por ejemplo, Gmail)
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'd.hernandezj@upam.edu.mx';  // Tu dirección de correo
    $mail->Password = '';        // Tu contraseña
    //Datos de envio-->esperar correo 
    //Correo para el alumno
    $mail->setFrom('d.hernandezj@upam.edu.mx', $sede);
    $mail->addAddress($destinatario);

    switch ($tipoCorreo) {
        case 'aceptado':
            # code...
            $mail->Subject = $asunto;
            $mail->Body = $mensaje . "\n" . ' Ubicados en: ' . $direccion . "\n" . "Con entrevistador: " . $entrevistador . "\n" . " Número de contacto: " . $telefono . "\n" . "El día con hora: " . $fecha;

            break;
        case 'rechazado':
            # code...
            $mail->Subject = "Respuesta a tu postulación en " . $sede;
            $mail->Body = "Lo sentimos, agradecemos tu tiempo, pero no eres el perfil que buscamos.";
            break;
        default:
            # code...
            break;
    }

    //Activamos caracteres de latinos
    $mail->CharSet = 'UTF-8';
    //Enviamos correo
    $mail->send();

    //Limpiamos y preparamos el segundo correo
    $mail->clearAddresses();  // Limpiar d  irecciones antes de enviar otro correo
    $mail->setFrom('d.hernandezj@upam.edu.mx', $sede);
    // Enviar correo a la dirección 'vinculacion@p.com'
    $mail->addAddress('dieguitohernan68@gmail.com');
    // Cambiar el mensaje para la dirección 'vinculacion@p.com'
    $mail->Subject = "Respuesta a postulación del alumno";
    $mail->Body = "El alumno: " . $alumno . ", con matricula: " . $matricula . ", este alumno fue: " . $respuestaSede . ", por la sede: " . $sede;
    //Activamos caracteres de latinos
    $mail->CharSet = 'UTF-8';
    // Configurar la codificación
    $mail->send();
    //Correo para el wey de vinculacion
    
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}
