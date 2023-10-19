<?php
	
	class SedesController {
		
        //Incuimos los modelos que vamos a utilizar
		public function __construct(){
			require_once "Models/SedeModel.php";
            require_once "Models/SedeAlumnoModel.php";
		}

        //Funcion principal que retorna los alumnos que se postularon a una emperesa en especifico
		public function index() {
             
            // Utilizaremos una sesión para que al volver a llamar se actualice y no pierda el contador
            session_start();

            
            $id = $_SESSION['id_usuario'];
           
        
            // Creamos modelo para sede
            $Sede = new Sede();
            // Hacemos consulta para recuperar con su ID los datos de la sede en la que se inició sesión            
            $sede = $Sede->get_sede($id);
            

            
            $alumno = new SedeAlumno();
            $alumnos = $alumno->getAlumnos($id);
            $vacante = $alumno->getVacantes($id);       
        
            // Verifica si la variable de sesión 'contador' está definida
            if (!isset($_SESSION['contador']) || $_SESSION['contador'] >= count($alumnos)) {
                // Si no está definida o si ya se han mostrado todos los alumnos, inicialízala en 0
                $_SESSION['contador'] = 0;
            }
        
            // Obtiene el valor actual del contador
            $contador = $_SESSION['contador'];
        
            // Comprueba si hay datos disponibles y configura $data["alumno"] en consecuencia
            if ($contador < count($alumnos)) {
                $data["alumno"] = $alumnos[$contador]; // No resta 1 para obtener el índice correcto
        
                $data["fullName"] = $data["alumno"]["NombreA"] . ' ' . $data["alumno"]["ApellidoP"] . ' ' . $data["alumno"]["ApellidoM"];
            } else {
                $data["alumno"] = null;
                // No necesitas establecer $_SESSION["contador"] en null
            }
        
            // Incrementa el contador en 1
            $_SESSION['contador']++;
        
            require_once "views/Sede/index.php";
        }
        
        //Funcion que descarta a un alumno para que este pueda volver a postularse y manda un correo
        public function descartar(){
            $matricula = $_POST['matricula'];
            $alumno = new SedeAlumno();
            $result = $alumno->borraAlumno($matricula);

            require_once "views/Sede/index.php";

        }

         //Funcion que descarta a un alumno para que este pueda volver a postularse y manda un correo
         public function descartarAlumno(){
            $matricula = $_POST['matricula'];
            $alumno = new SedeAlumno();
            $result = $alumno->borraAlumno($matricula);

           

        }

        public function pendiente(){
            $matricula = $_POST['matricula'];
            $alumno = new SedeAlumno();
            $result = $alumno->updateAlumnoCita($matricula);

            require_once "views/Sede/index.php";
        }

        public function pendientes(){
           // Utilizaremos una sesión para que al volver a llamar se actualice y no pierda el contador
           session_start();

            
           $id = $_SESSION['id_usuario'];
            $Sede = new Sede();
            // Hacemos consulta para recuperar con su ID los datos de la sede en la que se inició sesión            
            $sede = $Sede->get_sede($id);

            
            $alumnos = new SedeAlumno();
            $data = $alumnos->alumnoPorConfirmar($id);
            require_once 'views/Sede/pendientes.php';
        }

        //Alumnos confirmados por la sede
        public function confirmados(){
              // Utilizaremos una sesión para que al volver a llamar se actualice y no pierda el contador
              session_start();

            
              $id = $_SESSION['id_usuario'];
            $Sede = new Sede();
            // Hacemos consulta para recuperar con su ID los datos de la sede en la que se inició sesión            
            $sede = $Sede->get_sede($id);

            
            $alumnos = new SedeAlumno();
           $data = $alumnos->alumnoConfirmado($id);
            require_once 'views/Sede/confirmados.php';
        }
        
        //Aceptar al alumno una vez que ya se entrevisto
        public function aceptar() {
            $id = $_POST["matricula"];
             // Utilizaremos una sesión para que al volver a llamar se actualice y no pierda el contador
             session_start();

            
             $idSede = $_SESSION['id_usuario'];
            $alumnos = new SedeAlumno();
            $data = $alumnos->confirmarAlumno($id, $idSede);
        }
        //Brandon

        public function show_sede(){
            $sedes = new Sede();
			$data = $sedes->get_sedes();
            require_once "Views/Vinculacion/sedes.php";
        }
        
        public function nueva_sede(){
            $matricula = $_POST["matricula"];
            $nombre_sede = $_POST["nombre_sede"];
            $direccion = $_POST["direccion"];
            $correo = $_POST["correo"];
            $telefono = $_POST["telefono"];
            $tiposede = $_POST["tiposede"];
            $contraseña = $_POST["contraseña"];
            $nombre = $_POST["nombre"];
            $apellidop = $_POST["apellidop"];
            $apellidom = $_POST["apellidom"];

            $sedes = new Sede();
			$dato = $sedes->new_sede($matricula, $nombre_sede,$direccion,$correo,$telefono,$tiposede,$contraseña,$nombre,$apellidop,$apellidom);

            $sedes = new Sede();
			$data = $sedes->get_sedes();
            require_once "Views/Vinculacion/sedes.php";
        }
        public function edit_sede($id){
            $sede = new Sede();
            $data = $sede->get_sede($id);
            require_once "Views/Vinculacion/edit_sede.php";
        }
        public function sede_editado(){
            $id_sede = $_POST["id_sede"];
            $id = $_POST["identificador"];
            $nombresede = $_POST["nombre_sede"];
            $direccion = $_POST["direccion"];
            $correo = $_POST["correo"];
            $telefono = $_POST["telefono"];
            $tiposede = $_POST["tiposede"];

            $sedes = new Sede();
			$data = $sedes->modificar($id_sede,$id,$nombresede,$direccion,$correo,$telefono,$tiposede);
            
            $sedes = new Sede();
			$data = $sedes->get_sedes();
            require_once "Views/Vinculacion/sedes.php";
        }
        
	}
?>