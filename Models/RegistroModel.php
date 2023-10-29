<?php

class RegistrosModel {

    public function existeAlumno($matricula) {
        $conexion = Conectar::conexion();
        $sql = "SELECT Matricula FROM alumnos WHERE Matricula = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $matricula);
        $stmt->execute();
        $stmt->store_result();
        $existe = $stmt->num_rows > 0;
        $conexion->close();
        return $existe;
    }

    public function insertarAlumno($matricula, $nombre, $apellidoPaterno, $apellidoMaterno, $telefono, $correo, $carrera, $proceso) {
        $conexion = Conectar::conexion();
        $sql = "INSERT INTO alumnos (Matricula, NombreA, ApellidoP, ApellidoM, Telefono, CorreoE, Carrera, idProceso) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssssssii", $matricula, $nombre, $apellidoPaterno, $apellidoMaterno, $telefono, $correo, $carrera, $proceso);

        if ($stmt->execute()) {
            $conexion->close();
            return true;
        } else {
            $conexion->close();
            return false;
        }
    }

    public function insertarUsuario($matricula, $correo, $contrasena, $nombre, $apellidoPaterno, $apellidoMaterno) {
        $conexion = Conectar::conexion();
        $rol = 4; // Supongamos que el rol de los alumnos es 4
        $sql = "INSERT INTO usuarios (IdUsuario, CorreoE, Contraseña, IdRol, NombreU, APaternoU, AMaternoU) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssisss", $matricula, $correo, $contrasena, $rol, $nombre, $apellidoPaterno, $apellidoMaterno);

        if ($stmt->execute()) {
            $conexion->close();
            return true;
        } else {
            $conexion->close();
            return false;
        }
    }
}
?>