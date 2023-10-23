<?php
$conexion = new mysqli("localhost", "root", "", "vinculacion");
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //$val = $_POST["Matricula"];
    $id_sede = $_POST["idSede"];
    $nombreSede = $_POST["nombreSede"];
    $id_alumno = $_POST["matricula"];
    $id_carrera = $_POST["idCarrera"];
    $id_proceso = $_POST["idProceso"];
    $fechaInicio = "";

    // Conectar a la base de datos
    //include "../conexion.php";
    if ($conexion->connect_error) {
        die('Error de conexión: ' . $conexion->connect_error);
    }

    //Realizando registro alumnosede con fecha vacía
    $consulta = $conexion->prepare('INSERT INTO alumnosede (IdSede, NombreSede, Matricula, NombrePE, FechaInicio, idProceso) VALUES (?,?,?,?,?,?)');
    $consulta->bind_param('ssssss', $id_sede, $nombreSede, $id_alumno, $id_carrera, $fechaInicio, $id_proceso);

    if ($consulta->execute()) {
        echo json_encode(["message" => "Actualizacion al-se realizada correctamente."]);
      } else {
        echo json_encode(["error" => "La actualizacion falló."]);
      }

    //Restando en vacantes -- Verificar como comparar id_periodo id_proceso
    $sql = "SELECT * FROM vacantes WHERE IdSede = $id_sede AND IdCarrera = $id_carrera AND IdProceso = $id_proceso";
    $result = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_object($result);
    $totalVacantes = $row->NumVacantes;
    $offVacantes = $totalVacantes - 1;

    $consulta = $conexion->prepare("UPDATE vacantes SET NumVacantes=? WHERE IdSede=? AND IdCarrera=? AND IdProceso =?");
    if ($consulta === false) {
      trigger_error($this->mysqli->error, E_USER_ERROR);
      return;
    }
    $consulta->bind_param('iiii', $offVacantes, $id_sede, $id_carrera, $id_proceso);

    if ($consulta->execute()) {
        echo json_encode(["message" => "Actualizacion de vacantes realizada correctamente."]);
    } else {
        echo json_encode(["error" => "La actualizacion falló."]);
    }

    //Actualizando proceso en alumno -- Verificar para que son estatus y proceso
    $proceso = 1; //El 1 indica que ya eligió una sede
    $consulta = $conexion->prepare("UPDATE alumnos SET Proceso=? WHERE Matricula=?");
    if ($consulta === false) {
      trigger_error($this->mysqli->error, E_USER_ERROR);
      return;
    }
    $consulta->bind_param('ii', $proceso, $id_alumno);

    if ($consulta->execute()) {
        echo json_encode(["message" => "Actualizacion de proceso realizada correctamente."]);
      } else {
        echo json_encode(["error" => "La actualizacion falló."]);
      }
    // Cerrar la conexión y liberar recursos
    $consulta->close();
    $conexion->close();
    // Move the file to the target directory

} else {
    echo "La solicitud debe ser de tipo POST.";
}
