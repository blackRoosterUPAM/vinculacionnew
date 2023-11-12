<?php
	
	class CarrerasController {
		
        //Incuimos los modelos que vamos a utilizar
		public function __construct(){
			require_once "Models/CarreraModel.php";
			require_once "Models/ProcesoModel.php";
		}

        //Funcion principal que retorna los alumnos que se postularon a una emperesa en especifico
		public function index() {
			$carrera = new Carrera();
            $result = $carrera->get_carreras();
            require_once "views/Vinculacion/listas.php";
        }
        
		public function registro() {
			$carrera = new Carrera();
            $resultCarrera = $carrera->get_carreras();

			$proceso = new Proceso();
			$resultProcesos = $proceso->get_procesos();
            require_once "views/Escolares/carga.php";
        }
	}
?>