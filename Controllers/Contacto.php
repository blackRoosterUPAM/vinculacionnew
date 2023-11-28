<?php

class ContactoController
{

    //Incuimos los modelos que vamos a utilizar
    public function __construct()
    {
        require_once "Models/ContactoSedeModel.php";
        require_once "Models/CargaModel.php";
    }

    public function show_sede()
    {
        $sedes = new ContactoSede();
        $data = $sedes->getSolicitudes();
        require_once "Views/ptc/ContactoSede.php";
    }

    /* public function show_sede()
{
    $sedes = new ContactoSede();
    session_start();
    // Obtener el correo del PTC de la sesión
    $correoPtc = $_SESSION['correo_ptc'] ?? null;

    if ($correoPtc) {
        $solicitudes = $sedes->getSolicitudes($correoPtc);
        require_once "Views/ptc/ContactoSede.php";
    }
}
    */
}
?>