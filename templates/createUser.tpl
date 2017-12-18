{extends file="../templates/masterPage.tpl"}

{block name="titre"}
Création de l'utilisateur
{/block}

{block name="zone_travail"}
    <div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
    	<div id="form-title-div">
    		<h2 class="text-center">Création Utilisateur</h2>
    	</div>
    	
    	<div class="col-md-1"></div>
    		<form method="POST" action="/utilisateur/validationCreationCompte.html" class="form-horizontal col-md-9" id="form-user" role="form">
    			<div class="row">
    			<div class="form-group col-md-12">
    				<label class="control-label col-md-3">Nom :</label>
    				<div class="col-md-9">
    					<input class="form-control" type="text" name="nom" id="nom" >
    				</div>
    			</div>
    
    			<div class="form-group col-md-12">
    				<label class="control-label col-md-3" >Prenom:</label>
    				<div class="col-md-9">
    					<input class="form-control" type="text" name="prenom" id="prenom" >
    				</div>
    			</div>
    			
    			<div class="form-group col-md-12">
    				<label class="control-label col-md-3" >Adresse:</label>
    				<div class="col-md-9">
    					<input class="form-control" type="text" name="adresse" id="adresse" >
    				</div>
    			</div>
    			
    			<div class="form-group col-md-12">
    				<label class="control-label col-md-3" >Code Postal:</label>
    				<div class="col-md-9">
    					<input class="form-control" name="cp" id="cp" >
    				</div>
    			</div>
    			
    			<div class="form-group col-md-12">
    				<label class="control-label col-md-3" >Ville:</label>
    				<div class="col-md-9">
    					<input class="form-control" type="text" name="ville" id="ville" >
    				</div>
    			</div>
    			
    			<div class="form-group col-md-12">
    				<label class="control-label col-md-3" >Pays:</label>
    				<div class="col-md-9">
    					<input class="form-control" type="text" name="pays" id="pays" >
    				</div>
    			</div>
    			
     			<div class="form-group col-md-12 ">
    				<label class="control-label col-md-3" >Date de naissance:</label>
    				<div class="col-md-9 ">
    					<div class="input-group date datepicker datepicker-input" id='datepicker'>
    						<input class="form-control" name="date" id="date"/>
    						<span class="input-group-addon">
    							<span class="glyphicon glyphicon-calendar "></span>
    						</span>
    					</div>
    				</div>
    			</div>
    		
    			<div class="form-group col-md-12">
    				<label class="control-label col-md-3" >Email :</label>
    				<div class="col-md-9">
    					<input class="form-control" type="email" name="email" id="email" >
    				</div>
    			</div>
    			
    			<div class="form-group col-md-12">
    				<label class="control-label col-md-3" >Login:</label>
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
    			
    			<div class="form-group col-md-12">
    				<label class="control-label col-md-3" >Confirmation Mot de passe :</label>
    				<div class="col-md-9">
    					<input class="form-control" type="password" name="password_confirmation" id="password_confirmation" >
    				</div>
    			</div>
    									
    				<div class="form col-md-offset-6 col-xs-offset-5">
    					<button type="submit" class="btn btn-default" >Valider</button>
    				</div>
    			</div>
    	</form>
    </div>
{/block}


{block name="javascript"}
    <script>
    	$('#form-user').validate({
    		rules: validateRules
    	})
    	
    	$(".datepicker").datepicker({
    		format : "dd/mm/yyyy",
    		language : "fr",
    	})
    	
    	$('#datepicker').datepicker('setDate', new Date(1990, 0, 1));
    	$('#datepicker').datepicker('update'); 
    
    </script>
{/block}