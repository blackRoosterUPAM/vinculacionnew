<?php

class SedeAlumno
{

    private $db;
    private $alumno;

    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->alumno = array();
    }

    /*  
    Organizacion para sacar el jale
    1. Hacer querys sql y crear las funciones que regresen los datos deceados
    2. Hacer el controlador utilizadno las funciones del modelo
    3. Organizar la logica y estructura para el retorno de vista
    4. En las vistas crear la estrucutra de vista y hacer uso de las rutas para el controller y uso de datos
    */
    //Obtine todos los aulumnos
    public function getAlumnos($id)
    {
        //Consulta sql para recuperar todos los datos postudados en una sede
        $sql =
            "SELECT a.*, ad.*, al.* , c.NombrePE as nombreCarrera
            FROM alumnosede AS a
            INNER JOIN alumnodocs AS ad ON a.Matricula = ad.Matricula
            INNER JOIN alumnos AS al ON a.Matricula = al.Matricula
            INNER JOIN carrera as c on al.Carrera = c.IdCarrera
            WHERE (a.FechaInicio = '0000-00-00 00:00:00' OR a.FechaInicio = '' OR a.FechaInicio IS NULL)  AND a.Aceptado = 0 AND a.IdSede = $id";
        //resultado del query		
        $resultado = $this->db->query($sql);
        //Recorre el arreglo sacando los datos de la consulta
        while ($row = $resultado->fetch_assoc()) {
            $this->alumno[] = $row;
        }
        //Regresa los datos en un arreglo
        return $this->alumno;
    }

    //Obtiene la informacion de un alumno en especifico
    public function get_alumno($id)
    {
        $sql = "SELECT a.*, ad.*, al.* 
        FROM alumnosede AS a
        INNER JOIN alumnodocs AS ad ON a.Matricula = ad.Matricula
        INNER JOIN alumnos AS al ON a.Matricula = al.Matricula
        WHERE alumnos.Matricula = $id";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row;
    }

    //Retorna los alumnos a los que se les genero una cita pero aun no confirman si los aceptan
    public function alumnoPorConfirmar($id)
    {
        //Agregar el id de la sede para que solo en esa busque
        $sql =
            "SELECT a.*, ad.*, al.* ,  c.NombrePE as nombreCarrera
        FROM alumnosede AS a
        INNER JOIN alumnodocs AS ad ON a.Matricula = ad.Matricula
        INNER JOIN alumnos AS al ON a.Matricula = al.Matricula
        
        INNER JOIN carrera as c on al.Carrera = c.IdCarrera
        WHERE (a.FechaInicio IS NULL OR a.FechaInicio = '') AND a.Aceptado = 1 AND a.IdSede = $id";
        //1 Significa que esta pendiente por confirmar		
        $resultado = $this->db->query($sql);
        while ($row = $resultado->fetch_assoc()) {
            $this->alumno[] = $row;
        }
        return $this->alumno;
    }

    //Retorna los alumnos confirmados por la sede.
    public function alumnoConfirmado($id)
    {
        //Agregar el id de la sede para que solo en esa busque
        $sql =
            "SELECT a.*, ad.*, al.* , c.NombrePE as nombreCarrera
        FROM alumnosede AS a
        INNER JOIN alumnodocs AS ad ON a.Matricula = ad.Matricula
        INNER JOIN alumnos AS al ON a.Matricula = al.Matricula
        INNER JOIN carrera as c on al.Carrera = c.IdCarrera
        WHERE  a.Aceptado = 2 AND a.IdSede = $id";
        //1 Significa que esta pendiente por confirmar		
        $resultado = $this->db->query($sql);
        while ($row = $resultado->fetch_assoc()) {
            $this->alumno[] = $row;
        }
        return $this->alumno;
    }

    //Querys que modifican los datos segun el accionador que se ocupe

    //Funcion que indica que se genero una cita al alumno para su entrevisra
    public function updateAlumnoCita($matricula)
    {
        // Agregar el ID de la sede para buscar solo en esa
        $sql = "UPDATE alumnosede
            SET Aceptado = 1, FechaInicio = null
            WHERE Matricula = ? ";
        // Utiliza una consulta preparada para evitar SQL injection
        $stmt = $this->db->prepare($sql);
        // Vincula el parámetro de la matrícula
        $stmt->bind_param("s", $matricula);
        // Ejecuta la consulta
        $stmt->execute();
        // Devuelve un valor para indicar si la actualización se realizó con éxito
        return $stmt->affected_rows > 0;
    }

    //Funcion que indica que se confirmo que el alumno se queda en la sede despues de su entrevista
    public function confirmarAlumno($matricula, $id)
    {
        // Agregar el ID de la sede para buscar solo en esa
        $sql = "UPDATE alumnosede
            SET Aceptado = 2, fechaInicio = now()
            WHERE Matricula = ? ";

        // Utiliza una consulta preparada para evitar SQL injection
        $stmt = $this->db->prepare($sql);

        // Vincula el parámetro de la matrícula
        $stmt->bind_param("s", $matricula);

        // Ejecuta la consulta
        $stmt->execute();


        // Agregar el ID de la sede para buscar solo en esa
        $sql = "UPDATE alumnos
            SET Proceso = 2
            WHERE Matricula = ? ";

        // Utiliza una consulta preparada para evitar SQL injection
        $stmt = $this->db->prepare($sql);

        // Vincula el parámetro de la matrícula
        $stmt->bind_param("s", $matricula);

        // Ejecuta la consulta
        $stmt->execute();

        //Pendiente pasarle el id de la sede
        $sql = "UPDATE vacantes
        SET NumPostulados = NumPostulados - 1
        WHERE IdSede = ? ";
         

        // Utiliza una consulta preparada para evitar SQL injection
        $stmt = $this->db->prepare($sql);

        // Vincula el parámetro de la matrícula
        $stmt->bind_param("s", $id);

        // Ejecuta la consulta
        $stmt->execute();


        
        
       

        // Devuelve un valor para indicar si la actualización se realizó con éxito
        return $stmt->affected_rows > 0;
    }
    
    //Borra el alumno es decir cuando lo rechazan y puede volver a postularse
    public function borraAlumno($matricula)
    {
        // Paso 1: Elimina al alumno con la matrícula especificada de la tabla alumnosede
        $sqlDelete = "DELETE FROM alumnosede WHERE Matricula = ?";
        $stmtDelete = $this->db->prepare($sqlDelete);
        $stmtDelete->bind_param("s", $matricula);
        $deleteSuccess = $stmtDelete->execute();
    
        // Paso 2: Modifica el campo "proceso" en la tabla alumnos a 0
        $sqlUpdate = "UPDATE alumnos SET proceso = 0 WHERE Matricula = ?";
        $stmtUpdate = $this->db->prepare($sqlUpdate);
        $stmtUpdate->bind_param("s", $matricula);
        $updateSuccess = $stmtUpdate->execute();
    
        // Verificar si ambas operaciones se realizaron con éxito
        if ($deleteSuccess && $updateSuccess) {
            return true; // Ambas operaciones fueron exitosas
        } else {
            return false; // Al menos una de las operaciones falló
        }
    }

    public function getVacantes($id){
        $sql = "SELECT * FROM vacantes WHERE idSede = $id";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row;
    }
    
}
