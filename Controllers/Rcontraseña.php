<?php

class RcontraseñaController
{

    public function __construct()
    {
        require_once "Models/RcontraseñaModel.php";
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $correo = $_POST["correo"];

            $correo_ = new Contraseña;
            $result = $correo_->enviarCodigo($correo);

            if ($result) {
                // Redirigir al usuario a la página para ingresar el código
                header("Location: index.php?c=rcontraseña&a=actualizacion&correo=$correo");
                exit();
            } else {
                echo "Hubo un error al enviar el código. Por favor, inténtelo de nuevo.";
            }
        }
    }

    public function actualizacion()
    {
        if (isset($_GET['correo'])) {
            $correo = $_GET['correo'];
            require_once "Views/login/recuperacionContra.php";
        } else {
            // Manejar el caso en el que no se proporciona el correo electrónico
            echo "Correo electrónico no especificado.";
        }
    }

    public function cambio_contraseña()
    {
        $correo = $_POST["correo"];
        $codigo = $_POST["codigo"];
        $modelo = new Contraseña();

        // Obtener el IdUsuario asociado al correo electrónico y validar el código
        $idUsuario = $modelo->obtenerIdUsuarioPorCorreo($correo);

        if ($idUsuario !== null && $modelo->validarCodigo($idUsuario, $codigo)) {
            // Redirigir a otra vista o realizar cualquier otra acción

            header("Location: index.php?c=rcontraseña&a=confirmar_contraseña&idUsuario=$idUsuario");
            exit();
        } else {
            // Código no válido o correo incorrecto, manejar el error o redirigir a otra página
            echo "Código no válido o correo incorrecto. Por favor, inténtelo de nuevo.";
        }
        // Hacer la modificación de contraseña y luego redireccionar al login
    }

    public function confirmar_contraseña()
    {
        $idUsuario = $_GET['idUsuario'];
        require_once "Views/login/cambio_contraseña.php";
    }

    public function actualizar_contraseña()
    {
        // Obtener datos del formulario
        $idUsuario = $_POST['idUsuario'];
        $nuevaContraseña = $_POST['nueva_contraseña'];
        $confirmarContraseña = $_POST['confirmar_contraseña'];

        // Validar que las contraseñas coincidan
        if ($nuevaContraseña === $confirmarContraseña) {
            // Lógica para actualizar la contraseña en la base de datos
            $modelo = new Contraseña();
            $resultado = $modelo->actualizarContraseña($idUsuario, $nuevaContraseña);

            if ($resultado) {
                // Contraseña actualizada con éxito
                echo json_encode(array("status" => "success"));
                exit();
            } else {
                // Hubo un error al actualizar la contraseña
                echo json_encode(array("status" => "error", "message" => "No se pudo actualizar la contraseña."));
                exit();
            }
        } else {
            // Las contraseñas no coinciden
            echo json_encode(array("status" => "error", "message" => "Las contraseñas no coinciden."));
            exit();
        }
    }
}
