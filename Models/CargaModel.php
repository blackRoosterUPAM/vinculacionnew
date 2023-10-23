<?php
class Escolares{
    private $db;
    private $escolare;

    public function __construct(){
        $this->db = Conectar::conexion();
        $this->escolare = array();
    }

    public function get_escolares() {
        $sql = "SELECT alumnos.*, carrera.NombrePE as Carrera, proceso.NombrePE as Proceso
        FROM alumnos
        LEFT JOIN carrera ON alumnos.Carrera = carrera.IdCarrera
        LEFT JOIN proceso ON alumnos.IdProceso = proceso.IdProceso
        ORDER BY alumnos.Matricula DESC";
        
        $resultado = $this->db->query($sql);
        $alumnos = [];
        
        while ($row = $resultado->fetch_assoc()) {
            $alumnos[] = $row;
        }
        
        return $alumnos;
    }
}
?>