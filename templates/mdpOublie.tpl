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
	<form class="form-horizontal col-md-9" id="form-mdp" role="form">
			<div class="form-group col-md-12">
				<div class="form-group col-md-12">
					<label class="control-label col-md-3" >Mot de passe :</label>
					<div class="col-md-9">
						<input class="form-control" type="email" name="email" id="email" >
					</div>
				</div>
				<div class="form col-xs-6">
					<button type="submit" class="btn btn-default" >Valider</button>
				</div>
			</div>
		</form>

</div>

{/block}
