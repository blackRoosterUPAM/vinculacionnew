<?php

class PeriodoController
{

    public function __construct()
    {
        require_once "Models/PeriodoModel.php";
    }

    public function show_periodos()
    {
        $periodo = new Periodo();
        $data = $periodo->get_periodos();

        require_once "Views/Vinculacion/periodo.php";
    }

    public function periodo_editado($id)
    {
        $periodo = new Periodo();
        $data = $periodo->periodo_editado($id);

        $data = $periodo->get_periodos();

        require_once "Views/Vinculacion/periodo.php";
    }

public function new_periodo()
    {
        $periodoValue = $_POST["periodo"]; // Cambia el nombre de la variable para evitar conflictos
        $anioValue = $_POST["anio"]; // Cambia el nombre de la variable para evitar conflictos

        $periodo = new Periodo();
        $response = $periodo->nuevo_periodo($periodoValue, $anioValue); // Usa los nombres de variable corregidos
        echo json_encode($response);
    }

    public function mostrar_busqueda()
    {
        // Obtener el dato de búsqueda desde la solicitud POST
        $datoBusqueda = $_POST['busqueda'];

        // Validar si se ingresó un dato de búsqueda
        if (!empty($datoBusqueda)) {
            // Crear una instancia del modelo de búsqueda
            $modeloBusqueda = new Periodo();

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
