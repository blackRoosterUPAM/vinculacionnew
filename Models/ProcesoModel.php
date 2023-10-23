<?php

class Proceso{

	private $db;
	private $proceso;

	public function __construct(){
		$this->db = Conectar::conexion();
		$this->proceso = array();
	}

	public function get_procesos(){
		$sql = "SELECT * FROM proceso";
		$resultado = $this->db->query($sql);
		while ($row = $resultado->fetch_assoc()) {
			$this->proceso[] = $row;
		}
		return $this->proceso;
	}
}
