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

        public function periodo_editado($id){
            $periodo = new Periodo();
            $data = $periodo->periodo_editado($id);

            $data = $periodo->get_periodos();

            require_once "views/Vinculacion/periodo.php";
        }

        public function new_periodo(){
            $period = $_POST["periodo"];
            $año = $_POST["año"];

            $periodo = new Periodo();
            $dato = $periodo->nuevo_periodo($period, $año);
            $data = $periodo->get_periodos();
            require_once "views/Vinculacion/periodo.php";
        }
	}
?>