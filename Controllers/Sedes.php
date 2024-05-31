<?php

class SedesController
{

    //Incuimos los modelos que vamos a utilizar
    public function __construct()
    {
        require_once "Models/SedeModel.php";
        require_once "Models/SedeAlumnoModel.php";
    }

    //Funcion principal que retorna los alumnos que se postularon a una emperesa en especifico
    public function index()
    {
        // Utilizaremos una sesión para que al volver a llamar se actualice y no pierda el contador
        session_start();

        if (isset($_SESSION['id_usuario'])) {
            $id = $_SESSION['id_usuario'];
            // Aquí va el código que se ejecutará si la sesión está iniciada

            // Creamos modelo para sede
            $Sede = new Sede();
            // Hacemos consulta para recuperar con su ID los datos de la sede en la que se inició sesión            
            $sede = $Sede->get_sede($id);
            $alumno = new SedeAlumno();
            $alumnos = $alumno->getAlumnos($id);
            $vacante = $alumno->getVacantes($id);

            // Verifica si la variable de sesión 'contador' está definida
            if (!isset($_SESSION['contador']) || $_SESSION['contador'] >= count($alumnos)) {
                // Si no está definida o si ya se han mostrado todos los alumnos, inicialízala en 0
                $_SESSION['contador'] = 0;
            }

            // Obtiene el valor actual del contador
            $contador = $_SESSION['contador'];

            // Comprueba si hay datos disponibles y configura $data["alumno"] en consecuencia
            if ($contador < count($alumnos)) {
                $data["alumno"] = $alumnos[$contador]; // No resta 1 para obtener el índice correcto

                $data["fullName"] = $data["alumno"]["NombreA"] . ' ' . $data["alumno"]["ApellidoP"] . ' ' . $data["alumno"]["ApellidoM"];
            } else {
                $data["alumno"] = null;
                // No necesitas establecer $_SESSION["contador"] en null
            }

            // Incrementa el contador en 1
            $_SESSION['contador']++;

            require_once "Views/Sede/index.php";
        } else {
            // Si la sesión no está iniciada, redirige al usuario a index.php
            header("Location: index.php");
        }
    }

    //Funcion que descarta a un alumno para que este pueda volver a postularse y manda un correo
    public function descartar()
    {
        $matricula = $_POST['matricula'];
        $alumno = new SedeAlumno();
        $result = $alumno->borraAlumno($matricula);

        require_once "Views/Sede/index.php";
    }

    //Funcion que descarta a un alumno para que este pueda volver a postularse y manda un correo
    public function descartarAlumno()
    {
        $matricula = $_POST['matricula'];
        $alumno = new SedeAlumno();
        $result = $alumno->borraAlumno($matricula);
    }

    public function pendiente()
    {
        $matricula = $_POST['matricula'];
        $alumno = new SedeAlumno();
        $result = $alumno->updateAlumnoCita($matricula);

        require_once "Views/Sede/index.php";
    }

    public function pendientes()
    {
        // Utilizaremos una sesión para que al volver a llamar se actualice y no pierda el contador
        session_start();


        if (isset($_SESSION['id_usuario'])) {

            $id = $_SESSION['id_usuario'];
            $Sede = new Sede();
            // Hacemos consulta para recuperar con su ID los datos de la sede en la que se inició sesión            
            $sede = $Sede->get_sede($id);


            $alumnos = new SedeAlumno();
            $data = $alumnos->alumnoPorConfirmar($id);
            require_once 'Views/Sede/pendientes.php';
        } else {
            // Si la sesión no está iniciada, redirige al usuario a index.php
            header("Location: index.php");
        }
    }

    //Alumnos confirmados por la sede
    public function confirmados()
    {
        session_start();

        if (isset($_SESSION['id_usuario'])) {
            $id = $_SESSION['id_usuario'];
            $Sede = new Sede();
            // Hacemos consulta para recuperar con su ID los datos de la sede en la que se inició sesión            
            $sede = $Sede->get_sede($id);


            $alumnos = new SedeAlumno();
            $data = $alumnos->alumnoConfirmado($id);
            require_once 'Views/Sede/confirmados.php';
        } else {
            // Si la sesión no está iniciada, redirige al usuario a index.php
            header("Location: index.php");
        }
    }

    //Aceptar al alumno una vez que ya se entrevisto
    public function aceptar()
    {
        $id = $_POST["matricula"];
        // Utilizaremos una sesión para que al volver a llamar se actualice y no pierda el contador
        session_start();


        $idSede = $_SESSION['id_usuario'];
        $alumnos = new SedeAlumno();
        $data = $alumnos->confirmarAlumno($id, $idSede);
    }
    //Brandon

    public function show_sede()
    {
        $sedes = new Sede();
        $data = $sedes->get_sedes();
        require_once "Views/Vinculacion/sedes.php";
    }

    public function nueva_sede()
    {
        // Obtener los datos del formulario
        $matricula = $_POST["matricula"];
        $nombre_sede = $_POST["nombre_sede"];
        $direccion = $_POST["direccion"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $tiposede = $_POST["tiposede"];
        $contrasena = $_POST["contrasena"];
        $nombre = $_POST["nombre"];
        $apellidop = $_POST["apellidop"];
        $apellidom = $_POST["apellidom"];
    
        $logo = isset($_FILES["logo"]["tmp_name"]) ? $_FILES["logo"]["tmp_name"] : null;
    
        // Instanciar el modelo
        $sedes = new Sede();
    
        // Llamar al método para agregar una nueva sede
        $response = $sedes->new_sede($matricula, $nombre_sede, $direccion, $correo, $telefono, $tiposede, $contrasena, $nombre, $apellidop, $apellidom, $logo);
    
        // Enviar la respuesta como JSON
        echo json_encode($response);
    }

    public function edit_sede($id)
    {
        $sede = new Sede();
        $data = $sede->get_sede($id);
        require_once "Views/Vinculacion/edit_sede.php";
    }
    public function sede_editado()
    {
        // Obtener los datos del formulario
        $id_sede = $_POST["id_sede"];
        $id = $_POST["identificador"];
        $nombresede = $_POST["nombre_sede"];
        $direccion = $_POST["direccion"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $tiposede = $_POST["tiposede"];

        // Instanciar el modelo Sede
        $sede = new Sede();

        // Llamar al método modificar del modelo para actualizar la sede
        $resultado = $sede->modificar($id_sede, $id, $nombresede, $direccion, $correo, $telefono, $tiposede);

        // Verificar si la actualización fue exitosa
        if ($resultado['status'] === 'success') {
            echo json_encode(array('status' => 'success', 'message' => 'Actualización correcta'));
        } else {
            // Si hubo un error en la actualización, mostrar mensaje de error
            echo json_encode(array('status' => 'error', 'message' => 'Error en la actualización de datos: ' . $resultado['message']));
        }
    }

    public function mostrar_busqueda()
    {
        // Obtener el dato de búsqueda desde la solicitud POST
        $datoBusqueda = $_POST['busqueda'];

        // Validar si se ingresó un dato de búsqueda
        if (!empty($datoBusqueda)) {
            // Crear una instancia del modelo de búsqueda
            $modeloBusqueda = new Sede();

            // Llamar a la función en el modelo para realizar la búsqueda
            $resultados = $modeloBusqueda->datos_busqueda($datoBusqueda);

            // Mostrar los resultados (puedes implementar tu propia lógica para mostrar los resultados en la vista)
            echo json_encode($resultados);
        } else {
            // Manejar el caso en el que no se proporcionó un dato de búsqueda
            echo json_encode(["error" => "Por favor, ingresa un dato de búsqueda válido."]);
        }
    }
}
