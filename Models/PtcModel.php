<?php
class ptc
{
    private $db;
    private $ptc;
    private $estatus;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function getPdf($matricula, $idDoc)
    {
        $sql = "SELECT * FROM `docalumnoperiodo` WHERE Matricula = $matricula and IdDocumento = $idDoc";
        $resultado = $this->db->query($sql);
        if ($resultado && $resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            return null;
        }
    }



    public function getSolicitudes()
    {
        $sql = "SELECT da.IdDocumento, da.Matricula,CONCAT( a.NombreA,' ', a.ApellidoP, ' ', a.ApellidoM) as fullName, pr.NombrePE as nombreProceso , d.NombreDoc as nombreDocumento, da.DocumentoPDF as doc, da.EstatusPtc, CONCAT(p.Meses,' ', p.Año) as periodo FROM docalumnoperiodo as da INNER JOIN alumnos as a on a.Matricula =da.Matricula INNER JOIN documentacion as d on d.IdDocumento = da.IdDocumento INNER JOIN periodo as p on p.IdPeriodo = da.IdProceso INNER JOIN proceso as pr on pr.IdProceso = da.IdProceso";

        $resultado = $this->db->query($sql);
        $solicitudes = [];

        while ($row = $resultado->fetch_assoc()) {
            $solicitudes[] = $row;
        }

        return $solicitudes;
    }

    //consulta que modifica el estatus del documento 
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
    public function updateStatusDocInactivo($matricula, $idDoc)
    {
        // Agregar el ID de la sede para buscar solo en esa
        $sql = "UPDATE `docalumnoperiodo` SET EstatusPtc= 0  WHERE Matricula = $matricula and  IdDocumento =  $idDoc ";
        // Utiliza una consulta preparada para evitar SQL injection
        $stmt = $this->db->prepare($sql);
        // Vincula el parámetro de la matrícula
        // $stmt->bind_param("s", $matricula);        
        // $stmt->bind_param("s", $idDoc);
        // // Ejecuta la consulta
        $stmt->execute();
        // Devuelve un valor para indicar si la actualización se realizó con éxito
        return $stmt->affected_rows > 0;
    }

    //consulta que modifica el estatus del documento 
    public function updateStatusDocActivo_($matricula, $idDoc)
    {
        // Agregar el ID de la sede para buscar solo en esa
        $sql = "UPDATE `docalumnoperiodo` SET EstatusVinc= 1  WHERE Matricula = $matricula and  IdDocumento =  $idDoc ";
        // Utiliza una consulta preparada para evitar SQL injection
        $stmt = $this->db->prepare($sql);
        // Vincula el parámetro de la matrícula
        // $stmt->bind_param("s", $matricula);        
        // $stmt->bind_param("s", $idDoc);
        // // Ejecuta la consulta
        $stmt->execute();
        // Devuelve un valor para indicar si la actualización se realizó con éxito
        return $stmt->affected_rows > 0;
    }
    public function updateStatusDocInactivo_($matricula, $idDoc)
    {
        // Agregar el ID de la sede para buscar solo en esa
        $sql = "UPDATE `docalumnoperiodo` SET EstatusVinc= 0  WHERE Matricula = $matricula and  IdDocumento =  $idDoc ";
        // Utiliza una consulta preparada para evitar SQL injection
        $stmt = $this->db->prepare($sql);
        // Vincula el parámetro de la matrícula
        // $stmt->bind_param("s", $matricula);        
        // $stmt->bind_param("s", $idDoc);
        // // Ejecuta la consulta
        $stmt->execute();
        // Devuelve un valor para indicar si la actualización se realizó con éxito
        return $stmt->affected_rows > 0;
    }


    public function getCorreo($matricula)
    {
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
}
