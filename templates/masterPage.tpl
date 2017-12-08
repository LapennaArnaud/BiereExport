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
				<a class="navbar-brand" href="index.php" >
					<img src=../public/img/icon-beer.png height=75 >
				</a>
				{if isset($smarty.session.login) }
				Bienvenue : {$smarty.session.login}
				{/if}
				<ul class="nav navbar-nav navbar-right">
					<li><a href="../?page=articleController&action=catalogue"><span class="glyphicon glyphicon-book"></span> Catalogue</a></li>
					<li><a href="../?page=articleController&action=panier"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>
					<li><a href="../?page=clientController&action=sign_up"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="../?page=clientController&action=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				</ul>
				<form class="navbar-form navbar-right" method="post" action="?page=articleController&action=produit">
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
		<p>© 2017Développé par <a style="color:#0a93a6; text-decoration:none;" href="https://giphy.com/gifs/l2Jhx6TQ6P3WAnv8c/html5"> Julien Groll</a> et <a style="color:#0a93a6; text-decoration:none;" href="https://media.tenor.com/images/b2e51e8b2ba5770d97650ae5aa4959b1/tenor.gif"> Arnaud LAPENNA</a>, All rights reserved 2016-2017.   <a style="color:#0a93a6; text-decoration:none;" href="../?page=utilsController&action=info">Contactez-nous</a></p>
	</footer>
</body>
{block name="script"}{/block}
</html>
{block name="javascript"}{/block}