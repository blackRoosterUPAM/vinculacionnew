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
        require_once "views/login/index.php";
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
            if ($rol == 5) {
                session_start();
                $name = "sedes";
                $_SESSION['name'] = $name;
                $_SESSION['id_usuario'] = $id; // Donde $id es el ID del usuario obtenido
                // Redirigir a la página de sedes
                header('location:  index.php?c=sedes&a=index');
            }elseif ($rol == 2) {
                session_start();
                $_SESSION['id_usuario'] = $id; // Donde $id es el ID del usuario obtenido
                header('location: index.php?c=escolars&a=index');
            }elseif ($rol == 3) {
                session_start();
                $_SESSION['id_usuario'] = $id; // Donde $id es el ID del usuario obtenido
                $name = "vinculacion";
                $_SESSION['name'] = $name;
                // Redirigir a la página de vinculación
                header('location:  index.php?c=carreras&a=index');
            }elseif ($rol == 4) {
                session_start();
                $_SESSION['id_usuario'] = $id; // Donde $id es el ID del usuario obtenido
                $name = "alumno";
                $_SESSION['name'] = $name;
                // Redirigir a la página de vinculación
                header('location:  index.php?c=alumno&a=index');
            }elseif ($rol == 6) {
                session_start();
                $_SESSION['id_usuario'] = $id; // Donde $id es el ID del usuario obtenido
                $name = "director";
                $_SESSION['name'] = $name;
                // Redirigir a la página de vinculación
                header('location: director/index.php');
            }elseif ($rol == 7) {
                session_start();
                $_SESSION['id_usuario'] = $id; // Donde $id es el ID del usuario obtenido
                $name = "ptc";
                $_SESSION['name'] = $name;
                // Redirigir a la página de vinculación
                header('location: index.php?c=ptc&a=index');
            }else{
                header('location: index.php');
            }
        } else {
            // Inicio de sesión fallido, redirigir al login _
            header('location: index.php');
        }
    }

    public function prueba(){
        session_start();
        session_destroy();
        header('location: index.php');
    }
}
