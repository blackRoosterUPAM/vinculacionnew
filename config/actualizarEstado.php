<?php
require '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $idDocumento = $_POST['idDocumento'];
    $estatus = $_POST['estatus']; // 1 para PDF Válido, 0 para PDF No Válido

    try {
        // Establecer la conexión a la base de datos utilizando la clase Conectar
        $conexion = Conectar::conexion();

        // Construir la consulta SQL para actualizar el estado EstatusPtc
        $sql = "UPDATE tu_tabla SET EstatusPtc = ? WHERE IdDocumento = ?";

        // Preparar la consulta
        $stmt = $conexion->prepare($sql);

        // Asignar valores a los marcadores de posición
        $stmt->bind_param('ii', $estatus, $idDocumento);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // La actualización se realizó con éxito
            $response = array("success" => true);
            echo json_encode($response);
        } else {
            // Hubo un error en la actualización
            $response = array("success" => false, "error" => $conexion->error);
            echo json_encode($response);
        }

        // Cerrar la conexión
        $stmt->close();
        $conexion->close();
    } catch (Exception $e) {
        // Enviar una respuesta JSON si hubo un error
        $response = array("success" => false, "error" => $e->getMessage());
        echo json_encode($response);
    }
} else {
    // Redirigir o manejar de alguna manera las solicitudes incorrectas
    http_response_code(400);
    echo "Solicitud incorrecta";
}

//Cambio de estado del alumno

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['alumnoId']) && isset($_POST['nuevoEstatus'])) {
    // Realiza la conexión a la base de datos (debes incluir tu archivo de conexión)
    require 'config/database.php';

    // Obtiene los datos de la solicitud POST
    $alumnoId = $_POST['alumnoId'];
    $nuevoEstatus = $_POST['nuevoEstatus'];

    // Actualiza el estatus del alumno en la base de datos
    $conexion = Conectar::conexion(); // Usando la clase de conexión que proporcionaste

    $stmt = $conexion->prepare("UPDATE alumnos SET Estatus = ? WHERE Matricula = ?");
    $stmt->bind_param("is", $nuevoEstatus, $alumnoId);

    if ($stmt->execute()) {
        echo "success"; // Indica que la actualización fue exitosa
        die();
    } else {
        echo "error"; // Indica que hubo un error en la actualización
    }

    $stmt->close();
    $conexion->close();
} else {
    echo "Invalid request"; // Respuesta si la solicitud no es válida
}
?>
