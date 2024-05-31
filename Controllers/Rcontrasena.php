<?php

class RcontrasenaController
{

    public function __construct()
    {
        require_once "Models/RcontrasenaModel.php";
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $correo = $_POST["correo"];

            $correo_ = new Contrasena;
            $result = $correo_->enviarCodigo($correo);

            if ($result) {
                // Redirigir al usuario a la página para ingresar el código
                header("Location: index.php?c=rcontrasena&a=actualizacion&correo=$correo");
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

    public function cambio_contrasena()
    {
        $correo = $_POST["correo"];
        $codigo = $_POST["codigo"];
        $modelo = new Contrasena();

        // Obtener el IdUsuario asociado al correo electrónico y validar el código
        $idUsuario = $modelo->obtenerIdUsuarioPorCorreo($correo);

        if ($idUsuario !== null && $modelo->validarCodigo($idUsuario, $codigo)) {
            // Redirigir a otra vista o realizar cualquier otra acción

            header("Location: index.php?c=rcontrasena&a=confirmar_contrasena&idUsuario=$idUsuario");
            exit();
        } else {
            // Código no válido o correo incorrecto, manejar el error o redirigir a otra página
            echo "Código no válido o correo incorrecto. Por favor, inténtelo de nuevo.";
        }
        // Hacer la modificación de password y luego redireccionar al login
    }

    public function confirmar_contrasena()
    {
        $idUsuario = $_GET['idUsuario'];
        require_once "Views/login/cambio_contrasena.php";
    }

    public function actualizar_contrasena()
    {
        // Obtener datos del formulario
        $idUsuario = $_POST['idUsuario'];
        $nuevaContrasena = $_POST['nueva_contrasena'];
        $confirmarContrasena = $_POST['confirmar_contrasena'];

        // Validar que los passwords coincidan
        if ($nuevaContrasena === $confirmarContrasena) {
            // Lógica para actualizar el passworden la base de datos
            $modelo = new Contrasena();
            $resultado = $modelo->actualizarContrasena($idUsuario, $nuevaContrasena);

            if ($resultado) {
                // Password actualizado con éxito
                echo json_encode(array("status" => "success"));
                exit();
            } else {
                // Hubo un error al actualizar el password
                echo json_encode(array("status" => "error", "message" => "No se pudo actualizar la contraseña."));
                exit();
            }
        } else {
            // Los passwords no coinciden
            echo json_encode(array("status" => "error", "message" => "Las contraseñas no coinciden."));
            exit();
        }
    }
}
