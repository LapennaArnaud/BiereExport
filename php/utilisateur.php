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
		}elseif ($this->request->getParam('action')=="modificationMdp")
		{
			$this->response->setPageDisplay("modificationMdp");
		}elseif ($this->request->getParam('action')=="infoClient") 
		{
			$this->response->setPageDisplay("infoClient");
		}elseif ($this->request->getParam('action')=="validationCreationCompte") 
		{
			$this->register();
			$this->response->setPageDisplay("validationCreationCompte");
		}elseif ($this->request->getParam('action')=="validationMdpOublie")
		{
			$this->checkInfoMdpOublie();
			$this->response->setPageDisplay("validationMdpOublie");
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
			//redirectig de force vers le index.php sinon le header ne se met pas à jours.
			/* Redirection vers une page différente du même dossier ; ici d'un dossier parent*/
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = '../index.php';
			header("Location: https://$host$uri/$extra");
			exit;
		}elseif ($this->request->getParam('action')=="editCompte")
		{
			$this->edit_compte();
			$this->response->setPageDisplay("infoClient");
		}elseif ($this->request->getParam('action')=="editMdpCompte")
		{
			$this->edit_mdp_compte();
			//on 'set' la meme page avec la variable Flag de succès de l'opération dans la reponse
			$this->response->setPageDisplay("modificationMdp");
		}
		
	    return $this->response;
	}
	
	public function register()
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
		
		// Mise en place de la requete Propel
		$selectedClient = ClientQuery::create()
		    ->find(); // on utilise propel
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
	
	public function edit_mdp_compte()
	{
		// Recuperation des variables du form-user
		$mdp_old = $_POST['password_old']; // variable name pas id dans le html
		$mdp_new = $_POST['password'];
		$mdp_new_verif = $_POST['password_confirmation'];
		$login = $_SESSION['login'];
		
		$client = new Client();
		$success=2; // vérification state si les champs rentré sont bon pour executer la demande et si le déroulement s'est bien passé
		//de base $success = 2 car on ne peut pas faire passer false au tpl ==> enorme bug (trouvé suit à un debug)
		//2 == false || 1 == true
		
		//si le champ nouveau mdp et validation new mdp ne sont pas égale on ne fait rien! (normalement impossible grace à la validation Jquerry)
		if($mdp_new==$mdp_new_verif){
			// Mise en place de la requete Propel
			$selectedClient = ClientQuery::create()
			    ->find(); // on utilise properl
			foreach($selectedClient as $selectedClient) 
			{
				//Vérification si le user a renter son bon ancient mdp
				if($login == $selectedClient->getLogin() AND password_verify($mdp_old, $selectedClient->getPass()))
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
				//modification du mdp de l'user
				
				$client->setPass(password_hash($mdp_new, PASSWORD_DEFAULT));
				//mise à jour (update : save les changements d'un objet déja récupéré)
				$client->save(); //http://propelorm.org/documentation/03-basic-crud.html
				
				$success = 1; // on set le Flag de sucèss à 1 pour notifier le bon déroulement;
			}
		}
		//Passage du Flag de succès au TPL
		$this->response->setData(array("flagList"=>$success));
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
	
	public function checkInfoMdpOublie(){
		// Recuperation des variables du form-user
		// variable name pas id dans le html
		$email = $_POST['email'];
		$login = $_POST['login'];
		
		// Mise en place de la requete Propel
		$selectedClient = ClientQuery::create()
		    ->find(); // on utilise properl
		foreach($selectedClient as $selectedClient) 
		{
			//Vérification si le user est existant
			if($login == $selectedClient->getLogin() && $email == $selectedClient->getEmail() )
			{
				$user_exist = 1;
				$user=$selectedClient;
				break;
			}else
			{
				$user_exist = 0;
			}
		}
		if($user_exist == 1)
		{
			//Passage du Client au TPL
			$this->response->setData(array("clientList"=>$user));
			
			//ici imaginer/Utiliser un WS d'envoie de mail avec l'envoie du champ en $client->getMdp() au mail du compte
		}
	}

}



	    