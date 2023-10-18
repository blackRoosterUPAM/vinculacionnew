<?php
class Sede {

	private $db;
	private $sede;
	
	public function __construct() {
		$this->db = Conectar::conexion();
		$this->sede = array();
	}

	public function get_sedes() {
		$sql = "SELECT * FROM sede";
		$resultado = $this->db->query($sql);
		while ($row = $resultado->fetch_assoc()) {
			$this->sede[] = $row;
		}
		return $this->sede;
	}
	
	public function get_sede($id) {
		$sql = "SELECT * FROM sede WHERE IdSede = ? LIMIT 1";
		$stmt = $this->db->prepare($sql);
		$stmt->bind_param('s', $id);
		$stmt->execute();
		
		$result = $stmt->get_result(); // Obtener el resultado de la consulta
		
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc(); // Obtener la fila como un arreglo asociativo
			return $row;
		} else {
			return null; // No se encontraron resultados
		}
	}
	
	
	public function modificar($id, $nombre, $direccion, $correo_contacto, $telefono, $tipo_sede) {
		$sql = "UPDATE sede SET nombre_sede=:nombre, direccion=:direccion, correo_contacto=:correo_contacto, telefono=:telefono, tipo_sede=:tipo_sede WHERE idsede=:id";
		$stmt = $this->db->prepare($sql);
		$stmt->bind_param(':id', $id);
		$stmt->bind_param(':nombre', $nombre);
		$stmt->bind_param(':direccion', $direccion);
		$stmt->bind_param(':correo_contacto', $correo_contacto);
		$stmt->bind_param(':telefono', $telefono);
		$stmt->bind_param(':tipo_sede', $tipo_sede);
		$stmt->execute();
	}

	public function new_sede($matricula, $nombre_sede,$direccion,$correo,$telefono,$tiposede,$contraseña,$nombre,$apellidop,$apellidom){
		$query = mysqli_query($this->db, "INSERT INTO sede (IdSede, NombreSede, Dirección, CorreoContacto, Telefono, tiposede) VALUES ( '$matricula','$nombre_sede', '$direccion', '$correo', '$telefono', '$tiposede')");
        
        if($query){
            $query1 = mysqli_query($this->db, "SELECT IdSede FROM sede WHERE CorreoContacto = '$correo'");
            $sede = mysqli_fetch_array($query1);
            $id_sede = $sede["IdSede"];

            $con_MD5 = md5($contraseña);

            $query2 = mysqli_query($this->db, "INSERT INTO usuarios (IdUsuario, CorreoE, Contraseña, IdRol, NombreU, APaternoU, AMaternoU) VALUES ('$id_sede', '$correo', '$con_MD5', 2, '$nombre', '$apellidop', '$apellidom')");

            if($query2){}
            
        }
	}
	}
	
?>