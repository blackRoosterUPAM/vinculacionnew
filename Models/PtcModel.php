<?php
class ptc{
    private $db;
    private $estatus;

    public function __construct() {
        $this->db = Conectar::conexion();
    }

    public function getSolicitudes() {
        $sql = "SELECT a.Matricula, p.NombrePE as Proceso, doc.NombreDoc
        FROM alumnos a
        LEFT JOIN proceso p ON a.IdProceso = p.IdProceso
        LEFT JOIN documentacion doc ON doc.IdDocumento = doc.IdDocumento
        ORDER BY a.Matricula, 
                 CASE
                    WHEN doc.NombreDoc = 'RVIN' THEN 1
                    WHEN doc.NombreDoc = 'Carta Aceptación' THEN 2
                    WHEN doc.NombreDoc = 'Evaluación Final' THEN 3
                    WHEN doc.NombreDoc = 'Carta Liberación' THEN 4
                    ELSE 5
                 END";

        $resultado = $this->db->query($sql);
        $solicitudes = [];

        while ($row = $resultado->fetch_assoc()) {
            $solicitudes[] = $row;
        }

        return $solicitudes;
    }

}
?>