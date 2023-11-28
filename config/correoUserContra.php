<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

function enviarCorreo($correoDestinatario, $contrasena)
{
    $db = Conectar::conexion();
    $mail = new PHPMailer(true);

    // Consulta para obtener el nombre de la carrera
    $consultaCarrera = $db->prepare("SELECT nombreCarrera FROM carrera WHERE IdCarrera = ?");
    $consultaCarrera->bind_param("i", $carreraId);
    $consultaCarrera->execute();
    $resultadoCarrera = $consultaCarrera->get_result();
    $alumno = $_POST['nombre_alumno'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $matricula = $_POST['matricula'];
    $carreraId = $_POST['carrera'];

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Servidor SMTP externo (por ejemplo, Gmail)
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = 'ctrlescolar.software@upamozoc.edu.mx';  // Tu dirección de correo
        $mail->Password = 'GallosNegros#2023';        // Tu contraseña

        $mail->setFrom('ctrlescolar.software@upamozoc.edu.mx', 'INFORMACIÓN DE LOGUEO');
        $mail->addAddress($correoDestinatario);
        $mail->addReplyTo('ctrlescolar.software@upamozoc.edu.mx'); // Ajusta tu nombre y correo electrónico
        $mail->Subject = 'DATOS DE ACCESO A LA PLATAFORMA ';
        $mail->Body = 'Estimado alumno, por este medio te hacemos saber tu usuario y contraseña.' . "\nTU USUARIO ES: " . $correoDestinatario . "\nTU CONTRASEÑA DE ACCESO ES: " . $contrasena;

        $mail->CharSet = 'UTF-8';  // Configurar la codificación
        $mail->send();

        // Obtener el nombre de la carrera
        $consultaCarrera = $db->prepare("SELECT nombreCarrera FROM carrera WHERE IdCarrera = ?");
        $consultaCarrera->bind_param("i", $carreraId);
        $consultaCarrera->execute();
        $resultadoCarrera = $consultaCarrera->get_result();

        if ($filaCarrera = $resultadoCarrera->fetch_assoc()) {
            $nombreCarrera = $filaCarrera['nombreCarrera'];

            // Envío de correo a Vinculación
            $mail->clearAddresses();  // Limpiar direcciones antes de enviar otro correo
            $mail->setFrom('ctrlescolar.software@upamozoc.edu.mx');
            $mail->addAddress('vinculacion.software@upamozoc.edu.mx');
            $mail->Subject = "NOTIFICACIÓN DE REGISTRO DE UN NUEVO ALUMNO DE MANERA MANUAL";
            $mail->Body = "El/la alumn@: " . $alumno . " " . $apellidoP . " " . $apellidoM . "\ncon matrícula: " . $matricula . "\nde la carrera en : " . $nombreCarrera . "\nha sido dado de alta de forma manual: ";
            $mail->CharSet = 'UTF-8';
            $mail->send();
        } else {
            echo "No se pudo obtener el nombre de la carrera.";
        }
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}