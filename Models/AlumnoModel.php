<?php

class Alumno
{

	private $db;
    private $alumno;
    private $docs;
    private $procesos;

	public function __construct()
	{
		$this->db = Conectar::conexion();
        $this->alumno = array();
        $this->docs = array();
	}

	public function get_alumnos()
	{
		$sql = "SELECT a.*, ad.*, al.*
		FROM alumnosede AS a
		INNER JOIN alumnodocs AS ad ON a.Matricula = ad.Matricula INNER JOIN alumnos as al on a.Matricula = al.Matricula
		WHERE a.FechaInicio IS NULL OR a.FechaInicio = ''";

		$resultado = $this->db->query($sql);
		while ($row = $resultado->fetch_assoc()) {
			$this->alumno[] = $row;
		}
		return $this->alumno;
	}

	public function alumnosPostulados()
	{
		$sql = "SELECT a.*, ad.*, al.*, proceso.NombrePE
		FROM alumnosede AS a
		INNER JOIN alumnodocs AS ad ON a.Matricula = ad.Matricula INNER JOIN alumnos as al on a.Matricula = al.Matricula inner join proceso on al.Proceso = proceso.IdProceso
		WHERE a.FechaInicio IS NULL or a.FechaInicio = '' and  a.Aceptado = 1";

		$resultado = $this->db->query($sql);
		while ($row = $resultado->fetch_assoc()) {
			$this->alumno[] = $row;
		}
		return $this->alumno;
	}


	public function get_alumno($id)
    {
        $sql = "SELECT * FROM alumnos as a INNER JOIN carrera as c on a.Carrera = c.IdCarrera WHERE Matricula = $id";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row;
    }

    public function get_alumnodocs($id)
    {
        $sql = "SELECT * FROM alumnodocs WHERE Matricula = $id";
        $resultado = $this->db->query($sql);
        //$row = $resultado->fetch_assoc();
        if ($row = $resultado->fetch_object()){
            //$doc = $row->FechaCreación;
            $doc = $row;
        }else{
            $doc = "";
        }
        return $doc;
    }
    

    public function get_docsvinculacion($id){
        $sql = "SELECT * FROM docalumnoperiodo as dap INNER JOIN documentacion as do ON dap.IdDocumento = do.IdDocumento WHERE Matricula = $id";
        
        $resultado = $this->db->query($sql);
		while ($row = $resultado->fetch_assoc()) {
            
			$this->docs[] = $row;
		}
		return $this->docs;
    }

    public function get_procesos($id){
        $sql = "SELECT p.NombrePE as nombrePro, NombreSede, FechaInicio FROM alumnosede as alse INNER JOIN proceso as p on alse.NombrePE = p.IdProceso WHERE Matricula = $id";
        
        $resultado = $this->db->query($sql);
		while ($row = $resultado->fetch_assoc()) {
            
			$this->procesos[] = $row;
		}
		return $this->procesos;
    }

    public function get_alumno2($id)
    {
        $sql = "SELECT a.*, ad.* FROM alumnosede as a  inner JOIN alumnodocs as ad on a.Matricula = ad.Matricula where a.Matricula = $id";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row;
    }

	public function firstWithPDF()
	{
		$sql = "SELECT alumnos.*, alumnodocs.* FROM alumnos
            INNER JOIN alumnodocs ON alumnos.Matricula = alumnodocs.Matricula
            ORDER BY alumnos.Matricula  ASC
            LIMIT 1";

		$resultado = $this->db->query($sql);

		if ($resultado) {
			$row = $resultado->fetch_assoc();
			return $row;
		} else {
			return null;
		}
	}


	public function modificar($id, $nombre)
	{
	}
	public function show_alumnos($idCarrera)
	{

		$query = mysqli_query($this->db, 'SELECT * FROM alumnos WHERE Carrera = ' . $idCarrera . ''); //consulta

		while ($row = $query->fetch_assoc()) {
			$query2 = mysqli_query($this->db, "SELECT * FROM carrera WHERE IdCarrera = $idCarrera");
			$carrera = mysqli_fetch_array($query2);
			$nombre_carrera = $carrera["NombrePE"];
			echo "<tr>";
			echo "<td class=" . "ps-9" . ">" . $row["Matricula"] . "</td>";
			echo "<td class=" . "ps-0" . ">" . $row["NombreA"] . " " . $row["ApellidoP"] . " " . $row["ApellidoM"] . "</td>";
			echo "<td style=" . "margin-left: 10px;" . ">" . $row["Telefono"] . "</td>";
			echo "<td style=" . "margin-left: 10px;" . ">" . $row["CorreoE"] . "</td>";
			echo "<td style=" . "margin-left: 10px;" . ">" . $nombre_carrera . "</td>";
			echo "</tr>";
		}
		return $this->alumno;
	}
}
