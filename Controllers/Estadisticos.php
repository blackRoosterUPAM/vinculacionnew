<?php

class EstadController
{
    // Incluimos los modelos que vamos a utilizar
    public function __construct()
    {
        require_once "Models/EstadisticosModel.php";
    }

    // Función principal que retorna los alumnos que se postularon a una empresa en específico
    public function index(){
        
        require_once "views/estadisticos/index.php";
    }

    //LLama a la vista de alumno
    public function alumno()
    {
        $modelo = new Estadistico();
        $carreras = $modelo->obtenerCarreras();
        // Incluye la vista principal
        require_once "views/estadisticos/alumnosGraphics.php";
    }

    public function sede()
    {
      
        // Incluye la vista principal
        require_once "views/estadisticos/sedesGraphics.php";
    }
    // Endpoint para obtener las carreras disponibles
    public function obtenerCarreras()
    {
        $modelo = new Estadistico();
        $carreras = $modelo->obtenerCarreras();

        // Retorna las carreras en formato JSON
        echo json_encode($carreras);
    }

    // Endpoint para obtener los datos de una carrera específica
    public function obtenerDatosCarrera()
    {
        $nombreCarrera = $_POST['nombreCarrera'];

        $modelo = new Estadistico();
        $datosCarrera = $modelo->obtenerDatosCarrera($nombreCarrera);

        // Retorna los datos de la carrera en formato JSON
        echo json_encode($datosCarrera);
    }
    //Sede
    // Endpoint para obtener las sedes disponibles
    public function obtenerSedes()
    {
        $modelo = new Estadistico();
        $sedes = $modelo->obtenerSedes();

        // Retorna las sedes en formato JSON
        echo json_encode($sedes);
    }

    // Endpoint para obtener los datos de una sede específica
    public function obtenerDatosSede()
    {
        $idSede = $_POST['idSede'];
        $idPeriodo = 10; // Filtro de idPeriodo

        $modelo = new Estadistico();
        $datosSede = $modelo->obtenerDatosSede($idSede, $idPeriodo);

        // Retorna los datos de la sede en formato JSON
        echo json_encode($datosSede);
    }

    // Endpoint para obtener los datos de sedes (privadas y públicas)
    public function sedesByTipo()
    {
        $modelo = new Estadistico();
        $datosSedes = $modelo->sedesTipo();

        echo json_encode($datosSedes);
    }
}
