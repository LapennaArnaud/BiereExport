{extends file="../templates/masterPage.tpl"}

{block name="titre"}
Vos informations
{/block}


{block name="zone_travail"}
		<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
			<div id="form-title-div">
				<h2 class="text-center">Vos informations</h2>
			</div>
			<div class="row">
	            <div class="col-md-6">
	            	<form method="post" action="/utilisateur/editCompte" id="form-editCompte" role="form">
		        	    <div class="form-group col-md-12">
		    				<label class="control-label col-md-3 col-xs123" >Nom :</label>
		    				<div class="col-md-8 col-xs-12">
		    					<input class="form-control" type="text" name="nom" id="nom" value={$smarty.session.nom}>
		    				</div>
		    			</div>
		    			
		        	    <div class="form-group col-md-12">
		    				<label class="control-label col-md-3 col-xs-12" >Email :</label>
		    				<div class="col-md-8 col-xs-12">
		    					<input class="form-control" type="email" name="email" id="email" value={$smarty.session.email}>
		    				</div>
		    			</div>
		    			
		    			<div class="form-group col-md-12">
		    				<label class="control-label col-md-3 col-xs-12" >Login :</label>
		    				<div class="col-md-8 col-xs-12">
		    					<input class="form-control" type="text" name="login" id="login" value={$smarty.session.login}>
		    				</div>
		    			</div>
		    			
		    			<div class="form-group col-md-3">
		    				<div class="form">
		    					<a href="/utilisateur/modificationMdp"><button type="button" class="btn btn-default" >Modifier MDP</button></a>
		    				</div>
		    			</div>
		    			
		    			<div class="form-group col-md-offset-5">
		    				<div class="form">
		    					<button type="submit" class="btn btn-default" >Modifier</button>
		    				</div>
		    			</div>
	    			</form>
	            </div>
	            
	            <div class="col-md-6">
	            	<label class="control-label" >Historique des achats :</label>
					<ul>
						<a href="REF PRODUIT ?"><li id="commande1">Commande n°5123 : 2 biere HK</li></a>
						<a href="REF PRODUIT ?"><li id="commande2">Commande n°4189 : 4 biere Hoegaarden</li></a>
						<a href="REF PRODUIT ?"><li id="commande3">Commande n°1233 : 2 biere Méteor</li></a>
					</ul>
	            </div>
            </div>
            <div class="row">
	            <div class="col-md-6">
	            	<label class="control-label col-md-offset-1" >Adresse de livraison :</label>
	            	<ul class="col-md-offset-1">
						<li>Adresse : {$smarty.session.adresse}</li>
						<li>Code postal : {$smarty.session.cp}</li>
						<li>Ville : {$smarty.session.ville}</li>
						<li>Pays : {$smarty.session.pays}</li>
					</ul>
	            </div>	
	            <div class="col-md-6">
	            	<label class="control-label col-md-offset-1" >Adresse de facturation :</label>
	            	<ul class="col-md-offset-1">
						<li>Adresse : {$smarty.session.adresse}</li>
						<li>Code postal : {$smarty.session.cp}</li>
						<li>Ville : {$smarty.session.ville}</li>
						<li>Pays : {$smarty.session.pays}</li>
					</ul>
	            </div>	
            </div>
		</div>	
{/block}

