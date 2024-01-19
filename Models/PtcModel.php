<?php
class ptc{

    //LRGA03
    private $db;
    private $ptc;
    private $estatus;

    //funcion general
    public function __construct() {
        $this->db = Conectar::conexion();
    }

    //funcion que obtiene el pdf del alumno
    public function getPdf($matricula, $idDoc){
        $sql = "SELECT * FROM `docalumnoperiodo` WHERE Matricula = $matricula and IdDocumento = $idDoc";
        $resultado = $this->db->query($sql);
        if ($resultado && $resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            return null;
        }
    }

    //funcion que procesa las solicitudes
    public function getSolicitudes($correoPtc) {
        $sql = "SELECT da.IdDocumento, da.Matricula, CONCAT(a.NombreA, ' ', a.ApellidoP, ' ', a.ApellidoM) AS fullName, pr.NombrePE AS nombreProceso, d.NombreDoc AS nombreDocumento, da.DocumentoPDF AS doc, da.EstatusPtc, CONCAT(COALESCE(pa.Meses, ''), ' ', COALESCE(pa.Año, '')) AS periodo FROM docalumnoperiodo AS da INNER JOIN alumnos AS a ON a.Matricula = da.Matricula LEFT JOIN documentacion AS d ON d.IdDocumento = da.IdDocumento LEFT JOIN periodo AS pa ON pa.IdPeriodo = a.idPeriodo LEFT JOIN proceso AS pr ON pr.IdProceso = da.IdProceso INNER JOIN ptc AS ptc ON ptc.idCarrera = a.Carrera WHERE ptc.Correo = ?";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $correoPtc);
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        $solicitudes = [];
        while ($row = $resultado->fetch_assoc()) {
            $solicitudes[] = $row;
        }
        
        return $solicitudes;
    }

    public function updateStatusDocActivo($matricula, $idDoc)
    {
        // Agregar el ID de la sede para buscar solo en esa
        $sql = "UPDATE `docalumnoperiodo` SET EstatusPtc= 1  WHERE Matricula = $matricula and  IdDocumento =  $idDoc ";
        // Utiliza una consulta preparada para evitar SQL injection
        $stmt = $this->db->prepare($sql);
        // // Ejecuta la consulta
        $stmt->execute();
        // Devuelve un valor para indicar si la actualización se realizó con éxito
        return $stmt->affected_rows > 0;
    }

    //consulta que modifica el estatus del PTC del documento 
    public function updateStatusDocInactivo($matricula, $idDoc)
    {
        // Agregar el ID de la sede para buscar solo en esa
        $sql = "UPDATE `docalumnoperiodo` SET EstatusPtc= 0  WHERE Matricula = $matricula and  IdDocumento =  $idDoc ";
        // Utiliza una consulta preparada para evitar SQL injection
        $stmt = $this->db->prepare($sql);
        // // Ejecuta la consulta
        $stmt->execute();
        // Devuelve un valor para indicar si la actualización se realizó con éxito
        return $stmt->affected_rows > 0;
    }

    //funcion para enviar el correo de notificacion al alumno
    public function getCorreo($matricula){
        $sql = "SELECT * FROM alumnos WHERE Matricula = $matricula";
        $resultado = $this->db->query($sql);
        if ($resultado && $resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            return null;
        }
    }

    public function get_ptc()
    {
        $sql = "SELECT * FROM ptc";

        $resultado = $this->db->query($sql);
        while ($row = $resultado->fetch_assoc()) {
            $this->ptc[] = $row;
        }
        return $this->ptc;
    }



    public function show_ptc($idCarrera)
    {

        $query = mysqli_query($this->db, 'SELECT * FROM ptc WHERE IdCarrera = ' . $idCarrera . ''); //consulta

        while ($row = $query->fetch_assoc()) {
            $query2 = mysqli_query($this->db, "SELECT * FROM carrera WHERE IdCarrera = $idCarrera");
            $carrera = mysqli_fetch_array($query2);
            $nombre_carrera = $carrera["nombreCarrera"];
            echo "<tr>";
            echo "<td class=" . "ps-9" . ">" . $row["nombrePtc"] . " " . $row["APaternoPtc"] . " " . $row["AMaternoPtc"] . "</td>";
            echo "<td style=" . "margin-left: 10px;" . ">" . $row["correo"] . "</td>";
            echo "<td style=" . "margin-left: 10px;" . ">" . $nombre_carrera . "</td>";
            echo "</tr>";
        }
        return $this->ptc;
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
            $condiciones[] = "LOWER(CONCAT(nombrePtc, APaternoPtc, AMaternoPtc, correo)) LIKE '%$palabra%'";
        }

        // Unir condiciones con operador OR
        $condicionesSql = implode(' OR ', $condiciones);

        // Realizar la consulta para obtener los datos de búsqueda
        $query = mysqli_query($this->db, "SELECT * FROM ptc WHERE $condicionesSql");

        // Verificar si se encontraron resultados
        if ($query) {
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
                    $query2 = mysqli_query($this->db, "SELECT * FROM carrera WHERE IdCarrera = " . $row['IdCarrera']);
                    $carrera = mysqli_fetch_array($query2);
                    $nombre_carrera = $carrera["nombreCarrera"];

                    echo "<tr>";
                    echo "<td class=" . "ps-9" . ">" . $row["nombrePtc"] . " " . $row["APaternoPtc"] . " " . $row["AMaternoPtc"] . "</td>";
                    echo "<td style=" . "margin-left: 10px;" . ">" . $row["correo"] . "</td>";
                    echo "<td style=" . "margin-left: 10px;" . ">" . $nombre_carrera . "</td>";
                    echo "</tr>";
                }
            } else {
                // Si no se encontraron resultados, mostrar una alerta
                $query3 = mysqli_query($this->db, "SELECT * FROM carrera WHERE nombreCarrera = '$datoBusqueda'");
                $carrera = mysqli_fetch_array($query3);
                $idCarrera = $carrera["IdCarrera"];

                // Realizar la consulta para obtener los datos de búsqueda
                $query = mysqli_query($this->db, "SELECT * FROM ptc WHERE IdCarrera = $idCarrera");

                // Verificar si se encontraron resultados
                if ($query) {
                    if ($query->num_rows > 0) {
                        while ($row = $query->fetch_assoc()) {
                            $query2 = mysqli_query($this->db, "SELECT * FROM carrera WHERE IdCarrera = " . $row['IdCarrera']);
                            $carrera = mysqli_fetch_array($query2);
                            $nombre_carrera = $carrera["nombreCarrera"];

                            echo "<tr>";
                            echo "<td class=" . "ps-9" . ">" . $row["nombrePtc"] . " " . $row["APaternoPtc"] . " " . $row["AMaternoPtc"] . "</td>";
                            echo "<td style=" . "margin-left: 10px;" . ">" . $row["correo"] . "</td>";
                            echo "<td style=" . "margin-left: 10px;" . ">" . $nombre_carrera . "</td>";
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
        } else {
            // Si hubo un problema con la consulta, mostrar una alerta
            echo "<script>alert('Hubo un problema con la búsqueda');</script>";
        }
    }


    public function show_ptc_($idCarrera)
	{
		$alumnos = array();

		$query = mysqli_query($this->db, "SELECT * FROM ptc WHERE IdCarrera = $idCarrera");
		$query2 = mysqli_query($this->db, "SELECT * FROM carrera WHERE IdCarrera = $idCarrera");
		$carrera = mysqli_fetch_array($query2);
		$nombre_carrera = $carrera["nombreCarrera"];

		while ($row = $query->fetch_assoc()) {
			$alumnos[] = array(
                "Nombre de PTC" => $row["nombrePtc"] . " " . $row["APaternoPtc"] . " " . $row["AMaternoPtc"],
				"Correo" => $row["correo"],				
				"Carrera" => $nombre_carrera
			);
		}

		// Return alumnos as JSON
		return json_encode($alumnos);
	}

    public function insert_ptc($matricula, $nombre_ptc, $apellidoPaterno, $apellidoMaterno, $correoPtc, $carrera, $contraseña)
	{
		try {
			// Verifica si ya existe un ptc con la misma matrícula
			$matriculaExists = mysqli_query($this->db, "SELECT idPtc FROM ptc WHERE idPtc = $matricula");

			if (mysqli_num_rows($matriculaExists) > 0) {
				// La matrícula ya existe, muestra una alerta de JavaScript
				echo "<script>alert('La matrícula ya existe.');</script>";
				return; // Termina la función sin realizar la inserción
			}

			// Continúa con la inserción si la matrícula no existe
			$query = mysqli_query($this->db, "INSERT INTO ptc (idPtc, nombrePtc, APaternoPtc, AMaternoPtc, correo, IdCarrera) VALUES ('$matricula','$nombre_ptc', '$apellidoPaterno', '$apellidoMaterno', '$correoPtc', $carrera)");

			if (!$query) {
				// Muestra el mensaje de error de MySQL
				echo "Error MySQL: " . mysqli_error($this->db);
			}

			if ($query) {
				$query1 = mysqli_query($this->db, "SELECT idPtc FROM ptc WHERE correo = '$correoPtc'");
				$sede = mysqli_fetch_array($query1);
				$idPtc = $sede["idPtc"];

				$con_MD5 = md5($contraseña);

				$query2 = mysqli_query($this->db, "INSERT INTO usuarios (IdUsuario, CorreoE, Contraseña, IdRol, NombreU, APaternoU, AMaternoU) VALUES ('$idPtc', '$correoPtc', '$con_MD5', 7, '$nombre_ptc', '$apellidoPaterno', '$apellidoMaterno')");

				if ($query2) {
					// Procesar si la segunda consulta fue exitosa
				}
			} else {
				// Manejar el error, por ejemplo, imprimir el error SQL
				echo mysqli_error($this->db);
			}
		} catch (mysqli_sql_exception $exception) {
			// Manejar la excepción específica de MySQL
			echo "Error al procesar la consulta: " . $exception->getMessage();

			// Puedes mostrar un mensaje específico relacionado con la imagen aquí
			echo "<script>alert('Error al procesar el usuario.');</script>";
		}
	}
}
?>
