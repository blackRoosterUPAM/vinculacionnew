<?php

class ContactoController
{
    //LRGA03
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
}
?>
