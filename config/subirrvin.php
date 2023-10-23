<?php
$conexion = new mysqli("localhost", "root", "", "vinculacion");
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if ($_FILES["file_rvin"]["error"] === UPLOAD_ERR_OK) {
        $nombreArchivo = $_FILES['file_rvin']['name'];
        $archivoTemporal = $_FILES['file_rvin']['tmp_name'];
    } else if ($_FILES["file_cartaAceptacion"]["error"] === UPLOAD_ERR_OK) {
        $nombreArchivo = $_FILES['file_cartaAceptacion']['name'];
        $archivoTemporal = $_FILES['file_cartaAceptacion']['tmp_name'];
    } else if ($_FILES["file_evaluacion"]["error"] === UPLOAD_ERR_OK) {
        $nombreArchivo = $_FILES['file_evaluacion']['name'];
        $archivoTemporal = $_FILES['file_evaluacion']['tmp_name'];
    } else if ($_FILES["file_cartaliberacion"]["error"] === UPLOAD_ERR_OK) {
        $nombreArchivo = $_FILES['file_cartaliberacion']['name'];
        $archivoTemporal = $_FILES['file_cartaliberacion']['tmp_name'];
    } else {
        http_response_code(500);
        echo json_encode(["error" => "File upload error"]);
    }
    $id_alumno = $_POST["matricula"];
    //$val = $_POST["Matricula"];
    $proceso = $_POST["idProceso"];
    $doc = $_POST["idDocumento"];
    $estatusPTC = 0;
    $estatusVinc = 0;
    $periodo = $_POST["idPeriodo"];
    //$id_curso = $_POST['id_curso'];
    //$id_capsula = $_POST['id_capsula'];
    // Leer el contenido del archivo
    $archivoData = file_get_contents($archivoTemporal);
    // Conectar a la base de datos
    //include "../conexion.php";
    if ($conexion->connect_error) {
        die('Error de conexión: ' . $conexion->connect_error);
    }
    // Preparar la consulta SQL para insertar el archivo en la base de datos
    $consulta = $conexion->prepare('INSERT INTO docalumnoperiodo (Matricula,IdProceso,IdDocumento,DocumentoPDF,EstatusPtc,EstatusVinc,idPeriodo) VALUES (?,?,?,?,?,?,?)');
    $consulta->bind_param('sssssss', $id_alumno, $proceso, $doc, $archivoData, $estatusPTC, $estatusVinc, $periodo);
    if ($consulta->execute()) {
    } else {
    }
    // Cerrar la conexión y liberar recursos
    $consulta->close();
    $conexion->close();
    // Move the file to the target directory
    if (file_get_contents($archivoTemporal)) {
        echo json_encode(["message" => "File uploaded successfully"]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "File upload failed"]);
    }
} else {
    echo "La solicitud debe ser de tipo POST.";
}
