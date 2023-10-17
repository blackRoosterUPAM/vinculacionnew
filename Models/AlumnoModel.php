<?php

class Alumno
{

	private $db;
	private $alumno;

	public function __construct()
	{
		$this->db = Conectar::conexion();
		$this->alumno = array();
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
