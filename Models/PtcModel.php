<?php
class ptc{
    private $db;
    private $estatus;

    //funcion general
    public function __construct() {
        $this->db = Conectar::conexion();
    }

    //funcion que obtiene el pdf del alumno
    public function getPdf($matricula, $idDoc){
        $sql = "SELECT * FROM `docalumnoperiodo` WHERE Matricula = $matricula and IdDocumento = $idDoc";
        $resultado = $this->db->query($sql);
        if ($resultado && $resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            return null;
        }
    }

    //funcion que procesa las solicitudes
    public function getSolicitudes($correoPtc) {
        $sql = "SELECT da.IdDocumento, da.Matricula, CONCAT(a.NombreA, ' ', a.ApellidoP, ' ', a.ApellidoM) AS fullName, pr.NombrePE AS nombreProceso, d.NombreDoc AS nombreDocumento, da.DocumentoPDF AS doc, da.EstatusPtc, CONCAT(COALESCE(pa.Meses, ''), ' ', COALESCE(pa.Año, '')) AS periodo FROM docalumnoperiodo AS da INNER JOIN alumnos AS a ON a.Matricula = da.Matricula LEFT JOIN documentacion AS d ON d.IdDocumento = da.IdDocumento LEFT JOIN periodo AS pa ON pa.IdPeriodo = a.idPeriodo LEFT JOIN proceso AS pr ON pr.IdProceso = da.IdProceso INNER JOIN Ptc AS ptc ON ptc.idCarrera = a.Carrera WHERE ptc.Correo = ?";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $correoPtc);
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        $solicitudes = [];
        while ($row = $resultado->fetch_assoc()) {
            $solicitudes[] = $row;
        }
        
        return $solicitudes;
    }

    public function updateStatusDocActivo($matricula, $idDoc)
    {
        // Agregar el ID de la sede para buscar solo en esa
        $sql = "UPDATE `docalumnoperiodo` SET EstatusPtc= 1  WHERE Matricula = $matricula and  IdDocumento =  $idDoc ";
        // Utiliza una consulta preparada para evitar SQL injection
        $stmt = $this->db->prepare($sql);
        // // Ejecuta la consulta
        $stmt->execute();
        // Devuelve un valor para indicar si la actualización se realizó con éxito
        return $stmt->affected_rows > 0;
    }

    //consulta que modifica el estatus del PTC del documento 
    public function updateStatusDocInactivo($matricula, $idDoc)
    {
        // Agregar el ID de la sede para buscar solo en esa
        $sql = "UPDATE `docalumnoperiodo` SET EstatusPtc= 0  WHERE Matricula = $matricula and  IdDocumento =  $idDoc ";
        // Utiliza una consulta preparada para evitar SQL injection
        $stmt = $this->db->prepare($sql);
        // // Ejecuta la consulta
        $stmt->execute();
        // Devuelve un valor para indicar si la actualización se realizó con éxito
        return $stmt->affected_rows > 0;
    }

    //funcion para enviar el correo de notificacion al alumno
    public function getCorreo($matricula){
        $sql = "SELECT * FROM alumnos WHERE Matricula = $matricula";
        $resultado = $this->db->query($sql);
        if ($resultado && $resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            return null;
        }
    }
}
?>