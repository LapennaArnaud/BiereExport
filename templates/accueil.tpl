{extends file="../templates/masterPage.tpl"}

{block name="titre"}
Accueil
{/block}

{block name="zone_travail"}

		<div id="myCarousel" class="carousel slide hidden-xs" data-ride="carousel">
		  <!-- Indicators -->
			<ol class="carousel-indicators">
		    	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    	<li data-target="#myCarousel" data-slide-to="1"></li>
		    	<li data-target="#myCarousel" data-slide-to="2"></li>
		    	<li data-target="#myCarousel" data-slide-to="3"></li>
		    	<li data-target="#myCarousel" data-slide-to="4"></li>
		  	</ol>

  			<!-- Wrapper for slides -->
	  		<div class="carousel-inner">
		    	<div class="item active">
		      		<img src="../public/img/biere2.jpg" alt="Biere 2">
		    	</div>
		    	<div class="item">
		      		<img src="../public/img/biere1.jpg" alt="Biere 1">
		    	</div>
		    	<div class="item">
		      		<img src="../public/img/biere3.jpg" alt="Biere 3">
		    	</div>
		    	<div class="item">
		      		<img src="../public/img/biere4.jpg" alt="Biere 4">
		    	</div>
				<div class="item">
		      		<img src="../public/img/biere5.jpg" alt="Biere 5">
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
				Bière EXPORT, leader français sur le marché de la bière en ligne, proposant des bières bouteilles, des tireuses à bière, des verres à bière, des fûts et des coffrets de bières, est composé d’une équipe jeune et dynamique avec une seule priorité : la satisfaction des clients.
				Pour y parvenir, nous nous efforçons de vous offrir un service de qualité, d’être toujours à votre écoute et de vous dénicher de nouvelles bières introuvables en France et plus excellentes les unes que les autres.<br/><br/>
				Véritables spécialistes en bières, en brasseries et dans leurs domaines de compétences, nos membres se démènent chaque jour en logistique, achat/vente, service client et informatique pour faciliter et transformer votre expérience d’achat en réel plaisir.
			</p>
		</div>
{/block}
