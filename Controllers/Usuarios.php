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
        $contrasena = $_POST['contraseña'];
        $model = new UsuarioModel();
        $usuario = $model->validarUsuario($correo, $contrasena);

        if ($usuario) {
            // Inicio de sesión exitoso
            $id = $usuario['IdUsuario'];
            $rol = $usuario['idRol'];
            $nombreRol = $usuario['nombreRol'];
            

            // Puedes realizar operaciones adicionales aquí si es necesario
            if ($nombreRol == 'Sede') {
                session_start();
                $name = "sedes";
                $_SESSION['name'] = $name;
                $_SESSION['id_usuario'] = $id; // Donde $id es el ID del usuario obtenido
                // Redirigir a la página de sedes
                header('location:  index.php?c=sedes&a=index');
            } elseif ($nombreRol == 'Escolares') {
                session_start();
                $_SESSION['id_usuario'] = $id; // Donde $id es el ID del usuario obtenido
                header('location: index.php?c=escolars&a=index');
            } elseif ($nombreRol == 'Vinculacion') {
                session_start();
                $_SESSION['id_usuario'] = $id; // Donde $id es el ID del usuario obtenido
                $_SESSION['name'] = $nombreRol;
                // Redirigir a la página de vinculación
                header('location:  index.php?c=carreras&a=index');
            } elseif ($nombreRol == 'Estudiante') {
                session_start();
                $_SESSION['id_usuario'] = $id; // Donde $id es el ID del usuario obtenido
                $name = "alumno";
                $_SESSION['name'] = $name;
                // Redirigir a la página de vinculación
                header('location:  index.php?c=alumno&a=index');
            } elseif ($nombreRol == 'Director') {
                session_start();
                $_SESSION['id_usuario'] = $id; // Donde $id es el ID del usuario obtenido
                $name = "director";
                $_SESSION['name'] = $name;
                // Redirigir a la página de vinculación
                header('location: director/index.php');
            } elseif ($nombreRol == 'PTC') {
                session_start();
                $_SESSION['id_usuario'] = $id; // Donde $id es el ID del usuario obtenido
                $_SESSION['correo_ptc'] = $correo; // Almacena el correo del PTC en la sesión
                $name = "ptc";
                $_SESSION['name'] = $name;
                // Redirigir a la página de PTC
                header('location: index.php?c=ptc&a=index');
            } elseif ($nombreRol == "Graficas") {
                session_start();
                $_SESSION['id_usuario'] = $id; // Donde $id es el ID del usuario obtenido
                $_SESSION['name'] = 'Graficas';                
                header('location: index.php?c=estad&a=index');

            }
            else {
                header('location: index.php');
            }
        } else {
            // Inicio de sesión fallido, redirigir al login _
            header('location: index.php');
        }
    }

    public function prueba()
    {
        session_start();
        session_destroy();
        header('location: index.php');
    }
}
