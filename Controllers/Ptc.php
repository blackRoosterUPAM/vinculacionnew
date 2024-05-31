<?php
require 'vendor/autoload.php';
// Asegúrate de incluir la librería PHPExcel en tu archivo

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PtcController
{
    //LRGA03
    //funcion principal
    public function __construct()
    {
        require_once "Models/PtcModel.php";
        require_once "Models/CarreraModel.php";
    }

    //funcion que obtiene el pdf
    public function pdf($id, $id2)
    {
        $modelo = new Ptc();
        $resultado = $modelo->getPdf($id, $id2);

        if ($resultado) {
            // Establece las cabeceras HTTP para indicar que se trata de un archivo PDF
            header("Content-type: application/pdf");
            header("Content-Disposition: inline; filename=mi_pdf.pdf");

            echo $resultado['DocumentoPDF'];
        } else {
            echo "El archivo PDF no se pudo cargar.";
        }
    }


    public function index()
    {
        $modelo = new Ptc();

        session_start();
        // Obtener el correo del PTC de la sesión
        $correoPtc = $_SESSION['correo_ptc'] ?? null;

        if ($correoPtc) {
            $solicitudes = $modelo->getSolicitudes($correoPtc);
            include('Views/ptc/ptc.php');
        }
    }

    public function validarDoc($matricula, $idDoc)
    {
        $modelo = new Ptc();
        $doc = $modelo->updateStatusDocActivo($matricula, $idDoc);
        header('location: index.php?c=ptc&a=index');
        exit();
    }
    public function descartarDoc($matricula, $idDoc)
    {
        $modelo = new Ptc();
        $doc = $modelo->updateStatusDocInactivo($matricula, $idDoc);
        require_once 'config/correoPTC.php';
        $datos = $modelo->getCorreo($matricula);
        enviarCorreo($datos['CorreoE'], 'sss');
        header('location: index.php?c=ptc&a=index');
        exit();
    }

    //DATOS QUE OCUPA VINCULACION
    public function show_ptc_carrera()
    {
        $idCarrera = $_POST['carrera'];
        $Alim_carrera = new ptc();
        $Alim_carrera->show_ptc($idCarrera);
    }

    public function mostrar_busqueda()
    {
        // Obtener el dato de búsqueda desde la solicitud POST
        $datoBusqueda = $_POST['busqueda'];

        // Validar si se ingresó un dato de búsqueda
        if (!empty($datoBusqueda)) {
            // Crear una instancia del modelo de búsqueda
            $modeloBusqueda = new ptc();

            // Llamar a la función en el modelo para realizar la búsqueda
            $resultados = $modeloBusqueda->datos_busqueda($datoBusqueda);

            // Mostrar los resultados (puedes implementar tu propia lógica para mostrar los resultados en la vista)
            echo json_encode($resultados);
        } else {
            // Manejar el caso en el que no se proporcionó un dato de búsqueda
            echo json_encode(["error" => "Por favor, ingresa un dato de búsqueda válido."]);
        }
    }


    // Controlador
    public function exportar($id)
    {
        $idCarrera = $id;
        $Alim_carrera = new ptc();
        $alumnosData = $Alim_carrera->show_ptc_($idCarrera);

        if ($alumnosData) {
            $alumnos = json_decode($alumnosData, true);

            // Crear un objeto Spreadsheet
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Agregar encabezados
            $sheet->setCellValue('A1', 'Nombre de PTC');
            $sheet->setCellValue('B1', 'Correo');  // Corregir la posición de la columna B
            $sheet->setCellValue('C1', 'Carrera');

            // Recorrer los datos y agregarlos a la hoja de cálculo
            $row = 2; // Comenzar en la segunda fila
            foreach ($alumnos as $alumno) {
                $sheet->setCellValue('A' . $row, $alumno['Nombre de PTC']);
                $sheet->setCellValue('B' . $row, $alumno['Correo']);  // Utilizar nombres de columna reales
                $sheet->setCellValue('C' . $row, $alumno['Carrera']);
                $row++;
            }

            ob_start();

            // Crear un objeto Writer y guardar en el buffer de salida
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');

            // Obtener el contenido del buffer
            $content = ob_get_clean();

            // Establecer cabeceras para descargar el archivo
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="alumnos_ptc_' . $idCarrera . '.xlsx"');
            header('Cache-Control: max-age=0');

            // Enviar el contenido descargado
            echo $content;

            exit();
        } else {
            echo json_encode(array("error" => "Error al obtener los datos de los alumnos"));
        }
    }

public function nuevo_ptc()
    {
        // Obtener los datos del formulario
        $matricula = $_POST["matricula"];
        $nombre_ptc = $_POST["nombre_ptc"];
        $apellidoPaterno = $_POST["ApellidoPaterno"];
        $apellidoMaterno = $_POST["ApellidoMaterno"];
        $correoPtc = $_POST["correo"];
        $carrera = $_POST["carrera"];
        $contrasena = $_POST["contrasena"];

        // Verificar si algún campo está vacío
        if (empty($matricula) || empty($nombre_ptc) || empty($apellidoPaterno) || empty($apellidoMaterno) || empty($correoPtc) || empty($carrera) || empty($contrasena)) {
            echo json_encode(array('status' => 'error', 'message' => 'Todos los campos deben ser completados'));
            return;
        }

        // Instanciar el modelo PTC
        $ptc = new Ptc();

        // Insertar el PTC y obtener el resultado
        $resultado = $ptc->insert_ptc($matricula, $nombre_ptc, $apellidoPaterno, $apellidoMaterno, $correoPtc, $carrera, $contrasena);

        // Retornar la respuesta como JSON
        echo json_encode($resultado);
    }
}
