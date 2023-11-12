<?php
class ptc{
    private $db;
    private $estatus;

    public function __construct() {
        $this->db = Conectar::conexion();
    }

    public function getPdf($matricula, $idDoc){
        $sql = "SELECT * FROM `docalumnoperiodo` WHERE Matricula = $matricula and IdDocumento = $idDoc";
        $resultado = $this->db->query($sql);
        if ($resultado && $resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            return null;
        }
    }
    


    public function getSolicitudes() {
        $sql = "SELECT da.IdDocumento, da.Matricula,CONCAT( a.NombreA,' ', a.ApellidoP, ' ', a.ApellidoM) as fullName, pr.NombrePE as nombreProceso , d.NombreDoc as nombreDocumento, da.DocumentoPDF as doc, da.EstatusPtc, CONCAT(p.Meses,' ', p.Año) as periodo FROM docalumnoperiodo as da INNER JOIN alumnos as a on a.Matricula =da.Matricula INNER JOIN documentacion as d on d.IdDocumento = da.IdDocumento INNER JOIN periodo as p on p.IdPeriodo = da.IdProceso INNER JOIN proceso as pr on pr.IdProceso = da.IdProceso";

        $resultado = $this->db->query($sql);
        $solicitudes = [];

        while ($row = $resultado->fetch_assoc()) {
            $solicitudes[] = $row;
        }

        return $solicitudes;
    }

    //consulta que modifica el estatus del documento 
    public function updateStatusDocActivo($matricula, $idDoc)
    {
        // Agregar el ID de la sede para buscar solo en esa
        $sql = "UPDATE `docalumnoperiodo` SET EstatusPtc= 1  WHERE Matricula = $matricula and  IdDocumento =  $idDoc ";
        // Utiliza una consulta preparada para evitar SQL injection
        $stmt = $this->db->prepare($sql);
        // Vincula el parámetro de la matrícula
        // $stmt->bind_param("s", $matricula);        
        // $stmt->bind_param("s", $idDoc);
        // // Ejecuta la consulta
        $stmt->execute();
        // Devuelve un valor para indicar si la actualización se realizó con éxito
        return $stmt->affected_rows > 0;
    }
    public function updateStatusDocInactivo($matricula, $idDoc)
    {
        // Agregar el ID de la sede para buscar solo en esa
        $sql = "UPDATE `docalumnoperiodo` SET EstatusPtc= 0  WHERE Matricula = $matricula and  IdDocumento =  $idDoc ";
        // Utiliza una consulta preparada para evitar SQL injection
        $stmt = $this->db->prepare($sql);
        // Vincula el parámetro de la matrícula
        // $stmt->bind_param("s", $matricula);        
        // $stmt->bind_param("s", $idDoc);
        // // Ejecuta la consulta
        $stmt->execute();
        // Devuelve un valor para indicar si la actualización se realizó con éxito
        return $stmt->affected_rows > 0;
    }


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