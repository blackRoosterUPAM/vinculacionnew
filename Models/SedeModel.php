<?php
class Sede
{

	private $db;
	private $sede;

	public function __construct()
	{
		$this->db = Conectar::conexion();
		$this->sede = array();
	}

	public function get_sedes()
	{
		$sql = "SELECT * FROM sede";
		$resultado = $this->db->query($sql);
		while ($row = $resultado->fetch_assoc()) {
			$this->sede[] = $row;
		}
		return $this->sede;
	}

	public function get_sede($id)
	{
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


	public function modificar($id_sede, $id, $nombresede, $direccion, $correo, $telefono, $tiposede)
	{
		// Consulta SQL para actualizar los datos
		$sql = "UPDATE sede 
                SET IdSede= $id,
                    NombreSede='$nombresede', 
                    Dirección='$direccion', 
                    CorreoContacto='$correo', 
                    Telefono='$telefono', 
                    tiposede='$tiposede' 
                WHERE IdSede=$id_sede";
		$resultado = $this->db->query($sql);

		if ($resultado) {
			// Consulta SQL para actualizar los datos
			$sql2 = "UPDATE usuarios 
			SET IdUsuario= $id
			WHERE IdUsuario=$id_sede";
			$resultado2 = $this->db->query($sql2);
		}
	}

	public function new_sede($matricula, $nombre_sede, $direccion, $correo, $telefono, $tiposede, $contraseña, $nombre, $apellidop, $apellidom)
	{
		$query = mysqli_query($this->db, "INSERT INTO sede (IdSede, NombreSede, Dirección, CorreoContacto, Telefono, tiposede) VALUES ( '$matricula','$nombre_sede', '$direccion', '$correo', '$telefono', '$tiposede')");

		if ($query) {
			$query1 = mysqli_query($this->db, "SELECT IdSede FROM sede WHERE CorreoContacto = '$correo'");
			$sede = mysqli_fetch_array($query1);
			$id_sede = $sede["IdSede"];

			$con_MD5 = md5($contraseña);

			$query2 = mysqli_query($this->db, "INSERT INTO usuarios (IdUsuario, CorreoE, Contraseña, IdRol, NombreU, APaternoU, AMaternoU) VALUES ('$id_sede', '$correo', '$con_MD5', 5, '$nombre', '$apellidop', '$apellidom')");

			if ($query2) {
			}
		}
	}

	/*Consulta para obtener sedes por carrera y proceso 
		Utilizada en AlumnosController
	*/
	public function get_sedespcp($idProceso, $idCarrera)
	{
		$sql = "SELECT * FROM sede as s INNER JOIN vacantes as v on s.IdSede = v.IdSede WHERE IdProceso = $idProceso AND IdCarrera = $idCarrera AND NumVacantes > 0";
		$resultado = $this->db->query($sql);
		while ($row = $resultado->fetch_assoc()) {
			$this->sede[] = $row;
		}
		return $this->sede;
	}
	/*Consulta para obtener detalle de sede 
		Utilizada en AlumnosController
	*/
	public function get_sedevac($id)
	{
		$sql = "SELECT * FROM sede as s INNER JOIN vacantes as v on s.IdSede = v.IdSede INNER JOIN proceso as p on v.IdProceso = p.IdProceso INNER JOIN periodo as pe on v.IdPeriodo = pe.IdPeriodo WHERE s.IdSede = $id";
		$resultado = $this->db->query($sql);
		$row = $resultado->fetch_assoc();
		return $row;
	}
}
