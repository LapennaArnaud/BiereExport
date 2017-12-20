<?php
	require 'vendor/autoload.php';
	require_once  'generated-conf/config.php';
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;

	$smarty = new Smarty ();
    	
    	$smarty->template_dir = 'templates/';
    	$smarty->compile_dir = 'templates_c/';
    	$smarty->config_dir = 'configs/';
    	$smarty->cache_dir = 'cache/';
    	
	$app = new \Slim\App([
    	'settings' => [
    		'displayErrorDetails' => true
    	]
	]);
	
	$app->post('/transaction/{client}/{montant}/{date}', 'transaction');
	
	
	function transaction($request, $response, $args){
		
		$idClient = $request->getAttribute('client');
		$montant = $request->getAttribute('montant');
		$date = $request->getAttribute('date');
		
		// //Création de la commande en BDD	
		$commande = new Commande();
		$commande->setClient_id($idClient);
		$commande->setMontant($montant);
		$commande->setDate($date);
		$commande->save();
		
		$idCommande = rand(50000,9999999);
		//Retour dans un json les données
		return json_encode(array('idTransaction' => $idCommande, 'date' => $date, 'montant' => $montant));	
	}
	$app->run();
?>