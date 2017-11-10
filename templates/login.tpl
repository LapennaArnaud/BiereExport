{extends file="../templates/masterPage.tpl"}

{block name="titre"}
Login
{/block}


{block name="zone_travail"}
		<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
			<div id="form-title-div">
				<h2 class="text-center">Connexion</h2>
			</div>
			<div class="col-md-1"></div>
			<form class="form-horizontal col-md-9" id="form-login" role="form">
				<div class="form-group col-md-12">
					<div class="form-group col-md-12">
						<label class="control-label col-md-3" >Login :</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="login" id="login" >
						</div>
					</div>
					
					<div class="form-group col-md-12">
						<label class="control-label col-md-3" >Mot de passe :</label>
						<div class="col-md-9">
							<input class="form-control" type="password" name="password" id="password" >
						</div>
					</div>
					<div class="form col-xs-6">
						<button type="submit" class="btn btn-default" >Valider</button>
					</div>
				</div>
			</form>
{/block}


{block name="script"}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="../public/js/jquery.validate.js"></script>
	<script type="text/javascript" src="../public/js/validate-rules.js"></script>
	<script type="text/javascript" src="../public/js/messages_fr.js"></script>
	<script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
{/block}