<?php

class VinculacionController {

    public function __construct(){
        require_once "Models/VinculacionModel.php";
       
    }
    
    public function pdf($id, $id2){
        $modelo = new Vinculacion();
      

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

    public function index_() {
        $modelo = new Vinculacion();
        $solicitudes = $modelo->getSolicitudes();

        include('Views/vinculacion/validacion.php');
    }

    public function validarDoc_($matricula, $idDoc){
        // $matricula = isset($_POST['matricula']);
        // $idDoc = isset($_POST['idDoc']);
        
        $modelo = new Vinculacion();
        $doc = $modelo->updateStatusDocActivo_($matricula, $idDoc);
        header('location: index.php?c=vinculacion&a=index_');
        exit();
    }
    public function descartarDoc_($matricula, $idDoc){
        // $matricula = isset($_POST['matricula']);
        // $idDoc = isset($_POST['idDoc']);
        
        $modelo = new Vinculacion();
        $doc = $modelo->updateStatusDocInactivo_($matricula, $idDoc);

        $docimento = new Vinculacion();
        $docu = $docimento->nombreDocumento($idDoc);
        
        require 'config/correoVV.php';
        $datos = $modelo->getCorreo($matricula);
        enviarCorreo($datos['CorreoE'], 'sss123', $docu["NombreDoc"]);
        header('location: index.php?c=vinculacion&a=index_');
        exit();
    }
    
}
?>