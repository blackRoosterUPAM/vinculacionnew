<?php
$conexion = new mysqli("localhost", "root", "", "vinculacion");
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if ($_FILES["file_rvin"]["error"] === UPLOAD_ERR_OK) {
        $nombreArchivo = $_FILES['file_rvin']['name'];
        $archivoTemporal = $_FILES['file_rvin']['tmp_name'];
    } else if ($_FILES["file_cartaPresentacion"]["error"] === UPLOAD_ERR_OK) {
        $nombreArchivo = $_FILES['file_cartaPresentacion']['name'];
        $archivoTemporal = $_FILES['file_cartaPresentacion']['tmp_name'];
    }else if ($_FILES["file_cartaAceptacion"]["error"] === UPLOAD_ERR_OK) {
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
    // Leer el contenido del archivo
    $archivoData = file_get_contents($archivoTemporal);

    //Validar si ya existia dicho documento
    $sql = "SELECT * FROM docalumnoperiodo WHERE Matricula = $id_alumno AND IdDocumento = $doc AND IdProceso = $proceso AND idPeriodo = $periodo";
    $result = mysqli_query($conexion, $sql);
    
    // Conectar a la base de datos
    if ($conexion->connect_error) {
        die('Error de conexión: ' . $conexion->connect_error);
    }

    if ($row = mysqli_fetch_object($result)) {
        // Preparar la consulta SQL para insertar el archivo en la base de datos
        //$consulta = $conexion->prepare('UPDATE alumnodocs SET  (CV) = (?) WHERE Matricula = $id_alumno');
    
        $consulta = $conexion->prepare("UPDATE docalumnoperiodo SET DocumentoPDF=? WHERE Matricula=? AND IdProceso=? AND IdDocumento=? AND idPeriodo=?");
        if ($consulta === false) {
          trigger_error($this->mysqli->error, E_USER_ERROR);
          return;
        }
        $consulta->bind_param('siiii', $archivoData, $id_alumno, $proceso, $doc, $periodo);
    
        //$consulta->bind_param('ss', $id_alumno, $archivoData); //Modificado para guardar nombre en BD
        if ($consulta->execute()) {
          echo json_encode(["message" => "File uploaded successfully"]);
        } else {
          echo json_encode(["error" => "File upload failed"]);
        }
    }else{
        // Preparar la consulta SQL para insertar el archivo en la base de datos
        $consulta = $conexion->prepare('INSERT INTO docalumnoperiodo (Matricula,IdProceso,IdDocumento,DocumentoPDF,EstatusPtc,EstatusVinc,idPeriodo) VALUES (?,?,?,?,?,?,?)');
        $consulta->bind_param('sssssss', $id_alumno, $proceso, $doc, $archivoData, $estatusPTC, $estatusVinc, $periodo);
        if ($consulta->execute()) {
        } else {
        }
        // Cerrar la conexión y liberar recursos
        $consulta->close();
        $conexion->close();
        if (file_get_contents($archivoTemporal)) {
            echo json_encode(["message" => "File uploaded successfully"]);
        } else {
            http_response_code(500);
            echo json_encode(["error" => "File upload failed"]);
        }
    }
} else {
    echo "La solicitud debe ser de tipo POST.";
}
