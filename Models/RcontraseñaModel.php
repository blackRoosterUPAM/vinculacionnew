<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class Contraseña
{

    private $db;
    private $contraseña;
    private $docs;

    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->contraseña = array();
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
            $mail->Username = 'b.rodriguezt@upam.edu.mx';
            $mail->Password = 'ROD@2021';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Configuración del remitente y destinatario
            $mail->setFrom('b.rodriguezt@upam.edu.mx', 'Brandon');
            $mail->addAddress($correo);

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Código de Recuperación de Contraseña';
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
        // Obtener el IdUsuario asociado al correo electrónico
        $query = mysqli_query($this->db, "SELECT IdUsuario FROM usuarios WHERE CorreoE = '$correo'");

        if ($query) {
            $usuario = mysqli_fetch_assoc($query);
            $idUsuario = $usuario["IdUsuario"];

            // Insertar el código junto con el IdUsuario en la tabla codigos_recuperacion
            $stmt = $this->db->prepare("INSERT INTO codigos_recuperacion (idUsuario, codigo) VALUES (?, ?)");
            $stmt->bind_param("is", $idUsuario, $codigo);
            $stmt->execute();

            $stmt->close();
        } else {
            // Manejar el error al ejecutar la consulta
            echo "Error al obtener el IdUsuario: " . mysqli_error($this->db);
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

    public function actualizarContraseña($idUsuario, $nuevaContraseña)
{
    // Hashear la nueva contraseña con MD5 (o utiliza un método más seguro si es posible)
    $hashNuevaContraseña = md5($nuevaContraseña);

    // Iniciar la transacción
    $this->db->begin_transaction();

    try {
        // Actualizar la contraseña en la tabla de usuarios
        $stmt1 = $this->db->prepare("UPDATE usuarios SET Contraseña = ? WHERE IdUsuario = ?");
        $stmt1->bind_param("si", $hashNuevaContraseña, $idUsuario);
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
