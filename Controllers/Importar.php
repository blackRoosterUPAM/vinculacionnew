<?php
require_once('Models/ImportarModel.php'); // Ajusta la ruta según tu estructura de archivos

class ImportarController
{
    public function importar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['archivo'])) {
            $archivo = $_FILES['archivo'];

            if ($archivo['error'] === UPLOAD_ERR_OK) {
                $importarModel = new ImportarModel();
                $resultado = $importarModel->importarDesdeExcel($archivo);

                if ($resultado) {
                    echo '<script>alert("¡EN HORA BUENA!, REGISTRO PROCESADO EXITOSAMENTE");</script>';
                    echo '<script>window.location.href = "index.php?c=escolars&a=index";</script>';
                } else {
                    echo '<script>alert("¡OH NO!, ERROR AL PROCESAR EL REGISTRO");</script>';
                    echo '<script>window.location.href = "index.php?c=escolars&a=index";</script>';
                }
            } else {
                echo '<script>alert("SELECCIONE EL ARCHIVO A PROCESAR");</script>';
                echo '<script>window.location.href = "index.php?c=escolars&a=index";</script>';
            }
        }
    }
}

// Ejemplo de uso:
$importarController = new ImportarController();
$importarController->importar();