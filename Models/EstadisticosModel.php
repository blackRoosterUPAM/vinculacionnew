<?php

class Estadistico
{
    private $db;
    private $alumno;

    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->alumno = array();
    }

    // Función para obtener las carreras disponibles
    public function obtenerCarreras()
    {
        $sql = "SELECT * FROM carrera";
        $resultado = $this->db->query($sql);
        $carreras = array();

        while ($row = $resultado->fetch_assoc()) {
            $carreras[] = $row;
        }

        return $carreras;
    }

    // Función para obtener los datos de una carrera específica
    public function obtenerDatosCarrera($nombreCarrera)
    {
        $sql = "SELECT c.nombreCarrera AS country,
            SUM(CASE WHEN a.Estatus = 1 THEN 1 ELSE 0 END) AS active,
            SUM(CASE WHEN a.Estatus = 0 THEN 1 ELSE 0 END) AS inactive
        FROM alumnos AS a
        INNER JOIN carrera AS c ON a.Carrera = c.IdCarrera
        WHERE c.nombreCarrera = ?
        GROUP BY c.nombreCarrera";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $nombreCarrera);
        $stmt->execute();

        $result = $stmt->get_result();
        $this->alumno = array();

        while ($row = $result->fetch_assoc()) {
            $this->alumno[] = $row;
        }

        $stmt->close();

        return $this->alumno;
    }


    //Sede

    // Función para obtener las sedes disponibles
    public function obtenerSedes()
    {
        $sql = "SELECT * FROM sede";
        $resultado = $this->db->query($sql);
        $sedes = array();

        while ($row = $resultado->fetch_assoc()) {
            $sedes[] = $row;
        }

        return $sedes;
    }

    // Función para obtener los datos de una sede específica
    public function obtenerDatosSede($idSede, $idPeriodo)
    {
        $sql = "SELECT 
                COUNT(CASE WHEN asd.Aceptado = 2 THEN 1 END) AS aceptados,
                COUNT(CASE WHEN asd.Aceptado = 0 AND (asd.FechaInicio IS NULL OR asd.FechaInicio = 0) THEN 1 END) AS pendientes,
                COUNT(CASE WHEN a.Proceso = 0 THEN 1 END) AS rechazados
            FROM alumnosede asd
            JOIN alumnos a ON asd.Matricula = a.Matricula
            WHERE asd.IdSede = ? AND a.idPeriodo = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ii", $idSede, $idPeriodo);
        $stmt->execute();

        $result = $stmt->get_result();
        $datosSede = $result->fetch_assoc();

        $stmt->close();
        if (!$datosSede) {
            $datosSede = array(
                'aceptados' => 0,
                'pendientes' => 0,
                'rechazados' => 10
            );
        }

        $sql = "SELECT 
                COUNT(CASE WHEN Proceso = 0 THEN 1 END) AS rechazados
            FROM alumnos 
            WHERE  idPeriodo = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $idPeriodo);
        $stmt->execute();

        $result = $stmt->get_result();
        $rechazados = $result->fetch_assoc();
        $datosSede['rechazados'] = $rechazados['rechazados'];

        $stmt->close();
      
        return $datosSede;
    }
    //Funcion que cuneta el tipo de sedes 
    public function sedesTipo()
    {
        $sql = "SELECT tipoSede, COUNT(*) AS cantidad FROM sede GROUP BY tipoSede";
        $resultado = $this->db->query($sql);
        $datosSedes = array();

        while ($row = $resultado->fetch_assoc()) {
            $datosSedes[] = $row;
        }

        return $datosSedes;
    }
}
