<?php
class Periodo
{

	private $db;
	private $periodo;

	public function __construct()
	{
		$this->db = Conectar::conexion();
		$this->periodo = array();
	}

	public function get_periodos()
	{
		$sql = "SELECT * FROM periodo WHERE estatus = 0";
		$resultado = $this->db->query($sql);
		while ($row = $resultado->fetch_assoc()) {
			$this->periodo[] = $row;
		}
		return $this->periodo;
	}

	public function periodo_editado($id)
	{
		$query1 = mysqli_query($this->db, "SELECT * FROM periodo WHERE IdPeriodo = $id");
		$periodo = mysqli_fetch_array($query1);
		$status = $periodo["estatus"];

		if ($status == 0) {
			$sql = "UPDATE periodo SET estatus = 1 WHERE IdPeriodo = $id";
			$resultado = $this->db->query($sql);
		}
	}

public function nuevo_periodo($periodo, $anio)
	{
		$query = mysqli_query($this->db, "INSERT INTO periodo (Meses, anio, estatus) VALUES ('$periodo', '$anio', 0)");

		if ($query) {
			return array('status' => 'success', 'message' => 'El periodo se ha registrado exitosamente.');
		} else {
			return array('status' => 'error', 'message' => 'No se pudo realizar el registro del periodo.');
		}
	}

	public function obtenerPeriodos()
	{
		$periodos = array();

		$query = "SELECT Meses, anio FROM periodo";

		$result = mysqli_query($this->db, $query);

		if ($result) {
			while ($row = mysqli_fetch_assoc($result)) {
				$periodos[] = array(
					"Meses" => $row["Meses"],
					"anio" => $row["anio"]
				);
			}
			// Devolver periodos como JSON
			return json_encode($periodos);
		} else {
			// Manejo de errores o mensaje de error
			return json_encode(array("error" => "Error al obtener los datos de periodos"));
		}
	}

	public function datos_busqueda($datoBusqueda)
	{
		// Convertir el dato de búsqueda a minúsculas
		$datoBusqueda = strtolower($datoBusqueda);

		// Dividir el dato de búsqueda en palabras clave
		$palabrasClave = explode(' ', $datoBusqueda);
		$condiciones = [];

		// Crear condiciones para cada palabra clave
		foreach ($palabrasClave as $palabra) {
			$condiciones[] = "LOWER(CONCAT(Meses, anio)) LIKE '%$palabra%'";
		}

		// Unir condiciones con operador OR
		$condicionesSql = implode(' OR ', $condiciones);

		// Realizar la consulta para obtener los datos de búsqueda
		$query = mysqli_query($this->db, "SELECT * FROM periodo WHERE $condicionesSql");

		// Verificar si se encontraron resultados
		if ($query) {
			if ($query->num_rows > 0) {
				while ($row = $query->fetch_assoc()) {
					echo "<tr>";
					echo "<td class='ps-9'>" . htmlentities($row["Meses"]) . "</td>";
					echo "<td class='ps-0'>" . htmlentities($row["anio"]) . "</td>";
					if($row['estatus'] == '0'){
						echo "<td style=" . "margin-left: 10px;" . "><a href=" . "?c=periodo&a=periodo_editado&id=" . $row["IdPeriodo"] . ">Eliminar</a></td>";
						echo "</tr>";
					}else{
						echo "</tr>";
					}
					

					// Imprimimos información sobre la imagen directamente
					echo "<script>console.log('Datos binarios de la imagen:', '" . base64_encode($row["Logo"]) . "');</script>";
				}
			} else {
				// Si no se encontraron resultados, mostrar una alerta
				echo "<script>alert('Sin datos');</script>";
			}
		} else {
			// Si hubo un problema con la consulta, mostrar una alerta
			echo "<script>alert('Hubo un problema con la búsqueda');</script>";
		}
	}
}
