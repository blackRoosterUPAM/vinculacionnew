<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Cargar el archivo de autoloader de PHPMailer
require '../vendor/autoload.php';

// Una variable para enviar correo
$mail = new PHPMailer(true);
//datos para el envio

//Datos para todos los posibles correos
$alumno = $_POST['alumno'];
$matricula = $_POST['matricula'];
$respuestaSede = $_POST['respuestaSede'];
$tipoCorreo = $_POST['tipoCorreo'];
try {
    // Creación de correo
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Servidor SMTP externo (por ejemplo, Gmail)
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'sedes.software@upamozoc.edu.mx';  
    $mail->Password = 'GallosNegros&2023';  

    // Datos de envío --> esperar correo 
    // Correo para el alumno
    // Pasar el correo de las sedes
    $mail->setFrom('sedes.software@upamozoc.edu.mx', 'Prueba');
    $mail->addAddress('d.hernandezj@upam.edu.mx');

    $mail->Subject = "Respuesta a tu postulación en tu sede";
    $mail->Body = "Lo sentimos, agradecemos tu tiempo, pero no eres el perfil que buscamos.";
    // Activamos caracteres de latinos
    $mail->CharSet = 'UTF-8';

    // Enviamos el correo
    $mail->send();

    // Devolver la respuesta como un array asociativo
    echo json_encode(array('resultado' => true));
} catch (Exception $e) {
    // En caso de error, manejar el mensaje de error
    $errorMessage = "Error: " . $e->getMessage();

    // Devolver la respuesta como un array asociativo con un mensaje de error
    echo json_encode(array('resultado' => false, 'error' => $errorMessage));
}
?>
