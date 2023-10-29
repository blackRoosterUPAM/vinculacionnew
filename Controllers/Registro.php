<?php
require 'Models/RegistroModel.php';

class RegistrosController {

    
    public function registrarAlumno($matricula, $nombre, $apellidoPaterno, $apellidoMaterno, $telefono, $correo, $carrera, $proceso) {
        // Llama al Modelo para verificar si ya existe un alumno con la misma matrícula
        $model = new RegistrosModel();
        $existeAlumno = $model->existeAlumno($matricula);

        if ($existeAlumno) {
            // Muestra un mensaje de error si la matrícula ya está en uso
            echo '<script>';
            echo 'alert("La matrícula ya está en uso. No se puede registrar el alumno dos veces.");';
            echo '</script>';
        } else {
            // Genera una contraseña aleatoria en base a las iniciales del nombre
            $iniciales = substr($nombre, 0, 2);
            $contrasena = md5($iniciales);

            // Llama al Modelo para guardar los datos en la base de datos
            $model->insertarAlumno($matricula, $nombre, $apellidoPaterno, $apellidoMaterno, $telefono, $correo, $carrera, $proceso);
            $model->insertarUsuario($matricula, $correo, $contrasena, $nombre, $apellidoPaterno, $apellidoMaterno);

            // Redirecciona a la página principal o muestra un mensaje de éxito
            header("Location: index.php?c=escolars&a=index");
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matricula = isset($_POST['Matricula']) ? $_POST['Matricula'] : '';
    $nombre = isset($_POST['NombreA']) ? $_POST['NombreA'] : '';
    $apellidoPaterno = isset($_POST['ApellidoP']) ? $_POST['ApellidoP'] : '';
    $apellidoMaterno = isset($_POST['ApellidoM']) ? $_POST['ApellidoM'] : '';
    $telefono = isset($_POST['Telefono']) ? $_POST['Telefono'] : '';
    $correo = isset($_POST['CorreoE']) ? $_POST['CorreoE'] : '';
    $carrera = isset($_POST['Carrera']) ? $_POST['Carrera'] : '';
    $proceso = isset($_POST['Proceso']) ? $_POST['Proceso'] : '';

    // Verifica que los campos no estén vacíos
    if (empty($matricula) || empty($nombre) || empty($apellidoPaterno) || empty($apellidoMaterno) || empty($telefono) || empty($correo) || empty($carrera) || empty($proceso)) {
        // Campos vacíos, muestra un mensaje de error
        echo '<script>alert("Todos los campos son obligatorios. Por favor, llene todos los campos.");</script>';
    } else {
        // Campos no están vacíos, continúa con el proceso de registro

        $controller = new RegistrosController();
        $controller->registrarAlumno($matricula, $nombre, $apellidoPaterno, $apellidoMaterno, $telefono, $correo, $carrera, $proceso);
    }
}
?>