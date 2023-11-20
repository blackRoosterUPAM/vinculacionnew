<?php

require 'vendor/autoload.php';

require 'config/EmailSender.php'; // Importa la clase EmailSender

//require 'config/database.php';

use PhpOffice\PhpSpreadsheet\Reader\Xls\MD5;


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

    public function masivo()
    {

        require_once 'config/correoUserContra.php';


        // Arreglo de datos ficticios
        $datosFicticios = [
            ['d.hernandezj@upam.edu.mx', 'contrasena1'],
            ['l.guadalupea@upam.edu.mx', 'contrasena2'],
            ['m.guadalupea@upam.edu.mx', 'contrasena3'],
            // Agrega más datos ficticios según sea necesario
        ];

        // Bucle para enviar correos con los datos ficticios
        for ($i = 0; $i < count($datosFicticios); $i++) {
            $correoDestinatario = $datosFicticios[$i][0];
            $contrasena = $datosFicticios[$i][1];
            enviarCorreo($correoDestinatario, $contrasena);
        }


        require_once 'Views/Sede/masivo.php';
    }

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
    public function importarDesdeExcel($archivo)
    {
        $inputFileName = $archivo['tmp_name']; // Ruta del archivo Excel subido
        require_once 'config/correoUserContra.php';

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

                // Resto del código para procesar y validar los datos, como lo tenías antes
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
                $alumnosData[] = "('$matricula', '$nombre', '$apellidoP', '$apellidoM', '$telefono', '$correo', $carreraId, $procesoId)";
                //envio de correos
                enviarCorreo($correo, $password);

            }

            // Realizar la inserción en la tabla de usuarios
            if (!empty($usuariosData)) {
                $usuariosSql = "INSERT INTO usuarios (IdUsuario, CorreoE, Contraseña, IdRol, NombreU, APaternoU, AMaternoU) VALUES " . implode(",", $usuariosData);
                if ($this->mysqli->query($usuariosSql)) {
                    // Realizar la inserción en la tabla de alumnos
                    if (!empty($alumnosData)) {
                        $alumnosSql = "INSERT INTO alumnos (Matricula, NombreA, ApellidoP, ApellidoM, Telefono, CorreoE, Carrera, idProceso) VALUES " . implode(",", $alumnosData);
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

    public function insertarAlumnoIndividual($matricula, $nombre, $apellidoP, $apellidoM, $telefono, $correo, $carrera, $proceso){
        require_once 'config/correoUserContra.php';
        // Generar la contraseña a partir de las iniciales del nombre y los últimos dígitos de la matrícula
        $inicialesNombre = substr($nombre, 0, 2); // Tomar las primeras 2 letras del nombre
        $ultimosDigitosMatricula = substr($matricula, -4); // Tomar los últimos 2 dígitos de la matrícula

        $password = $inicialesNombre . $ultimosDigitosMatricula;

        // Encriptar la contraseña usando MD5
        $passwordHash = md5($password);

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
    VALUES ('$matricula', '$correo', '$passwordHash', '$idRol', '$nombre', '$apellidoP', '$apellidoM')";

            if ($this->mysqli->query($usuarioSql)) {
                // Realizar la inserción en la tabla de alumnos
                $alumnoSql = "INSERT INTO alumnos (Matricula, NombreA, ApellidoP, ApellidoM, Telefono, CorreoE, Carrera, idProceso) 
                    VALUES ('$matricula', '$nombre', '$apellidoP', '$apellidoM', '$telefono', '$correo', $carrera, $proceso)";

                if ($this->mysqli->query($alumnoSql)) {
                    // Envía un correo al alumno
                    
                enviarCorreo($correo, $password);
                        return true;
                    } else {
                        // Error al enviar el correo
                        return false;
                    }
                 
                }else {
                // Manejo de errores si la inserción en la tabla de usuarios falla
                return false;
            }
        }
    }
}