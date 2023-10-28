<?php
	
	class AlumnoController {
		
		public function __construct(){
			require_once "Models/AlumnoModel.php";
			require_once "Models/SedeModel.php";
		}
		
		public function index2($id){
			
			
			$alumno = new Alumno();
			$data["titulo"] = "alumno";
			$data["alumno"] = $alumno->get_alumnos();
			
			require_once "views/Alumno/index.php";	
		}

		public function index(){
            //$id = $_POST['id'];
            //$id = 21032029; //comentar cuando se implementen las sesiones
            //utilizaremos una session para que al volver a llamar se actulice y no pierda el contador
            session_start();
			if (isset($_SESSION['id_usuario']) || isset($_SESSION['name'])) {
				$idUsuario = $_SESSION['id_usuario'];
				$name = $_SESSION['name'];
				if($name == 'alumno'){
					
				} else {
					// Si no existe la variable de sesión, puede redirigir al usuario a la página de inicio de sesión o realizar otra acción.
					header('location: index.php');
					exit; // Detener la ejecución del script
				}
			} else {
				// Si no existe la variable de sesión, puede redirigir al usuario a la página de inicio de sesión o realizar otra acción.
				header('location: index.php');
				exit; // Detener la ejecución del script
			}
			$id = $_SESSION["id_usuario"];
			$id_alumno = $_SESSION["id_usuario"];
            //Creamos modelo para sede
			$Alumno = new Alumno();
            //hacemos consulta para recuperar con su id los datos de la sede en la que se inicio sesion            
			 $alumno =$Alumno->get_alumno($id_alumno);
			 $nombre = $alumno["NombreA"];
			 $apellidoP = $alumno["ApellidoP"];
			 $apellidoM = $alumno["ApellidoM"];
			 $telefono = $alumno["Telefono"];
			 $correoE = $alumno["CorreoE"];
			 $carrera = $alumno["NombrePE"];
			 $proceso = $alumno["Proceso"];
			 $estatusAlumno = $alumno["Estatus"];
			 $procesoAlumno = $alumno["idProceso"];

			$cv_docs = $Alumno->get_alumnodocs($id_alumno);
			if(!empty($cv_docs)){
				$fechaCreacion = $cv_docs->FechaCreación;
				$estatusCV = "Subido";
			}else{
				$fechaCreacion = "--";
				$estatusCV = "No subido";
			}
			
			//$data["docs"] = $Alumno->get_docsvinculacion($id_alumno);
			$docs = $Alumno->get_docsvinculacion($id_alumno);

			$procesos = $Alumno->get_procesos($id_alumno);
            // Verifica si la variable de sesión 'contador' está definida
            if (!isset($_SESSION['contador'])) {
                // Si no está definida, inicialízala en 1
                $_SESSION['contador'] = 0;
            }
        
            // Obtiene el valor actual del contador
            /*$contador = $_SESSION['contador'];
        
            $alumno = new Alumno();
            $alumnos = $alumno->get_alumnos();
        
            // Comprueba si hay datos disponibles y configura $data["alumno"] en consecuencia
            if ($contador <= count($alumnos)) {
                $data["alumno"] = $alumnos[$contador - 1]; // Resta 1 para obtener el índice correcto
                
            $data["fullName"] = $data["alumno"]["NombreA"].'   '.$data["alumno"]["ApellidoP"].'   '.$data["alumno"]["ApellidoM"];
            } else {
                $data["alumno"] = null;
                $_SESSION["contador"] = null;
            }
        
            // Incrementa el contador en 1
            $_SESSION['contador']++;*/
        
            require_once "Views/Alumno/index.php";
        }

		public function listasedes(){
            //$id = $_POST['id'];
            //$id = 21032029; //comentar cuando se implementen las sesiones
            //utilizaremos una session para que al volver a llamar se actulice y no pierda el contador
            session_start();
			if (isset($_SESSION['id_usuario']) || isset($_SESSION['name'])) {
				$idUsuario = $_SESSION['id_usuario'];
				$name = $_SESSION['name'];
				if($name == 'alumno'){
					
				} else {
					// Si no existe la variable de sesión, puede redirigir al usuario a la página de inicio de sesión o realizar otra acción.
					header('location: index.php');
					exit; // Detener la ejecución del script
				}
			} else {
				// Si no existe la variable de sesión, puede redirigir al usuario a la página de inicio de sesión o realizar otra acción.
				header('location: index.php');
				exit; // Detener la ejecución del script
			}
			$id = $_SESSION["id_usuario"];
			$id_alumno = $_SESSION["id_usuario"];
            //Creamos modelo para sede
			$Alumno = new Alumno();
			$Sede = new Sede();
            //hacemos consulta para recuperar con su id los datos de la sede en la que se inicio sesion            
			 $alumno =$Alumno->get_alumno($id_alumno);
			 $id_proceso = $alumno["idProceso"];
			 $id_carrera = $alumno["Carrera"];
			 $estatusProceso = $alumno["Proceso"];
			 $estatusAlumno = $alumno["Estatus"];

			$sedes = $Sede->get_sedespcp($id_proceso, $id_carrera);

            // Verifica si la variable de sesión 'contador' está definida
            if (!isset($_SESSION['contador'])) {
                // Si no está definida, inicialízala en 1
                $_SESSION['contador'] = 0;
            }
        
            // Obtiene el valor actual del contador
            /*$contador = $_SESSION['contador'];
        
            $alumno = new Alumno();
            $alumnos = $alumno->get_alumnos();
        
            // Comprueba si hay datos disponibles y configura $data["alumno"] en consecuencia
            if ($contador <= count($alumnos)) {
                $data["alumno"] = $alumnos[$contador - 1]; // Resta 1 para obtener el índice correcto
                
            $data["fullName"] = $data["alumno"]["NombreA"].'   '.$data["alumno"]["ApellidoP"].'   '.$data["alumno"]["ApellidoM"];
            } else {
                $data["alumno"] = null;
                $_SESSION["contador"] = null;
            }
        
            // Incrementa el contador en 1
            $_SESSION['contador']++;*/
        
            require_once "views/Alumno/listado.php";
        }

		public function detsede($id_sede){
            //$id = $_POST['id'];
			session_start();
			if (isset($_SESSION['id_usuario']) || isset($_SESSION['name'])) {
				$idUsuario = $_SESSION['id_usuario'];
				$name = $_SESSION['name'];
				if($name == 'alumno'){
					
				} else {
					// Si no existe la variable de sesión, puede redirigir al usuario a la página de inicio de sesión o realizar otra acción.
					header('location: index.php');
					exit; // Detener la ejecución del script
				}
			} else {
				// Si no existe la variable de sesión, puede redirigir al usuario a la página de inicio de sesión o realizar otra acción.
				header('location: index.php');
				exit; // Detener la ejecución del script
			}
			$id = $_SESSION["id_usuario"];
			$id_alumno = $_SESSION["id_usuario"];
            //Creamos modelo para sede
			$Alumno = new Alumno();
			$Sede = new Sede();
            //hacemos consulta para recuperar con su id los datos de la sede en la que se inicio sesion            
			 $alumno =$Alumno->get_alumno($id_alumno);
			 $id_carrera = $alumno["Carrera"];
			 $estatusProceso = $alumno["Proceso"];
			 $idProceso = $alumno["idProceso"];
			 $estatusAlumno = $alumno["Estatus"];

			$sede = $Sede->get_sedevac($id_sede);
			$Id_Sede = $sede["IdSede"];
			$Id_Carrera = $sede["IdCarrera"];
			$nombreSede = $sede["NombreSede"];
			$direccion = $sede["Dirección"];
			$correo = $sede["CorreoContacto"];
			$telefono = $sede["Telefono"];
			$tipoSede = $sede["tiposede"];
			$perfil = $sede["Perfil"];
			$beneficios = $sede["Beneficios"];
			$vacantes = $sede["NumVacantes"];
			$proceso = $sede["NombrePE"];
			$periodo = $sede["Meses"] . " " . $sede["Año"];

            // Verifica si la variable de sesión 'contador' está definida
            if (!isset($_SESSION['contador'])) {
                // Si no está definida, inicialízala en 1
                $_SESSION['contador'] = 0;
            }
        
            // Obtiene el valor actual del contador
            /*$contador = $_SESSION['contador'];
        
            $alumno = new Alumno();
            $alumnos = $alumno->get_alumnos();
        
            // Comprueba si hay datos disponibles y configura $data["alumno"] en consecuencia
            if ($contador <= count($alumnos)) {
                $data["alumno"] = $alumnos[$contador - 1]; // Resta 1 para obtener el índice correcto
                
            $data["fullName"] = $data["alumno"]["NombreA"].'   '.$data["alumno"]["ApellidoP"].'   '.$data["alumno"]["ApellidoM"];
            } else {
                $data["alumno"] = null;
                $_SESSION["contador"] = null;
            }
        
            // Incrementa el contador en 1
            $_SESSION['contador']++;*/
        
            require_once "views/Alumno/detalle.php";
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