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

	public function periodo_editado($id) {
        $query1 = mysqli_query($this->db, "SELECT * FROM periodo WHERE IdPeriodo = $id");
        $periodo = mysqli_fetch_array($query1);
        $status = $periodo["estatus"];
		
	}
	}

