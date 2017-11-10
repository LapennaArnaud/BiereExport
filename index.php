<?php
	// LIBS
	require 'vendor/autoload.php';
    require_once  'generated-conf/config.php';
	
	// SMARTY
	$smarty = new Smarty ();
	
	$smarty->template_dir = 'templates/';
	$smarty->compile_dir = 'templates_c/';
	$smarty->config_dir = 'configs/';
	$smarty->cache_dir = 'cache/';


	// controleur de base , unique pour toutes les vues du site web
	
	// FRONT CONTROLEUR	
	if (isset ($_GET ['page'])) $page = $_GET ['page']; else $page = "accueil";
	if (isset ($_GET ['action'])) $action = $_GET ['action']; else $action = "";
		
	switch ($page) {
    case "panier":
    	break;
 	case "client":
 		break;
    case "transaction" :
    	break;
	case "catalogue":
		break;
	case "login":
		require("php/$page.php");
	case "createUser":
		require("php/$page.php");
		break;
	default:
       require("php/accueil.php");
    break;
	}
	
	function createUser()
	{
		static $nom;
		static $prenom;
		static $login;
		static $mdp;
		static $id;
		static $email;
		static $adresse;
		static $ville;
		static $cp;
		static $pays;
	}
	
	
	
?>