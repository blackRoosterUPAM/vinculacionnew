<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Cargar el archivo de autoloader de PHPMailer
require '../vendor/autoload.php';

// Datos para todos los posibles correos
$asunto = isset($_POST['asunto']) ? $_POST['asunto'] : '';
$mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : '';
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
$entrevistador = isset($_POST['entrevistador']) ? $_POST['entrevistador'] : '';
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
$destinatario = isset($_POST['destinatario']) ? $_POST['destinatario'] : '';
$sede = isset($_POST['sede']) ? $_POST['sede'] : '';
// datos del alumno
$alumno = isset($_POST['alumno']) ? $_POST['alumno'] : '';
$matricula = isset($_POST['matricula']) ? $_POST['matricula'] : '';
$respuestaSede = isset($_POST['respuestaSede']) ? $_POST['respuestaSede'] : '';
$tipoCorreo = isset($_POST['tipoCorreo']) ? $_POST['tipoCorreo'] : '';
$telefonoSede = isset($_POST['telefonoSede']) ? $_POST['telefonoSede'] : '';
$correoSede = isset($_POST['correoSede']) ? $_POST['correoSede'] : '';


//Una variable para enviar correo
$mail = new PHPMailer(true);



try {
    //Creacion de correo
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Servidor SMTP externo (por ejemplo, Gmail)
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'sedes.software@upamozoc.edu.mx';  // Tu dirección de correo
    $mail->Password = 'GallosNegros&2023';        // Tu contraseña
    //Datos de envio-->esperar correo 
    //Correo para el alumno
    //Pasar el correo de las sedes
    $mail->setFrom('sedes.software@upamozoc.edu.mx', $sede);
    $mail->addReplyTo('sedes.software@upamozoc.edu.mx', $correoSede);
    $mail->addAddress($destinatario);

    switch ($tipoCorreo) {
        case 'cita':
            # code...
            $mail->Subject = $asunto;
            $mail->Body = $mensaje . "\n" . ' Ubicados en: ' . $direccion . "\n" . "Con entrevistador: " . $entrevistador . "\n" . " Número de contacto: " . $telefono . "\n" . "El día con hora: " . $fecha;

            break;
        case 'rechazado':
            # code...
            $mail->Subject = "Respuesta a tu postulación en " . $sede;
            $mail->Body = "Lo sentimos, agradecemos tu tiempo, pero no eres el perfil que buscamos.";
            break;
        case 'aceptado':
            # code...
            $mail->Subject = "Respuesta a tu postulación en " . $sede;
            $mail->Body = "¡Felicitaciones! Hemos confirmado tu aceptacion en nuestra sede.";
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
    $mail->setFrom('sedes.software@upamozoc.edu.mx', $sede);
    
    $mail->addReplyTo('sedes.software@upamozoc.edu.mx', $correoSede);
    // Enviar correo a la dirección 'vinculacion@p.com'
    $mail->addAddress('b.rodriguezt@upam.edu.mx');
    // Cambiar el mensaje para la dirección 'vinculacion@p.com'
    //Agregar un switch-case tambien
    $mail->Subject = "Respuesta a postulación del alumno";
    $mail->Body = "Información del alumno:\n\n"
    . "Nombre del alumno: " . $alumno . "\n"
    . "Matrícula: " . $matricula . "\n"
    . "Estado del alumno: " . $respuestaSede . "\n"
    . "Sede: " . $sede . "\n\n"
    . "Datos de contacto de la sede:\n"
    . "Teléfono: " . $telefonoSede . "\n"
    . "Correo electrónico: " . $correoSede;
    //Activamos caracteres de latinos
    $mail->CharSet = 'UTF-8';
    // Configurar la codificación
   
     // Enviamos el correo
     $mail->send();

     // Devolver la respuesta como un array asociativo
     echo json_encode(array('resultado' => true));
    //Correo para el wey de vinculacion

} catch (Exception $e) {
      // En caso de error, manejar el mensaje de error
      $errorMessage = "Error: " . $e->getMessage();

      // Devolver la respuesta como un array asociativo con un mensaje de error
      echo json_encode(array('resultado' => false, 'error' => $errorMessage));

}
