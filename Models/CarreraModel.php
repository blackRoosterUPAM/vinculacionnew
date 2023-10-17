<?php

class Carrera
{

	private $db;
	private $carrera;

	public function __construct()
	{
		$this->db = Conectar::conexion();
		$this->carrera = array();
	}

	public function get_carreras()
	{
		$sql = "SELECT * FROM carrera";
		
		$resultado = $this->db->query($sql);
		while ($row = $resultado->fetch_assoc()) {
			$this->carrera[] = $row;
		}
		return $this->carrera;
	}
}
