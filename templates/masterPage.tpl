<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>{block name="titre"}{/block}</title>
	<link rel="icon" href="../public/img/beer.ico" />
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/carousel.css" >
	<link rel="stylesheet" type="text/css" href="../public/css/style.css" >
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap-datepicker.min.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<a class="navbar-brand hidden-xs" href="/index.php">
					<img src=../public/img/icon-beer.png height=75 >
				</a>
				<ul class="nav navbar-nav navbar-right" id="menuBar">
					<li><a href="/produit&action=catalogue.html"><span class="glyphicon glyphicon-book"></span> Catalogue</a></li>
					<li><a href="/produit&action=panier.html"><span class="glyphicon glyphicon-shopping-cart"></span> Panier<span class = "badge" id="nbPanier">{$smarty.session.nbArticle}</span></a></li>
					
					{if isset($smarty.session.login) }
						<li><a href="/utilisateur/infoClient.html"><span class="glyphicon glyphicon-user"></span> {$smarty.session.login}</a></li>
						<li><a href="/utilisateur/logOut.html" id="logout"><span class="glyphicon glyphicon-remove"></span> Log out</a></li>
					{else}
						<li><a href="/utilisateur/sign_up.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li><a href="/utilisateur/login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					{/if}
				</ul>
				<!--<form class="navbar-form navbar-right" method="post" action="?page=articleController&action=produit">-->
				<form class="navbar-form navbar-right" method="post" action="/produit/produit.html">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search" name="recherche" id="recherche">
						<div class="input-group-btn">
				  			<button class="btn btn-default" type="submit">
								<i class="glyphicon glyphicon-search"></i>
				  			</button>
						</div>
			  		</div>
				</form>
			</div>
		</nav>
	</header>
	<div>
		{block name="zone_travail"}{/block}
	</div>

	<footer>
		<p>© 2017Développé par <a style="color:#0a93a6; text-decoration:none;" href="https://giphy.com/gifs/l2Jhx6TQ6P3WAnv8c/html5"> Julien Groll</a> et <a style="color:#0a93a6; text-decoration:none;" href="https://media.tenor.com/images/b2e51e8b2ba5770d97650ae5aa4959b1/tenor.gif"> Arnaud LAPENNA</a>, All rights reserved 2016-2017.   <a style="color:#0a93a6; text-decoration:none;" href="/utils/info.html">Contactez-nous</a></p>
	</footer>
</body>

{block name="script"}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="../public/js/jquery.validate.js"></script>
	<script type="text/javascript" src="../public/js/validate-rules.js"></script>
	<script type="text/javascript" src="../public/js/messages_fr.js"></script>
	<script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../public/js/bootstrap-datepicker.min.js"></script>
{/block}

{block name="masterScript"}
<script>
//script liée à la masterpage si besoin d'execution
//exemple utilisation de requette sur le menubar
    $(function() {
        $('#logout').click(function() {
        	
        });
      });
      
</script>
{/block}

</html>
{block name="javascript"}
{/block}