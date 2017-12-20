{extends file="../templates/masterPage.tpl"}

{block name="titre"}
Modification mot de passe
{/block}


{block name="zone_travail"}
<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
   	<div>
    	<h2 class="text-center">Changement mot de passe du compte : {$smarty.session.login}</h2>
	</div>
	{if empty($flagList)}
		<div class="col-md-1"></div>
		<form method="post" class="form-horizontal col-md-9" id="form-mdp" role="form" action="/utilisateur/editMdpCompte">
				<div class="form-group col-md-12">
					
					<div class="form-group col-md-12">
	    				<label class="control-label col-md-3" >Ancien Mot de passe :</label>
	    				<div class="col-md-9">
	    					<input class="form-control" type="password" name="password_old" id="password_old">
	    				</div>
	    			</div>
					
					<div class="form-group col-md-12">
	    				<label class="control-label col-md-3" >Nouveau Mot de passe :</label>
	    				<div class="col-md-9">
	    					<input class="form-control" type="password" name="password" id="password" pwcheck="pwcheck">
	    				</div>
	    			</div>
	    			
	    			<div class="form-group col-md-12">
	    				<label class="control-label col-md-3" >Confirmation Mot de passe :</label>
	    				<div class="col-md-9">
	    					<input class="form-control" type="password" name="password_confirmation" id="password_confirmation" >
	    				</div>
	    			</div>
					<div class="form col-md-offset-6 col-xs-6">
						<button type="submit" class="btn btn-default" >Valider</button>
					</div>
				</div>
		</form>
	{else}
		{if ($flagList)==1}
			<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
				<div>
					<h2 class="text-center">Changement de mot de passe effectué !</h2>
				</div>
				<div>
					<h3 class="text-center">Vous pouvez retourner maintenant retourner à <a href="../index.php">l'accueil</a>
				</div>
			</div>
		{elseif ($flagList)==2}
			<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
				<div>
					<h2 class="text-center">Champ ancient mot de passe erroné</h2>
				</div>
				<div>
					<h3 class="text-center">Vous pouvez réessayer en suivant <a href="/utilisateur/modificationMdp">ce lien</a>
				</div>
			</div>
		{else}
			<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
				<div>
					<h2 class="text-center">ERROR</h2>
				</div>
			</div>
		{/if}
	{/if}
</div>
{/block}

{block name="javascript"}
    <script>
        //Ajout de regle du force du password 
        $.validator.addMethod("pwcheck", function(value) {
           return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // Doit contenir seulement ces caratères
           && /[a-z]/.test(value) // au moins une minuscule
           && /[A-Z]/.test(value) // au moins une majuscule
           && /\d/.test(value) // au moins un nombre
        });
        
    	$('#form-mdp').validate({
    		rules: validateRules
    	})
    </script>
{/block}