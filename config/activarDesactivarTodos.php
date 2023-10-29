<?php
require '../bd/conexion.php';

if (isset($_GET['estado'])) {
    $nuevoEstado = $_GET['estado'];

    // Actualiza el estado de todos los alumnos en la base de datos
    $stmt = $mysqli->prepare("UPDATE estudiantes SET estado = ?");
    $stmt->bind_param("i", $nuevoEstado);
    $stmt->execute();
    $stmt->close();

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}

$mysqli->close();
?>