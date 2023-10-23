<?php

class EscolarsController {

    public function __construct(){
        require_once "Models/CargaModel.php";
    }

    public function index() {
        $modelo = new Escolares();
        $alumnos = $modelo->get_escolares();

        include('views/escolares/carga.php');
    }

    public function cargarAlumnoIndividual() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $matricula = $_POST['matricula'];
            $nombre = $_POST['nombre'];
            $apellidoP = $_POST['apellido_paterno'];
            $apellidoM = $_POST['apellido_materno'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $carrera = $_POST['carrera'];
            $proceso = $_POST['proceso'];

    
            // Llama al modelo para insertar el alumno en la base de datos
            $importarModel = new ImportarModel();
            $exito = $importarModel->insertarAlumnoIndividual($matricula, $nombre, $apellidoP, $apellidoM, $telefono, $correo, $carrera, $proceso);
    
            if ($exito) {
                // Inserción exitosa, muestra un mensaje de éxito
                echo "Alumno insertado con éxito.";
            } else {
                // Error al insertar al alumno, muestra un mensaje de error
                echo "Error al insertar al alumno.";
            }
        } else {
            // Si no se ha enviado el formulario, muestra el formulario de carga individual
            include 'Views/Escolares/registro.php';
        }
    }
}
?>
