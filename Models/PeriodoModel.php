<?php
class Periodo {

	private $db;
	private $periodo;
	
	public function __construct() {
		$this->db = Conectar::conexion();
		$this->periodo = array();
	}

	public function get_periodos() {
		$sql = "SELECT * FROM periodo";
		$resultado = $this->db->query($sql);
		while ($row = $resultado->fetch_assoc()) {
			$this->periodo[] = $row;
		}
		return $this->periodo;
	}

	public function periodo_editado($id,$año) {
        // Consulta SQL para actualizar los datos
        $sql = "UPDATE periodo SET Año=$año WHERE IdPeriodo=$id";
		$resultado = $this->db->query($sql);
	}
	}
	
?>