<?php

	require 'vendor/autoload.php';
	require_once  'generated-conf/config.php';

	$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
	]);
	
	
	$app->get('/client/{idclient}', 'getClient' );
	
	function getClient ($request,$response,$args) {
		
	
		return json_encode("");
	}
	
	$app->post('/client', 'addClient' );
	
	function addClient ($request,$response,$args) {
		$body = $request->getParsedBody();
		$nom = $body['nom'];
	
		return json_encode("");

	}
	
	$app->post('/transaction/{client}/{montant}/{devise}/{date}','addTransaction');
	
	function addTransaction($request, $response, $args){
		$_SESSION['error'] = 1;
		$idCLient = $args["client"];
		
		// A FAIRE CHECK CLIENT 
		
		
		
	//Transaction
		$date = date_create_from_format('d-m-y', $args['date']);
		$montant = $args['montant'];
		$devise = $args['devise'];
		
	//Création de la commande en BDD	
		$commande = new Commande();
		$commande->setClient_id($client->getIdClient());
		//Rajouter le montant dans la BDD et enlever le status de la commande
		//$commande->setMontant($montant);
		$commande->setDate($date);
		$idCommande = $commande->saveCommande();
	
		return json_encode(array('idTransaction' => $idCommande, 'date' => $date, 'montant' => $montant));	
		
		
	}
	
	$app->run();
?>