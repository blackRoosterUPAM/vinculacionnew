<?php
	//Importar sus controladores
	require_once "config/config.php";
	require_once "core/routes.php";
	require_once "config/database.php";
	require_once "controllers/Alumnos.php";	
	require_once "controllers/Sedes.php";
	require_once "controllers/Usuarios.php";
	require_once "controllers/Carrera.php";
	require_once "controllers/Proceso.php";
	require_once "controllers/Escolars.php";
	require_once "controllers/Registro.php";

	
	//Mediante la url vamos a saber que controlador se usa
	//ejemplo index.php?c=sedes
	if(isset($_GET['c'])){
		$controlador = cargarControlador($_GET['c']);
		
		if(isset($_GET['a'])){
			if(isset($_GET['id']) && isset($_GET['id2'])){
				cargarAccion($controlador, $_GET['a'], $_GET['id'], $_GET['id2']);
			} else if (isset($_GET['id'])) {
				cargarAccion($controlador, $_GET['a'], $_GET['id']);
			} else {
				cargarAccion($controlador, $_GET['a']);
			}
		} else {
			cargarAccion($controlador, ACCION_PRINCIPAL);
		}
	} else {
		$controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
		$accionTmp = ACCION_PRINCIPAL;
		$controlador->$accionTmp();
	}
	
?>