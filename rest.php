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
	
	
	$app->get('/client/{idclient}', 'getClient' );
	
		function getClient ($request,$response,$args) {
			return json_encode("coucou");
		}
	
	$app->post('/client', 'addClient' );
	
		function addClient ($request,$response,$args) {
			$body = $request->getParsedBody();
			$nom = $body['nom'];
		
			return json_encode("");
		}
	
	$app->post('/transaction/{client}/{montant}/{date}', 'transaction');
	
	
	function transaction($request, $response, $args){
		
		$idClient = $request->getAttribute('client');
		$montant = $request->getAttribute('montant');
		$date = $request->getAttribute('date');
		
		
	// //Création de la commande en BDD	
		$commande = new Commande();
		$commande->setClient_id($idClient);
		//Rajouter le montant dans la BDD et enlever le status de la commande
		$commande->setMontant($montant);
		$commande->setDate($date);
		$commande->save();
		
		$idCommande = rand(50000,9999999);
		
		return json_encode(array('idTransaction' => $idCommande, 'date' => $date, 'montant' => $montant));	
	}
	
	$app->get('/hello/{name}', function (Request $request, Response $response) {
		$name = $request->getAttribute('name');
		$response->getBody()->write("Hello, $name");
    	return $response;
	});

	$app->run();
?>