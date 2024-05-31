<?php

class EstadController
{
    // Incluimos los modelos que vamos a utilizar
    public function __construct()
    {
        require_once "Models/EstadisticosModel.php";
        require_once "Models/UsuariosModel.php";
        require_once "Models/RolModel.php";
    }

    // Función principal que retorna los alumnos que se postularon a una empresa en específico
    public function index()
    {
        $usuario = new UsuarioModel();
        $usuarios = $usuario->obtener_usuarios();

        $rol = new RolModel();
        $roles = $rol->obtener_rol();

        require_once "Views/Estadisticos/index.php";
    }

   public function nuevo_usuario()
    {
        $matricula = $_POST["matricula"];
        $correo = $_POST["correo"];
        $contrasena = $_POST["contrasena"];
        $idRol = $_POST["rol"];
        $nombre = $_POST["nombre"];
        $apellidop = $_POST["apellidoP"];
        $apellidom = $_POST["apellidoM"];

        // Instanciar el modelo Usuario
        $usuarioModel = new UsuarioModel();

        // Llamar a la función new_usuario del modelo para agregar un nuevo usuario
        $response = $usuarioModel->new_usuario($matricula, $correo, $contrasena, $idRol, $nombre, $apellidop, $apellidom);

        // Verificar el estado de la respuesta y enviar la respuesta adecuada al cliente
        if ($response['status'] === 'success') {
            echo json_encode(array('status' => 'success', 'message' => $response['message']));
        } else {
            echo json_encode(array('status' => 'error', 'message' => $response['message']));
        }
    }

    public function edit_usuario($id)
    {
        $usuario = new UsuarioModel();
        $data = $usuario->act_usuario($id);

        $rol = new RolModel();
        $roles = $rol->obtener_rol();
        require_once "Views/Estadisticos/editUsuario.php";
    }

public function usuario_editado()
    {
        // Obtener los datos del formulario
        $matriculaReal = $_POST["idReal"];
        $matricula = $_POST["matricula"];
        $correo = $_POST["correo"];
        $idRol = $_POST["rol_t"];
        $nombre = $_POST["nombre"];
        $apellidop = $_POST["apellidop"];
        $apellidom = $_POST["apellidom"];
        $idRol2 = $_POST["tipo_rol"];

        // Instanciar el modelo Usuario
        $usuarioModel = new UsuarioModel();

        // Llamar a la función actualizacion_usuarios del modelo para actualizar el usuario
        $response = $usuarioModel->actualizacion_usuarios($matriculaReal, $matricula, $correo, $idRol, $nombre, $apellidop, $apellidom, $idRol2);

        // Verificar el estado de la respuesta y enviar la respuesta adecuada al cliente
        if ($response['status'] === 'success') {
            echo json_encode(array('status' => 'success', 'message' => $response['message']));
        } else {
            echo json_encode(array('status' => 'error', 'message' => $response['message']));
        }
    }

    public function eli_usuario($id)
    {
        $usuario = new UsuarioModel();
        $usuarios = $usuario->eliminar($id);

        $usuario = new UsuarioModel();
        $usuarios = $usuario->obtener_usuarios();

        $rol = new RolModel();
        $roles = $rol->obtener_rol();

        require_once "Views/Estadisticos/index.php";
    }

    // Código PHP en el Controlador
    public function mostrar_busqueda()
    {
        $datoBusqueda = $_POST['busqueda'];

        if (!empty($datoBusqueda)) {
            $modeloBusqueda = new UsuarioModel();
            $resultados = $modeloBusqueda->datos_busqueda($datoBusqueda);
            echo json_encode($resultados);
        } else {
            echo json_encode(["error" => "Por favor, ingresa un dato de búsqueda válido."]);
        }
    }





    //LLama a la vista de alumno
    public function alumno()
    {
        $modelo = new Estadistico();
        $carreras = $modelo->obtenerCarreras();
        // Incluye la vista principal
        require_once "Views/Estadisticos/alumnosGraphics.php";
    }

    public function sede()
    {

        // Incluye la vista principal
        require_once "Views/Estadisticos/sedesGraphics.php";
    }
    // Endpoint para obtener las carreras disponibles
    public function obtenerCarreras()
    {
        $modelo = new Estadistico();
        $carreras = $modelo->obtenerCarreras();

        // Retorna las carreras en formato JSON
        echo json_encode($carreras);
    }

    // Endpoint para obtener los datos de una carrera específica
    public function obtenerDatosCarrera()
    {
        $nombreCarrera = $_POST['nombreCarrera'];

        $modelo = new Estadistico();
        $datosCarrera = $modelo->obtenerDatosCarrera($nombreCarrera);

        // Retorna los datos de la carrera en formato JSON
        echo json_encode($datosCarrera);
    }
    //Sede
    // Endpoint para obtener las sedes disponibles
    public function obtenerSedes()
    {
        $modelo = new Estadistico();
        $sedes = $modelo->obtenerSedes();

        // Retorna las sedes en formato JSON
        echo json_encode($sedes);
    }

    // Endpoint para obtener los datos de una sede específica
    public function obtenerDatosSede()
    {
        $idSede = $_POST['idSede'];
        $idPeriodo = $_POST['idPeriodo']; // Filtro de idPeriodo

        $modelo = new Estadistico();
        $datosSede = $modelo->obtenerDatosSede($idSede, $idPeriodo);

        // Retorna los datos de la sede en formato JSON
        echo json_encode($datosSede);
    }

    // Endpoint para obtener los datos de sedes (privadas y públicas)
    public function sedesByTipo()
    {
        $modelo = new Estadistico();
        $datosSedes = $modelo->sedesTipo();

        echo json_encode($datosSedes);
    }
}
