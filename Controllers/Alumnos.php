<?php
require 'vendor/autoload.php';
// Asegúrate de incluir la librería PHPExcel en tu archivo

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AlumnoController
{

	public function __construct()
	{
		require_once "Models/AlumnoModel.php";
		require_once "Models/SedeModel.php";
		require_once "Models/VacantesModel.php";
		require_once "Models/PeriodoModel.php";
	}

	public function index2($id)
	{


		$alumno = new Alumno();
		$data["titulo"] = "alumno";
		$data["alumno"] = $alumno->get_alumnos();

		require_once "views/Alumno/index.php";
	}

	public function index()
	{
		//$id = $_POST['id'];
		//$id = 21032029; //comentar cuando se implementen las sesiones
		//utilizaremos una session para que al volver a llamar se actulice y no pierda el contador
		session_start();
		if (isset($_SESSION['id_usuario']) || isset($_SESSION['name'])) {
			$idUsuario = $_SESSION['id_usuario'];
			$name = $_SESSION['name'];
			if ($name == 'alumno') {
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
		$alumno = $Alumno->get_alumno($id_alumno);
		$nombre = $alumno["NombreA"];
		$apellidoP = $alumno["ApellidoP"];
		$apellidoM = $alumno["ApellidoM"];
		$telefono = $alumno["Telefono"];
		$correoE = $alumno["CorreoE"];
		$carrera = $alumno["nombreCarrera"];
		$proceso = $alumno["Proceso"];
		$estatusAlumno = $alumno["Estatus"];
		$procesoAlumno = $alumno["idProceso"];
		$periodoAlumno = $alumno["idPeriodo"];

		$cv_docs = $Alumno->get_alumnodocs($id_alumno);
		if (!empty($cv_docs)) {
			$fechaCreacion = $cv_docs->FechaCreación;
			$estatusCV = "Subido";
		} else {
			$fechaCreacion = "--";
			$estatusCV = "No subido";
		}

		//$data["docs"] = $Alumno->get_docsvinculacion($id_alumno);
		$docs = $Alumno->get_docsvinculacion($id_alumno, $periodoAlumno);

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

	public function listasedes()
	{
		//$id = $_POST['id'];
		//$id = 21032029; //comentar cuando se implementen las sesiones
		//utilizaremos una session para que al volver a llamar se actulice y no pierda el contador
		session_start();
		if (isset($_SESSION['id_usuario']) || isset($_SESSION['name'])) {
			$idUsuario = $_SESSION['id_usuario'];
			$name = $_SESSION['name'];
			if ($name == 'alumno') {
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
		$alumno = $Alumno->get_alumno($id_alumno);
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

	public function detsede($id_sede)
	{
		//$id = $_POST['id'];
		session_start();
		if (isset($_SESSION['id_usuario']) || isset($_SESSION['name'])) {
			$idUsuario = $_SESSION['id_usuario'];
			$name = $_SESSION['name'];
			if ($name == 'alumno') {
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
		$alumno = $Alumno->get_alumno($id_alumno);
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
	public function show($id)
	{

		$alumno = new Alumno();

		$data["matricula"] = $id;
		$data["alumno"] = $alumno->get_alumno($id);
		$data["titulo"] = "alumno";
		require_once "views/Alumno/detalle.php";
	}

	public function siguiente()
	{
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


	public function actualizar()
	{

		$id = $_POST['id'];
		$nombre = $_POST['nombre'];

		$alumno = new Alumno();
		$alumno->modificar($id, $nombre);
		$data["titulo"] = "alumno";
		$this->index();
	}

	public function show_alumonos_carrera()
	{
		$idCarrera = $_POST['carrera'];
		$Alim_carrera = new Alumno();
		$Alim_carrera->show_alumnos($idCarrera);
	}

	public function exportar($id)
	{
		$idCarrera = $id;
		$Alim_carrera = new Alumno();
		$alumnosData = $Alim_carrera->show_alumnos_($idCarrera);

		if ($alumnosData) {
			$alumnos = json_decode($alumnosData, true);

			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();

			// Agregar encabezados
			$sheet->setCellValue('A1', 'Matrícula');
			$sheet->setCellValue('B1', 'Nombre Completo');
			$sheet->setCellValue('C1', 'Teléfono');
			$sheet->setCellValue('D1', 'Correo');
			$sheet->setCellValue('E1', 'Carrera');

			// Recorrer los datos y agregarlos a la hoja de cálculo
			$row = 2; // Comenzar en la segunda fila
			foreach ($alumnos as $alumno) {
				$sheet->setCellValue('A' . $row, $alumno['Matricula']);
				$sheet->setCellValue('B' . $row, $alumno['NombreCompleto']);
				$sheet->setCellValue('C' . $row, $alumno['Telefono']);
				$sheet->setCellValue('D' . $row, $alumno['Correo']);
				$sheet->setCellValue('E' . $row, $alumno['Carrera']);
				$row++;
			}

			// Establecer cabeceras para descargar el archivo
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="alumnos_carrera_' . $idCarrera . '.xlsx"');
			header('Cache-Control: max-age=0');

			$writer = new Xlsx($spreadsheet);
			$writer->save('php://output');

			exit();
		} else {
			echo json_encode(array("error" => "Error al obtener los datos de los alumnos"));
		}
	}

	public function exportarVacantes($idCarrera){
		$Vacante = new Vacantes(); // Suponiendo que tienes un modelo llamado Vacante que gestiona los datos de la tabla
	
		$vacantesData = $Vacante->obtenerVacantesPorCarrera($idCarrera); // Método para obtener los datos de las vacantes por ID de Carrera
	
		if ($vacantesData) {
			$vacantes = json_decode($vacantesData, true);
	
			$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
	
			$sheet->setCellValue('A1', 'Sede');
			$sheet->setCellValue('B1', 'Carrera');
			$sheet->setCellValue('C1', 'Proceso');
			$sheet->setCellValue('D1', 'Periodo');
			$sheet->setCellValue('E1', 'Perfil');
			$sheet->setCellValue('F1', 'Beneficios');
			$sheet->setCellValue('G1', 'Numero de vacantes');
			$sheet->setCellValue('H1', 'Numero de postulados');
			$sheet->setCellValue('I1', 'Total de vacantes');
	
			$row = 2;
			foreach ($vacantes as $vacante) {
				$sheet->setCellValue('A' . $row, $vacante['Sede']);
				$sheet->setCellValue('B' . $row, $vacante['Carrera']);
				$sheet->setCellValue('C' . $row, $vacante['Proceso']);
				$sheet->setCellValue('D' . $row, $vacante['Periodo']);
				$sheet->setCellValue('E' . $row, $vacante['Perfil']);
				$sheet->setCellValue('F' . $row, $vacante['Beneficios']);
				$sheet->setCellValue('G' . $row, $vacante['Numero de vacantes']);
				$sheet->setCellValue('H' . $row, $vacante['Numero de postulados']);
				$sheet->setCellValue('I' . $row, $vacante['Total de vacantes']);
				$row++;
			}
	
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="vacantes_'.$idCarrera.'.xlsx"');
			header('Cache-Control: max-age=0');
	
			$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
			exit();
		} else {
			echo json_encode(array("error" => "Error al obtener los datos de las vacantes"));
		}
		
	}

	public function exportarSede(){
		$Sedes = new Sede(); // Suponiendo que tienes un modelo llamado Vacante que gestiona los datos de la tabla
	
		$sedesData = $Sedes->obtenerSedes();
	
		if ($sedesData) {
			$sede = json_decode($sedesData, true);
	
			$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
	
			$sheet->setCellValue('A1', 'Matricula');
			$sheet->setCellValue('B1', 'Nombre sede');
			$sheet->setCellValue('C1', 'Dirección');
			$sheet->setCellValue('D1', 'Correo');
			$sheet->setCellValue('E1', 'Telefono');
			$sheet->setCellValue('F1', 'Tipo de sede');
	
			$row = 2;
			foreach ($sede as $sed) {
				$sheet->setCellValue('A' . $row, $sed['Matricula']);
				$sheet->setCellValue('B' . $row, $sed['Nombre sede']);
				$sheet->setCellValue('C' . $row, $sed['Dirección']);
				$sheet->setCellValue('D' . $row, $sed['Correo']);
				$sheet->setCellValue('E' . $row, $sed['Telefono']);
				$sheet->setCellValue('F' . $row, $sed['Tipo de sede']);
				$row++;
			}
	
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="sedes.xlsx"');
			header('Cache-Control: max-age=0');
	
			$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
			exit();
		} else {
			echo json_encode(array("error" => "Error al obtener los datos de las sedes"));
		}
		
	}
	public function exportarPeriodo() {
		$Periodos = new Periodo(); // Suponiendo que tienes un modelo llamado Periodo que gestiona los datos de la tabla
	
		$periodosData = $Periodos->obtenerPeriodos();
	
		if ($periodosData) {
			$periodos = json_decode($periodosData, true);
	
			$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
	
			$sheet->setCellValue('A1', 'Meses');
			$sheet->setCellValue('B1', 'Año');
	
			$row = 2;
			foreach ($periodos as $periodo) {
				$sheet->setCellValue('A' . $row, $periodo['Meses']);
				$sheet->setCellValue('B' . $row, $periodo['Año']);
				$row++;
			}
	
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="periodos.xlsx"');
			header('Cache-Control: max-age=0');
	
			$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
			exit();
		} else {
			echo json_encode(array("error" => "Error al obtener los datos de los periodos"));
		}
	}
	
}
