<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class Contrasena
{

    private $db;
    private $contrasena;
    private $docs;

    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->contrasena = array();
        $this->docs = array();
    }

    public function enviarCodigo($correo)
    {
        // Generar un código de 6 dígitos
        $codigo = rand(100000, 999999);

        // Configurar PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Configuración del servidor SMTP (puedes ajustarla según tu proveedor de correo)
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ctrlescolar.software@upamozoc.edu.mx';
            $mail->Password = 'GallosNegros#2023';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Configuración del remitente y destinatario
            $mail->addAddress($correo);

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = "Codigo de Recuperacion de Contraseña";
            $mail->Body = "Su código de recuperación de contraseña es: $codigo";

            // Enviar el correo
            $mail->send();

            // Aquí usamos $this para referenciar a la instancia actual de la clase
            $this->insertarCodigo($correo, $codigo);

            // Devolver el código generado para su verificación posterior
            return $codigo;
        } catch (Exception $e) {
            // Manejar errores en el envío del correo
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
            return false;
        }
    }

        private function insertarCodigo($correo, $codigo)
    {
        // Obtener el número de resultados para el correo electrónico dado
        $query = mysqli_query($this->db, "SELECT COUNT(*) AS count FROM usuarios WHERE CorreoE = '$correo'");
        $result = mysqli_fetch_assoc($query);
        $count = $result["count"];
    
        if ($count == 1) {
            // Obtener el IdUsuario asociado al correo electrónico
            $query = mysqli_query($this->db, "SELECT IdUsuario FROM usuarios WHERE CorreoE = '$correo'");
            $usuario = mysqli_fetch_assoc($query);
            $idUsuario = $usuario["IdUsuario"];
    
            // Eliminar el código existente, si lo hay, asociado al IdUsuario
            $deleteStmt = $this->db->prepare("DELETE FROM codigos_recuperacion WHERE idUsuario = ?");
            $deleteStmt->bind_param("i", $idUsuario);
            $deleteStmt->execute();
            $deleteStmt->close();
    
            // Insertar el nuevo código junto con el IdUsuario en la tabla codigos_recuperacion
            $insertStmt = $this->db->prepare("INSERT INTO codigos_recuperacion (idUsuario, codigo) VALUES (?, ?)");
            $insertStmt->bind_param("is", $idUsuario, $codigo);
            $insertStmt->execute();
            $insertStmt->close();
        } else {
            // Redirigir a index.php si el correo tiene más de un resultado o ninguno
            header('location: index.php');
            exit(); // Salir para evitar ejecución adicional del script
        }
    
        $this->db->close();
    }

    public function obtenerIdUsuarioPorCorreo($correo)
    {
        $query = mysqli_query($this->db, "SELECT IdUsuario FROM usuarios WHERE CorreoE = '$correo'");

        if ($query) {
            $usuario = mysqli_fetch_assoc($query);
            return $usuario["IdUsuario"];
        } else {
            // Manejar el error al ejecutar la consulta
            echo "Error al obtener datos: " . mysqli_error($this->db);
            return null;
        }
    }

    public function validarCodigo($idUsuario, $codigo)
    {
        $stmt = $this->db->prepare("SELECT * FROM codigos_recuperacion WHERE idUsuario = ? AND codigo = ?");
        $stmt->bind_param("is", $idUsuario, $codigo);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result->num_rows > 0;
    }

    public function actualizarContrasena($idUsuario, $nuevaContrasena)
{
    // Hashear el passworda con MD5 (o utiliza un método más seguro si es posible)
    $hashNuevaContrasena = md5($nuevaContrasena);

    // Iniciar la transacción
    $this->db->begin_transaction();

    try {
        // Actualizar el password en la tabla de usuarios
        $stmt1 = $this->db->prepare("UPDATE usuarios SET Contrasena = ? WHERE IdUsuario = ?");
        $stmt1->bind_param("si", $hashNuevaContrasena, $idUsuario);
        $resultado1 = $stmt1->execute();
        $stmt1->close();

        // Eliminar el código de recuperación de la tabla codigos_recuperacion
        $stmt2 = $this->db->prepare("DELETE FROM codigos_recuperacion WHERE idUsuario = ?");
        $stmt2->bind_param("i", $idUsuario);
        $resultado2 = $stmt2->execute();
        $stmt2->close();

        // Cometer la transacción si ambas operaciones tienen éxito
        if ($resultado1 && $resultado2) {
            $this->db->commit();
            return true;
        } else {
            // Si algo falla, hacer un rollback de la transacción
            $this->db->rollback();
            return false;
        }
    } catch (Exception $e) {
        // Manejar la excepción si ocurre algún error
        $this->db->rollback();
        return false;
    } finally {
        // Cerrar la conexión a la base de datos
        $this->db->close();
    }
}

}
