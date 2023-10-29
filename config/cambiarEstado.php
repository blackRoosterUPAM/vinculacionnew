<?php
require '../config/database.php';

if (isset($_POST['alumnoId']) && isset($_POST['estatus'])) {
    $alumnoId = $_POST['alumnoId'];
    $nuevoEstatus = $_POST['estatus'];

    // Cambia el valor de nuevoEstatus a 0 para desactivar
    if ($nuevoEstatus == 1) {
        $nuevoEstatus = 0;
    } else {
        $nuevoEstatus = 1; // Cambia a 1 para activar si está actualmente desactivado
    }

    // Actualizar el estado del alumno en la base de datos
    $stmt = $mysqli->prepare("UPDATE alumnos SET Estatus = ? WHERE Matricula = ?");
    $stmt->bind_param("is", $nuevoEstatus, $alumnoId);
    $stmt->execute();
    $stmt->close();

    // Puedes agregar una respuesta JSON aquí si es necesario
    echo json_encode(['success' => true]);
} else {
    // Puedes agregar una respuesta JSON aquí si es necesario
    echo json_encode(['success' => false]);
}

$mysqli->close();
?>