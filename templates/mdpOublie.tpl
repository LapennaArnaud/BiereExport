{extends file="../templates/masterPage.tpl"}

{block name="titre"}
Mot de passe oublié
{/block}


{block name="zone_travail"}
<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
   	<div>
    	<h2 class="text-center">Mot de passe oublié</h2>
	</div>
	<div class="col-md-1"></div>
	<form method="post" class="form-horizontal col-md-9" id="form-mdp" role="form" action="/utilisateur/validationMdpOublie">
			<div class="form-group col-md-12">
				<div class="form-group col-md-12">
    				<label class="control-label col-md-3" >Login:</label>
    				<div class="col-md-9">
    					<input class="form-control" type="text" name="login" id="login" >
    				</div>
    			</div>
    			<div class="form-group col-md-12">
					<label class="control-label col-md-3" >Adresse email :</label>
					<div class="col-md-9">
						<input class="form-control" type="email" name="email" id="email" placeholder="Veuillez rentrer l'adresse email lié au compte ..." >
					</div>
				</div>
				<div class="form col-md-offset-6 col-xs-6">
					<button type="submit" class="btn btn-default" >Valider</button>
				</div>
			</div>
	</form>

</div>
{/block}
