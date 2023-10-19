<?php
	
	class PeriodoController {
		
        public function __construct(){
			require_once "Models/PeriodoModel.php";
		}
        
        public function show_periodos(){
            $periodo = new Periodo();
            $data = $periodo->get_periodos();

            require_once "views/Vinculacion/periodo.php";
        }
        
        public function edit_periodo(){
            $id = $_POST["id_periodo"];
            $año = $_POST["año"];

            $periodo = new Periodo();
            $dato = $periodo->periodo_editado($id,$año);

            $data = $periodo->get_periodos();

            require_once "views/Vinculacion/periodo.php";
        }
	}
?>