{extends file="../templates/masterPage.tpl"}

{block name="titre"}
Création de l'utilisateur
{/block}

{block name="zone_travail"}
<div class="col-md-offset-2 col-md-8">
	
	{if !empty($clientList)}
		<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
			<div>
				<h2 class="text-center">Votre compte a bien été créé</h2>
			</div>
			<div>
				<h3 class="text-center">Vous pouvez retourner maintenant retourner à <a href="https://met02-2017-juliengroll-jgroll.c9users.io/index.php">l'accueil</a>
			</div>
		</div>
	{else}
		<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
			<div>
				<h2 class="text-center">L'utilisateur existe déjà</h2>
			</div>
			<div>
				<h3 class="text-center">Vous pouvez réessayer en suivant <a href="/utilisateur/sign_up.html">ce lien</a>
			</div>
		</div>
	{/if}
	
</div>

{/block}
