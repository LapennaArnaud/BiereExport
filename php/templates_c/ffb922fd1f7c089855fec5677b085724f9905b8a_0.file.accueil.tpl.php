<?php
/* Smarty version 3.1.31, created on 2017-10-26 14:10:02
  from "/home/ubuntu/workspace/templates/accueil.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59f1ecba25b9e9_39540629',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ffb922fd1f7c089855fec5677b085724f9905b8a' => 
    array (
      0 => '/home/ubuntu/workspace/templates/accueil.tpl',
      1 => 1509027000,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59f1ecba25b9e9_39540629 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Accueil</title>
		<link rel="stylesheet" type="text/css" href="../public/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../public/css/carousel.css" >
		<link rel="stylesheet" type="text/css" href="../public/css/style.css" >
	</head>
	<body>
		<?php echo '<?php ';?>include "header.html"; <?php echo '?>';?>

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
	      		<img src="../public/img/biere1.jpg" alt="Los Angeles">
	    	</div>
	
	    	<div class="item">
	      		<img src="../public/img/biere2.jpg" alt="Chicago">
	    	</div>
	
	    	<div class="item">
	      		<img src="../public/img/biere3.jpg" alt="New York">
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
	</body>
	<?php echo '<?php ';?>include "footer.html"; <?php echo '?>';?>
	
	<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="../public/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</html><?php }
}
