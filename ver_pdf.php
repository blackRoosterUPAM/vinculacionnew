<?php
require_once('config/database.php');

// Obtener el ID del documento desde la URL
if (isset($_GET['idDocumento'])) {
    $documentoID = $_GET['idDocumento'];

    // Crear una instancia de la clase Conectar para obtener la conexión a la base de datos
    $conexion = Conectar::conexion();

    // Consulta SQL parametrizada para obtener el PDF desde la base de datos
    $sql = "SELECT documentoPDF, Matricula FROM docalumnoperiodo WHERE DocumentoPDF = ?";

    // Preparar la consulta
    $stmt = $conexion->prepare($sql);
    
    if ($stmt) {
        // Vincular el valor del ID del documento
        $stmt->bind_param("i", $documentoID);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener el resultado
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $pdfData = $row["documentoPDF"];
            $matriculaAlumno = $row["Matricula"];

            // Ahora puedes verificar el ID del documento y mostrar el documento correspondiente
            if ($documentoID == 1) {
                $nombreDocumento = "RVIN.pdf";
            } elseif ($documentoID == 2) {
                $nombreDocumento = "Carta_Aceptacion.pdf";
            } elseif ($documentoID == 3) {
                $nombreDocumento = "Evaluacion_Final.pdf";
            } elseif ($documentoID == 4) {
                $nombreDocumento = "Carta_Liberacion.pdf";
            } else {
                $nombreDocumento = "Documento Desconocido.pdf";
            }

            // Configurar las cabeceras para que el navegador reconozca el PDF
            header("Content-Type: application/pdf");
            header("Content-Disposition: inline; filename='" . $nombreDocumento . "'");

            // Imprimir el contenido del PDF
            echo $pdfData;
        } else {
            echo "Documento no encontrado";
        }
        
        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta.";
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    echo "ID de documento no proporcionado";
}
?>