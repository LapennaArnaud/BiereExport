{extends file="../templates/masterPage.tpl"}

{block name="titre"}
Contact
{/block}

{block name="zone_travail"}
<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
	<div id="form-title-div">
	    <h2 class="text-center">Contactez-nous</h2>
        <form method="POST" action="?page=mail" class="form-horizontal col-md-offset-1 col-xs-offset-1 col-md-9 col-xs-9" id="form-contact" role="form">
			<div class="form-group col-md-12">
				<label class="control-label col-md-3">Nom :</label>
				<div class="col-md-9">
					<input class="form-control" type="text" name="nom" id="nom" >
				</div>
			</div>

			<div class="form-group col-md-12">
				<label class="control-label col-md-3" >Prenom :</label>
				<div class="col-md-9">
					<input class="form-control" type="text" name="prenom" id="prenom" >
				</div>
		    </div>
		    
		    <div class="form-group col-md-12">
    			<label class="control-label col-md-3" >Email :</label>
    			<div class="col-md-9">
    				<input class="form-control" type="email" name="email" id="email" >
    			</div>
    		</div>
    		
		    <div class="form-group col-md-12">
				<label class="control-label col-md-3" >Titre :</label>
				<div class="col-md-9">
					<input class="form-control" type="text" name="titre" id="titre" >
				</div>
		    </div>
    		
    		<div class="form-group col-md-12">
    			<label class="control-label col-md-3" >Message :</label>
    			<div class="col-md-9">
    				<textarea class="form-control" type="text" rows="5" name="message" id="message"></textarea>
    			</div>
    		</div>
    		
	    	<div class="form col-md-offset-6">
				<button type="submit" class="btn btn-default" >Envoyer</button>
			</div>
    		
        </form>
    </div>
</div>
{/block}