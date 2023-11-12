<?php

class PtcController {

    public function __construct(){
        require_once "Models/PtcModel.php";
       
    }
    
    public function pdf($id, $id2){
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
    

    public function index() {
        $modelo = new Ptc();
        $solicitudes = $modelo->getSolicitudes();

        include('views/ptc/ptc.php');
    }

    public function validarDoc($matricula, $idDoc){
        // $matricula = isset($_POST['matricula']);
        // $idDoc = isset($_POST['idDoc']);
        
        $modelo = new Ptc();
        $doc = $modelo->updateStatusDocActivo($matricula, $idDoc);
        header('location: index.php?c=ptc&a=index');
        exit();
    }
    public function descartarDoc($matricula, $idDoc){
        // $matricula = isset($_POST['matricula']);
        // $idDoc = isset($_POST['idDoc']);
        
        $modelo = new Ptc();
        $doc = $modelo->updateStatusDocInactivo($matricula, $idDoc);
        require_once 'config/correoUserContra.php';
        $datos = $modelo->getCorreo($matricula);
        enviarCorreo($datos['CorreoE'], 'sss');
        header('location: index.php?c=ptc&a=index');
        exit();
    }
    
}
?>