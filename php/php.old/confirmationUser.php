<?php


class confirmationUser 
{
	protected $request;
	protected $response;
	
	function __construct($request, $response)
	{
	    $this->request = $request;
	    $this->response = $response;
	}
	public function launch()
	{
		if($this->request->getParam('action')=="validation")
		{
			$this->register();
		}
	    $this->response->setPageDisplay($this->request->getParam('page'));
	    return $this->response;
	}
	function register()
	{
		// Recuperation des variables du form-user
		$nom = $_POST['nom']; // variable name pas id dans le html
		$prenom = $_POST['prenom'];
		$adresse = $_POST['adresse'];
		$cp = $_POST['cp'];
		$ville = $_POST['ville'];
		$pays = $_POST['pays'];
		$date = $_POST['date'];
		$email = $_POST['email'];
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		$nb=0;
		// Mise en place de la requete Propel
		$selectedClient = ClientQuery::create()
		    ->find(); // on utilise properl
		    
		echo $selectedClient; 
		//Selection de tout les logins
		foreach($selectedClient as $selectedClient) {
			if ($login==$selectedClient->getLogin()){
				$nb=1;
				break;
			}else{
				$nb=0;
			}
			break;
		}
		
		if($nb==0){
			//Création d'une user
			$client = new Client();
			$client->setNom($nom);
			$client->setPrenom($prenom);
			$client->setAdresse($adresse);
			$client->setCodepostal($cp);
			$client->setVille($ville);
			$client->setPays($pays);
			//$client->setDate($date);
			$client->setLogin($login);
			$client->setEmail($email);
			$client->setPass($password);
			$client->setSolde(0);
			$client->setTel(0000000000);
			$client->save();
		}else {
			//User déjà existant
		}
		
		$smarty->assign ("nb",$nb);
		echo $nb;
		$this->response->setPageDisplay("confirmationUser");
	}
}
	
?>