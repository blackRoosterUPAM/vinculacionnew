<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

function enviarCorreo($correoDestinatario, $contrasena)
{
    //datos del alumno
    $alumno = $_POST['nombre_alumno'];
    $apellidoP =$_POST['$apellidoP'];
    $apellidoM =$_POST['$apellidoM'];
    $matricula = $_POST['matricula'];
    $carrera = $_POST['NombrePE'];
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Servidor SMTP externo (por ejemplo, Gmail)
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = 'l.guadalupea@upam.edu.mx';
        $mail->Password = 'LuisAntonio';

        $mail->setFrom('l.guadalupea@upam.edu.mx', ' DATOS DE ACCESO ');
        $mail->addAddress($correoDestinatario);
        $mail->addReplyTo('l.guadalupea@upam.edu.mx', 'Prueba Omitir'); // Ajusta tu nombre y correo electrónico
        $mail->Subject = 'Correo de prueba para la plataforma ';
        $mail->Body = 'Hola que tal, adjunto este correo con tus datos de acceso' . "\n Tu usuario es: " . $correoDestinatario . "\nTu contraseña de acceso es: " . $contrasena;
        $mail->CharSet = 'UTF-8';  // Configurar la codificación

        //Activamos caracteres de latinos
        $mail->CharSet = 'UTF-8';
        //Enviamos correo
        $mail->send();

        //Limpiamos y preparamos el segundo correo
        $mail->clearAddresses();  // Limpiar direcciones antes de enviar otro correo
        $mail->setFrom('luisraul.guadalupe.antonio03@gmail.com');
        // Enviar correo a la dirección 'vinculacion@p.com'
        $mail->addAddress('luisraul.guadalupe.antonio03@gmail.com');
        // Cambiar el mensaje para la dirección 'vinculacion@p.com'
        $mail->Subject = "NOTIFICACIÓN DE REGISTRO DE UN NUEVO ALUMNO DE MANERA MANUAL";
        $mail->Body = "El alumno: " . $alumno ." ".$apellidoP." ".$apellidoM. ", con matricula: " . $matricula . ", de la carrera: " . $carrera . ", ha sido dado de alta de forma manual: ";
        //Activamos caracteres de latinos
        $mail->CharSet = 'UTF-8';
        // Configurar la codificación
        $mail->send();
        //Correo para el wey de vinculacion
        $mail->send();
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}

?>