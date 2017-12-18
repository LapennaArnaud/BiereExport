{extends file="../templates/masterPage.tpl"}

{block name="titre"}
Login
{/block}


{block name="zone_travail"}
		<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
			<div id="form-title-div">
				<h2 class="text-center">Connexion</h2>
			</div>
			<form method="post" action="/utilisateur/validationLogin.html" class="form-horizontal col-md-offset-1 col-xs-offset-1 col-md-9 col-xs-9" id="form-login" role="form">
				<div class="form-group col-md-12">
					<div class="form-group col-md-12">
						<label class="control-label col-md-3 col-xs-12" >Login :</label>
						<div class="col-md-9 col-xs-12">
							<input class="form-control" type="text" name="login" id="login" >
						</div>
					</div>
					
					<div class="form-group col-md-12">
						<label class="control-label col-md-3 col-xs-12" >Mot de passe :</label>
						<div class="col-md-9 col-xs-12">
							<input class="form-control" type="password" name="password" id="password" >
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="form col-md-offset-6 col-xs-offset-4">
							<button type="submit" class="btn btn-default" >Valider</button>
						</div>
						<div class="form col-md-offset-8 col-xs-12">
							<a href="/utilisateur/mdpOublie.html">Mot de passe oublié</a>
						</div>
					</div>
				</div>
			</form>
		</div>	
{/block}
