<?php
use Propel\Runtime\ActiveQuery\Criteria;
class produit
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
	    if($this->request->getParam('action')=="article")
		{
			$this->response->setPageDisplay("article");
		}elseif($this->request->getParam('action')=="produit")
		{
		    $this->recherche();
		    $this->response->setPageDisplay("produit");
		}elseif($this->request->getParam('action')=="catalogue")
		{
			$this->catalogue();
		    $this->response->setPageDisplay("produit");
		}elseif($this->request->getParam('action')=="confirmationAchat")
		{
		    $this->response->setPageDisplay("confirmationAchat");
		}elseif($this->request->getParam('action')=="panier")
		{
			$this->chargementPanier();
			$this->response->setPageDisplay("panier"); 
		}elseif($this->request->getParam('action')=="ajoutPanier")
		{
			//Renvoie d'un template vide pour les réponses JSON
			$this->response->setPageDisplay("request_json");
			$this->ajoutPanier();
		}elseif($this->request->getParam('action')=="paiement")
		{
			$this->paiement();
			$this->response->setPageDisplay("accueil");
		}elseif($this->request->getParam('action')=="removePanier")
		{
			//Renvoie d'un template vide pour les réponses JSON
			$this->response->setPageDisplay("request_json");
			$this->removePanier();
		}
		
		return $this->response;
	}
	
	//Fonction d'affichage complet du catalogue
	public function catalogue()
	{
		$selectedArticle = ArticleQuery::create()
        ->find();
        
        $lesCategories = CategorieQuery::create()
        ->find();
        
        $this->response->setData(array("productList"=>$selectedArticle,"lesCategories"=>$lesCategories));
	}
	
	//Fonction de recherche avec le nom d'un produit 
	public function recherche()
	{
	    $recherche = $_POST['recherche'];
	    $selectedArticle = ArticleQuery::create()
	    //Filtre pour rechercher un produit ressemblant à la recherche
	    	->filterByLibelle('%'.$recherche.'%', Criteria::LIKE)
	        ->find();
	    $this->response->setData(array("productList"=>$selectedArticle));
	}
	
	public function ajoutPanier()
	{
		if(isset($_GET["id"])){
			$id = $_GET["id"];
			if(!isset($_SESSION["panier"])){
				//Panier non initialisé = vide 
				
				//Initialisation avec $panier = []
				$panier = [];
				//Ajout de la key (id) et nombre de produit à 1
				$panier[$id] = 1;
			}else{
				//Panier initialisé = au moins 1 produits 

				//Chargement du panier de session dans $panier
				$panier = $_SESSION["panier"];
				//Récupération du nombre de produit
				$nbArticle = $panier[$id];
				//Ajout à l'array $panier la key (ID) et le nombre de produit déjà présent +1
				$panier[$id] = $nbArticle+1;
			}
			$selectedArticle = ArticleQuery::create()
				->findPk($id);
			//Ajout du prix de l'article au prix total du panier
			$_SESSION["totalPanier"] += round(($selectedArticle->getPrixHT()*($selectedArticle->getTauxTVA()->getTaux())),3);
			//Ajout dans la variable session panier les produits ajoutés
			$_SESSION["panier"] = $panier;
		}
		//Récupération du nombre d'article présent dans $panier /!\ pas le nombre de de produit par produit (ex : 15 HK , 2Meteor = 2 produit)
		$nb = sizeof($panier);
		
		$_SESSION["nbArticle"]=$nb;
		
		echo json_encode(array(
			"nb" => $nb, ));
	}
	
	public function removePanier()
	{
		if(isset($_GET["id"])){
			$id = $_GET["id"];
			$selectedArticle = ArticleQuery::create()
				->findPk($id);
			//Charge la panier de la session
			$panier = $_SESSION["panier"];
			//Suppression du prix de l'article dans le $_SESSION['totalPanier']
			$_SESSION["totalPanier"] -= (round(($selectedArticle->getPrixHT()*($selectedArticle->getTauxTVA()->getTaux())),3)*$panier[$id]);
			//Supprime la ligne avec l'ID du produit
			unset($panier[$id]);
			$_SESSION["panier"] = $panier;
		}
		
		$nb = sizeof($panier);
		$_SESSION["nbArticle"]=$nb;
		
		echo json_encode(array(
			"nb" => $nb, ));
	}
	
	public function chargementPanier()
	{
		
		if(sizeof($_SESSION["panier"])==0){
			
		}else{
			//print_r($_SESSION["panier"]);
			$selectedArticle = ArticleQuery::create()
        		->findPks(array_keys($_SESSION["panier"]));
        	//print_r($selectedArticle);
			$this->response->setData(array("productList"=>$selectedArticle, "panier"=>$_SESSION["panier"]));
		}

	}
	
	public function rechercheProduit($categorie)
	{
		//à l'aide d'un objet Catégorie
		$lesProduits = ArticleQuery::create()
        	->filterByCategorie($categorie)
        	->find();
        return $lesProduits;
	}
	
	public function rechercheProduitById($idCategorie)
	{
		//à l'aide d'un id (PK) de la catégorie
		$categorie = CategorieQuery::create()->findPk($idCategorie);
		$lesProduits = ArticleQuery::create()
        	->filterByCategorie($categorie)
        	->find();
        return $lesProduits;
	}
	
	public function do_post_request($url)
	{
		// http://php.net/manual/fr/function.curl-setopt.php
		//Initialise une session CURL
		$ch = curl_init($url);
		//Définit le parametre : Transfert sous forme de chaine de valeur retournée par curl_exec()
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//Définit le parametre : Pour utiliser un HTTP POST
		curl_setopt($ch, CURLOPT_POST, 1);
		//Définit le parametre : Suivre toutes les en-têtes 'Location' que le serveur envoie dans les en-tête HTTP
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		//Définit le parametre : Pour inclure l'en-tête dans la valeur de retour
		curl_setopt($ch, CURLOPT_HEADER, 0);
		//Execute la session CURL
		$output = curl_exec($ch);

		$output= json_decode($output);
		
		curl_close($ch);
		return $output;
	}
	
	public function paiement()
	{
		$url = $_SERVER['HTTP_HOST'].'/transaction';
		$date = date('d-m-Y');
		$myvars = array(
			'idClient' => $_SESSION['idClient'],
			'montant' => $_SESSION['totalPanier'], //A faire aussi
			'devise' => urlencode('€'),
			'date' => $date
		);
		foreach($myvars as $i){
			$url .= '/' .$i;
		}
		try{
			echo $url;
			//Lance la requete CURL
			$result = $this->do_post_request($url);
			$idCommande = $result->{'idtransaction'};
			$this->response->setData(array('sucess' => 'OK'));
		}catch(Exception $ex){
			$this->response->setData(array('error' => 'NOK'));
		}
	}
	
		//test pour voir si les auto-value dans les bdd fonctionnent.
	public function testInsertCommande()
	{
		//s'instancie avec la date actuelle d'instanciation de la machine
		$date = new DateTime();
		
		$lesClients = ClientQuery::create() ->find();
		$client = $lesClients[0]; // objet Client (class) first ellement value
		
		//Création d'une commande pour le test
		$commande = new Commande();
		$commande->setDate($date);
		$commande->setClient_id($client->getIdClient()); // on récupère l'id du client (objet client passé en param)
		$commande->save();
	}
}


