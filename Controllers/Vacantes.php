<?php

class VacantesController
{

    //Incuimos los modelos que vamos a utilizar
    public function __construct()
    {
        require_once "Models/CarreraModel.php";
        require_once "Models/VacantesModel.php";
        require_once "Models/SedeModel.php";
        require_once "Models/CarreraModel.php";
    }

    public function index_2()
    {
        $carrera = new Carrera();
        $result = $carrera->get_carreras();
        require_once "views/Vinculacion/vacantes.php";
    }

    public function show_vacantes_carrera()
    {
        $idCarrera = $_POST['carrera'];
        $vacantes = new Vacantes();
        $vacantes->show_vacantes($idCarrera);
    }

    public function selec_cupos()
    {
        $sedes = new Sede();
        $data = $sedes->get_sedes();

        $carrera = new Carrera();
        $result = $carrera->get_carreras();

        $proceso = new Vacantes();
        $vacan = $proceso->get_proceso();

        $periodo = new Vacantes();
        $peri = $proceso->get_periodo();
        require_once "views/Vinculacion/Selec_cupos.php";
    }

    public function new_vacante()
    {
        $idSede = $_POST["sede"];
        $idCarrera = $_POST["carrera"];
        $idProceso = $_POST["proceso"];
        $idPeriodo = $_POST["periodo"];

        $perfil = $_POST["perfil"];
        $beneficios = $_POST["beneficios"];
        $vacantes = $_POST["vacantes"];

        $vacante = new Vacantes();
        $dato = $vacante->nueva_sede($idSede, $idCarrera,$idProceso,$idPeriodo,$perfil,$beneficios,$vacantes);

        $carrera = new Carrera();
        $result = $carrera->get_carreras();
        require_once "views/Vinculacion/vacantes.php";
    }
    
}
