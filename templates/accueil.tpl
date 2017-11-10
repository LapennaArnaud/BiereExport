{extends file="../templates/masterPage.tpl"}

{block name="titre"}
Accueil
{/block}

{block name="zone_travail"}
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
			<ol class="carousel-indicators">
		    	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    	<li data-target="#myCarousel" data-slide-to="1"></li>
		    	<li data-target="#myCarousel" data-slide-to="2"></li>
		  	</ol>

  			<!-- Wrapper for slides -->
	  		<div class="carousel-inner">
		    	<div class="item active">
		      		<img src="../public/img/biere1.jpg" alt="Biere 1">
		    	</div>
		
		    	<div class="item">
		      		<img src="../public/img/biere2.jpg" alt="Biere 2">
		    	</div>
		
		    	<div class="item">
		      		<img src="../public/img/biere3.jpg" alt="Biere 3">
		    	</div>
		    </div>
		
			  <!-- Left and right controls -->
			  	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			    	<span class="glyphicon glyphicon-chevron-left"></span>
			    	<span class="sr-only">Previous</span>
			  	</a>
			  	<a class="right carousel-control" href="#myCarousel" data-slide="next">
			    	<span class="glyphicon glyphicon-chevron-right"></span>
			    	<span class="sr-only">Next</span>
			  	</a>
		</div>
		
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h1><u>Bienvenue sur Bière EXPORT</u></h1>
			<br>
			<p class="text-home">
				Haec dum oriens diu perferret, caeli reserato tepore Constantius consulatu suo septies et Caesaris ter egressus Arelate Valentiam petit, in Gundomadum et Vadomarium fratres Alamannorum reges arma moturus, quorum crebris excursibus vastabantur confines limitibus terrae Gallorum.<br>
				Utque aegrum corpus quassari etiam levibus solet offensis, ita animus eius angustus et tener, quicquid increpuisset, ad salutis suae dispendium existimans factum aut cogitatum, insontium caedibus fecit victoriam luctuosam.<br>
				Exsistit autem hoc loco quaedam quaestio subdifficilis, num quando amici novi, digni amicitia, veteribus sint anteponendi, ut equis vetulis teneros anteponere solemus. Indigna homine dubitatio! Non enim debent esse amicitiarum sicut aliarum rerum satietates; veterrima quaeque, ut ea vina, quae vetustatem ferunt, esse debet suavissima; verumque illud est, quod dicitur, multos modios salis simul edendos esse, ut amicitiae munus expletum sit.<br>
			</p>
		</div>
{/block}