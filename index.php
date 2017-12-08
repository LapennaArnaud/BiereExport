<?php
	
	session_start();
	
	$_SESSION['login']="arnotos";
	$_SESSION['mdp']="123";
	$_SESSION['isAdmin']=true;
	
	// LIBS
	require 'vendor/autoload.php';
    require_once  'generated-conf/config.php';
    require_once 'php/Controller/Response.php';
	require_once 'php/Controller/Request.php';
    require_once 'php/Controller/ActionController.php';
	require_once 'php/Controller/FrontController.php';

	
	FrontController::dispatch();
	// controleur de base , unique pour toutes les vues du site web
	
	// FRONT CONTROLEUR	
	// if (isset ($_GET ['page'])) $page = $_GET ['page']; else $page = "accueil";
	// if (isset ($_GET ['action'])) $action = $_GET ['action']; else $action = "";
		
	// switch ($page) {
 //   case "panier":
 //   	require("php/$page.php");
 //   	break;
 //	case "client":
 //		break;
 //   case "transaction" :
 //   	break;
 //   case "article":
 //   	require("php/$page.php");
	// 	break;
	// case "login":
 //   	require("php/$page.php");
	// 	break;
	// case "confirmationAchat":
 //   	require("php/$page.php");
	// 	break;
	// case "produit":
	// 	require("php/$page.php");
	// 	break;
	// case "login":
	// 	require("php/$page.php");
	// case "createUser":
	// 	require("php/$page.php");
	// 	break;
 //   case "validationCreationCompte":
 //   	require("php/$page.php");
	// 	break;
	// case "mdpOublie":
 //   	require("php/$page.php");
	// 	break;
	// case "info":
 //   	require("php/$page.php");
	// 	break;
	// case "contact":
 //   	require("php/$page.php");
	// 	break;
	// case "infoClient":
 //   	require("php/$page.php");
	// 	break;
	// case "confirmationUser":
 //   	require("php/$page.php");
	// 	break;
	// case "test":
 //   	require("php/$page.php");
	// 	break;
	// case "mail":
 //   	require("php/$page.php");
	// 	break;
	// case "validationLogin":
 //   	require("php/$page.php");
	// 	break;
	// default:
 //      require("php/accueil.php");
 //   break;
	// }

?>