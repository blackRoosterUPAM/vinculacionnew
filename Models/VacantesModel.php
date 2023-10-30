<?php
class Vacantes {

	private $db;
	private $vacante;
      private $proceso;
      private $periodo;
	
	public function __construct() {
		$this->db = Conectar::conexion();
		$this->vacante = array();
	}

	public function show_vacantes($idCarrera)
	{

		$query = mysqli_query($this->db, 'SELECT * FROM vacantes WHERE IdCarrera = ' . $idCarrera . ''); //consulta

		while ($row = $query->fetch_assoc()) {
            $id_sede = $row["IdSede"];
            $id_carrera = $row["IdCarrera"];
            $id_proceso = $row["IdProceso"];
            $id_periodo = $row["IdPeriodo"];
        
            $query1 = mysqli_query($this->db, "SELECT NombreSede FROM sede WHERE IdSede = $id_sede");
            $sede = mysqli_fetch_array($query1);
            $nombre_sede = $sede["NombreSede"];
        
            $query2 = mysqli_query($this->db, "SELECT NombrePE FROM carrera WHERE IdCarrera = $id_carrera");
            $sede = mysqli_fetch_array($query2);
            $nombre_carrera = $sede["NombrePE"];
        
            $query3 = mysqli_query($this->db, "SELECT NombrePE FROM proceso WHERE IdProceso = $id_proceso");
            $sede = mysqli_fetch_array($query3);
            $nombre_proceso = $sede["NombrePE"];
        
            $query4 = mysqli_query($this->db, "SELECT Meses, Año FROM periodo WHERE IdPeriodo = $id_periodo");
            $sede = mysqli_fetch_array($query4);
            $nombre_mes = $sede["Meses"];
            $nombre_año = $sede["Año"];
        
            echo "<tr>";
            echo "<td class="."ps-9".">" . $nombre_sede . "</td>";
            echo "<td class="."ps-0".">" . $nombre_carrera . "</td>";
            echo "<td style="."margin-left: 10px;".">" . $nombre_proceso . "</td>";
            echo "<td style="."margin-left: 10px;".">" . $nombre_mes . " " . $nombre_año ."</td>";
            echo "<td style="."margin-left: 10px;".">" . $row["Perfil"] . "</td>";
            echo "<td style="."margin-left: 10px;".">" . $row["Beneficios"] . "</td>";
            echo "<td style="."margin-left: 10px;".">" . $row["NumVacantes"] . "</td>";
            echo "</tr>";
		}
		return $this->vacante;
	}



      public function get_proceso()
	{
            $sql = "SELECT * FROM proceso";
		
		$resultado = $this->db->query($sql);
		while ($row = $resultado->fetch_assoc()) {
			$this->proceso[] = $row;
		}
		return $this->proceso;
	}
      public function get_periodo()
	{
            $sql = "SELECT * FROM periodo WHERE estatus = 0";
		
		$resultado = $this->db->query($sql);
		while ($row = $resultado->fetch_assoc()) {
			$this->periodo[] = $row;
		}
		return $this->periodo;
	}

      public function nueva_sede($idSede, $idCarrera,$idProceso,$idPeriodo,$perfil,$beneficios,$vacantes){
            $query = mysqli_query($this->db, "INSERT INTO vacantes (IdSede, IdCarrera, IdProceso, IdPeriodo, Perfil, Beneficios, NumVacantes, NumPostulados,totalVacantes) VALUES ('$idSede', '$idCarrera', '$idProceso', '$idPeriodo', '$perfil', '$beneficios', '$vacantes', '$vacantes','$vacantes')");
      }

	}
	
?>