<?php

class EscolarsController
{

    public function __construct()
    {
        require_once "Models/CargaModel.php";
        require_once "Models/CarreraModel.php";
        require_once "Models/ProcesoModel.php";
        require_once "Models/ImportarModel.php";
    }

    public function index()
    {
        $modelo = new Escolares();
        $alumnos = $modelo->get_escolares();

        $carrera = new Carrera();
        $resultCarrera = $carrera->get_carreras();

        $proceso = new Proceso();
        $resultProcesos = $proceso->get_procesos();

        include('views/escolares/carga.php');
    }

    //funcion que cambia el estado de activo de todos los alumnos
    public function statusA(){
        $importarModel = new ImportarModel();
        $exito = $importarModel->statusActivo();
        if ($exito) {
            header('Location: index.php?c=escolars&a=index');
            exit();
        } else {
            // Manejo de errores si la operación no fue exitosa
            echo "Error al cambiar el estado de los alumnos.";
        }
    }
    public function statusI(){
        $importarModel = new ImportarModel();
        $exito = $importarModel->statusInactivo();
        if ($exito) {
            header('Location: index.php?c=escolars&a=index');
            exit();
        } else {
            // Manejo de errores si la operación no fue exitosa
            echo "Error al cambiar el estado de los alumnos.";
        }
    }
    public function cargarAlumnoIndividual()
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $matricula = $_POST['matricula'];
            $nombre = $_POST['nombre_alumno'];
            $apellidoP = $_POST['apellidoP'];
            $apellidoM = $_POST['apellidoM'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $carrera = $_POST['carrera'];
            $proceso = $_POST['proceso'];


            // Llama al modelo para insertar el alumno en la base de datos
            $importarModel = new ImportarModel();
            $exito = $importarModel->insertarAlumnoIndividual($matricula, $nombre, $apellidoP, $apellidoM, $telefono, $correo, $carrera, $proceso);

            if ($exito) {
                header('Location: index.php?c=escolars&a=index');
                exit();
            } else {
                // Manejo de errores si la operación no fue exitosa
                echo "Error al cambiar el estado de los alumnos.";
            }
        } else {
            // Si no se ha enviado el formulario, muestra el formulario de carga individual
            $modelo = new Escolares();
            $alumnos = $modelo->get_escolares();

            $carrera = new Carrera();
            $resultCarrera = $carrera->get_carreras();

            $proceso = new Proceso();
            $resultProcesos = $proceso->get_procesos();
            include 'Views/Escolares/carga.php';
        }
    }
}