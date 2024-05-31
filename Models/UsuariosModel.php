<?php

class UsuarioModel
{
    private $db;
    private $usuario;

    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->usuario = array();
    }

    public function validarUsuario($correo, $contrasena)
    {
        $contrasena = md5($contrasena);

        $query = "SELECT * FROM usuarios inner join roles on usuarios.idRol = roles.idRol WHERE CorreoE = '$correo' AND Contrasena = '$contrasena'";
        $resultado = mysqli_query($this->db, $query);

        if (mysqli_num_rows($resultado) > 0) {
            return mysqli_fetch_array($resultado);
        }

        return false;
    }

    public function obtener_usuarios()
    {
        $sql = "SELECT * FROM usuarios inner join roles on usuarios.idRol = roles.idRol";
        $resultado = $this->db->query($sql);
        while ($row = $resultado->fetch_assoc()) {
            $this->usuario[] = $row;
        }
        return $this->usuario;
    }

    public function new_usuario($matricula, $correo, $contrasena, $idRol, $nombre, $apellidop, $apellidom)
    {
        if (empty($matricula) || empty($correo) || empty($contrasena) || empty($idRol) || empty($nombre) || empty($apellidop) || empty($apellidom)) {
            return array('status' => 'error', 'message' => 'Llena correctamente todos los campos');
        } else {
            // Verificar si la matrícula ya existe
            $matriculaExistente = $this->verificarMatriculaExistente($matricula);

            if ($matriculaExistente) {
                return array('status' => 'error', 'message' => 'La matrícula ya existe');
            } else {
                $con_MD5 = md5($contrasena);
                $query = mysqli_query($this->db, "INSERT INTO usuarios (IdUsuario, CorreoE, Contrasena, IdRol, NombreU, APaternoU, AMaternoU) VALUES ('$matricula', '$correo', '$con_MD5', $idRol, '$nombre', '$apellidop', '$apellidom')");

                if ($query) {
                    return array('status' => 'success', 'message' => 'Usuario registrado correctamente');
                } else {
                    return array('status' => 'error', 'message' => 'Hubo un problema al insertar al usuario');
                }
            }
        }
    }

    private function verificarMatriculaExistente($matricula)
    {
        // Verifica si la matrícula ya existe en la base de datos
        $query = mysqli_query($this->db, "SELECT IdUsuario FROM usuarios WHERE IdUsuario = '$matricula'");
        $resultado = mysqli_fetch_array($query);

        return ($resultado !== null);
    }



    public function act_usuario($id)
    {
        $sql = "SELECT * FROM usuarios inner join roles on usuarios.idRol = roles.idRol WHERE IdUsuario = ? LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $id);
        $stmt->execute();

        $result = $stmt->get_result(); // Obtener el resultado de la consulta

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); // Obtener la fila como un arreglo asociativo
            return $row;
        } else {
            return null; // No se encontraron resultados
        }
    }

    public function actualizacion_usuarios($matriculaReal, $matricula, $correo, $idRol, $nombre, $apellidop, $apellidom, $idRol2)
    {
        if (empty($matricula) || empty($correo) || empty($idRol) || empty($nombre) || empty($apellidop) || empty($apellidom)) {
            return array('status' => 'error', 'message' => 'No debe dejar campos vacíos');
        } else {
            // Obtener idRol
            $id_Rol = $this->obtenerIdRol($idRol);

            if ($id_Rol !== false) {
                // Determinar el idRol a utilizar
                $id_Rol_a_usar = empty($idRol2) ? $id_Rol : $idRol2;

                // Prepara la consulta SQL para actualizar los datos en la tabla "usuarios"
                $sql = "UPDATE usuarios 
                SET IdUsuario=?, 
                CorreoE=?, 
                idRol=?, 
                NombreU=?, 
                APaternoU=?, 
                AMaternoU=? 
                WHERE IdUsuario=?";

                // Prepara la sentencia
                $stmt = $this->db->prepare($sql);

                // Vincula los parámetros
                $stmt->bind_param("isssssi", $matricula, $correo, $id_Rol_a_usar, $nombre, $apellidop, $apellidom, $matriculaReal);

                // Ejecuta la sentencia
                $resultado = $stmt->execute();

                // Cierra la sentencia
                $stmt->close();

                if ($resultado) {
                    return array('status' => 'success', 'message' => 'Usuario actualizado con éxito');
                } else {
                    return array('status' => 'error', 'message' => 'El usuario no se pudo actualizar');
                }
            }
        }
    }

    private function obtenerIdRol($nombreRol)
    {
        // Sacar consulta para el id de rol
        $query = mysqli_query($this->db, "SELECT idRol FROM roles WHERE nombreRol = '$nombreRol'");
        $sede = mysqli_fetch_array($query);

        if (!$sede) {
            // Manejar el caso cuando no se encuentra el rol
            echo "<script>alert('El rol no existe');</script>";
            return false;
        }

        return $sede["idRol"];
    }

    public function eliminar($id)
    {
        // Verificar que el ID no esté vacío
        if (empty($id)) {
            echo "<script>alert('ID de usuario no válido');</script>";
            return;
        }

        // Preparar la consulta SQL para eliminar el usuario
        $sql = "DELETE FROM usuarios WHERE IdUsuario = ?";

        // Preparar la sentencia
        $stmt = $this->db->prepare($sql);

        // Vincular el parámetro
        $stmt->bind_param("i", $id);

        // Ejecutar la sentencia
        $resultado = $stmt->execute();

        // Cerrar la sentencia
        $stmt->close();

        if ($resultado) {
            echo "<script>alert('Usuario eliminado correctamente');</script>";
        } else {
            echo "<script>alert('Hubo un problema al eliminar el usuario');</script>";
        }
    }

    public function datos_busqueda($datoBusqueda)
    {
        // Convertir el dato de búsqueda a minúsculas
        $datoBusqueda = strtolower($datoBusqueda);

        // Dividir el dato de búsqueda en palabras clave
        $palabrasClave = explode(' ', $datoBusqueda);
        $condiciones = [];

        // Crear condiciones para cada palabra clave
        foreach ($palabrasClave as $palabra) {
            $condiciones[] = "LOWER(CONCAT(u.IdUsuario, u.CorreoE, u.NombreU, u.APaternoU, u.AMaternoU, r.nombreRol)) LIKE '%$palabra%'";
        }

        // Unir condiciones con operador OR
        $condicionesSql = implode(' OR ', $condiciones);

        // Realizar la consulta para obtener los datos de búsqueda
        $query = mysqli_query($this->db, "SELECT u.*, r.nombreRol 
                                      FROM usuarios u
                                      INNER JOIN roles r ON u.idRol = r.idRol
                                      WHERE $condicionesSql");

        // Verificar si se encontraron resultados
        if ($query) {
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='ps-9'>" . htmlentities($row["IdUsuario"]) . "</td>";
                    echo "<td class='ps-0'>" . htmlentities($row["NombreU"] . " " . $row["APaternoU"] . " " . $row["AMaternoU"]) . "</td>";
                    echo "<td style='margin-left: 10px;'>" . htmlentities($row["CorreoE"]) . "</td>";
                    echo "<td style='margin-left: 10px;'>" . htmlentities($row["nombreRol"]) . "</td>";
                    echo "<td class='ps-0'>
                <a href='index.php?c=estad&a=edit_usuario&id=" . htmlentities($row["IdUsuario"]) . "'>Editar Usuario</a> /
                <a href='index.php?c=estad&a=eli_usuario&id=" . htmlentities($row["IdUsuario"]) . "'>Eliminar</a>
                </td>";
                    echo "</tr>";
                }
            } else {
                // Si no se encontraron resultados, mostrar una alerta
                echo "<script>alert('Sin datos');</script>";
            }
        } else {
            // Si hubo un problema con la consulta, mostrar una alerta
            echo "<script>alert('Hubo un problema con la búsqueda');</script>";
        }
    }
}
