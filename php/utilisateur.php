<?php
class utilisateur
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
	    if($this->request->getParam('action')=="sign_up")
		{
			$this->response->setPageDisplay("createUser");
		}elseif ($this->request->getParam('action')=="login")
		{
		    $this->response->setPageDisplay("login");
		}elseif ($this->request->getParam('action')=="mdpOublie")
		{
			$this->response->setPageDisplay("mdpOublie");
		}elseif ($this->request->getParam('action')=="infoClient") 
		{
			$this->response->setPageDisplay("infoClient");
		}elseif ($this->request->getParam('action')=="validationCreationCompte") 
		{
			$this->register();
			$this->response->setPageDisplay("validationCreationCompte");
		}elseif ($this->request->getParam('action')=="validationLogin") 
		{
			$loginSuccess=$this->login();
			if($loginSuccess)
			{
				$this->response->setPageDisplay("accueil");
			}else
			{
				$this->response->setPageDisplay("login");
			}
		}elseif ($this->request->getParam('action')=="logOut") 
		{
			$this->log_out();
			$this->response->setPageDisplay("accueil");
		}elseif ($this->request->getParam('action')=="editCompte")
		{
			$this->edit_compte();
			//TODO reload la session à jours | update session 
			//OU ne pas afficher le tpl(bad solution)
			$this->response->setPageDisplay("infoClient");
		}
		
		//$this->response->setPageDisplay($this->request->getParam('page'));
	    //return $this->response;
	    
	    //$this->response->setPageDisplay("confirmationUser");
		
	    //$this->response->setPageDisplay($this->request->getParam('page'));
	    return $this->response;
	}
	
	public function register()
	{
		// Recuperation des variables du form-user
		$nom = $_POST['nom']; // variable name pas id dans le html
		$prenom = $_POST['prenom'];
		$ville = $_POST['ville'];
		$pays = $_POST['pays'];
		$date = $_POST['date'];
		$email = $_POST['email'];
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		// Mise en place de la requete Propel
		$selectedClient = ClientQuery::create()
		    ->find(); // on utilise properl
		foreach($selectedClient as $selectedClient) 
		{
			//Vérification si le user est existant
			if($login == $selectedClient->getLogin())
			{
				$user_exist = 1;
				break;
			}else
			{
				$user_exist = 0;
			}
		}
		if($user_exist == 0)
		{
			//Création d'un User
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
			$client->setPass(password_hash($password, PASSWORD_DEFAULT));
			$client->setSolde(0);
			$client->setTel(0000000000);
			$client->save();


			//Passage du Client au TPL
			$this->response->setData(array("clientList"=>$client));
		}
	}
	
	public function login()
	{
		//variable de fonction si log ok ou non (utilisé par le for each)
		$success=false;
		
		//Recuperation variables form-login
		$login = $_POST['login'];
		$password = $_POST['password'];

		// Mise en place de la requete Propel	
		$selectedClient = ClientQuery::create()
		    ->find();
		    
		//Pour chaque Client getLogin
		foreach($selectedClient as $selectedClient) {
			if($login == $selectedClient->getLogin() AND password_verify($password, $selectedClient->getPass()))
			{
			
				//echo "OK";
				$_SESSION['login']=$selectedClient->getLogin();
				$_SESSION['mdp']=$selectedClient->getPass();
				$_SESSION['nom']=$selectedClient->getNom();
				$_SESSION['prenom']=$selectedClient->getPrenom();
				$_SESSION['adresse']=$selectedClient->getAdresse();
				$_SESSION['cp']=$selectedClient->getCodePostal();
				$_SESSION['ville']=$selectedClient->getVille();
				$_SESSION['pays']=$selectedClient->getPays();
				$_SESSION['email']=$selectedClient->getEmail();
				$_SESSION['idClient']=$selectedClient->getIdClient();
				$_SESSION['error']=0;
				$_SESSION['client']=$selectedClient;

				//$_SESSION['isAdmin']=true;
				$success=true;
				break;
			}
		}
		//si on a toruvé aucun utilisateurs correspondant
		if($success==false)
		{
			//ici remonter une variable string au html
			$msgErrorLogin="Echec lors de l'authentification : Mauvais login ou mdp !";
			//$this->response->setData($msgErrorLogin);
			//$_SESSION['errorLogin']="Echec lors de l'authentification : Mauvais login ou mdp !";
		}
		
		return $success;
	}
	
	public function log_out()
	{
		session_destroy();
	}
	
	public function edit_compte()
	{
		// Recuperation des variables du form-user
		$nom = $_POST['nom']; // variable name pas id dans le html
		$email = $_POST['email'];
		$newLogin = $_POST['login'];
		$login = $_SESSION['login'];
		
		$client = new Client();
		
		// Mise en place de la requete Propel
		$selectedClient = ClientQuery::create()
		    ->find(); // on utilise properl
		foreach($selectedClient as $selectedClient) 
		{
			//Vérification si le user est existant
			if($login == $selectedClient->getLogin())
			{
				$user_exist = 1;
				//on récupère l'utilisateur
				$client=$selectedClient;
				break;
			}else
			{
				$user_exist = 0;
			}
		}
		if($user_exist == 1)
		{
			//modification des champs de l'user
			
			$client->setNom($nom);
			$client->setLogin($newLogin);
			$client->setEmail($email);
			//mise à jour (update : save les changements d'un objet déja récupéré)
			$client->save(); //http://propelorm.org/documentation/03-basic-crud.html
			
			//mise à jours des informations changé de session (à changer une fois une methode update session implémenté)
			$_SESSION['login']=$newLogin;
			$_SESSION['nom']=$nom;
			$_SESSION['email']=$email;
			//Passage du Client au TPL
			//$this->response->setData(array("clientList"=>$client));
		}
	}
	
	public function getHistoriqueCommande($idClient){
		// Mise en place de la requete Propel  http://propelorm.org/Propel/reference/model-criteria.html
		$lesCommandes = CommandeQuery::create()
			->filterByClient($_SESSION['client'])
			->orderByDate()
		    ->find(); // on utilise properl
		    //affinner la recherche propel
		foreach($lesCommandes as $value)
		{
			//Vérification si le user est existant
			if(false)// à compléter 
			{
				
			}
		}
		return $lesCommandes; // à compléter
	}

}



	    