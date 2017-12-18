{extends file="../templates/masterPage.tpl"}

{block name="titre"}
Confirmation Achat
{/block}

{block name="zone_travail"}
<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
	<div id="form-title-div">
		<u><h2 class="text-center">Confirmation Achat</h2></u>
	</div>
	<h3 class="text-center">Votre achat a bien été éffectué</h3>
	<div class="col-md-12 text-center">
	    <a href="../index.php"><button type="button" class="btn btn-success">Retour à l'accueil</button></a>
	    <a href="/produit/panier.html"><button type="button" class="col-md-offset-1 btn btn-info ">Retour au panier</button></a>
	</div>
{/block}
