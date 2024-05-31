<?php

require 'vendor/autoload.php';
//require 'config/EmailSender.php'; // Importa la clase EmailSender
//require 'config/database.php';

use PhpOffice\PhpSpreadsheet\Reader\Xls\MD5;


class ImportarModel
{
    //LRGA03
    private $mysqli;
    private $carrerasDisponibles;
    private $procesosDisponibles;

    //funcion principal
    public function __construct()
    {
        $this->mysqli = Conectar::conexion(); // Conexión a la base de datos
        $this->carrerasDisponibles = $this->getCarreras();
        $this->procesosDisponibles = $this->getProcesos();
    }



    //funcion para activar el alumno
    public function statusInactivo()
    {
        $sql = "UPDATE alumnos SET Estatus = 0 WHERE Matricula > 0";
        $resultado = $this->mysqli->query($sql);
        if ($resultado) {
            //$message = "El estado de los alumnos ha sido cambiado de manera exitosa.";
            return true;
        } else {
            return false;
           // $message = "Error al cambiar el estado de los alumnos.";
        }

        // Redirige o muestra el mensaje según tu lógica
    }

    //funcion para inactivar al alumno
    public function statusActivo()
    {
        $sql = "UPDATE alumnos SET Estatus = 1  WHERE Matricula > 0";
        $resultado = $this->mysqli->query($sql);
        if ($resultado) {
            //$message = "El estado de los alumnos ha sido cambiado de manera exitosa.";
            return true;
        } else {
            return false;
            //$message = "Error al cambiar el estado de los alumnos.";
        }

        // Redirige o muestra el mensaje según tu lógica
    }


    public function getPeriodo($mes, $anio)
    {
        $sql = "SELECT * FROM periodo WHERE Meses LIKE ? AND anio = ? AND estatus = 1 limit 1";

        // Utiliza una consulta preparada para evitar SQL injection
        $stmt = $this->mysqli->prepare($sql);

        // Modifica el patrón de vinculación de los parámetros
        $mes = '%' . $mes . '%';  // Agrega los signos de porcentaje aquí para que se incluyan en la cadena LIKE
        $stmt->bind_param("ss", $mes, $anio);

        // Ejecuta la consulta
        $stmt->execute();

        // Obtiene el resultado de la consulta
        $result = $stmt->get_result();

        // Obtiene la fila de la consulta
        $periodo = $result->fetch_assoc();

        // Retorna la fila
        return $periodo;
    }

    //funcion que permite registrar a los alumnos mediante un excel
    public function importarDesdeExcel($archivo)
    {
        $inputFileName = $archivo['tmp_name']; // Ruta del archivo Excel subido
        require_once 'config/correoUserContra.php'; //permite enviar el correo a los alumnos

        try {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
            $worksheet = $spreadsheet->getActiveSheet();
            $highestRow = $worksheet->getHighestRow();
            $duplicates = array();


            // Crear arrays para acumular los datos
            $usuariosData = array();
            $alumnosData = array();

            for ($row = 2; $row <= $highestRow; $row++) {
                $matricula = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                $nombre = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                $apellidoP = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                $apellidoM = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                $telefono = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                $correo = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                $carrera = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                $proceso = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                $periodo = trim($worksheet->getCellByColumnAndRow(9, $row)->getValue());
                $anio = trim($worksheet->getCellByColumnAndRow(10, $row)->getValue());

                // Convierte las carreras y procesos a minúsculas
                $carrera = strtolower($carrera);
                $proceso = strtolower($proceso);

                // Validación para evitar campos vacíos
                if (empty($matricula) || empty($nombre) || empty($apellidoP) || empty($apellidoM) || empty($telefono) || empty($correo) || empty($carrera) || empty($proceso) || empty($periodo) || empty($anio)) {
                    // Si alguno de los campos está vacío, omite esta fila y continúa con la siguiente
                    continue;
                }

                //Buscamos el id del periodo
                $periodoId = $this->getPeriodo($periodo, $anio);
                if ($periodoId['IdPeriodo'] === null) {
                    //echo '<script>';
                   // echo 'alert("La carrera registrada en la fila ' . $row . ' no coincide con ninguna carrera en la base de datos. Matrícula: ' . $matricula . '");';
                   // echo '</script>';
                    continue; // Omitir esta fila y continuar con la siguiente
                }


                // Verificar si la carrera registrada en el Excel coincide con algún ID de carrera en la base de datos
                $carreraId = $this->getCarreraId($carrera);
                if ($carreraId === null) {
                    // La carrera no coincide con ninguna registrada en la base de datos
                    //echo '<script>';
                    //echo 'alert("La carrera registrada en la fila ' . $row . ' no coincide con ninguna carrera en la base de datos. Matrícula: ' . $matricula . '");';
                    //echo '</script>';
                    continue; // Omitir esta fila y continuar con la siguiente
                }

                // Verificar si el proceso registrado en el Excel coincide con algún ID de proceso en la base de datos
                $procesoId = $this->getProcesoId($proceso);
                if ($procesoId === null) {
                    // El proceso no coincide con ninguno registrado en la base de datos
                    //echo '<script>';
                    //echo 'alert("El proceso registrado en la fila ' . $row . ' no coincide con ningún proceso en la base de datos. Matrícula: ' . $matricula . '");';
                    //echo '</script>';
                    continue; // Omitir esta fila y continuar con la siguiente
                }

                // Generar el password a partir de las iniciales del nombre y los últimos dígitos de la matrícula
                $inicialesNombre = substr($nombre, 0, 2); // Tomar las primeras 2 letras del nombre
                $ultimosDigitosMatricula = substr($matricula, -4); // Tomar los últimos 4 dígitos de la matrícula

                $password = $inicialesNombre . $ultimosDigitosMatricula;

                // Encriptar el password usando MD5
                $passwordHash = md5($password);

                // Obtener el ID del rol "Alumno"
                $idRol = 4; // Se debe modificar de acuerdo al rol almacenado

                // Agregar datos a los arrays de inserción
                $usuariosData[$row] = "('$matricula', '$correo', '$passwordHash', '$idRol', '$nombre', '$apellidoP', '$apellidoM')";
                $alumnosData[$row] = "('$matricula', '$nombre', '$apellidoP', '$apellidoM', '$telefono', '$correo', $carreraId, $procesoId, " . $periodoId['IdPeriodo'] . ")";

                enviarCorreo($correo, $password); //envio de correos
            }

            // Realizar la inserción en la tabla de usuarios
            foreach ($usuariosData as $usuario) {
                // Remover los paréntesis y las comillas simples
                $usuarioE = str_replace(array("(", ")", "'"), "", $usuario);
                // Dividir la cadena en un arreglo
                $datos = explode(",", $usuarioE);
                // El primer elemento del arreglo debería ser matricula
                $matricula = $datos[0];
                $checkUserSql = "SELECT * FROM usuarios WHERE IdUsuario = '$matricula'";
                $result = $this->mysqli->query($checkUserSql);
                if ($result->num_rows == 0) {
                    // Si el usuario no existe, entonces inserta el nuevo usuario
                    $usuariosSql = "INSERT INTO usuarios (IdUsuario, CorreoE, Contrasena, IdRol, NombreU, APaternoU, AMaternoU) VALUES $usuario";
                    $resultado = $this->mysqli->query($usuariosSql);
                    if ($resultado === TRUE) {
                        
                       // echo "El usuario se insertó correctamente.";
                    } else {
                        //echo "Hubo un error al insertar el usuario: " . $this->mysqli->error;
                    }
                }
            }


            foreach ($alumnosData as $alumno) {
                $alumnoE = str_replace(array("(", ")", "'"), "", $alumno);
                // Dividir la cadena en un arreglo
                $datos = explode(",", $alumnoE);
                // El primer elemento del arreglo debería ser matricula
                $matricula = $datos[0];
                $checkAlumnoSql = "SELECT * FROM alumnos WHERE Matricula = '$matricula'";
                $result = $this->mysqli->query($checkAlumnoSql);
                if ($result->num_rows == 0) {
                    // Si el alumno no existe, entonces inserta el nuevo alumno
                    $alumnosSql = "INSERT INTO alumnos (Matricula, NombreA, ApellidoP, ApellidoM, Telefono, CorreoE, Carrera, idProceso, idPeriodo) VALUES $alumno";
                    $resultado = $this->mysqli->query($alumnosSql);
                    if ($resultado === TRUE) {
                        //echo "El alumno se insertó correctamente.";
                    } else {
                        //echo "Hubo un error al insertar el alumno: " . $this->mysqli->error;
                    }
                }
            }

            return true; // Éxito al importar los datos
        } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
            // Manejo de errores si ocurre alguna excepción al cargar el archivo Excel
           // echo '<script>alert("Error al cargar el archivo Excel. Redirigiendo al índice...");</script>';
           // echo '<script>window.location.href = "../index.php?c=escolars&a=index";</script>';
	header('Location: index.php?c=escolars&a=index');
            return false;
        }
    }

    //funcion que obtiene el nombre de la carrera
    public function getCarreras()
    {
        $sql = "SELECT nombreCarrera, IdCarrera FROM carrera";
        $result = $this->mysqli->query($sql);
        $carreras = [];

        while ($row = $result->fetch_assoc()) {
            $carreras[] = $row;
        }

        return $carreras;
    }

    //funcion que obtiene el nombre del proceso
    public function getProcesos()
    {
        $sql = "SELECT NombrePE, IdProceso FROM proceso";
        $result = $this->mysqli->query($sql);
        $procesos = [];

        while ($row = $result->fetch_assoc()) {
            $procesos[] = $row;
        }

        return $procesos;
    }

    //Funvion que obtiene el id de la carrera
    public function getCarreraId($carrera)
    {
        $carrera = strtolower($carrera);
        foreach ($this->carrerasDisponibles as $carreraData) {
            if ($carrera === strtolower($carreraData['nombreCarrera'])) {
                return $carreraData['IdCarrera'];
            }
        }
        return null;
    }

    //Funcion que obtiene el id del proceso
    public function getProcesoId($proceso)
    {
        $proceso = strtolower($proceso);
        foreach ($this->procesosDisponibles as $procesoData) {
            if ($proceso === strtolower($procesoData['NombrePE'])) {
                return $procesoData['IdProceso'];
            }
        }
        return null;
    }


    public function insertarAlumnoIndividual($matricula, $nombre, $apellidoP, $apellidoM, $telefono, $correo, $carrera, $proceso, $periodo)
    {
        require_once 'config/correoUserContra.php'; //permite enviar el correo a los alumnos

        // Generar el password a partir de las iniciales del nombre y los últimos dígitos de la matrícula
        $inicialesNombre = substr($nombre, 0, 2); // Tomar las primeras 2 letras del nombre
        $ultimosDigitosMatricula = substr($matricula, -4); // Tomar los últimos 2 dígitos de la matrícula
        $password = $inicialesNombre . $ultimosDigitosMatricula;

        $passwordHash = md5($password); // Encriptar el password usando MD5

        $idRol = 4; // IdRol del estudiante

        //valida que la matricula no se encuentre para poder realizar un nuevo registro
        $check_sql = "SELECT Matricula FROM alumnos WHERE Matricula = '$matricula'";
        $check_result = $this->mysqli->query($check_sql);

        if ($check_result && $check_result->num_rows > 0) {
            // Registro duplicado encontrado
            return false;
        } else {
            // Realizar la inserción en la tabla de usuarios
            $usuarioSql = "INSERT INTO usuarios (IdUsuario, CorreoE, Contrasena, IdRol, NombreU, APaternoU, AMaternoU) 
    VALUES ('$matricula', '$correo', '$passwordHash', '$idRol', '$nombre', '$apellidoP', '$apellidoM')";

            if ($this->mysqli->query($usuarioSql)) {
                // Realizar la inserción en la tabla de alumnos
                $alumnoSql = "INSERT INTO alumnos (Matricula, NombreA, ApellidoP, ApellidoM, Telefono, CorreoE, Carrera, idProceso, idPeriodo) 
                    VALUES ('$matricula', '$nombre', '$apellidoP', '$apellidoM', '$telefono', '$correo', $carrera, $proceso, $periodo)";

                if ($this->mysqli->query($alumnoSql)) {
                    enviarCorreo($correo, $password); // Envía un correo al alumno
                    return true;
                } else {
                    // Error al enviar el correo
                    return false;
                }
            } else {
                // Manejo de errores si la inserción en la tabla de usuarios falla
                return false;
            }
        }
    }
}
