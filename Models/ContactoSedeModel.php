<?php
class ContactoSede
{
	//LRGA03
	private $db;
	private $sede;

	//funcion principal
	public function __construct()
	{
		$this->db = Conectar::conexion();
		$this->sede = array();
	}

	//funcion para obtener las sedes registradas
	public function get_sedes()
	{
		$sql = "SELECT * FROM sede";
		$resultado = $this->db->query($sql);
		while ($row = $resultado->fetch_assoc()) {
			$this->sede[] = $row;
		}
		return $this->sede;
	}

	//funcion para procesar las solicitudes de la vista

	public function getSolicitudes() {
		$sql = "SELECT a.Matricula, CONCAT(a.NombreA,' ', a.ApellidoP, ' ', a.ApellidoM) as fullName, p.NombrePE, s.NombreSede, s.CorreoContacto, s.Telefono from alumnos as a INNER JOIN Proceso as p on a.idProceso = p.IdProceso INNER JOIN alumnosede as ass on ass.Matricula = a.Matricula INNER JOIN sede as s on s.IdSede = ass.IdSede INNER JOIN ptc on ptc.IdCarrera = a.Carrera WHERE a.Carrera = 3;"; // Agregar la condición de postulación a la misma sede
	
		$resultado = $this->db->query($sql);
		$solicitudes = [];
		$alumnosProcesados = []; // Almacena las matrículas de los alumnos procesados
	
		while ($row = $resultado->fetch_assoc()) {
			// Verifica si la matrícula ya fue procesada
			if (!in_array($row['Matricula'], $alumnosProcesados)) {
				$solicitudes[] = $row;
				$alumnosProcesados[] = $row['Matricula'];
			}
		}
		return $solicitudes;
	}
}
