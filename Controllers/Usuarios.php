<?php



class UsuariosController
{
    //Incuimos los modelos que vamos a utilizar
    public function __construct()
    {
        require_once "Models/UsuariosModel.php";
    }


    public function index()
    {
        require_once "Views/login/index.php";
    }

    public function iniciarSesion()
    {
        $correo = $_POST['correo'];
        $contrasena= $_POST['contraseña'];
        $model = new UsuarioModel();
        $usuario = $model->validarUsuario($correo, $contrasena);

        if ($usuario) {
            // Inicio de sesión exitoso
            $id = $usuario['IdUsuario'];
            $rol = $usuario['idRol'];

            // Puedes realizar operaciones adicionales aquí si es necesario
            if ($rol == 1) {
                session_start();
                $_SESSION['id_usuario'] = $id; // Donde $id es el ID del usuario obtenido
                // Redirigir a la página de sedes
                header('location:  index.php?c=sedes&a=index');
            } elseif ($rol == 2) {
                session_start();
                $_SESSION['id_usuario'] = $id; // Donde $id es el ID del usuario obtenido
                // Redirigir a la página de vinculación
                header('location:  index.php?c=carreras&a=index');
            }
        } else {
            // Inicio de sesión fallido, redirigir al login _
            header('location: index.php');
        }
    }
}
