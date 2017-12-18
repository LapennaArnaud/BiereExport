{extends file="../templates/masterPage.tpl"}

{block name="titre"}
Mot de passe oublié
{/block}

{block name="zone_travail"}
<div class="col-md-offset-2 col-md-8">
	{if !empty($clientList)}
		<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
			<div>
				<h2 class="text-center">Un email récapitulatif de vos informations personnelles a été envoyé.</h2>
			</div>
			<div>
				<h3 class="text-center">Vous pouvez retourner maintenant retourner à <a href="../index.php">l'accueil</a>
			</div>
		</div>
	{else}
		<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
			<div>
				<h2 class="text-center">Le login et/ou l'email renseigné est incorect</h2>
			</div>
			<div>
				<h3 class="text-center">Vous pouvez réessayer en suivant <a href="/utilisateur/mdpOublie.html">ce lien</a>
			</div>
		</div>
	{/if}
</div>
{/block}