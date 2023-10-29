<?php

class PtcController {

    public function __construct(){
        require_once "Models/PtcModel.php";
    }

    public function index() {
        $modelo = new Ptc();
        $solicitudes = $modelo->getSolicitudes();

        include('views/ptc/ptc.php');
    }
}
?>
