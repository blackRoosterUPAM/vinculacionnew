<?php
	
	class AlumnoController {
		
		public function __construct(){
			require_once "models/AlumnoModel.php";
		}
		
		public function index(){
			
			
			$alumno = new Alumno();
			$data["titulo"] = "alumno";
			$data["alumno"] = $alumno->get_alumnos();
			
			require_once "views/Alumno/index.php";	
		}
        
        /*
        Esta funcion se llama guarda y falta crear la consulta para guardar en el modelo pero este es ejemplo
		public function guarda(){
			
			$matricula = $_POST['placa'];
			$nombre = $_POST['marca'];
			
			$alumno = new Alumno();
			$alumno->insertar($matricula, $nombre);
			$data["titulo"] = "alumno";
			$this->index();
		}
        */
        
        //funcion para mostrar
		public function show($id){
			
			$alumno = new Alumno();
			
			$data["matricula"] = $id;
			$data["alumno"] = $alumno->get_alumno($id);
			$data["titulo"] = "alumno";
			require_once "views/Alumno/detalle.php";
		}

        public function siguiente() {
            session_start();
            $data["titulo"] = "Alumno";
            // Verifica si la variable de sesión 'contador' está definida
            if (!isset($_SESSION['contador'])) {
                // Si no está definida, inicialízala en 1
                $_SESSION['contador'] = 1;
            }
        
            // Obtiene el valor actual del contador
            $contador = $_SESSION['contador'];
        
            $alumno = new Alumno();
            $alumnos = $alumno->get_alumnos();
        
            // Comprueba si hay datos disponibles y configura $data["alumno"] en consecuencia
            if ($contador <= count($alumnos)) {
                $data["alumno"] = $alumnos[$contador - 1]; // Resta 1 para obtener el índice correcto
            } else {
                $data["alumno"] = null;
                session_destroy();
            }
        
            // Incrementa el contador en 1
            $_SESSION['contador']++;
        
            require_once "views/Alumno/detalle.php";
        }
        
        
		public function actualizar(){

			$id = $_POST['id'];
			$nombre = $_POST['nombre'];
			
			$alumno = new Alumno();
			$alumno->modificar($id, $nombre);
			$data["titulo"] = "alumno";
			$this->index();
		}
		
		public function show_alumonos_carrera(){
			$idCarrera = $_POST['carrera'];
			$Alim_carrera = new Alumno();
			$Alim_carrera->show_alumnos($idCarrera);
		}
		
	}
?>