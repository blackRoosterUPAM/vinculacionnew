<?php
class RegistroController{
    //Adjuntando los modelo s autilizar
    public function __construct() {
        require_once "Models/CarreraModel.php";
        require_once "Models/ProcesoModel.php";
        require_once "Models/RegistroModel.php";
    }

    public function index() {
        $matricula = $_POST["matricula"];
        echo $matricula;        
        //require_once "views/Escolares/carga.php";
    }


    public function estatus_editado() {
        if (isset($_GET['matricula'])) {
            $matricula = $_GET['matricula'];
            $alumnos = new registro();
            $alumnos->estatus_editado($matricula);
            require_once "views/Escolares/carga.php";
        }
    }

    public function estatus_documento() {
        if (isset($_GET['idDocumento'])) {
            $documento = $_GET['idDocumento'];
            $documento = new registro();
            $documento->estatus_documento($documento);
            require_once "views/ptc/ptc.php";
        }
    }
}
?>