<?php
$conexion = new mysqli("localhost", "root", "galloUPAM2023.", "vinculacion");
if ($_FILES["file"]["error"] === UPLOAD_ERR_OK) {
  $nombreArchivo = $_FILES['file']['name'];
  $archivoTemporal = $_FILES['file']['tmp_name'];
  $id_alumno = $_POST["Matricula"];
  //$conexion = new Conexion();
  $archivoData = file_get_contents($archivoTemporal);
  // Conectar a la base de datos
  //include "../conexion.php";
  if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
  }

  //Validar si ya existia un CV
  $sql = "SELECT * FROM alumnodocs WHERE Matricula = $id_alumno";
  $result = mysqli_query($conexion, $sql);
  if ($row = mysqli_fetch_object($result)) {
    // Preparar la consulta SQL para insertar el archivo en la base de datos
    //$consulta = $conexion->prepare('UPDATE alumnodocs SET  (CV) = (?) WHERE Matricula = $id_alumno');

    $consulta = $conexion->prepare("UPDATE alumnodocs SET CV=? WHERE Matricula=?");
    if ($consulta === false) {
      trigger_error($this->mysqli->error, E_USER_ERROR);
      return;
    }
    $consulta->bind_param('si', $archivoData, $id_alumno);


    //$consulta->bind_param('ss', $id_alumno, $archivoData); //Modificado para guardar nombre en BD
    if ($consulta->execute()) {
      echo json_encode(["message" => "File uploaded successfully"]);
    } else {
      echo json_encode(["error" => "File upload failed"]);
    }
  } else {
    // Preparar la consulta SQL para insertar el archivo en la base de datos
    $consulta = $conexion->prepare('INSERT INTO alumnodocs (Matricula,CV) VALUES (?,?)');
    $consulta->bind_param('ss', $id_alumno, $archivoData); //Modificado para guardar nombre en BD
    if ($consulta->execute()) {
      echo json_encode(["message" => "File uploaded successfully"]);
    } else {
      echo json_encode(["error" => "File upload failed"]);
    }
  }
  // Cerrar la conexión y liberar recursos
  $consulta->close();
  $conexion->close();
} else {
  http_response_code(500);
  echo json_encode(["error" => "File upload error"]);
}
