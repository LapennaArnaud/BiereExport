<?php
/* Smarty version 3.1.31, created on 2017-11-09 15:23:48
  from "/home/ubuntu/workspace/templates/accueil.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a0473042ab769_11771469',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ea75fb02cabc76a57b3b9cc527c3717d9d8d851' => 
    array (
      0 => '/home/ubuntu/workspace/templates/accueil.tpl',
      1 => 1510241006,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0473042ab769_11771469 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12106985215a04730429fca5_28719284', "titre");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10427395765a0473042a46b1_62062241', "zone_travail");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_12106985215a04730429fca5_28719284 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_12106985215a04730429fca5_28719284',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

Accueil
<?php
}
}
/* {/block "titre"} */
/* {block "zone_travail"} */
class Block_10427395765a0473042a46b1_62062241 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_10427395765a0473042a46b1_62062241',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

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
<?php
}
}
/* {/block "zone_travail"} */
}
