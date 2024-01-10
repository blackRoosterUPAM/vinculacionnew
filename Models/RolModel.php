<?php

class RolModel
{
    private $db;
    private $rol;

    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->rol = array();
    }

    public function obtener_rol()
	{
		$sql = "SELECT * FROM roles";
		$resultado = $this->db->query($sql);
		while ($row = $resultado->fetch_assoc()) {
			$this->rol[] = $row;
		}
		return $this->rol;
	}
}
