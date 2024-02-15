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
        require_once "Views/Vinculacion/vacantes.php";
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
        require_once "Views/Vinculacion/Selec_cupos.php";
    }

   public function new_vacante()
    {
        // Obtener los datos del formulario
        $idSede = $_POST["sede"];
        $idCarrera = $_POST["carrera"];
        $idProceso = $_POST["proceso"];
        $idPeriodo = $_POST["periodo"];
        $perfil = $_POST["perfil"];
        $beneficios = $_POST["beneficios"];
        $vacantes = $_POST["vacantes"];

        // Instanciar el modelo de vacantes
        $vacanteModel = new Vacantes();

        // Llamar al método para agregar una nueva vacante
        $response = $vacanteModel->nueva_vacante($idSede, $idCarrera, $idProceso, $idPeriodo, $perfil, $beneficios, $vacantes);

        // Enviar la respuesta como JSON
        echo json_encode($response);
    }

    public function mostrar_busqueda()
	{
		// Obtener el dato de búsqueda desde la solicitud POST
		$datoBusqueda = $_POST['busqueda'];

		// Validar si se ingresó un dato de búsqueda
		if (!empty($datoBusqueda)) {
			// Crear una instancia del modelo de búsqueda
			$modeloBusqueda = new Vacantes();

			// Llamar a la función en el modelo para realizar la búsqueda
			$resultados = $modeloBusqueda->datos_busqueda($datoBusqueda);

			// Mostrar los resultados (puedes implementar tu propia lógica para mostrar los resultados en la vista)
			echo json_encode($resultados);
		} else {
			// Manejar el caso en el que no se proporcionó un dato de búsqueda
			echo json_encode(["error" => "Por favor, ingresa un dato de búsqueda válido."]);
		}
	}
    
}
