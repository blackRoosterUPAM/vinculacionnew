<?php

require 'vendor/autoload.php';
//require 'config/EmailSender.php'; // Importa la clase EmailSender
//require 'config/database.php';

use PhpOffice\PhpSpreadsheet\Reader\Xls\MD5;


class ImportarModel
{
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
            $message = "El estado de los alumnos ha sido cambiado de manera exitosa.";
            return true;
        } else {
            return false;
            $message = "Error al cambiar el estado de los alumnos.";
        }

        // Redirige o muestra el mensaje según tu lógica
    }

    //funcion para inactivar al alumno
    public function statusActivo()
    {
        $sql = "UPDATE alumnos SET Estatus = 1  WHERE Matricula > 0";
        $resultado = $this->mysqli->query($sql);
        if ($resultado) {
            $message = "El estado de los alumnos ha sido cambiado de manera exitosa.";
            return true;
        } else {
            return false;
            $message = "Error al cambiar el estado de los alumnos.";
        }

        // Redirige o muestra el mensaje según tu lógica
    }


    /*public function getPeriodoId($periodo)
    {
        // Mapeo de formatos de mes
        $meses = [
            'Enero' => 'Enero',
            'Febrero' => 'Febrero',
            'Marzo' => 'Marzo',
            'Abril' => 'Abril',
            'Mayo' => 'Mayo',
            'Junio' => 'Junio',
            'Julio' => 'Julio',
            'Agosto' => 'Agosto',
            'Septiembre' => 'Septiembre',
            'Octubre' => 'Octubre',
            'Noviembre' => 'Noviembre',
            'Diciembre' => 'Diciembre',
        ];

        // Dividir el período en mes y año
        $parts = explode('-', $periodo);

        if (count($parts) === 2) {
            $mes = trim($parts[0]);
            $anio = intval(trim($parts[1]));

            // Validar si el mes está en el mapeo
            if (!array_key_exists($mes, $meses)) {
                echo '<script>';
                echo 'alert("El mes registrado en el período no es válido. Período: ' . $periodo . '");';
                echo '</script>';
                return null; // Omitir esta fila y continuar con la siguiente
            }

            // Consulta para buscar un período que coincida con el mes y año del Excel
            $consultaPeriodo = $this->mysqli->prepare("SELECT IdPeriodo FROM periodo WHERE Meses = ? AND Año = ?");
            $consultaPeriodo->bind_param("si", $mes, $anio);
            $consultaPeriodo->execute();
            $resultadoPeriodo = $consultaPeriodo->get_result();

            if ($fila = $resultadoPeriodo->fetch_assoc()) {
                return $fila['IdPeriodo'];
            } else {
                // Manejo de error si no se encuentra el período en la base de datos
                return null;
            }
        } else {
            // Manejar el caso en el que la cadena no se dividió como se esperaba
            echo '<script>';
            echo 'alert("El período registrado no tiene el formato esperado. Período: ' . $periodo . '");';
            echo '</script>';
            return null;
        }
    }

    //funcion que permite registrar a los alumnos mediante un excel
    public function importarDesdeExcel($archivo)
{
    $inputFileName = $archivo['tmp_name']; // Ruta del archivo Excel subido
    require_once 'config/correoUserContra.php'; // Permite enviar el correo a los alumnos

    try {
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $duplicates = array();

        // Crear arrays para acumular los datos
        $usuariosData = array();
        $alumnosData = array();

        for ($row = 9; $row <= $highestRow; $row++) {
            $matricula = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
            $nombre = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
            $apellidoP = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
            $apellidoM = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
            $telefono = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
            $correo = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
            $carrera = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
            $proceso = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
            $periodoExcel = $worksheet->getCellByColumnAndRow(9, $row)->getValue();

            // Convierte las carreras y procesos a minúsculas
            $carrera = strtolower($carrera);
            $proceso = strtolower($proceso);

            // Validación para evitar campos vacíos
            if (empty($matricula) || empty($nombre) || empty($apellidoP) || empty($apellidoM) || empty($telefono) || empty($correo) || empty($carrera) || empty($proceso) || empty($periodoExcel)) {
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

            // Obtener el ID del periodo desde el Excel
            $idPeriodo = $this->getPeriodoId($periodoExcel);
            if ($idPeriodo === null) {
                // Manejar el caso en el que el periodo no coincide con ninguno registrado en la base de datos
                echo '<script>';
                echo 'alert("El periodo registrado en la fila ' . $row . ' no coincide con ninguno en la base de datos. Matrícula: ' . $matricula . '");';
                echo '</script>';
                continue; // Omitir esta fila y continuar con la siguiente
            }

            // Generar la contraseña a partir de las iniciales del nombre y los últimos dígitos de la matrícula
            $inicialesNombre = substr($nombre, 0, 2); // Tomar las primeras 2 letras del nombre
            $ultimosDigitosMatricula = substr($matricula, -4); // Tomar los últimos 4 dígitos de la matrícula
            $password = $inicialesNombre . $ultimosDigitosMatricula;

            // Encriptar la contraseña usando MD5
            $passwordHash = md5($password);

            // Obtener el ID del rol "Alumno"
            $idRol = 4; // Se debe modificar de acuerdo al rol almacenado

            // Agregar datos a los arrays de inserción
            $usuariosData[] = "('$matricula', '$correo', '$passwordHash', '$idRol', '$nombre', '$apellidoP', '$apellidoM')";
            $alumnosData[] = "('$matricula', '$nombre', '$apellidoP', '$apellidoM', '$telefono', '$correo', $carreraId, $procesoId, $idPeriodo)";
            
            // Enviar correo
            enviarCorreo($correo, $password);
        }
        
        // Realizar la inserción en la tabla de usuarios
        if (!empty($usuariosData)) {
            $usuariosSql = "INSERT INTO usuarios (IdUsuario, CorreoE, Contraseña, IdRol, NombreU, APaternoU, AMaternoU) VALUES " . implode(",", $usuariosData);
            if ($this->mysqli->query($usuariosSql)) {
                // Realizar la inserción en la tabla de alumnos
                if (!empty($alumnosData)) {
                    $alumnosSql = "INSERT INTO alumnos (Matricula, NombreA, ApellidoP, ApellidoM, Telefono, CorreoE, Carrera, idProceso, IdPeriodo) VALUES " . implode(",", $alumnosData);
                    if ($this->mysqli->query($alumnosSql)) {
                        // Confirmar la transacción
                        $this->mysqli->commit();

                        // Éxito al importar los datos
                        // Resto del código para manejar registros duplicados
                        return true;
                    } else {
                        // Manejo de errores si la inserción en la tabla de alumnos falla
                        // Revertir la transacción
                        $this->mysqli->rollback();
                        return false;
                    }
                }
            } else {
                // Manejo de errores si la inserción en la tabla de usuarios falla
                // Revertir la transacción
                $this->mysqli->rollback();
                return false;
            }
        }


        // Resto del código para manejar registros duplicados
        $this->mysqli->commit();

        return true; // Éxito al importar los datos
    } catch (\Exception $e) {
        // Revertir la transacción en caso de error
        $this->mysqli->rollback();

        // Manejo de errores
        echo '<script>alert("Error al importar datos. Redirigiendo al índice...");</script>';
        echo '<script>window.location.href = "../index.php?c=escolars&a=index";</script>';
        return false;
    }
} */
    //funcion que obtiene el periodo 
    public function getPeriodoId($periodo)
    {
        // Dividir el período en mes y año
        $parts = explode('-', $periodo);

        if (count($parts) >= 2) {
            $mes = $parts[0];
            $anio = $parts[1];

            // Consulta para buscar un período que coincida con el mes y año del Excel
            $consultaPeriodo = $this->mysqli->prepare("SELECT IdPeriodo FROM periodo WHERE Meses = ? AND Año = ?");

            // Verificar que $mes sea una cadena y $año sea un valor numérico antes de usarlos en la consulta
            if (is_numeric($anio)) {
                $consultaPeriodo->bind_param("si", $mes, $anio);
                $consultaPeriodo->execute();
                $resultadoPeriodo = $consultaPeriodo->get_result();

                if ($fila = $resultadoPeriodo->fetch_assoc()) {
                    return $fila['IdPeriodo'];
                } else {
                    return null; // Manejo de error si no se encuentra el período en la base de datos
                }
            } else {
                return null; // Manejo de error si $anio no es un valor numérico
            }
        } else {
            return null; // Manejar el caso en el que la cadena no se dividió como se esperaba
        }
    }

    public function getPeriodo($mes, $año)
    {
        $sql = "SELECT * FROM periodo WHERE Meses LIKE ? AND Año = ? AND estatus = 1 limit 1";

        // Utiliza una consulta preparada para evitar SQL injection
        $stmt = $this->mysqli->prepare($sql);

        // Modifica el patrón de vinculación de los parámetros
        $mes = '%' . $mes . '%';  // Agrega los signos de porcentaje aquí para que se incluyan en la cadena LIKE
        $stmt->bind_param("ss", $mes, $año);

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
                $año = trim($worksheet->getCellByColumnAndRow(10, $row)->getValue());

                // Convierte las carreras y procesos a minúsculas
                $carrera = strtolower($carrera);
                $proceso = strtolower($proceso);

                // Validación para evitar campos vacíos
                if (empty($matricula) || empty($nombre) || empty($apellidoP) || empty($apellidoM) || empty($telefono) || empty($correo) || empty($carrera) || empty($proceso) || empty($periodo) || empty($año)) {
                    // Si alguno de los campos está vacío, omite esta fila y continúa con la siguiente
                    continue;
                }

                //Buscamos el id del periodo
                $periodoId = $this->getPeriodo($periodo, $año);
                if ($periodoId['IdPeriodo'] === null) {
                    echo '<script>';
                    echo 'alert("La carrera registrada en la fila ' . $row . ' no coincide con ninguna carrera en la base de datos. Matrícula: ' . $matricula . '");';
                    echo '</script>';
                    continue; // Omitir esta fila y continuar con la siguiente
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

                // Generar la contraseña a partir de las iniciales del nombre y los últimos dígitos de la matrícula
                $inicialesNombre = substr($nombre, 0, 2); // Tomar las primeras 2 letras del nombre
                $ultimosDigitosMatricula = substr($matricula, -4); // Tomar los últimos 4 dígitos de la matrícula

                $password = $inicialesNombre . $ultimosDigitosMatricula;

                // Encriptar la contraseña usando MD5
                $passwordHash = md5($password);

                // Obtener el ID del rol "Alumno"
                $idRol = 4; // Se debe modificar de acuerdo al rol almacenado

                // Agregar datos a los arrays de inserción
                $usuariosData[] = "('$matricula', '$correo', '$passwordHash', '$idRol', '$nombre', '$apellidoP', '$apellidoM')";
                $alumnosData[] = "('$matricula', '$nombre', '$apellidoP', '$apellidoM', '$telefono', '$correo', $carreraId, $procesoId, ".$periodoId['IdPeriodo'] .")";

                enviarCorreo($correo, $password); //envio de correos
            }

            // Realizar la inserción en la tabla de usuarios
            if (!empty($usuariosData)) {
                $usuariosSql = "INSERT INTO usuarios (IdUsuario, CorreoE, Contraseña, IdRol, NombreU, APaternoU, AMaternoU) VALUES " . implode(",", $usuariosData);
                if ($this->mysqli->query($usuariosSql)) {
                    // Realizar la inserción en la tabla de alumnos
                    if (!empty($alumnosData)) {
                        $alumnosSql = "INSERT INTO alumnos (Matricula, NombreA, ApellidoP, ApellidoM, Telefono, CorreoE, Carrera, idProceso, idPeriodo) VALUES " . implode(",", $alumnosData);
                        if ($this->mysqli->query($alumnosSql)) {
                            // Éxito al importar los datos
                            // Resto del código para enviar correos y manejar registros duplicados
                            return true;
                        } else {
                            // Manejo de errores si la inserción en la tabla de alumnos falla
                            return false;
                        }
                    }
                } else {
                    // Manejo de errores si la inserción en la tabla de usuarios falla
                    return false;
                }
            }

            // Resto del código para manejar registros duplicados

            return true; // Éxito al importar los datos
        } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
            // Manejo de errores si ocurre alguna excepción al cargar el archivo Excel
            echo '<script>alert("Error al cargar el archivo Excel. Redirigiendo al índice...");</script>';
            echo '<script>window.location.href = "../index.php?c=escolars&a=index";</script>';
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

    //Funcion que retorna el id del proceso dependiendo el nombre


    //funciòn que permite registrar al alumno de manra manual
    public function insertarAlumnoIndividual($matricula, $nombre, $apellidoP, $apellidoM, $telefono, $correo, $carrera, $proceso, $periodo)
    {
        require_once 'config/correoUserContra.php'; //permite enviar el correo a los alumnos

        // Generar la contraseña a partir de las iniciales del nombre y los últimos dígitos de la matrícula
        $inicialesNombre = substr($nombre, 0, 2); // Tomar las primeras 2 letras del nombre
        $ultimosDigitosMatricula = substr($matricula, -4); // Tomar los últimos 2 dígitos de la matrícula
        $password = $inicialesNombre . $ultimosDigitosMatricula;

        $passwordHash = md5($password); // Encriptar la contraseña usando MD5

        $idRol = 4; // IdRol del estudiante

        //valida que la matricula no se encuentre para poder realizar un nuevo registro
        $check_sql = "SELECT Matricula FROM alumnos WHERE Matricula = '$matricula'";
        $check_result = $this->mysqli->query($check_sql);

        if ($check_result && $check_result->num_rows > 0) {
            // Registro duplicado encontrado
            return false;
        } else {
            // Realizar la inserción en la tabla de usuarios
            $usuarioSql = "INSERT INTO usuarios (IdUsuario, CorreoE, Contraseña, IdRol, NombreU, APaternoU, AMaternoU) 
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
