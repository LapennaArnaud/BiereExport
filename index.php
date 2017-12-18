<?php
	session_start();
	session_regenerate_id(true);
	
	// LIBS
	require 'vendor/autoload.php';
    require_once  'generated-conf/config.php';
    require_once 'php/Controller/Response.php';
	require_once 'php/Controller/Request.php';
    require_once 'php/Controller/ActionController.php';
	require_once 'php/Controller/FrontController.php';


	// FRONT CONTROLEUR
	FrontController::dispatch();
?>