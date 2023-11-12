<?php
class registro{
    private $db;
    private $proceso;
    private $carrera;
    private $alumnos;
    private $documento;
    //estableciendo conexion con la base de datos
    public function __construct(){
        $this->db = Conectar::conexion();
        $this->alumnos = array();
    }

    //obtiene los procesos registrados en la base de datos
    public function get_proceso(){
        $sql = "SELECT * FROM proceso";
        $result = $this->db->query($sql);
        while($row = $result->fetch_assoc()){
            $this->proceso[] = $row;
        }
        return $this->proceso;
    }

    //obtiene las carreras registradas
    public function get_carrera(){
        $sql = "SELECT * FROM carrera";
        $result = $this->db->query($sql);
        while($row = $result->fetch_assoc()){
            $this->carrera[] = $row;
        }
        return $this->carrera;
    }

    //Obtiene el estatus del alumno
    public function get_alumnos() {
		$sql = "SELECT * FROM alumnos WHERE Estatus = 0";
		$resultado = $this->db->query($sql);
		while ($row = $resultado->fetch_assoc()) {
			$this->alumnos[] = $row;
		}
		return $this->alumnos;
	}

    //Cambia el estatus del alumno
    public function estatus_editado($matricula) {
        $query1 = mysqli_query($this->db, "SELECT * FROM alumnos WHERE Matricula = $matricula");
        $alumnos = mysqli_fetch_array($query1);
        $status = $alumnos["Estatus"];
        $message = "";
    
        if ($status == 0) {
            $sql = "UPDATE alumnos SET Estatus = 1 WHERE Matricula = $matricula";
            $resultado = $this->db->query($sql);
            $message = "El alumno ha sido activado de manera exitosa.";
        } elseif ($status == 1) {
            $sql = "UPDATE alumnos SET Estatus = 0 WHERE Matricula = $matricula";
            $resultado = $this->db->query($sql);
            $message = "El alumno ha sido desactivado de manera exitosa.";
        }
    
        // Envía el mensaje al navegador usando JavaScript
        echo "<script>alert('$message'); window.location.href = 'index.php?c=escolars&a=index';</script>";
    }

    //obtiene el estatus del documento
    public function get_documentos() {
		$sql = "SELECT * FROM docalumnoperiodo WHERE EstatusPtc = 0";
		$resultado = $this->db->query($sql);
		while ($row = $resultado->fetch_assoc()) {
			$this->documento[] = $row;
		}
		return $this->documento;
	}

    //Cambia el estatus del alumno
    public function estatus_documento($idDocumento) {
        $query1 = mysqli_query($this->db, "SELECT * FROM docalumnoperiodo WHERE IdDocumento = $idDocumento");
        $documento = mysqli_fetch_array($query1);
        $status = $documento["EstatusPtc"];
        $message = "";
    
        if ($status == 0) {
            $sql = "UPDATE docalumnoperiodo SET EstatusPtc = 1 WHERE IdDocumento = $idDocumento";
            $resultado = $this->db->query($sql);
            $message = "El documento ha sido validado de manera exitosa.";
        } elseif ($status == 1) {
            $sql = "UPDATE docalumnoperiodo SET EstatusPtc = 0 WHERE IdDocumento = $idDocumento";
            $resultado = $this->db->query($sql);
            $message = "El documento no cumple con las características adecuadas.";
        }
    
        // Envía el mensaje al navegador usando JavaScript
        echo "<script>alert('$message'); window.location.href = 'index.php?c=ptcs&a=index';</script>";
    }
}
?>