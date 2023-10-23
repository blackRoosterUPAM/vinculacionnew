<?php
require '../vendor/autoload.php'; // Asegúrate de cargar la librería PhpSpreadsheet
require '../config/database.php';
require '../config/EmailSender.php'; // Importa la clase EmailSender

class ImportarModel
{
    private $mysqli;
    private $carrerasDisponibles;
    private $procesosDisponibles;

    public function __construct()
    {
        $this->mysqli = Conectar::conexion(); // Conexión a la base de datos
        $this->carrerasDisponibles = $this->getCarreras();
        $this->procesosDisponibles = $this->getProcesos();
    }

    public function importarDesdeExcel($archivo)
    {
        $inputFileName = $archivo['tmp_name']; // Ruta del archivo Excel subido

        try {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
            $worksheet = $spreadsheet->getActiveSheet();
            $highestRow = $worksheet->getHighestRow();
            $duplicates = array();

            $emailSender = new EmailSender();

            for ($row = 2; $row <= $highestRow; $row++) {
                $matricula = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                $nombre = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                $apellidoP = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                $apellidoM = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                $telefono = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                $correo = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                $carrera = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                $proceso = $worksheet->getCellByColumnAndRow(8, $row)->getValue();

                // Convertir carreras y procesos a minúsculas
                $carrera = strtolower($carrera);
                $proceso = strtolower($proceso);

                // Validación para evitar campos vacíos
                if (empty($matricula) || empty($nombre) || empty($apellidoP) || empty($apellidoM) || empty($telefono) || empty($correo) || empty($carrera) || empty($proceso)) {
                    // Si alguno de los campos está vacío, omite esta fila y continúa con la siguiente
                    continue;
                }

                // Verificar si la carrera registrada en el Excel coincide con algún ID de carrera en la base de datos
                $carreraId = $this->getCarreraId($carrera);
                if ($carreraId === null) {
                    // La carrera no coincide con ninguna registrada en la base de datos
                    echo '<script>';
                    echo 'alert("La carrera registrada en la fila ' . $row . ' no coincide con ninguna carrera en la base de datos. Matrícula: ' . $matricula . '");';
                    echo '</script>';
                    continue; // Omitir esta fila y continuar con la siguiente
                }

                // Verificar si el proceso registrado en el Excel coincide con algún ID de proceso en la base de datos
                $procesoId = $this->getProcesoId($proceso);
                if ($procesoId === null) {
                    // El proceso no coincide con ninguno registrado en la base de datos
                    echo '<script>';
                    echo 'alert("El proceso registrado en la fila ' . $row . ' no coincide con ningún proceso en la base de datos. Matrícula: ' . $matricula . '");';
                    echo '</script>';
                    continue; // Omitir esta fila y continuar con la siguiente
                }

                // Generar una contraseña aleatoria
                $password = bin2hex(random_bytes(8)); // Se puede ajustar la longitud

                // Obtener el ID del rol "Estudiante"
                $idRol = 4; // Se debe modificar de acuerdo al rol alamacenado

                // Verificar si ya existe un registro con la misma Matrícula
                $check_sql = "SELECT Matricula FROM alumnos WHERE Matricula = '$matricula'";
                $check_result = $this->mysqli->query($check_sql);

                if ($check_result && $check_result->num_rows > 0) {
                    // Registro duplicado encontrado
                    $duplicates[] = $matricula;
                } else {
                    // Realizar la inserción en la tabla de usuarios
                    $usuarioSql = "INSERT INTO usuarios (IdUsuario, CorreoE, Contraseña, IdRol, NombreU, APaternoU, AMaternoU) 
                            VALUES ('$matricula', '$correo', '$password', '$idRol', '$nombre', '$apellidoP', '$apellidoM')";

                    if ($this->mysqli->query($usuarioSql)) {
                        // Realizar la inserción en la tabla de alumnos
                        $alumnoSql = "INSERT INTO alumnos (Matricula, NombreA, ApellidoP, ApellidoM, Telefono, CorreoE, Carrera, Proceso) 
                                VALUES ('$matricula', '$nombre', '$apellidoP', '$apellidoM', '$telefono', '$correo', $carreraId, $procesoId)";

                        if ($this->mysqli->query($alumnoSql)) {
                            // Envía un correo al alumno
                            $asunto = "Información de cuenta";
                            $mensaje = "Hola $nombre,\n\nTu cuenta ha sido creada con éxito.\n\nTu Usuario es: $correo\nTu Contraseña es: $password\n";

                            if ($emailSender->enviarCorreo($correo, $asunto, $mensaje)) {
                                // Éxito al enviar el correo
                            } else {
                                // Error al enviar el correo
                                return false;
                            }
                        } else {
                            // Manejo de errores si la inserción en la tabla de alumnos falla
                            return false;
                        }
                    } else {
                        // Manejo de errores si la inserción en la tabla de usuarios falla
                        return false;
                    }
                }
            }

            if (!empty($duplicates)) {
                // Si se encontraron registros duplicados, muestra una ventana emergente con los detalles
                echo '<script>';
                echo 'alert("Se encontraron registros duplicados con las siguientes Matrículas: ' . implode(', ', $duplicates) . '");';
                echo '</script>';
                echo '<script>window.location.href = "../index.php?c=escolars&a=index";</script>';
            }

            return true; // Éxito al importar los datos
        } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
            // Manejo de errores si ocurre alguna excepción al cargar el archivo Excel
            echo '<script>alert("Error al cargar el archivo Excel. Redirigiendo al índice...");</script>';
            echo '<script>window.location.href = "../index.php?c=escolars&a=index";</script>';
            return false;
        }
    }

    public function getCarreras()
    {
        $sql = "SELECT NombrePE, IdCarrera FROM carrera";
        $result = $this->mysqli->query($sql);
        $carreras = [];

        while ($row = $result->fetch_assoc()) {
            $carreras[] = $row;
        }

        return $carreras;
    }

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

    public function getCarreraId($carrera)
    {
        $carrera = strtolower($carrera);
        foreach ($this->carrerasDisponibles as $carreraData) {
            if ($carrera === strtolower($carreraData['NombrePE'])) {
                return $carreraData['IdCarrera'];
            }
        }
        return null;
    }

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

    public function insertarAlumnoIndividual($matricula, $nombre, $apellidoP, $apellidoM, $telefono, $correo, $carrera, $proceso)
    {

        $password = bin2hex(random_bytes(8)); // Genera una contraseña aleatoria

        // IdRol del estudiante
        $idRol = 4;

        //valida que la matricula no se encuentre para poder realizar un nuevo registro
        $check_sql = "SELECT Matricula FROM alumnos WHERE Matricula = '$matricula'";
        $check_result = $this->mysqli->query($check_sql);

        if ($check_result && $check_result->num_rows > 0) {
            // Registro duplicado encontrado
            return false;
        } else {
            // Realizar la inserción en la tabla de usuarios
            $usuarioSql = "INSERT INTO usuarios (IdUsuario, CorreoE, Contraseña, IdRol, NombreU, APaternoU, AMaternoU) 
                VALUES ('$matricula', '$correo', '$password', '$idRol', '$nombre', '$apellidoP', '$apellidoM')";

            if ($this->mysqli->query($usuarioSql)) {
                // Realizar la inserción en la tabla de alumnos
                $alumnoSql = "INSERT INTO alumnos (Matricula, NombreA, ApellidoP, ApellidoM, Telefono, CorreoE, Carrera, Proceso) 
                    VALUES ('$matricula', '$nombre', '$apellidoP', '$apellidoM', '$telefono', '$correo', $carrera, $proceso)";

                if ($this->mysqli->query($alumnoSql)) {
                    // Envía un correo al alumno
                    $asunto = "Información de cuenta";
                    $mensaje = "Hola $nombre,\n\nTu cuenta ha sido creada con éxito.\n\nTu Usuario es: $correo\nTu Contraseña es: $password\n";

                    // Asume que tienes un método para enviar correos en la clase EmailSender
                    $emailSender = new EmailSender();
                    if ($emailSender->enviarCorreo($correo, $asunto, $mensaje)) {
                        // Éxito al enviar el correo
                        return true;
                    } else {
                        // Error al enviar el correo
                        return false;
                    }
                } else {
                    // Manejo de errores si la inserción en la tabla de alumnos falla
                    return false;
                }
            } else {
                // Manejo de errores si la inserción en la tabla de usuarios falla
                return false;
            }
        }
    }
}
