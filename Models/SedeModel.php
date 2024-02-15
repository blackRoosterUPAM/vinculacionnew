<?php
class Sede
{

	private $db;
	private $sede;

	public function __construct()
	{
		$this->db = Conectar::conexion();
		$this->sede = array();
	}

	public function get_sedes()
	{
		$sql = "SELECT * FROM sede";
		$resultado = $this->db->query($sql);
		while ($row = $resultado->fetch_assoc()) {
			$this->sede[] = $row;
		}
		return $this->sede;
	}

	public function get_sede($id)
	{
		$sql = "SELECT * FROM sede WHERE IdSede = ? LIMIT 1";
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


	public function modificar($id_sede, $id, $nombresede, $direccion, $correo, $telefono, $tiposede)
	{
		try {
			// Prepara la consulta SQL para actualizar los datos en la tabla "sede"
			$sql = "UPDATE sede 
                SET IdSede=?, 
                    NombreSede=?, 
                    Dirección=?, 
                    CorreoContacto=?, 
                    Telefono=?, 
                    tiposede=? 
                WHERE IdSede=?";

			// Prepara la sentencia
			$stmt = $this->db->prepare($sql);

			// Vincula los parámetros
			$stmt->bind_param("isssisi", $id, $nombresede, $direccion, $correo, $telefono, $tiposede, $id_sede);

			// Ejecuta la sentencia
			$resultado = $stmt->execute();

			// Cierra la sentencia
			$stmt->close();

			if ($resultado) {
				// Prepara la consulta SQL para actualizar los datos en la tabla "usuarios"
				$sql2 = "UPDATE usuarios 
                    SET IdUsuario=?, CorreoE=? 
                    WHERE IdUsuario=?";

				// Prepara la sentencia
				$stmt2 = $this->db->prepare($sql2);

				// Vincula los parámetros
				$stmt2->bind_param("iss", $id, $correo, $id_sede);

				// Ejecuta la sentencia
				$resultado2 = $stmt2->execute();

				// Cierra la sentencia
				$stmt2->close();

				if (!$resultado2) {
					return array('status' => 'error', 'message' => 'Error al actualizar los datos');
				}
			} else {
				return array('status' => 'error', 'message' => 'Error al actualizar los datos');
			}

			return array('status' => 'success', 'message' => 'Actualización Correcta');
		} catch (Exception $e) {
			return array('status' => 'error', 'message' => $e->getMessage());
		}
	}

	public function new_sede($matricula, $nombre_sede, $direccion, $correo, $telefono, $tiposede, $contraseña, $nombre, $apellidop, $apellidom, $logo)
	{
		// Inicializar la respuesta
		$response = array();

		// Verificar si la matrícula ya existe
		$matriculaExists = mysqli_query($this->db, "SELECT IdSede FROM sede WHERE IdSede = '$matricula'");

		if (mysqli_num_rows($matriculaExists) > 0) {
			// La matrícula ya existe, mostrar un mensaje de error
			$response['status'] = 'error';
			$response['message'] = 'La matrícula ya existe en la plataforma.';
		} else {
			// Continuar con la inserción si la matrícula no existe
			try {
				// Obtener el contenido binario del logo si está definido
				$logoContenido = null;
				if ($logo && isset($logo['tmp_name'])) {
					$logoContenido = mysqli_real_escape_string($this->db, file_get_contents($logo['tmp_name']));
				}

				// Realizar la inserción en la tabla sede
				$query = mysqli_query($this->db, "INSERT INTO sede (IdSede, NombreSede, Dirección, CorreoContacto, Telefono, tiposede, logo) 
                                               VALUES ('$matricula', '$nombre_sede', '$direccion', '$correo', '$telefono', '$tiposede', '$logoContenido')");

				if ($query) {
					// Obtener el ID de la sede insertada
					$id_sede = mysqli_insert_id($this->db);

					// Hashear la contraseña antes de almacenarla en la base de datos
					$contraseña_hasheada = md5($contraseña);

					// Realizar la inserción en la tabla usuarios
					$query2 = mysqli_query($this->db, "INSERT INTO usuarios (IdUsuario, CorreoE, Contraseña, IdRol, NombreU, APaternoU, AMaternoU) 
                                                    VALUES ('$id_sede', '$correo', '$contraseña_hasheada', 5, '$nombre', '$apellidop', '$apellidom')");

					if ($query2) {
						// Éxito en la inserción de la sede y el usuario
						$response['status'] = 'success';
						$response['message'] = 'La sede se ha creado exitosamente.';
					} else {
						// Error al insertar en la tabla usuarios
						$response['status'] = 'error';
						$response['message'] = 'Hubo un error al crear la sede. Por favor, inténtelo de nuevo.';
					}
				} else {
					// Error al insertar en la tabla sede
					$response['status'] = 'error';
					$response['message'] = 'Hubo un error al crear la sede. Por favor, inténtelo de nuevo.';
				}
			} catch (mysqli_sql_exception $exception) {
				// Manejar la excepción específica de MySQL
				$response['status'] = 'error';
				$response['message'] = 'Error al procesar la consulta: ' . $exception->getMessage();
			}
		}

		return $response;
	}

	/*Consulta para obtener sedes por carrera y proceso 
		Utilizada en AlumnosController
	*/
	public function get_sedespcp($idProceso, $idCarrera)
	{
		$sql = "SELECT * FROM sede as s INNER JOIN vacantes as v on s.IdSede = v.IdSede WHERE IdProceso = $idProceso AND IdCarrera = $idCarrera AND NumVacantes > 0";
		$resultado = $this->db->query($sql);
		while ($row = $resultado->fetch_assoc()) {
			$this->sede[] = $row;
		}
		return $this->sede;
	}
	/*Consulta para obtener detalle de sede 
		Utilizada en AlumnosController
	*/
	public function get_sedevac($id)
	{
		$sql = "SELECT * FROM sede as s INNER JOIN vacantes as v on s.IdSede = v.IdSede INNER JOIN proceso as p on v.IdProceso = p.IdProceso INNER JOIN periodo as pe on v.IdPeriodo = pe.IdPeriodo WHERE s.IdSede = $id";
		$resultado = $this->db->query($sql);
		$row = $resultado->fetch_assoc();
		return $row;
	}

	public function obtenerSedes()
	{
		$vacantes = array();

		$query = "SELECT * FROM sede";

		$result = mysqli_query($this->db, $query);

		if ($result) {
			while ($row = mysqli_fetch_assoc($result)) {
				$vacantes[] = array(
					"Matricula" => $row["IdSede"],
					"Nombre sede" => $row["NombreSede"],
					"Dirección" => $row["Dirección"],
					"Correo" => $row["CorreoContacto"],
					"Telefono" => $row["Telefono"],
					"Tipo de sede" => $row["tiposede"]
				);
			}
			// Devolver vacantes como JSON
			return json_encode($vacantes);
		} else {
			// Manejo de errores o mensaje de error
			return json_encode(array("error" => "Error al obtener las vacantes"));
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
			$condiciones[] = "LOWER(CONCAT(IdSede,NombreSede, Dirección, CorreoContacto, Telefono, tiposede)) LIKE '%$palabra%'";
		}

		// Unir condiciones con operador OR
		$condicionesSql = implode(' OR ', $condiciones);

		// Realizar la consulta para obtener los datos de búsqueda
		$query = mysqli_query($this->db, "SELECT * FROM sede WHERE $condicionesSql");

		// Verificar si se encontraron resultados
		if ($query) {
			if ($query->num_rows > 0) {
				while ($row = $query->fetch_assoc()) {
					echo "<tr>";
					echo "<td class='ps-9'>";
					if (!empty($row["Logo"])) {
						// Mostramos la imagen directamente desde la base de datos
						$imageSrc = "data:image/jpeg;base64," . base64_encode($row["Logo"]);
						echo "<img src='{$imageSrc}' alt='Logo de la sede' style='max-width: 100px; max-height: 100px;' type='image/jpeg'>";
						echo "<script>console.log('Ruta de la imagen:', '{$imageSrc}');</script>";
					} else {
						// Si no hay un logo, mostramos un mensaje o un marcador de posición
						echo "Sin logo";
						echo "<script>console.log('Sin imagen');</script>";
					}
					echo "</td>";
					echo "<td class='ps-9'>" . htmlentities($row["IdSede"]) . "</td>";
					echo "<td class='ps-0'>" . htmlentities($row["NombreSede"]) . "</td>";
					echo "<td style='margin-left: 10px;'>" . htmlentities($row["Dirección"]) . "</td>";
					echo "<td style='margin-left: 10px;'>" . htmlentities($row["CorreoContacto"]) . "</td>";
					echo "<td style='margin-left: 10px;'>" . htmlentities($row["Telefono"]) . "</td>";
					echo "<td style='margin-left: 10px;'>" . htmlentities($row["tiposede"]) . "</td>";
					echo "<td style='margin-left: 10px;'><a href='index.php?c=sedes&a=edit_sede&id=" . $row["IdSede"] . "'>Editar Sede</a></td>";
					echo "</tr>";

					// Imprimimos información sobre la imagen directamente
					echo "<script>console.log('Datos binarios de la imagen:', '" . base64_encode($row["Logo"]) . "');</script>";
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
